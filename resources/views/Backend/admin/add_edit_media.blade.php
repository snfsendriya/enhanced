@extends('Backend/admin/includes/layout')

@section('title')
    @if($id > 0)
        <title>Edit Media</title>
    @else
        <title>Add Media</title>
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
                                    Edit Media
                                @else
                                    Add Media
                                @endif
                            </h5>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
                                    <li class="breadcrumb-item"><a href="{{url('admin/all-media')}}">All Media</a></li>
                                    <li class="breadcrumb-item active">
                                        @if($id > 0)
                                            Edit Media
                                        @else
                                            Add Media
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
                      <form action="{{route('admin.media_add_edit')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label"><?php if($id == 0) { ?><span class="text-danger">*</span><?php } ?>Upload Media</label>
                          <div class="col-sm-10">
                            <input class="form-control" type="file" name="upload_file" id="upload_file" <?php if($id == 0) { ?> required <?php } ?>>
                          </div>
                        </div>
                        @error('file')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        @if($upload_file != '')
                          <div class="row mb-3">
                              <div class="col-sm-2"></div>
                              <div class="col-sm-10">
                                  
                                   @php
                                        $file_arr = explode('.',$upload_file);
                                    @endphp
                                    @if($file_arr[1] == 'jpg' || $file_arr[1] == 'jpeg' || $file_arr[1] == 'png')
                                        <img src="{{ url('uploads/Media/'.$upload_file) }}" class="rounded" width="150" height="150" >
                                    @elseif($file_arr[1] == 'pdf')
                                        <a href="{{ url('uploads/Media/'.$upload_file) }}" target="_blank">View</a>
                                    @endif
                              
                              </div>
                          </div>
                        @endif
                        <input type="hidden" name="media_id" value="{{ $id }}">
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