<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductAttri;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function all_product()
    {
        $all_product = Product::all();
        return view("Backend/admin/all_product",compact('all_product'));
    }

    public function add_edit_product($id='')
    {
        if($id > 0)
        {
            $res = Product::find($id);
            $result['title'] = $res->title;
            $result['sub_title'] = $res->sub_title;
            $result['slug'] = $res->slug;
            $result['featured_image'] = $res->featured_image;
            $result['short_desc'] = $res->short_desc;
            $result['long_desc'] = $res->long_desc;
            $result['is_available'] = $res->is_available;
            $result['all_product'] = $res;
            $result['organic_percentage'] = $res->organic_percentage;
            $result['id'] = $id;
        }
        else
        {
            $result['title'] = '';
            $result['sub_title'] = '';
            $result['slug'] = '';
            $result['featured_image'] = '';
            $result['short_desc'] = '';
            $result['long_desc'] = '';
            $result['is_available'] = 0;
            $result['organic_percentage'] = '';
            $result['id'] = 0;
        }

        return view("Backend/admin/add_edit_product",$result);
    }

    public function add_edit_product_process(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'sub_title' => 'required',
            'slug' => 'required',
            'short_desc' => 'required',
            'long_desc' => 'required'
        ]);

        $id = $request->product_id;

        if($id > 0)
        {
            $product = Product::find($id);
            $message = "Product has been updated successfully";
        }
        else
        {
            $product = new Product();
            $message = "Product has been added successfully";
        }   

        $product->title = $request->title;
        $product->sub_title = $request->sub_title;
        $product->slug = Str::slug($request->slug, '-');
        
        if($request->hasFile('featured_image'))
        {
            $rand = rand('111111111','999999999');
            if($id > 0)
            {
                unlink('storage/uploads/Product/'.$product->featured_image);
            }
            $image = $request->file('featured_image');
            $ext = $image->extension();
            $image_name = $rand.'.'.$ext;
            $image->storeAs('/public/uploads/Product/',$image_name);
            $product->featured_image = $image_name;
        }

        $product->short_desc = $request->short_desc;
        $product->long_desc = $request->long_desc;

        if(isset($request->is_available))
        {
            $product->is_available = 1;
        }
        else
        {
            $product->is_available = 0;
        }
        
        $product->organic_percentage = $request->organic_percentage;

        $product->save();

        $weight = $request->weight;
        $unit = $request->unit;
        $price = $request->price;
        $stock = $request->stock;
        $product_image_id = $request->product_image_id;

        foreach($weight as $key=>$val)
        {
            if($product_image_id[$key] > 0)
            {
                $product_attr = ProductAttri::find($product_image_id[$key]);
            }
            else
            {
                $product_attr = new ProductAttri();
            }

            $product_attr->product_id = $product->id;
            $product_attr->weight = $val;
            $product_attr->unit = $unit[$key];
            $product_attr->price = $price[$key];
            $product_attr->stock = $stock[$key];

            $product_attr->save();            
        }

        if($request->hasFile('product_images'))
        {
            $product_image = $request->file('product_images');
            foreach($product_image as $key=>$val)
            {
                $rand = rand('111111111','999999999');
                $product_image = new ProductImage();
                $product_image->product_id = $product->id;
                $image = $val;
                $ext = $image->extension();
                $image_name = $rand.'.'.$ext;
                $image->storeAs('/public/uploads/Product/',$image_name);
                $product_image->image = $image_name;

                $product_image->save();
            }
        }

        return redirect('admin/all-product')->with('success',$message);
    }

    public function delete_product_image(Request $request)
    {
        $id = $request->id;

        $product_image = ProductImage::find($id);

        unlink('storage/uploads/Product/'.$product_image->image);

        $product_image->delete();

        return response()->json([
            'message' => 'Product Image has been deleted successfully'
        ]);
    }

    public function delete_product_attr(Request $request)
    {
        $id = $request->id;

        $product_attr = ProductAttri::find($id);

        $product_attr->delete();

        return response()->json([
            'message' => 'Product Attribute has been deleted successfully'
        ]);
    }

    public function change_product_status($status,$id)
    {
        $product = Product::find($id);
        $product->status = $status;
        $product->save();

        return redirect('admin/all-product')->with('success','Product status has been changed successfully');
    }

    public function delete_product($id)
    {
        $product_image = ProductImage::where(['product_id'=>$id])->get();

        foreach($product_image as $row)
        {
            unlink('storage/uploads/Product/'.$row->image);
        }

        $product = Product::find($id);

        unlink('storage/uploads/Product/'.$product->featured_image);

        $product->delete();

        return redirect('admin/all-product')->with('success','Product has been deleted successfully');
    }

}
