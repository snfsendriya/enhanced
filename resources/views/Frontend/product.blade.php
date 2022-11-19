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
                        <li><a href="{{url('/')}}" class="not-active">Home</a> </li>
                                <li class="active">Our Products</li>
                        </ol>
                </div>
            </div>
        </div>   

        <div class="container">
            <div class="page-header" style="text-align:center;color: #390;">
            Welcome to Our Store!<br> Ensuring <span style="color:red">BEST QUALITY</span> 
            products for your family.</div>
        </div>

        <div class="container">
            
            <h3>Available Products</h3>
            
            <div class="row" style="display:flex;flex-wrap:wrap;">
                @if(isset($product[0]))
                    @php
                        $count = 1
                    @endphp
                    @foreach($product as $key=>$row)
                        @if($row->is_available)
                            <div class="col-md-3" style="margin-bottom:20px;">
                            <div class="card product-card">
                                <a href="{{url('product/'.$row->slug)}}">
                                    <img class="product-featured-image" src="{{ url('storage/uploads/Product/'.$row->featured_image) }}" alt="Card image cap">
                                </a>
                                <div class="card-body card-body-elements">
                                    <h5 class="card-titleml">
                                        <a href="{{url('product/'.$row->slug)}}" title="{{ $row->title }}">{{ $row->title }}</a>
                                    </h5>
                                    <h6 class="product-subtitle">
                                        {{ $row->sub_title }}
                                    </h6>
                                    @if($row->organic_percentage != '0%')
                                        <h6>{{ $row->organic_percentage.' Organic' }}</h6>
                                    @else
                                        <h6>Textbook Binding</h6>
                                    @endif
                                    @php
                                        $org_img = rtrim($row->organic_percentage,"%");
                                    @endphp
                                    @if($org_img != 0)
                                        <img src="{{asset('frontend_assets/images/organic/'.$org_img.'org.jpg')}}">
                                    @else
                                        <div style="width:228px;height:110px;">
                                            <p class="text-success textbook">Textbook Binding</p>
                                        </div>
                                    @endif
                                    @if($row->product_attr[0]->stock)
                                        <h6 class="text-success" style="font-weight : bold;" id="stock_available_msg_{{ $count }}">In Stock!</h6>
                                    @else
                                        <h6 class="text-danger" style="font-weight : bold;" id="stock_available_msg_{{ $count }}">Out Of Stock!</h6>
                                    @endif
                                    <div class="form-group">
                                        <select name="" id="pro_attr_id_{{ $row->id }}_{{ $count}}" 
                                        onChange="change_product_attr({{ $row->id }},{{ $count++ }})">
                                            @foreach($row->product_attr as $val)
                                                <option value="{{ $val->id }}" id="pro_attri_id_{{ $row->id }}_{{ $val->id }}" data-stock-value="{{ $val->stock }}">
                                                    {{ $val->weight }}&nbsp;{{ $val->unit }}--₹{{ $val->price }}--Stock : {{ $val->stock }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <input type="hidden" id="product_attr_id_{{ $row->id }}" value="{{ $row->product_attr[0]->id }}">
                                    <div class="cart-qty-add">
                                        <div class="quantity">
                                            <button class="btn minus-btn" type="button" onclick="decrement_qty({{$row->id}})">-</button>
                                            <input  type="text" class="qty" id="product_qty_{{$row->id}}" value="1">
                                            <button class="btn plus-btn" type="button" onclick="increment_qty({{$row->id}})">+</button>
                                        </div>
                                        <div class="product-price-add-to-cart">
                                            <a href="javascript:;" class="card-button" onClick="add_to_cart({{$row->id}},{{$row->is_available}})" style="padding: 11px 11px;">
                                                <i class="fa fa-shopping-cart"></i>
                                                <span class="title-cart">Add to Cart</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <img src="{{asset('frontend_assets/images/vegicon_1.png')}}" class="vegicon" >
                            </div>
                        </div>
                        @endif
                    @endforeach
                @else
                    <div class="col-md-12">
                        <h5>No Product Available!</h5>
                    </div>
                @endif
            </div>
        </div>
        
        <div class="container">
            
            <h3>Pre Book Products</h3>
            
            <div class="row" style="display:flex;flex-wrap:wrap;">
                @if(isset($product[0]))
                    @php
                        $count = 1
                    @endphp
                    @foreach($product as $key=>$row)
                        @if(!$row->is_available)
                            <div class="col-md-3" style="margin-bottom:20px;">
                            <div class="card product-card">
                                <a href="{{url('product/'.$row->slug)}}">
                                    <img class="product-featured-image" src="{{ url('storage/uploads/Product/'.$row->featured_image) }}" alt="Card image cap">
                                </a>
                                <div class="card-body card-body-elements">
                                    <h5 class="card-titleml">
                                        <a href="{{url('product/'.$row->slug)}}" title="{{ $row->title }}">{{ $row->title }}</a>
                                    </h5>
                                    <h6 class="product-subtitle">
                                        {{ $row->sub_title }}
                                    </h6>
                                    @if($row->organic_percentage != '0%')
                                        <h6>{{ $row->organic_percentage.' Organic' }}</h6>
                                    @else
                                        <h6>Textbook Binding</h6>
                                    @endif
                                    @php
                                        $org_img = rtrim($row->organic_percentage,"%");
                                    @endphp
                                    @if($org_img != 0)
                                        <img src="{{asset('frontend_assets/images/organic/'.$org_img.'org.jpg')}}">
                                    @else
                                        <div style="width:228px;height:114px;">
                                            <p class="text-success textbook">Textbook Binding</p>
                                        </div>
                                    @endif
                                    <!--@if($row->product_attr[0]->stock)-->
                                    <!--    <h6 class="text-success" style="font-weight : bold;" id="stock_available_msg_{{ $count }}">In Stock!</h6>-->
                                    <!--@else-->
                                    <!--    <h6 class="text-danger" style="font-weight : bold;" id="stock_available_msg_{{ $count }}">Out Of Stock!</h6>-->
                                    <!--@endif-->
                                    <div class="form-group">
                                        <br>
                                        <select name="" id="pro_attr_id_{{ $row->id }}_{{ $count}}" 
                                        onChange="change_product_attr({{ $row->id }},{{ $count++ }})">
                                            @foreach($row->product_attr as $val)
                                                <option value="{{ $val->id }}" id="pro_attri_id_{{ $row->id }}_{{ $val->id }}" data-stock-value="{{ $val->stock }}">
                                                    {{ $val->weight }}&nbsp;{{ $val->unit }}--₹{{ $val->price }}--Future Stock : {{ $val->stock }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <input type="hidden" id="product_attr_id_{{ $row->id }}" value="{{ $row->product_attr[0]->id }}">
                                    <div class="cart-qty-add">
                                        <div class="quantity">
                                            <button class="btn minus-btn" type="button" onclick="decrement_qty({{$row->id}})">-</button>
                                            <input  type="text" class="qty" id="product_qty_{{$row->id}}" value="1">
                                            <button class="btn plus-btn" type="button" onclick="increment_qty({{$row->id}})">+</button>
                                        </div>
                                        <div class="product-price-add-to-cart">
                                            <a href="javascript:;" class="card-button" onClick="add_to_cart({{$row->id}},{{$row->is_available}})" style="padding: 11px 11px;">
                                                <i class="fa fa-shopping-cart"></i>
                                                <span class="title-cart">Pre book</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <img src="{{asset('frontend_assets/images/vegicon_1.png')}}" class="vegicon" >
                            </div>
                        </div>
                        @endif
                    @endforeach
                @else
                    <div class="col-md-12">
                        <h5>No Product Available!</h5>
                    </div>
                @endif
            </div>
        </div>

    </div>
@stop