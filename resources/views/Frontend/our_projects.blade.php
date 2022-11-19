@extends('Frontend/includes/layout')
@section('title')
	Save Nature Foundation - Our Projects
@stop
@section('main-content')
   
<div class="page-content bg-white">
        <!-- inner page banner -->
		 <div data-wow-offset="200" class="wow fadeInDownBig">		 
        <div class="dez-bnr-inr overlay-black-middle" 
        style="background-image:url({{asset('frontend_assets/images/banner/bnr1.jpg')}})">
            <div class="container">
                <div class="dez-bnr-inr-entry">
                    <h1 class="text-white">Our Projects</h1>
                </div>
            </div>
        </div>
       
        <!-- inner page banner END -->
        <!-- Breadcrumb row -->
        <div class="breadcrumb-row">
            <div class="container">
                <ul class="list-inline">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li>Our Projects</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        <div class="content-area">
            
            <div class="container">
                <div class="row">
                    
                    <h1 class="m-b20 m-t0"> Rainwater Harvesting Awareness Program </h1>
                    <div class="dez-separator bg-primary"></div>
                    <!-- Side Bar -->
					<div data-wow-offset="200" class="wow fadeInLeft wHighlight">
                    <div class="col-md-7">
					<p>   Today (30th March) TREA team,Er. Damodar Reddy & myself, visited Kanchanapalli (v) , near Narsapur, Medak Dist on Mission Jalanidhi .Participated in the Rainwater harvesting awareness program on the initiation of P N Rao , native of Kanchanapalli. Couple of farmers came forward to have Trenches in their fields. The village water resources have been dried up including groundwater due to excessive utilisation of water for paddy & sugarcane crops. Most of the farmers expressed their willingness to raise Siridhanyalu (Millets) atleast in one acre each . All the farmers actively participated in the program. Congratulations to PN Rao for arranging this program . Also visited PN Rao's 9ac farm where he already excavated Trenches last year and his success story published in Sakshi. We felt very happy today for successful awareness program inspite of hotsun & visiting of success story of Mission Jalanidhi.</p>
                       
                    </div>
                    
                    <div class="col-md-5">
                        
                     <img src="{{asset('frontend_assets/images/project.jpg')}}" class="img-responsive" style="margin-top:0px;margin-bottom:40px;">
                    </div>
                    <div classs="clearfix"></div>
                     <div class="col-md-4" >
                        <img src="{{asset('frontend_assets/images/project3.jpg')}}" class="img-responsive">
                        
                    </div>
                    
                    <div class="col-md-4">
                        <img src="{{asset('frontend_assets/images/project4.jpg')}}" class="img-responsive">
                        
                    </div>
                     
                    
                     <div class="col-md-4">
                        <img src="{{asset('frontend_assets/images/project6.jpg')}}" class="img-responsive">
                        
                    </div>
                   
                    <div class="col-md-12" style="margin-top:40px;margin-bottom:40px;">
                        
                         <img src="{{asset('frontend_assets/images/project1.jpg')}}" class="img-responsive">
                    </div>
                      
                   
                    
                    
                    </div>
                    
                </div>
            </div>
           
        </div>
      
    </div>
        
    </div>

@stop