@extends('Backend/admin/includes/layout')

@section('title')
    <title>All Media</title>
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
                            <h5 class="card-title text-primary">All Media</h5>
                            <nav aria-label="breadcrumb">
                              <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
                                <li class="breadcrumb-item active">All Media</li>
                              </ol>
                            </nav>
                          </div>
                          <a href="{{url('admin/add-media')}}" class="btn btn-success btn-alignment"><i class='bx bxs-plus-circle'></i>&nbsp;Add</a>
                          <br>
                          <div class="card">
                <div class="table-responsive text-nowrap">
                  <table class="table table-striped text-center" id="myTable">
                    <thead>
                      <tr>
                        <th>Sl No.</th>
                        <th>File</th>
                        <th>Copy</th>
                        <th>Actions</th>
                      </tr>
                    </thead>
                    @php
                        $count = 1
                    @endphp
                    <tbody class="table-border-bottom-0">
                      @if(isset($all_media[0]))
                        @foreach($all_media as $row)
                            <tr>
                                <td>{{ $count++ }}</td>
                                <td>
                                    @php
                                        $file_arr = explode('.',$row->upload_file);
                                    @endphp
                                    @if($file_arr[1] == 'jpg' || $file_arr[1] == 'jpeg' || $file_arr[1] == 'png')
                                        <img src="{{ url('uploads/Media/'.$row->upload_file) }}" class="rounded" width="150" height="150" >
                                    @elseif($file_arr[1] == 'pdf')
                                        <a href="{{ url('uploads/Media/'.$row->upload_file) }}" target="_blank">View</a>
                                    @endif
                                </td>
                                <td><a href="javascript:void(0);" onclick="copyToClipboard('{{ url('uploads/Media/'.$row->upload_file) }}')"><i class="bx bx-copy"></i></a></td>
                                <td>
                                    <a href="{{url('admin/edit-media/'.$row->id)}}" class="item item-btn" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" title="" data-bs-original-title="<span>Edit</span>">
                                        <i class='bx bxs-pencil text-warning'></i>
                                    </a> &nbsp;
                                                                
                                    <a href="{{url('admin/delete-media/'.$row->id)}}" 
                                        data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" title="" data-bs-original-title="<span>Delete</span>" onclick="return confirm('Are you sure ?');">
                                        <i class='bx bxs-trash text-danger'></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                      @else
                        <tr>
                            <td colspan="4">No Data Available!</td>
                        </tr>
                      @endif
                    </tbody>
                  </table>
                </div>
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

@stop