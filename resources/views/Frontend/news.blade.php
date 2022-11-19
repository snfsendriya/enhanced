@extends('Frontend/includes/layout')
@section('title')
	Save Nature Foundation - News
@stop
@section('main-content')
   
<div class="page-content bg-white">
        <!-- inner page banner -->
		 <div data-wow-offset="200" class="wow fadeInDownBig">		 
        <div class="dez-bnr-inr overlay-black-middle" 
        style="background-image:url({{asset('frontend_assets/images/banner/bnr1.jpg')}})">
            <div class="container">
                <div class="dez-bnr-inr-entry">
                    <h1 class="text-white">News</h1>
                </div>
            </div>
        </div>
       
        <!-- inner page banner END -->
        <!-- Breadcrumb row -->
        <div class="breadcrumb-row">
            <div class="container">
                <ul class="list-inline">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li>News</li>
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
                    @if(isset($all_news[0]))
                    @foreach($all_news as $row)
                        <div class="col-sm-12 mt-20">
                                <div class="col-md-4">
                                    <img src="{{ url('storage/uploads/News/'.$row->featured_image) }}" style="border-radius:5%;" width="300" height="300" >
                                </div>
                                <div class="col-md-8">
                                    <h5 style="font-weight:bold;">{{ $row->title }}</h5>
                                    {!! substr($row->des,0,200).'...' !!}
                                    <br>
                                    <a href="{{url('news/'.$row->slug)}}" class="text-success" style="font-weight:bold;">Read More</a>
                                </div>
                        </div>
                    @endforeach
                        @else
                        <div align="center">
                            No Data Available!
                        </div>
                      @endif
                    </div>
                    
                </div>
            </div>
            <!-- who we are END -->
        </div>
        <!-- contact area  END -->
    </div>

@stop