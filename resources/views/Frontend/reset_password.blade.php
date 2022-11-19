@extends('Frontend/includes/layout')
@section('title')
	Save Nature Foundation - Reset Password
@stop
@section('main-content')
    <!-- header END -->
    <!-- Content -->
    <div class="page-content">
       
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <ol class="breadcrumb">
                        <li><a class="not-active" href="{{url('/')}}">Home</a> </li>
                                <li class="active">Reset Password</li>
                        </ol>
                </div>
            </div>
        </div>  
        
        <div class="container">
            <div class="row card-box">
                    <div class="col-md-6">
                    <div class="p-5">
                                <div class="mb-1">
                                    <h3 class="h4 font-weight-bold ml-5">Reset Password</h3>
                                </div>
                                <form action="{{route('front.reset_password')}}" method="post">
                                    @csrf
                                    
                                    <div class="form-group mb-2">
                                        <label for="exampleInputEmail" class="ml-7">Email</label>
                                        <input id="password" type="email" class="form-control form-field-border-radius" name="email" placeholder="Email" value="{{ $email }}" required="" autocomplete="new-email" readOnly>
                                    </div>
                            
                                    <div class="form-group mb-2">
                                        <label for="exampleInputPassword" class="ml-7">New Password</label>
                                        <input id="password" type="password" class="form-control form-field-border-radius" name="password" placeholder="Please Enter Your Password" value="" required="" autocomplete="new-password">
                                        @error('password')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                   
                                    <div class="form-group mb-2">
                                        <label for="exampleInputPassword" class="ml-7">Retype New Password</label>
                                        <input id="password_confirmation" type="password" class="form-control form-field-border-radius" name="password_confirmation" placeholder="Please Retype Your Password" value="" required="" autocomplete="new-password">
                                        @error('password_confirmation')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    
                                    <input type="hidden" value="{{ $token }}" id="token" name="token" />

                                    <button type="submit" class="snf4-btn">SUBMIT</button>
                                </form>
                            </div>
                    </div>
                    <div class="col-md-6 register-block">
                        <div class="account-testimonial">
                            <h4 class="text-white mb-4">This beautiful theme yours!</h4>
                                <p class="lead text-white">"Best investment i made for a long time. Can only
                                    recommend it for other users."</p>
                                <p>- Admin User</p>
                            </div>
                    </div>
            </div>
        </div>

    </div>
@stop