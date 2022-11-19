@extends('Frontend/includes/layout')
@section('title')
	Save Nature Foundation - {{ $news[0]->title }}
@stop
@section('main-content')
   
<div class="page-content bg-white">
        <!-- inner page banner -->
		 <div data-wow-offset="200" class="wow fadeInDownBig">		 
        <div class="dez-bnr-inr overlay-black-middle" 
        style="background-image:url({{url('storage/uploads/News/'.$news[0]->featured_image)}});background-position:center;">
            <div class="container">
                <div class="dez-bnr-inr-entry">
                    <h1 class="text-white">{{ $news[0]->title }}</h1>
                </div>
            </div>
        </div>
       
        <!-- inner page banner END -->
        <!-- Breadcrumb row -->
        <div class="breadcrumb-row">
            <div class="container">
                <ul class="list-inline">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li><a href="{{url('/news')}}">News</a></li>
                    <li>{{ $news[0]->title }}</li>
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
                   
                        <h5 style="font-weight:bold;">{{ $news[0]->title }}</h5>
                        <img src="{{url('storage/uploads/News/'.$news[0]->featured_image)}}" style="border-radius:1%;">
                        <div class="mt-20">
                            {!! $news[0]->des !!}
                        </div>

                    </div>
                    
                </div>
            </div>
            <!-- who we are END -->
        </div>
        <!-- contact area  END -->
    </div>

@stop