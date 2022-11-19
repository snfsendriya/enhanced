@extends('Frontend/includes/layout')
@section('title')
	Save Nature Foundation - Our Story
@stop
@section('main-content')
   
<div class="page-content bg-white">
        <!-- inner page banner -->
		 <div data-wow-offset="200" class="wow fadeInDownBig">		 
        <div class="dez-bnr-inr overlay-black-middle" 
        style="background-image:url({{asset('frontend_assets/images/banner/bnr1.jpg')}})">
            <div class="container">
                <div class="dez-bnr-inr-entry">
                    <h1 class="text-white">Our Story</h1>
                </div>
            </div>
        </div>
       
        <!-- inner page banner END -->
        <!-- Breadcrumb row -->
        <div class="breadcrumb-row">
            <div class="container">
                <ul class="list-inline">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li>Who We Are</li>
                </ul>
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
                    <div class="col-md-8 m-b30">
                        <div>
                            <h1 class="m-b20 m-t0"> Our Story</h1>
                            <div class="dez-separator bg-primary"></div>
							<p class="heads1">A Journey of a Change</p>
                            <p>The story of Save Nature Foundation is made up of one person's inspiration and adding his Son's ideas towards transformation for a better future !</p>
							<h2 class="m-t30 m-b10 heads2">"The beginning of an Idea"</h2>
                        </div>
                        
                    </div>
                    </div>
					<div class="clearfix"></div>
					<div class="col-md-7">
                            <p class="box-shadow"><strong>Nimbadri Patlori</strong> founder of Save Nature Foundation has done his Masters in Business Administration and worked as an SAP Consultant for more than 12 years in Hyderabad, Mumbai and overseas in Finland, Netherlands, Canada and USA, worked for different Multinational Clients. <br><br>
							His thoughtfulness from his childhood on how to save Nature & Environment by protecting Forest and Conserving water to give a better life & environment for the future generations paved way to establish SNF Sendriya as well.<br><br></p></div>
							
							
							
							
						<div data-wow-offset="200" class="wow fadeInRight wHighlight">
                     <div class="col-md-5">
                    

					   <img src="{{asset('frontend_assets/images/story-pic1.png')}}" class="img-responsive story-pic1">
                    </div>
					
					
					<div class="clearfix"></div><br><br><br>
					
					
						<div data-wow-offset="200" class="wow fadeInRight wHighlight">
                     <div class="col-md-5">
                       
                       
					   <img src="{{asset('frontend_assets/images/story-pic2.png')}}" class="img-responsive story-pic1">
                    </div>
                    </div>	
					
					<div class="col-md-7"><br><br><br><br>
                            <p class="box-shadow"><strong>Sharath Kumar Patlori</strong> is a younger son of the founder. He'd worked for Accenture & Infomerica in Hyderabad for 3 years and currently pursuing his masters in Germany. Being an nature and environment lover, He has given his thoughts, ideas and support to his Father to make this happen. Collectively to work for the sustainable development.</p></div>
							
					
							
							
							
                    <!-- Side Bar END -->
                    <!-- Right Bar -->
					<!-- <div data-wow-offset="200" class="wow fadeInRight wHighlight"> -->
                     <!-- <div class="col-md-4 "> -->
                        
                       
					   <!-- <img src="images/story.png" class="img-responsive"> -->
                    <!-- </div> -->
                    <!-- </div> -->
                    <!-- Right Bar END -->
                </div>
            </div>
            <!-- who we are END -->
        </div>
        <!-- contact area  END -->
    </div>
        
    </div>

@stop