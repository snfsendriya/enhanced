@extends('Frontend/includes/layout')
@section('title')
	Save Nature Foundation - Donate
@stop
@section('main-content')
   
<div class="page-content bg-white">
        <!-- inner page banner -->
		 <div data-wow-offset="200" class="wow fadeInDownBig">		 
        <div class="dez-bnr-inr overlay-black-middle" 
        style="background-image:url({{asset('frontend_assets/images/banner/bnr1.jpg')}})">
            <div class="container">
                <div class="dez-bnr-inr-entry">
                    <h1 class="text-white">Donate</h1>
                </div>
            </div>
        </div>
       
        <!-- inner page banner END -->
        <!-- Breadcrumb row -->
        <div class="breadcrumb-row">
            <div class="container">
                <ul class="list-inline">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li>Donate</li>
                </ul>
            </div>
        </div>
		 </div>
        <!-- Breadcrumb row END -->
        <!-- contact area -->
        <div class="content-area">
            <!-- who we are -->
            <div class="container">
                <div class="row">
                    <!-- Side Bar -->
					<div data-wow-offset="200" class="wow fadeInLeft wHighlight">
                    <div class="col-md-12">
                    <h3 class="heads text-center">Donate to Save Nature Foundaton</h3>
                    <form action="{{route('donate.donate_process')}}" method="post">
                        @csrf
                        <div class="form-group">
                            <div class="col-md-12">
                                <label>Fill the following details and click on proceed to payment</label>
                            </div>
                            <div class="col-md-6">
                                <label><span class="text-danger">*</span>First Name</label>
                                <input type="text" name="first_name" id="first_name" class="form-control" value="{{ old('first_name') }}" required>
                            </div>
                            @error('first_name')
                                <span class="text-danger">*{{ $message }}</span>
                            @enderror
                            <div class="col-md-6">
                                <label><span class="text-danger">*</span>Last Name</label>
                                <input type="text" name="last_name" id="last_name" class="form-control" value="{{ old('last_name') }}" required>
                            </div>
                            @error('last_name')
                                <span class="text-danger">*{{ $message }}</span>
                            @enderror
                            <div class="col-md-6">
                                <label><span class="text-danger">*</span>Email</label>
                                <input type="text" name="email" id="email" class="form-control" value="{{ old('email') }}" required>
                            </div>
                            @error('email')
                                <span class="text-danger">*{{ $message }}</span>
                            @enderror
                            <div class="col-md-6">
                                <label><span class="text-danger">*</span>Phone Number</label>
                                <input type="number" name="phone_number" id="phone_number" class="form-control" value="{{ old('phone_number') }}" required>
                            </div>
                            @error('phone_number')
                                <span class="text-danger">*{{ $message }}</span>
                            @enderror
                            <div class="col-md-12">
                                <label><span class="text-danger">*</span>Amount</label>
                                <input type="number" name="amount" id="amount" min="1" class="form-control" value="{{ old('amount') }}" required>
                            </div>
                            @error('amount')
                                <span class="text-danger">*{{ $message }}</span>
                            @enderror
                            <div class="col-md-12">
                                <label>Note</label>
                                <textarea name="note" id="note" class="form-control">{{ old('note') }}</textarea>
                            </div>
                            @error('note')
                                <span class="text-danger">*{{ $message }}</span>
                            @enderror
                            <div class="col-md-12" style="margin-top : 20px;">
                                <button type="submit" class="btn btn-primary">Proceed to Payment</button>
                            </div>
                        </div>
                    </form>
                    </div>
                    </div>
                    
                </div>
            </div>
            <!-- who we are END -->
        </div>
        <!-- contact area  END -->
    </div>

@stop