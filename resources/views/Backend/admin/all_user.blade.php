@extends('Backend/admin/includes/layout')

@section('title')
    <title>All User</title>
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
                            <h5 class="card-title text-primary">All User</h5>
                            <nav aria-label="breadcrumb">
                              <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
                                <li class="breadcrumb-item active">All User</li>
                              </ol>
                            </nav>
                          </div>
                          <div class="card">
                <div class="table-responsive text-nowrap">
                  <table class="table table-striped text-center" id="myTable">
                    <thead>
                      <tr>
                        <th>Sl No.</th>
                        <th>Name</th>
                        <th>Profile Pic</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Created Date</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    @php
                        $count = 1
                    @endphp
                    <tbody class="table-border-bottom-0">
                      @if(isset($all_user[0]))
                        @foreach($all_user as $row)
                            <tr>
                                <td>{{ $count++ }}</td>
                                <td>{{ $row->first_name.' '.$row->last_name }}</td>
                                <td>
                                    @if($row->profile_pic != null)
                                    <img src="{{ url('uploads/Profile/'.$row->profile_pic) }}" width="100" height="100" class="rounded">
                                    @else
                                        <img src="{{ asset('admin_assets/img/avatars/no_image.png') }}" width="100" height="100" class="rounded">
                                    @endif
                                </td>
                                <td>
                                    {{ $row->email }}
                                </td>
                                <td>
                                    {{ $row->contact_number }}
                                </td>
                                 <td>
                                    {{ date('d F Y',strtotime($row->created_at)) }}
                                </td>
                                <td>
                                    @if($row->status)
                                        <a href="{{url('admin/change-user-status/'.$row->id.'/0')}}" class="item item-btn" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" title="" data-bs-original-title="<span>Acitve</span>">
                                        <i class='bx bxs-check-square text-success'></i>
                                        </a> 
                                    @else
                                        <a href="{{url('admin/change-user-status/'.$row->id.'/1')}}" class="item item-btn" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" title="" data-bs-original-title="<span>Inactive</span>">
                                        <i class='bx bxs-x-square text-danger'></i>
                                        </a>
                                    @endif
                                  
                                    <a href="{{url('admin/delete-user/'.$row->id)}}" 
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