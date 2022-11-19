@extends('Backend/admin/includes/layout')

@section('title')
    @if($id > 0)
        <title>Edit Blog</title>
    @else
        <title>Add Blog</title>
    @endif
@stop

@section('main-content')

<!-- Content wrapper -->
<div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <div class="col-lg-12 mb-4 order-0">
                  <div class="card">
                    <div class="d-flex align-items-end row">
                      <div class="col-sm-12">
                        <div class="card-body">
                        <div class="breadcrumb-body">
                            <h5 class="card-title text-primary">
                                @if($id > 0)
                                    Edit Blog
                                @else
                                    Add Blog
                                @endif
                            </h5>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{url('admin/all-blog')}}">All Blog</a></li>
                                    <li class="breadcrumb-item active">
                                        @if($id > 0)
                                            Edit Blog
                                        @else
                                            Add Blog
                                        @endif
                                    </li>
                                </ol>
                            </nav>
                        </div>

                        <div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">

              <!-- Basic Layout & Basic with Icons -->
              <div class="row">
                <!-- Basic Layout -->
                <div class="col-xxl">
                  <div class="card mb-4">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h6 class="mb-0 text-danger">* Marks are mandatory</h6>
                    </div>
                    <div class="card-body">
                      <form action="{{route('admin.blog_add_edit')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="title"><span class="text-danger">*</span>Title</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="title" id="title" placeholder="Enter Blog Title" 
                            value="{{ $title ? $title : old('title') }}"  required/>
                          </div>
                        </div>
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="slug"><span class="text-danger">*</span>Slug</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <input
                                type="text"
                                name="slug"
                                id="slug"
                                class="form-control"
                                placeholder="Enter Blog Slug"
                                aria-label="Enter Blog Slug"
                                value="{{ $slug ? $slug : old('slug') }}" 
                                required
                              />
                            </div>
                          </div>
                        </div>
                        @error('slug')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label"><?php if($id == 0) { ?><span class="text-danger">*</span><?php } ?>Featured Image</label>
                          <div class="col-sm-10">
                            <input class="form-control" type="file" name="featured_image" id="featured_image" <?php if($id == 0) { ?> required <?php } ?>>
                          </div>
                        </div>
                        @error('featured_image')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        @if($featured_image != '')
                          <div class="row mb-3">
                              <div class="col-sm-2"></div>
                              <div class="col-sm-10">
                                
                                    <img src="{{ url('storage/uploads/Blogs/'.$featured_image) }}" width="200" height="200" class="rounded">
                              
                              </div>
                          </div>
                        @endif
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="des"><span class="text-danger">*</span>Description</label>
                          <div class="col-sm-10">
                              <textarea class="form-control" name="des" id="des" required>
                                  {{ $des ? $des : old('des') }}
                              </textarea>
                          </div>
                        </div>
                        @error('des')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        @php
                            $video_link_id = 1
                        @endphp
                        <div class="row mb-3">
                            <a href="javascript:void(0);" class="btn btn-success w-15" onclick="add_video_link()"><i class='bx bxs-plus-circle'></i>&nbsp;Add</a>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="short_desc"><span class="text-danger">*</span>Video Links</label>
                            <div class="col-sm-10" id="video_link_body">
                                @if($id != 0)
                                    @foreach($all_video->video as $key=>$row)
                                        <div class="input-group mb-3" id="video_{{ $video_link_id++ }}">
                                            <input type="text" class="form-control" name="video_link[]" value="{{ $row->video_link }}" placeholder="Enter Video Link" required>
                                            <a href="{{url('admin/delete-video/'.$row->id)}}" class="btn btn-danger" onclick="return confirm('Are you sure to delete this video link ?')">X</a>
                                            <input type="hidden" name="video_id[]" value="{{ $row->id }}">
                                        </div>
                                        <div class="mb-3">
                                            <a href="{{ $row->video_link }}" target="_blank">View</a>
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                        <input type="hidden" name="blog_id" value="{{ $id }}">
                        <div class="row">
                          <div class="col-sm-2">
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Content -->

            <div class="content-backdrop fade"></div>
          </div>

                        </div>
                      </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Content -->

            <script>
                $(document).ready( function () {
                
                    var editor = CKEDITOR.replace('des',{
                      extraPlugins : 'colorbutton,justify',
                    });
                    CKFinder.setupCKEditor( editor );

                } );

                </script>

@stop