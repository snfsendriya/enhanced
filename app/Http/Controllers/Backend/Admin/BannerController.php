<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BannerController extends Controller
{
    public function all_banner()
    {
        $all_banner = Banner::all();

        return view("Backend/admin/all_banner",compact('all_banner'));
    }

    public function add_edit_banner($id='')
    {
        if($id > 0)
        {
            $res = Banner::find($id);
            $result['image'] = $res->image;
            $result['id'] = $id;
        }
        else
        {
            $result['image'] = '';
            $result['id'] = 0;
        }

        return view("Backend/admin/add_edit_banner",$result);
    }

    public function add_edit_banner_process(Request $request)
    {
        $id = $request->banner_id;

        if($id > 0)
        {
            $banner = Banner::find($id);
            //unlink(public_path('uploads/Banner/'.$banner->image));
            $message = "Banner has been updated successfully";
        }
        else
        {
            $banner = new Banner();
            $message = "Banner has been added successfully";
        }   
        
        $banner_image = 'noimg.png';
        
        if($request->hasFile('image')){
            $banner_image = rand().'.'.$request->image->extension();
            $request->file('image')->move(public_path('uploads/Banner/'), $banner_image);
            $banner->image = $banner_image;
            $banner->save();
        }

        return redirect('admin/all-banner')->with('success',$message);
    }

    public function change_banner_status($status,$id)
    {
        $banner = Banner::find($id);
        $banner->status = $status;
        $banner->save();

        return redirect('admin/all-banner')->with('success','Banner status has been changed successfully');
    }

    public function delete_banner($id)
    {
        $banner = Banner::find($id);

        unlink(public_path('uploads/Banner/'.$banner->image));

        $banner->delete();

        return redirect('admin/all-banner')->with('success','Banner has been deleted successfully');
    }
}
