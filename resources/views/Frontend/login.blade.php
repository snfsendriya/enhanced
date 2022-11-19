@extends('Frontend/includes/layout')
@section('title')
	Save Nature Foundation - Login
@stop
@section('main-content')
    <!-- header END -->
    <!-- Content -->
    <style>
        .d-flex-remember
        {
            display: flex;
            align-items: flex-start;
        }
        
        input[type=checkbox]+label:before
        {
            border: none;
        }
    </style>
    <div class="page-content">
       
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                <ol class="breadcrumb">
                        <li><a class="not-active" href="{{url('/')}}">Home</a> </li>
                                <li class="active">Login</li>
                        </ol>
                </div>
            </div>
        </div>  
        
        <div class="container">
            <div class="row card-box">
                    <div class="col-md-6">
                    <div class="p-5">
                                <div class="mb-1">
                                    <h3 class="h4 font-weight-bold ml-5">User Login</h3>
                                </div>
                                <form action="{{route('user.login')}}" method="post">
                                    @csrf
                            
                                    <div class="form-group mb-2">
                                        <label for="exampleInputPassword" class="ml-7">Email Address</label>
                                        <input id="email_address" type="email" class="form-control form-field-border-radius" name="email" placeholder="Please Enter Your Email Address" value="{{ isset($_COOKIE['login_user_email']) ? $_COOKIE['login_user_email'] : '' }}" required="" autocomplete="email" autofocus="">
                                    </div>
                                   
                                    <div class="form-group mb-2">
                                        <label for="exampleInputPassword" class="ml-7">Password</label>
                                        <input id="password" type="password" class="form-control form-field-border-radius" name="password" placeholder="Please Enter Your Password" value="{{ isset($_COOKIE['login_user_pwd']) ? $_COOKIE['login_user_pwd'] : '' }}" required="" autocomplete="new-password">
                                    </div>
                                    
                                    <div class="form-group mb-2 d-flex-remember">
                                        <input type="checkbox" id="rememberme" name="rememberme" {{ isset($_COOKIE['login_user_email']) && isset($_COOKIE['login_user_pwd']) ? '' : 'checked' }}/>
                                        <label> Remember Me </label>
                                    </div>

                                    <button type="submit" class="snf4-btn">LOGIN</button>
                                </form>
                                <br>
                                <a href="{{url('/forgot-password')}}">Forgot Password ?</a>
                                <br>
                                <a href="{{url('/register')}}">Don't have an account? create one</a>
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