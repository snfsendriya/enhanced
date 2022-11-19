@extends('Frontend/includes/layout')
@section('title')
	Save Nature Foundation - Forgot Password
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
                                <li class="active">Forgot Password</li>
                        </ol>
                </div>
            </div>
        </div>  
        
        <div class="container">
            <div class="row card-box">
                    <div class="col-md-6">
                    <div class="p-5">
                                <div class="mb-1">
                                    <h3 class="h4 font-weight-bold ml-5">Forgot Password</h3>
                                </div>
                                <form action="{{route('front.forgot_password')}}" method="post">
                                    @csrf
                            
                                    <div class="form-group mb-2">
                                        <label for="exampleInputPassword" class="ml-7">Email Address</label>
                                        <input id="email_address" type="email" class="form-control form-field-border-radius" name="email" placeholder="Please Enter Your Email Address" value="" required="" autocomplete="email" autofocus="">
                                    </div>

                                    <button type="submit" class="snf4-btn">Submit</button>
                                </form>
                                @if(session()->has('success'))
                                    <br>
                                    <p class="text-success">{{ session('success') }}</p>
                                @elseif(session()->has('error'))
                                    <br>
                                    <p class="text-danger">{{ session('error') }}</p>
                                @endif
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