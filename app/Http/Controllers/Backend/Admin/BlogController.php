<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\{
    Blog,
    BlogVideo
};
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function all_blog()
    {
        $all_blog = Blog::all();

        return view("Backend/admin/all_blog",compact('all_blog'));
    }

    public function add_edit_blog($id='')
    {
        if($id > 0)
        {
            $res = Blog::find($id);
            $result['title'] = $res->title;
            $result['slug'] = $res->slug;
            $result['featured_image'] = $res->featured_image;
            $result['des'] = $res->des;
            $result['all_video'] = $res;
            $result['id'] = $id;
        }
        else
        {
            $result['title'] = '';
            $result['slug'] = '';
            $result['featured_image'] = '';
            $result['des'] = '';
            $result['all_video'] = [];
            $result['id'] = 0;
        }

        return view("Backend/admin/add_edit_blog",$result);
    }

    public function add_edit_blog_process(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'slug' => 'required',
            'des' => 'required'
        ]);

        $id = $request->blog_id;

        if($id > 0)
        {
            $blog = Blog::find($id);
            $message = "Blog has been updated successfully";
        }
        else
        {
            $blog = new Blog();
            $message = "Blog has been added successfully";
        }   

        $blog->title = $request->title;
        $blog->slug = Str::slug($request->slug, '-');
        
        if($request->hasFile('featured_image'))
        {
            $rand = rand('111111111','999999999');
            if($id > 0)
            {
                unlink('storage/uploads/Blogs/'.$blog->featured_image);
            }
            $image = $request->file('featured_image');
            $ext = $image->extension();
            $image_name = $rand.'.'.$ext;
            $image->storeAs('/public/uploads/Blogs/',$image_name);
            $blog->featured_image = $image_name;
        }

        $blog->des = $request->des;

        $blog->save();
        
        $video_link = $request->video_link;
        $video_id = $request->video_id;
        
        if(isset($video_link[0]))
        {
            foreach($video_link as $key=>$val)
            {
                if($video_id[$key] > 0)
                {
                    $blogvideo = BlogVideo::find($video_id[$key]);
                }
                else
                {
                    $blogvideo = new BlogVideo();
                }
    
                $blogvideo->blog_id = $blog->id;
                $blogvideo->video_link = $val;
               
                $blogvideo->save();            
            }
        }

        return redirect('admin/all-blog')->with('success',$message);
    }

    public function change_blog_status($status,$id)
    {
        $blog = blog::find($id);
        $blog->status = $status;
        $blog->save();

        return redirect('admin/all-blog')->with('success','Blog status has been changed successfully');
    }

    public function delete_blog($id)
    {
        $blog = blog::find($id);

        unlink('storage/uploads/Blogs/'.$blog->featured_image);

        $blog->delete();

        return redirect('admin/all-blog')->with('success','Blog has been deleted successfully');
    }
    
    public function delete_video($id)
    {
        $blogvideo = BlogVideo::find($id);
        
        $blogvideo->delete();
        
        return redirect()->back()->with('success','Video has been deleted successfully');
    }
}
