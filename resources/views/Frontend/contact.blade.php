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
                    <h1 class="text-white">Contact Us</h1>
                </div>
            </div>
        </div>
       
        <!-- inner page banner END -->
	 <!-- Breadcrumb row -->
        <div class="breadcrumb-row">
            <div class="container">
                <ul class="list-inline">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li>Reach us</li>
                </ul>
            </div>
        </div>
		</div>
        <!-- Breadcrumb row END -->
    <!-- contact area -->
        <div class="section-full content-inner bg-white contact-style-1">
			<div class="container">
                <div class="row">
                    <!-- Left part start -->
					<div data-wow-offset="200" class="wow fadeInLeft wHighlight">
                    <div class="col-md-8">
                        <div class="p-a30 bg-gray clearfix m-b30 ">
							<h2>Send Message to us!</h2>
							
							<form method="post" action="{{route('contact_process')}}">
							@csrf
							<input type="hidden" value="Contact" name="dzToDo" >
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input name="name" type="text" value="{{old('name')}}" required class="form-control" placeholder="Your Name">
                                            </div>
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group"> 
							<input name="email" type="email" value="{{old('email')}}" class="form-control" required  placeholder="Your Email Id" >
                                            </div>
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
									<div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input name="phone" type="text" value="{{old('phone')}}" required class="form-control" placeholder="Phone">
                                            </div>
                                            @error('phone')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
									<div class="col-md-6">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <input name="subject" value="{{old('subject')}}" type="text" required class="form-control" placeholder="Subject">
                                            </div>
                                            @error('subject')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <div class="input-group">
                                                <textarea name="message" rows="4" class="form-control" required placeholder="Your Message...">{{old('message')}}</textarea>
                                            </div>
                                            @error('message')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                       
                                        <button name="submit" type="submit" value="Submit" class="site-button "> <span>Submit</span> </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    </div>
                    <!-- Left part END -->
                    <!-- right part start -->
					<div data-wow-offset="200" class="wow fadeInRight wHighlight">
                    <div class="col-md-4">
                        <div class="p-a30 m-b30 border-1 contact-area">
							<h2 class="m-b10">Reg office</h2>
                            <ul class="no-margin">
                                <li class="icon-bx-wraper left m-b30">
                                    <div class="icon-bx-xs bg-primary"> <a href="#" class="icon-cell"><i class="fas fa-map-marker-alt"></i></a> </div>
                                    <div class="icon-content">
                                        <h6 class="text-uppercase m-tb0 dez-tilte">Address:</h6>
                                        <p>SNF Sendriya, Amrutha Residency Mangapuram Colony, Alwal, Hyderabad - 500010</p>
                                    </div>
                                </li>
                                <li class="icon-bx-wraper left  m-b30">
                                    <div class="icon-bx-xs bg-primary"> <a href="mailto:teamsnfsendriya@gmail.com" class="icon-cell"><i class="fas fa-envelope-open"></i></a> </div>
                                    <div class="icon-content">
                                        <h6 class="text-uppercase m-tb0 dez-tilte">Email:</h6>
                                        <p>teamsnfsendriya@gmail.com</p>
                                    </div>
                                </li>
                                <li class="icon-bx-wraper left">
                                    <div class="icon-bx-xs bg-primary"> <a href="tel:919515021387" class="icon-cell"><i class="fa fa-phone"></i></a> </div>
                                    <div class="icon-content">
                                        <h6 class="text-uppercase m-tb0 dez-tilte">PHONE</h6>
                                        <p>+91-9515021387</p>
                                    </div>
                                </li>
                            </ul>
							<div class="m-t20">
                                <ul class="dez-social-icon border dez-social-icon-lg social-icon-lg-contact">
								    <li><a href="https://www.facebook.com/snfsendriya" class="fab fa-facebook-f" style="outline:solid;"></a></li> &nbsp;
                                	<li><a href="https://www.instagram.com/snf_sendriya/" class="fab fa-instagram" style="outline:solid;"></a></li> &nbsp;
                                	<li><a href="https://www.youtube.com/channel/UConebq4I0Oy8w3bdBE6sZ4Q" class="fab fa-youtube" style="outline:solid;"></a></li>&nbsp;
			       				 	<li><a href="https://g.page/r/CRFvsx7b0s-PEAE" class="fab fa-google" style="outline:solid;"></a></li>
								</ul>
							</div>
                        </div>
                    </div>
                    </div>
                    <!-- right part END -->
                </div>
				
				<div class="row">
					<div class="col-md-12">
					<div data-wow-delay=".30s" class="wow fadeIn">
					<!-- Map part start -->
					<h2>Our Location</h2>
					<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3804.9819210124774!2d78.48738801487804!3d17.508376438006184!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bcb9aba6061d2eb%3A0xea6e299074acdc7b!2sMangapuram+Colony%2C+Meenakshi+Estate%2C+Alwal%2C+Secunderabad%2C+Telangana!5e0!3m2!1sen!2sin!4v1526457277872" style="border:0; width:100%; height:400px;" allowfullscreen></iframe>
					<!-- Map part END -->
					</div>
				</div>
				</div>
            </div>
        </div>
        <!-- contact area  END -->
    </div>

@stop