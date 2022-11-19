<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function all_news()
    {
        $all_news = News::all();

        return view("Backend/admin/all_news",compact('all_news'));
    }

    public function add_edit_news($id='')
    {
        if($id > 0)
        {
            $res = News::find($id);
            $result['title'] = $res->title;
            $result['slug'] = $res->slug;
            $result['featured_image'] = $res->featured_image;
            $result['des'] = $res->des;
            $result['id'] = $id;
        }
        else
        {
            $result['title'] = '';
            $result['slug'] = '';
            $result['featured_image'] = '';
            $result['des'] = '';
            $result['id'] = 0;
        }

        return view("Backend/admin/add_edit_news",$result);
    }

    public function add_edit_news_process(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'des' => 'required'
        ]);

        $id = $request->news_id;

        if($id > 0)
        {
            $news = News::find($id);
            $message = "News has been updated successfully";
        }
        else
        {
            $news = new News();
            $message = "News has been added successfully";
        }   

        $news->title = $request->title;
        $news->slug = Str::slug($request->slug, '-');
        
        if($request->hasFile('featured_image'))
        {
            $rand = rand('111111111','999999999');
            if($id > 0)
            {
                unlink('storage/uploads/News/'.$news->featured_image);
            }
            $image = $request->file('featured_image');
            $ext = $image->extension();
            $image_name = $rand.'.'.$ext;
            $image->storeAs('/public/uploads/News/',$image_name);
            $news->featured_image = $image_name;
        }

        $news->des = $request->des;

        $news->save();

        return redirect('admin/all-news')->with('success',$message);
    }

    public function change_news_status($status,$id)
    {
        $news = News::find($id);
        $news->status = $status;
        $news->save();

        return redirect('admin/all-news')->with('success','News status has been changed successfully');
    }

    public function delete_news($id)
    {
        $news = News::find($id);

        unlink('storage/uploads/News/'.$news->featured_image);

        $news->delete();

        return redirect('admin/all-news')->with('success','News has been deleted successfully');
    }
}
