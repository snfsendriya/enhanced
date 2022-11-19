@extends('Backend/admin/includes/layout')

@section('title')
    <title>Contact Details</title>
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
                            <h5 class="card-title text-primary">Contact Details</h5>
                            <nav aria-label="breadcrumb">
                              <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
                                <li class="breadcrumb-item"><a href="{{url('admin/contact')}}">All Contact</a></li>
                                <li class="breadcrumb-item active">Contact Details</li>
                              </ol>
                            </nav>
                          </div>
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
                      <h6 class="mb-0">Contact Details</h6>
                    </div>

                    <div class="card-body">
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label">Name</label>
                          <div class="col-sm-4">
                            <input type="text" class="form-control" value="{{ $contact->name }}" readOnly/>
                          </div>
                          <label class="col-sm-2 col-form-label">Email</label>
                          <div class="col-sm-4">
                            <input type="text" class="form-control" value="{{ $contact->email }}" readOnly/>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label">Phone Number</label>
                          <div class="col-sm-4">
                            <input type="text" class="form-control" value="{{ $contact->phone }}" readOnly/>
                          </div>
                          <label class="col-sm-2 col-form-label">Subject</label>
                          <div class="col-sm-4">
                            <input type="text" class="form-control" value="{{ $contact->subject }}" readOnly/>
                          </div>
                        </div>
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label">Message</label>
                          <div class="col-sm-10">
                            <textarea type="text" class="form-control" readOnly>{{ $contact->message }}</textarea>
                          </div>
                        </div>
                    </div>

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
            </div>
            <!-- / Content -->

@stop