@extends('Frontend/includes/layout')
@section('title')
	Save Nature Foundation - Register
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
                                <li class="active">Register</li>
                        </ol>
                </div>
            </div>
        </div>  
        
        <div class="container">
            <div class="row card-box">
                    <div class="col-md-6">
                    <div class="p-5">
                                <div class="mb-1">
                                    <h3 class="h4 font-weight-bold ml-5">User Registration</h3>
                                </div>
                                <form action="{{route('user.register')}}" method="post">
                                    @csrf
                                    <div class="form-group mb-2">
                                        <label for="exampleInputPassword" class="ml-7">First Name</label>
                                        <input id="first_name" type="text" class="form-control form-field-border-radius" name="first_name" placeholder="Please Enter Your First Name" value="{{old('first_name')}}" required autocomplete="first_name" autofocus="">
                                    </div>
                                    @error('first_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <div class="form-group mb-2">
                                        <label for="exampleInputPassword" class="ml-7">Last Name</label>
                                        <input id="last_name" type="text" class="form-control form-field-border-radius" name="last_name" placeholder="Please Enter Your Last Name" value="{{old('last_name')}}" required autocomplete="last_name" autofocus="">
                                    </div>
                                    @error('last_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <div class="form-group mb-2">
                                        <label for="exampleInputPassword" class="ml-7">Contact Number</label>
                                        <input id="contact_number" type="number" class="form-control form-field-border-radius" name="contact_number" placeholder="Please Enter Your Contact Number" value="{{old('contact_number')}}" required="" autocomplete="phone" autofocus="">
                                    </div>
                                    @error('contact_number')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <div class="form-group mb-2">
                                        <label for="exampleInputPassword" class="ml-7">Email Address</label>
                                        <input id="email" type="email" class="form-control form-field-border-radius" name="email" placeholder="Please Enter Your Email Address" value="{{old('email')}}" required="" autocomplete="email" autofocus="">
                                    </div>
                                    @error('email')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <div class="form-group mb-2">
                                        <label for="exampleInputPassword" class="ml-7">Password</label>
                                        <input id="password" type="password" class="form-control form-field-border-radius" name="password" placeholder="Please Enter Your Password" required="" autocomplete="new-password">
                                    </div>
                                    @error('password')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <div class="form-group mb-3">
                                        <label for="exampleInputPassword" class="ml-7">Confirm Password</label>
                                        <input id="password_confirmation" type="password" class="form-control form-field-border-radius" name="password_confirmation" placeholder="Confirm Your Password" required="" autocomplete="new-password">
                                    </div>
                                    @error('password_confirmation')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <button type="submit" class="snf4-btn">REGISTER</button>
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