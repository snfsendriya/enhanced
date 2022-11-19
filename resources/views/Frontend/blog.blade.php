@extends('Frontend/includes/layout')
@section('title')
	Save Nature Foundation - Blogs
@stop
@section('main-content')
   
<div class="page-content bg-white">
        <!-- inner page banner -->
		 <div data-wow-offset="200" class="wow fadeInDownBig">		 
        <div class="dez-bnr-inr overlay-black-middle" 
        style="background-image:url({{asset('frontend_assets/images/banner/Blog-1.jpg')}})">
            <div class="container">
                <div class="dez-bnr-inr-entry">
                    <h1 class="text-white">Blogs</h1>
                </div>
            </div>
        </div>
       
        <!-- inner page banner END -->
        <!-- Breadcrumb row -->
        <div class="breadcrumb-row">
            <div class="container">
                <ul class="list-inline">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li>Blogs</li>
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
                    @if(isset($all_blog[0]))
                        @foreach($all_blog as $row)

                            <div class="col-sm-8 mt-20">
                                <img src="{{ url('storage/uploads/Blogs/'.$row->featured_image) }}" style="border-radius:5%;" width="600" height="200">
                                <div style="display:flex;margin-top:25px;margin-bottom:20px;color:#FCB126;">
                                    <div>
                                        <i class="fa fa-user"></i>&nbsp;SAVENATUREFOUNDATION
                                    </div>
                                    <div style="margin-left:30px;">
                                        <i class="fa fa-comments"></i>&nbsp;{{ count($row->comment) }} Comments
                                    </div>
                                </div>
                                <a href="{{url('blogs/'.$row->slug)}}"><h5 style="color:#749163;text-transform:capitalize;font-family: system-ui;font-size:30px;" class="blog-title">{{ $row->title }}</h5></a>
                                <span style="color:#959393;">{!! substr($row->des,0,200).'...' !!}</span>
                                <br>
                                <br>
                                <a href="{{url('blogs/'.$row->slug)}}" style="border:2px solid #000000;border: 2px solid #000000;padding: 10px 50px;border-radius: 30px;color:grey;">Read More&nbsp;&nbsp;<i class="fa fa-long-arrow-right"></i></a>
                            </div>
                            
                        @endforeach

                        <div class="col-sm-4 mt-20" style="background-color : #eee;height:550px;border-radius:10px;">

                            <!--<input type="text" class="form-control mt-20" placeholder="Search..." style="border-radius:50px;">-->

                            <!--<br><br>-->
                            <h5 style="font-weight:bold;">Recent Posts</h5>
                            <ul style="margin-left:20px;">
                                @foreach($lastest_blogs as $row)
                                
                                    <li style="color:orange;">
                                        <a href="{{url('blogs/'.$row->slug)}}" style="color:black;">{{ $row->title }}</a>
                                    </li>

                                @endforeach
                            </ul>
                               
                        </div>

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