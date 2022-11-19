<?php

namespace App\Http\Controllers\Backend\Admin;

use App\Http\Controllers\Controller;
use App\Models\Media;
use Illuminate\Http\Request;

class MediaController extends Controller
{
    public function all_media()
    {
        $all_media = Media::all();

        return view("Backend/admin/all_media",compact('all_media'));
    }

    public function add_edit_media($id='')
    {
        if($id > 0)
        {
            $res = Media::find($id);
            $result['upload_file'] = $res->upload_file;
            $result['id'] = $id;
        }
        else
        {
            $result['upload_file'] = '';
            $result['id'] = 0;
        }

        return view("Backend/admin/add_edit_media",$result);
    }

    public function add_edit_media_process(Request $request)
    {
        $id = $request->media_id;

        if($id > 0)
        {
            $media = Media::find($id);
            unlink(public_path('uploads/Media/'.$media->upload_file));
            $message = "Media has been updated successfully";
        }
        else
        {
            $media = new Media();
            $message = "Media has been added successfully";
        }   
        
        $media_file = 'noimg.png';
        
        if($request->hasFile('upload_file')){
            $media_file = rand().'.'.$request->upload_file->extension();
            $request->file('upload_file')->move(public_path('uploads/Media/'), $media_file);
            $media->upload_file = $media_file;
            $media->save();
        }

        return redirect('admin/all-media')->with('success',$message);
    }

    public function delete_media($id)
    {
        $media = Media::find($id);

        unlink(public_path('uploads/Media/'.$media->upload_file));

        $media->delete();

        return redirect('admin/all-media')->with('success','Media has been deleted successfully');
    }
}
