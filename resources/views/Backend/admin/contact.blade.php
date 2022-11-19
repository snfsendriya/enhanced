@extends('Backend/admin/includes/layout')

@section('title')
    <title>All Contact</title>
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
                            <h5 class="card-title text-primary">All Contact</h5>
                            <nav aria-label="breadcrumb">
                              <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
                                <li class="breadcrumb-item active">All Contact</li>
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
                      @if(isset($all_contact[0]))
                        @foreach($all_contact as $row)
                            <tr>
                                <td>{{ $count++ }}</td>
                                <td>{{ $row->name }}</td>
                                <td>
                                    {{ $row->email }}
                                </td>
                                <td>
                                    {{ $row->phone }}
                                </td>
                                 <td>
                                    {{ date('d F Y',strtotime($row->created_at)) }}
                                </td>
                                <td>
                                    <a href="{{url('admin/view-contact/'.$row->id)}}" class="item item-btn" data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" title="" data-bs-original-title="<span>View</span>">
                                        <i class='bx bxs-binoculars text-primary'></i>
                                    </a> &nbsp; 
                                  
                                    <a href="{{url('admin/delete-contact/'.$row->id)}}" 
                                        data-bs-toggle="tooltip" data-bs-offset="0,4" data-bs-placement="top" data-bs-html="true" title="" data-bs-original-title="<span>Delete</span>" onclick="return confirm('Are you sure ?');">
                                        <i class='bx bxs-trash text-danger'></i>
                                </a>
                                </td>
                            </tr>
                        @endforeach
                      @else
                        <tr>
                            <td colspan="8">No Data Available!</td>
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