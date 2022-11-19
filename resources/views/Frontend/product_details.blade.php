@extends('Frontend/includes/layout')
@section('title')
	Save Nature Foundation - Product
@stop
@section('main-content')
    <!-- header END -->
    <!-- Content -->
    <div class="page-content">
       
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <ol class="breadcrumb">
                            <li><a class="not-active" href="{{url('/')}}">Home</a> </li>
                            <li class="not-active"><a class="not-active" href="{{url('/product')}}">Our Product</a></li>
                            <li class="active">{{ $product[0]->title }}</li>
                    </ol>
                </div>
            </div>
        </div>  
     
        <div class="container">
            <div class="row">

            <div class="col-md-6">
			<img id="featured" src="{{ url('storage/uploads/Product/'.$product[0]->featured_image) }}">

            <div id="slide-wrapper" >
                <img id="slideLeft" class="arrow" src="{{asset('frontend_assets/images/arrow-left.png')}}">

                <div id="slider">
                    <img id="thumbnail_id_1" class="thumbnail img-active" src="{{ url('storage/uploads/Product/'.$product[0]->featured_image) }}">
                    @foreach($product[0]->product_images as $key=>$row)
                        <img id="thumbnail_id_{{ $key + 2 }}" class="thumbnail" src="{{ url('storage/uploads/Product/'.$row->image) }}">
                    @endforeach
                </div>

                <img id="slideRight" class="arrow" src="{{asset('frontend_assets/images/arrow-right.png')}}">
            </div>

		</div>

		<div class="col-md-6">
		    
			<h1>{{ $product[0]->title }}</h1>
			
			<h6 class="product-subtitle">
                {{ $product[0]->sub_title }}
            </h6>
			<hr>
			
			<h6>{{ $product[0]->organic_percentage != '0%' ? $product[0]->organic_percentage.' Organic' : 'Textbook Binding' }}</h6>
			
            @php
                $org_img = rtrim($product[0]->organic_percentage,"%");
            @endphp
            @if($org_img != 0)
                <img src="{{asset('frontend_assets/images/organic/'.$org_img.'org.jpg')}}">
            @else
                <div>
                    <p class="text-success text-book-style">Textbook Binding</p>
                </div>
            @endif

            <div id="Description" class="tabcontent" style="display:block;">
                {!! $product[0]->short_desc !!}
            </div>

			<div class="form-group">
                <select name="" id="pro_attr_id_{{ $product[0]->id }}_1" 
                onChange="change_product_attr({{ $product[0]->id }},1)">
                    @foreach($product[0]->product_attr as $val)
                        <option value="{{ $val->id }}" id="pro_attri_id_{{ $product[0]->id }}_{{ $val->id }}" data-stock-value="{{ $val->stock }}">
                            {{ $val->weight }}&nbsp;{{ $val->unit }}--₹{{ $val->price }}--{{ $product[0]->is_available ? 'Stock' : 'Future Stock' }} : {{ $val->stock }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="in-stock">
                @if($product[0]->is_available)
                    @if($product[0]->product_attr[0]->stock)
                        <h5 class="text-success" style="font-weight : bold;" id="stock_available_msg_1">In Stock!</h6>
                    @else
                        <h5 class="text-danger" style="font-weight : bold;" id="stock_available_msg_1">Out Of Stock!</h6>
                    @endif
                @endif
            </div>

			<div class="cart-qty-add">
                    <div class="quantity">
                        <button class="btn minus-btn" type="button" onclick="decrement_qty({{ $product[0]->id }})">-</button>
                            <input  type="text" class="qty" id="product_qty_{{ $product[0]->id }}" value="1">
                        <button class="btn plus-btn" type="button" onclick="increment_qty({{ $product[0]->id }})">+</button>
                    </div>
                    <input type="hidden" id="product_attr_id_{{ $product[0]->id }}" value="{{ $product[0]->product_attr[0]->id }}">
                    <div class="product-price-add-to-cart">
                        <a href="javascript:;" class="card-button-product-details" onClick="add_to_cart({{$product[0]->id}})">
                            <i class="fa fa-shopping-cart"></i>
                            <span class="title-cart">{{ $product[0]->is_available ? 'Add to Cart' : 'Pre Book' }}</span>
                        </a>
                    </div>
                </div>  
                
            <div class="social-icons">
                <h3>Share : </h3>
                <a href="javascript:void(0)" onclick='window.open("https://www.facebook.com/sharer/sharer.php?u={{ url()->current() }}", "Share This Post", "width=640,height=450");return false;' class="fab fa-facebook-f"></a>
                &nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:void(0);" onclick='window.open("https://twitter.com/share?url={{ url()->current() }}", "Share This Post", "width=640,height=450");return false' class="fab fa-twitter"></a>
                &nbsp;&nbsp;&nbsp;&nbsp;<a href="https://api.whatsapp.com/send?text={{ $product[0]->title }} - {{ url()->current() }}" target="_blank" class="fab fa-whatsapp"></a>
                &nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:void(0);" onclick='window.open("http://pinterest.com/pin/create/button/?url={{ url()->current() }}&amp;media={{ url('storage/uploads/Product/'.$product[0]->featured_image) }}", "Share This Post", "width=640,height=450");return false' class="fab fa-pinterest-p"></a>
                <!--&nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:void(0);" onclick='window.open("http://www.linkedin.com/shareArticle?mini=true&amp;url={{ url()->current() }}", "Share This Post", "width=640,height=450");return false' class="fab fa-linkedin-in"></a>-->
                &nbsp;&nbsp;&nbsp;&nbsp;<a href="javascript:void(0);" class="fa fa-chain clipboard" style="color:grey;"></a>
                &nbsp;&nbsp;&nbsp;&nbsp;<span id="copy_text"></span>
            </div>  

		    </div>

            </div>
            <div class="row">
                <!-- Tab links -->
                <div class="tab">
                    <button class="tablinks tab-active" onclick="openDesComment(event, 'Desc')">Description</button>
                    <button class="tablinks" onclick="openDesComment(event, 'Comments')">Comments</button>
                </div>

                <!-- Tab content -->
                <div id="Desc" class="tabcontent" style="display:block;">
                {!! $product[0]->long_desc !!}
                </div>

                <div id="Comments" class="tabcontent">
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
                                        <small class="text-danger" id="email_error">*Mandatory Field</small>
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
                                <input type="hidden" name="product_id" id="product_id" value="{{ $product[0]->id }}">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="form-submit">
                                           <button type="button" class="btn btn-success" onclick="add_comment()">Post Comment</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                <div id="comments">
               
               <h5><i class="fa fa-comments"></i>&nbsp;Comments</h5>    
               <hr>
               
                                  
                @if(isset($productcomments[0]))
                
                    @foreach($productcomments as $row)                    
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
        </div>

    </div>
@stop