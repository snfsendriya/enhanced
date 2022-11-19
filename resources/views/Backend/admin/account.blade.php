@extends('Backend/admin/includes/layout')

@section('title')
   <title>Account</title>
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
                                Account
                            </h5>
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="{{url('admin/dashboard')}}">Home</a></li>
                                    <li class="breadcrumb-item active">
                                        Account
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
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                      <li class="nav-item" role="presentation">
                        <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="true"><i class="menu-icon tf-icons bx bxs-user-account"></i>Profile</button>
                      </li>
                      <li class="nav-item" role="presentation">
                        <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact" type="button" role="tab" aria-controls="contact" aria-selected="false"><i class="menu-icon tf-icons bx bxs-lock"></i>Change Password</button>
                      </li>
                    </ul>
                    <div class="tab-content" id="myTabContent">
                      <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                          
                          <div class="tab-pane fade show active" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                    <div class="card-header d-flex align-items-center justify-content-between">
                      <h6 class="mb-0 text-danger">* Marks are mandatory</h6>
                    </div>
                    <div class="card-body">
                      <form action="{{route('admin.profile_process')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="first_name"><span class="text-danger">*</span>First Name</label>
                          <div class="col-sm-10">
                            <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Enter First Name" 
                            value="{{ $user->first_name }}"  required/>
                          </div>
                        </div>
                        @error('first_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="last_name"><span class="text-danger">*</span>Last Name</label>
                          <div class="col-sm-10">
                            <input
                              type="text"
                              class="form-control"
                              name="last_name"
                              id="last_name"
                              placeholder="Enter Last Name"
                              value="{{ $user->last_name }}" 
                              required
                            />
                          </div>
                        </div>
                        @error('last_name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        <div class="row mb-3">
                          <label class="col-sm-2 col-form-label" for="contact_number"><span class="text-danger">*</span>Contact Number</label>
                          <div class="col-sm-10">
                            <div class="input-group input-group-merge">
                              <input
                                type="text"
                                name="contact_number"
                                id="contact_number"
                                class="form-control"
                                placeholder="Enter Contact Number"
                                aria-label="Enter Contact Number"
                                value="{{ $user->contact_number }}" 
                                required
                              />
                            </div>
                          </div>
                        </div>
                        @error('contact_number')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                        
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="profile_pic">Profile Pic</label>
                            <div class="col-sm-10">
                                <input class="form-control" type="file" name="profile_pic" id="profile_pic">
                            </div>
                         
                        </div>
                       
                        @error('profile_pic')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                       
                          <div class="row mb-3">
                              <div class="col-sm-2"></div>
                              <div class="col-sm-10">
                                 
                                @if($user->profile_pic != null)
                                    <img src="{{ url('uploads/Profile/'.$user->profile_pic) }}" width="200" height="200" class="rounded">
                                    <br><br>
                                    <a href="{{url('admin/remove-profile-pic')}}" class="btn btn-danger" onclick="return confirm('Are you sure ?');">Remove</a>
                                @else
                                    <img src="{{ asset('admin_assets/img/avatars/no_image.png') }}" width="200" height="200" class="rounded">
                                @endif
                              
                              </div>
                          </div>
                        
                        <div class="row">
                          <div class="col-sm-2">
                            <button type="submit" class="btn btn-primary">Submit</button>
                          </div>
                        </div>
                        
                      </form>
                    </div>
                 </div>
                          
                      </div>
                      <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                        <div class="card-header d-flex align-items-center justify-content-between">
                          <h6 class="mb-0 text-danger">* Marks are mandatory</h6>
                        </div>
                        <form action="{{route('admin.change_password')}}" method="post">
                            @csrf
                            <div class="row mb-3">
                              <label class="col-sm-2 col-form-label" for="current_password"><span class="text-danger">*</span>Current Password</label>
                              <div class="col-sm-10">
                                <input type="password" class="form-control" name="current_password" id="current_password" placeholder="Enter Current Password" required/>
                              </div>
                            </div>
                            @error('current_password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="row mb-3">
                              <label class="col-sm-2 col-form-label" for="new_password"><span class="text-danger">*</span>New Password</label>
                              <div class="col-sm-10">
                                <input type="password" class="form-control" name="new_password" id="new_password" placeholder="Enter New Password" required/>
                              </div>
                            </div>
                            @error('new_password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                            <div class="row mb-3">
                              <label class="col-sm-2 col-form-label" for="retype_new_password"><span class="text-danger">*</span>Retype New Password</label>
                              <div class="col-sm-10">
                                <input type="password" class="form-control" name="retype_new_password" id="retype_new_password" placeholder="Retype New Password" required/>
                              </div>
                            </div>
                            @error('retype_new_password')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
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

@stop