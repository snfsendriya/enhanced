@extends('Frontend/includes/layout')
@section('title')
	Save Nature Foundation - {{ $blog[0]->title }}
@stop
@section('main-content')
   
<div class="page-content bg-white">
        <!-- inner page banner -->
		 <div data-wow-offset="200" class="wow fadeInDownBig">		 
        <div class="dez-bnr-inr overlay-black-middle" 
        style="background-image:url({{url('storage/uploads/Blogs/'.$blog[0]->featured_image)}});background-position:center;">
            <div class="container">
                <div class="dez-bnr-inr-entry">
                    <h1 class="text-white">{{ $blog[0]->title }}</h1>
                </div>
            </div>
        </div>
       
        <!-- inner page banner END -->
        <!-- Breadcrumb row -->
        <div class="breadcrumb-row">
            <div class="container">
                <ul class="list-inline">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li><a href="{{url('/blogs')}}">Blogs</a></li>
                    <li>{{ $blog[0]->title }}</li>
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

                            <div class="col-sm-8 mt-20">
                                <img src="{{ url('storage/uploads/Blogs/'.$blog[0]->featured_image) }}" style="border-radius:5%;" width="600" height="200">
                                <div style="display:flex;margin-top:25px;margin-bottom:20px;color:#FCB126;">
                                    <div>
                                        <i class="fa fa-user"></i>&nbsp;SAVENATUREFOUNDATION
                                    </div>
                                    <div style="margin-left:30px;">
                                        <i class="fa fa-comments"></i>&nbsp;{{ count($blog[0]->comment) }} Comments
                                    </div>
                                </div>
                                <a href="{{url('blogs/'.$blog[0]->slug)}}"><h5 style="color:#749163;text-transform:capitalize;font-family: system-ui;font-size:30px;" class="blog-title">{{ $blog[0]->title }}</h5></a>
                                <span style="color:lightslategrey;font-family: Montserrat, sans-serif;text-align:justify;">{!! $blog[0]->des !!}</span>
                                
                                @if(isset($blog[0]->video[0]))'
                                
                                    <h2 style="margin-top: -30px;">Videos</h2>
                                
                                    <div class="col-md-12" style="margin-left:-30px;">
                                        @foreach($blog[0]->video as $row)
                                            <div class="col-sm-6">
                                                <iframe frameborder="1" src="{{ $row->video_link }}" height="200" width="300" title="SNF Sendriya"></iframe>
                                            </div>
                                        @endforeach
                                    </div>
                                @endif
                                
                                <div id="Comments" class="tabcontent" style="display:block;margin-left: -27px;">
                                <div class="col-md-12">
                                    <h5>Leave A Comment</h5>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <textarea name="comment" id="comment" class="form-control" placeholder="comment" autocomplete="off"></textarea>
                                        <small class="text-danger" id="comment_error">*Mandatory Field</small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input name="author" id="name" type="text" placeholder="Enter your name" class="form-control" autocomplete="off">
                                        <small class="text-danger" id="name_error">*Mandatory Field</small>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group">
                                        <input name="email" id="email" type="email" placeholder="Enter your email" class="form-control" autocomplete="off">
                                    </div>
                                </div>
                                 <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="form-check">
                                           <label class="form-check-label">
                                            <input type="checkbox" class="form-check-input" name="check_author" id="check_author">&nbsp;Save my name and email in this browser for the next time I comment.
                                         </label> 
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="blog_id" id="blog_id" value="{{ $blog[0]->id }}">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="form-submit">
                                           <button type="button" class="btn btn-success" onclick="add_blog_comment()">Post Comment</button>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-md-12">
                                <div id="comments">
               
                                   <h5><i class="fa fa-comments"></i>&nbsp;Comments</h5>    
                                   <hr>
                                   
                                                      
                                    @if(isset($blogcomments[0]))
                                    
                                        @foreach($blogcomments as $row)                    
                                            {{ $row->name }} on {{ date('d F Y h:i A', strtotime($row->created_at)) }}
                                           <div class="form-group">
                                               <textarea class="form-control bg-white" readonly>{{ $row->comment }}</textarea>
                                           </div>
                                        @endforeach
                                    
                                    @else
                                    
                                    <h5>No Comments</h5>
                                    
                                    @endif
                                               
                                                                
                                                       
                                </div>
                                </div>
                            </div>
                        </div>

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

                    </div>
                    
                </div>
            </div>
            <!-- who we are END -->
        </div>
        <!-- contact area  END -->
    </div>

@stop