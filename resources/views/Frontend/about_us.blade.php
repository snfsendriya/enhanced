@extends('Frontend/includes/layout')
@section('title')
	Save Nature Foundation - About Us
@stop
@section('main-content')
   
<div class="page-content bg-white">
        <!-- inner page banner -->
		 <div data-wow-offset="200" class="wow fadeInDownBig">		 
        <div class="dez-bnr-inr overlay-black-middle" 
        style="background-image:url({{asset('frontend_assets/images/banner/bnr1.jpg')}})">
            <div class="container">
                <div class="dez-bnr-inr-entry">
                    <h1 class="text-white">About Us</h1>
                </div>
            </div>
        </div>
       
        <!-- inner page banner END -->
        <!-- Breadcrumb row -->
        <div class="breadcrumb-row">
            <div class="container">
                <ul class="list-inline">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li>About</li>
                </ul>
            </div>
        </div>
		 </div>
        <!-- Breadcrumb row END -->
        <!-- contact area -->
        <div class="clearfix">
        <div class="section-full bg-white content-inner-2">
                <div class="container">
                    <div class="section-content">
                        <div class="row">
						<div data-wow-offset="200" class="wow fadeInLeft wHighlight">
                            <div class="col-md-4 col-sm-6 text-center hidden-sm ">
                                <div class="worker"> 
								<img src="{{asset('frontend_assets/images/nature.jpg')}}" alt=""/>
								</div>
                            </div>
                            </div>
							<div data-wow-offset="200" class="wow fadeInRight wHighlight">
                            <div class="col-md-8 col-sm-6">
								<h2 class="text-uppercase font-35 m-t30 p-r50">
								<i class="fa fa-quote-left btn-block text-primary m-b10 font-40"></i>
								About US</h2>
								<p>"Save Nature Foundation" is a non profit organization. It is formed to save nature & environment by starting own Natural Farm to produce all varieties of Fruits, Vegetables & Millets, with Natural Farming methods.By using Desi cow dung, Urine and Kasayams, without using any kind of Fertilizers & Pesticides.
These methods learnt from the famous Nature Scientist "Subhash Palekar" By using effective traditional & Modern water harvesting technologies.
We work towards to educate farmers & Communities to encourage them to use natural farming methodologies by conserving precious water and Say "No" to Fertilizers & Pesticides.
<br><br>We established a Brand "SNF Sendriya" for acheiving all our objectives & by which we are selling our own organically grown produce or yield.<br><br> 										
</p>
								
							
							</div>
							</div>
							
           </div>
            </div>
            <!-- Our Awesome Services END -->
           
           
        </div>
        <!-- contact area  END -->
    </div>
        </div>
        <!-- contact area  END -->
    </div>

@stop