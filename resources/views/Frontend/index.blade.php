@extends('Frontend/includes/layout')
@section('title')
	Save Nature Foundation - Home
@stop
@section('main-content')
    <!-- header END -->
    <!-- Content -->
    <div class="page-content">
        <!-- Slider -->
      <div id="myCarousel" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    @foreach($all_banner as $key=>$row)
        <li data-target="#myCarousel" data-slide-to="{{$key}}" 
        <?php
            if(!$key++)
            {
        ?>
                class="active" 
        <?php
            }
        ?>
    ></li> 
    @endforeach
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner">
      
      @foreach($all_banner as $key=>$row)
      
        <div class="item <?php if(!$key){ echo 'active'; } ?>">
            
          <img src="{{ url('uploads/Banner/'.$row->image) }}" class="img-responsive">
        
        </div>
    
      @endforeach
      
  </div>

  <!-- Left and right controls -->
  <a class="left carousel-control" href="#myCarousel" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#myCarousel" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right"></span>
    <span class="sr-only">Next</span>
  </a>
</div>   
		<!-- Slider END -->
        <!-- About Us -->
        <div class="section-full about-us bg-white content-inner dez-about">
			<div class="container">
				<div class="tab-content">
					<div class="row">
					  <div data-wow-delay=".25s" class="wow fadeInLeft wHighlight">
						<div class="col-md-5 about-img m-b30">
							<img src="{{asset('frontend_assets/images/nature.jpg')}}" alt=""/>
						</div>
						</div>
						 <div data-wow-delay=".25s" class="wow fadeInRight wHighlight">
						<div class="col-md-7">
							<div class="m-b20">
								<h3 class="h3 ">Welcome To <span class="text-primary">Save Nature Foundation</span></h3>
								<div class="clear"></div>
							</div>
							<p class="m-b30">"Save Nature Foundation" is a non profit organization. It is formed to save nature & environment by starting own Natural Farm to produce all varieties of Fruits, Vegetables & Millets, with Natural Farming methods. By using Desi cow dung, Urine and Kasayams, without using any kind of Fertilizers & Pesticides.
							<br><br>These methods learnt from the famous Nature Scientist "Subhash Palekar" By using effective traditional & Modern water harvesting technologies.<br><br>
							We work towards to educate farmers & Communities to ourencourage them to use natural farming methodologies by conserving precious water and Say "No" to Fertilizers & Pesticides.We established a Brand "SNF Sendriya" for acheiving all our objectives & by which we are selling our own organically grown produce or yield. <br><br>
							</p>

							<a href="{{url('about-us')}}" class="site-button">Read More</a>
						</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- About Us END --<!<li><a href="javascript:void(0);"><i class="material-icons">language</i> <span>English</span> </a></li>>>
		<!-- Services --<!link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">>
		<!-- <div class="section-full bg-img-fix overlay-black-dark content-inner" style="background-image:url(images/background/bg3.jpg);"> -->
            <!-- <div class="container"> -->
                <!-- <div class="section-head text-center text-white"> -->
                    <!-- <h3 class="h3 text-uppercase">Our <span class="text-primary">Projects</span></h3> -->
					<!-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry has been the industry's standard dummy text ever since the been when an unknown printer.</p> -->
                <!-- </div> -->
				  <!-- <div data-wow-delay=".25s" class="wow fadeInLeft wHighlight"> -->
                <!-- <div class="section-content"> -->
                    <!-- <div class="clearfix blog-carousel owl-none"> -->
                        <!-- <div class="item"> -->
							<!-- <div class="dez-box"> -->
								<!-- <div class="dez-media"> <a href="#"><img src="images/our-services/service1.jpg" alt=""></a> </div> -->
								<!-- <div class="dez-info p-a20 text-center bg-gray"> -->
									<!-- <div class="p-lr20"> -->
										<!-- <h4 class="m-a0 bg-primary service-head"><a href="#">Project 1</a></h4> -->
									<!-- </div>	 -->
									<!-- <p class="m-b0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry..Lorem Ipsum is simply Ipsum is simply dummy text of the..</p> -->
									<!-- <div class="m-t20"> -->
										<!-- <a href="#" class="site-button radius-xl">Read More</a> -->
									<!-- </div> -->
								<!-- </div> -->
							<!-- </div> -->
						<!-- </div> -->
						<!-- <div class="item"> -->
							<!-- <div class="dez-box"> -->
								<!-- <div class="dez-media"> <a href="#"><img src="images/our-services/service1.jpg" alt=""></a> </div> -->
								<!-- <div class="dez-info p-a20 text-center bg-gray"> -->
									<!-- <div class="p-lr20"> -->
										<!-- <h4 class="m-a0 bg-primary service-head"><a href="#">Project 2</a></h4> -->
									<!-- </div>	 -->
									<!-- <p class="m-b0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry..Lorem Ipsum is simply Ipsum is simply dummy text of the..</p> -->
									<!-- <div class="m-t20"> -->
										<!-- <a href="#" class="site-button radius-xl">Read More</a> -->
									<!-- </div> -->
								<!-- </div> -->
							<!-- </div> -->
						<!-- </div> -->
						<!-- <div class="item"> -->
							<!-- <div class="dez-box"> -->
								<!-- <div class="dez-media"> <a href="#"><img src="images/our-services/service1.jpg" alt=""></a> </div> -->
								<!-- <div class="dez-info p-a20 text-center bg-gray"> -->
									<!-- <div class="p-lr20"> -->
										<!-- <h4 class="m-a0 bg-primary service-head"><a href="#">Project 3</a></h4> -->
									<!-- </div>	 -->
									<!-- <p class="m-b0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry..Lorem Ipsum is simply Ipsum is simply dummy text of the..</p> -->
									<!-- <div class="m-t20"> -->
										<!-- <a href="#" class="site-button radius-xl">Read More</a> -->
									<!-- </div> -->
								<!-- </div> -->
							<!-- </div> -->
						<!-- </div> -->
						<!-- <div class="item"> -->
							<!-- <div class="dez-box"> -->
								<!-- <div class="dez-media"> <a href="#"><img src="images/our-services/service1.jpg" alt=""></a> </div> -->
								<!-- <div class="dez-info p-a20 text-center bg-gray"> -->
									<!-- <div class="p-lr20"> -->
										<!-- <h4 class="m-a0 bg-primary service-head"><a href="#">Project 4</a></h4> -->
									<!-- </div>	 -->
									<!-- <p class="m-b0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry..Lorem Ipsum is simply Ipsum is simply dummy text of the..</p> -->
									<!-- <div class="m-t20"> -->
										<!-- <a href="#" class="site-button radius-xl">Read More</a> -->
									<!-- </div> -->
								<!-- </div> -->
							<!-- </div> -->
						<!-- </div> -->
						<!-- <div class="item"> -->
							<!-- <div class="dez-box"> -->
								<!-- <div class="dez-media"> <a href="#"><img src="images/our-services/service1.jpg" alt=""></a> </div> -->
								<!-- <div class="dez-info p-a20 text-center bg-gray"> -->
									<!-- <div class="p-lr20"> -->
										<!-- <h4 class="m-a0 bg-primary service-head"><a href="#">Project 5</a></h4> -->
									<!-- </div>	 -->
									<!-- <p class="m-b0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry..Lorem Ipsum is simply Ipsum is simply dummy text of the..</p> -->
									<!-- <div class="m-t20"> -->
										<!-- <a href="#" class="site-button radius-xl">Read More</a> -->
									<!-- </div> -->
								<!-- </div> -->
							<!-- </div> -->
						<!-- </div> -->
						<!-- <div class="item"> -->
							<!-- <div class="dez-box"> -->
								<!-- <div class="dez-media"> <a href="#"><img src="images/our-services/service1.jpg" alt=""></a> </div> -->
								<!-- <div class="dez-info p-a20 text-center bg-gray"> -->
									<!-- <div class="p-lr20"> -->
										<!-- <h4 class="m-a0 bg-primary service-head"><a href="#">Project 6</a></h4> -->
									<!-- </div>	 -->
									<!-- <p class="m-b0">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry..Lorem Ipsum is simply Ipsum is simply dummy text of the..</p> -->
									<!-- <div class="m-t20"> -->
										<!-- <a href="#" class="site-button radius-xl">Read More</a> -->
									<!-- </div> -->
								<!-- </div> -->
							<!-- </div> -->
						<!-- </div> -->
					<!-- </div> -->
                <!-- </div> -->
                <!-- </div> -->
            <!-- </div> -->
        <!-- </div> -->
        <!-- Services END -->
		<div class="section-full bg-img-fix content-inner overlay-primary-dark text-white" style="background-image:url({{asset('frontend_assets/images/background/bg6.jpg')}});">
            <div class="container">
                <div class="row">
				<div data-wow-delay=".25s" class="wow fadeInDown wHighlight">
					<div class="col-md-12">
					<p class="home-tag">" Save Nature Foundation enables, impoverished agriculturally based communities to improve their quality of life by supporting on below projects, that contribute Socio, economic, environmental & sustainable development. "</p>
					</div>
				</div>
				</div>
            </div>
        </div>
		
        <div class="section-full bg-white content-inner dez-about-appoint">
            <div class="container">
                <div class="row">
				  <div data-wow-delay=".25s" class="wow fadeInLeft wHighlight">
						<div class="col-md-7">
							<div class="m-b20">
								<h3 class="h3 ">Our <span class="text-primary">Story</span></h3>
								<div class="clear"></div>
							</div>
							<h4>" A Journey of a change "</h4>
							<p class="m-b30">The story of Save Nature Foundation is made up of one person's inspiration and adding his Son's ideas towards transformation for a better future !
							</p>
							
							<h4>"The beginning of an Idea"</h4>
							<p class="m-b30">Nimbadri Patlori founder of Save Nature Foundation has done his Masters in Business Administration and worked as an SAP Consultant for more than 12 years in Hyderabad, Mumbai and overseas in Finland, Netherlands, Canada and USA, worked for different Multinational Clients.<br><br>His thoughtfulness from his childhood on how to save Nature & Environment by protecting Forest and Conserving water to give a better life & environment for the future generations paved way to establish SNF Sendriya as well.


							</p>

							<a href="{{url('our-story')}}" class="site-button">Read More</a>
						</div>
						</div>
						 <div data-wow-delay=".25s" class="wow fadeInRight wHighlight">
						<div class="col-md-5 about-img m-b30">
							<img src="{{asset('frontend_assets/images/nature1.jpg')}}" alt=""/>
						</div>
						</div>
					
                </div>
            </div>
        </div>
		
		
       
        <!-- Latest Blog -->
		<!-- <div class="section-full bg-white content-inner blog-1"> -->
            <!-- <div class="container"> -->
                <!-- <div class="section-head text-center "> -->
                    <!-- <h3 class="h3 text-uppercase">Coming <span class="text-primary">Events</span></h3> -->
                    <!-- <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry has been the industry's standard dummy text ever since the been when an unknown printer.</p> -->
                <!-- </div> -->
				  <!-- <div data-wow-delay=".25s" class="wow fadeInLeft wHighlight"> -->
                <!-- <div class="section-content owl-none"> -->
                    <!-- <div class="blog-carousel"> -->
                        <!-- <div class="item"> -->
							<!-- <div class="dez-box"> -->
								<!-- <div class="dez-media">  -->
									<!-- <a href="#" class="text-primary"><img src="images/event1.jpg" alt=""></a>  -->
								<!-- </div> -->
								<!-- <div class="dez-info p-a20 border-1"> -->
									<!-- <ul class="blog-info text-primary">										 -->
										<!-- <li><span>17 Mar 2018</span> </li> -->
									<!-- </ul> -->
									<!-- <h4 class="dez-title m-t0"><a href="#">Event 1</a></h4> -->
									<!-- <p class="m-a0">Lorem Ipsum is simply dummy text of the printing and typesetting industry has been the industry's standard dummy text ever since the been when an unknown printer...</p> -->
								<!-- </div> -->
							<!-- </div> -->
						<!-- </div> -->
						<!-- <div class="item"> -->
							<!-- <div class="dez-box"> -->
								<!-- <div class="dez-media">  -->
									<!-- <a href="#" class="text-primary"><img src="images/event1.jpg" alt=""></a>  -->
								<!-- </div> -->
								<!-- <div class="dez-info p-a20 border-1"> -->
									<!-- <ul class="blog-info text-primary">										 -->
										<!-- <li><span>17 Mar 2016</span> </li> -->
									<!-- </ul> -->
									<!-- <h4 class="dez-title m-t0"><a href="#">Event 2</a></h4> -->
									<!-- <p class="m-a0">Lorem Ipsum is simply dummy text of the printing and typesetting industry has been the industry's standard dummy text ever since the been when an unknown printer...</p> -->
								<!-- </div> -->
							<!-- </div> -->
						<!-- </div> -->
						<!-- <div class="item"> -->
							<!-- <div class="dez-box"> -->
								<!-- <div class="dez-media">  -->
									<!-- <a href="#" class="text-primary"><img src="images/event1.jpg" alt=""></a>  -->
								<!-- </div> -->
								<!-- <div class="dez-info p-a20 border-1"> -->
									<!-- <ul class="blog-info text-primary">										 -->
										<!-- <li><span>17 Mar 2016</span> </li> -->
									<!-- </ul> -->
									<!-- <h4 class="dez-title m-t0"><a href="#">Event 3</a></h4> -->
									<!-- <p class="m-a0">Lorem Ipsum is simply dummy text of the printing and typesetting industry has been the industry's standard dummy text ever since the been when an unknown printer...</p> -->
								<!-- </div> -->
							<!-- </div> -->
						<!-- </div> -->
                    <!-- </div> -->
                <!-- </div> -->
                <!-- </div> -->
            <!-- </div> -->
        <!-- </div> -->
        <!-- Latest Blog END -->
        <!-- Content END-->

		<div class="section-full bg-white content-inner dez-about-appoint">
            <div class="container">
                <div class="row">
				  <div data-wow-delay=".25s" class="wow fadeInLeft wHighlight">
						<div class="col-md-12">
							<div class="m-b20">
								<h3 class="h3 " style="margin-left:12px;">Our <span class="text-primary">Products</span></h3>
								<div class="clear"></div>
								@if(isset($latest_products[0]))
                    @php
                        $count = 1
                    @endphp
                    @foreach($latest_products as $row)
                        <div class="col-md-3 mt-20">
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
                                            <button class="btn minus-btn" type="button" onclick="decrement_qty({{$row->id}})" style="color:black;">-</button>
                                            <input  type="text" class="qty" id="product_qty_{{$row->id}}" value="1" style="color:black;">
                                            <button class="btn plus-btn" type="button" onclick="increment_qty({{$row->id}})" style="color:black;">+</button>
                                        </div>
                                        <div class="product-price-add-to-cart">
                                            <a href="javascript:;" class="card-button" onClick="add_to_cart({{$row->id}},{{ $row->is_available }})" style="padding: 11px 11px;">
                                                <i class="fa fa-shopping-cart"></i>
                                                <span class="title-cart">Add to Cart</span>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <img src="{{asset('frontend_assets/images/vegicon_1.png')}}" class="vegicon" >
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col-md-12">
                        <h5>No Product Available!</h5>
                    </div>
                @endif
							</div>
							
						</div>
						</div>					
                </div>
            </div>
        </div>	
        
        <img src="{{asset('frontend_assets/images/banner_edit.jpg')}}" alt=""/>

		 <div data-wow-delay=".25s" class="wow fadeInLeft wHighlight">
		 <div class="section-full bg-white content-inner dez-about-appoint">
		<div class="container" >
		<div class="col-md-12">
		<h4 style="color: green;
    padding-bottom: 5px;
    text-align: center;
    font-size: 22px;
    font-weight: bold;
    border-bottom: 2px solid #006738;
    display: inline;">Save Water</h4><br><br>
		<marquee behavior="scroll" direction="left">
    <img src="{{asset('frontend_assets/images/save1.jpg')}}" width="220" height="160" alt="save water" class="marque"/> 
	<img src="{{asset('frontend_assets/images/save2.jpg')}}" width="220" height="160" alt="save water" class="marque"/>
	<img src="{{asset('frontend_assets/images/save3.jpg')}}" width="220" height="160" alt="save water" class="marque"/>
	<img src="{{asset('frontend_assets/images/save4.jpg')}}" width="220" height="160" alt="save water" class="marque"/>
	<img src="{{asset('frontend_assets/images/save5.jpg')}}" width="220" height="160" alt="save water" class="marque"/>
	<img src="{{asset('frontend_assets/images/save6.jpg')}}" width="220" height="160" alt="save water" class="marque"/>
	<img src="{{asset('frontend_assets/images/save7.jpg')}}" width="220" height="160" alt="save water" class="marque"/>
	<img src="{{asset('frontend_assets/images/save1.jpg')}}" width="220" height="160" alt="save water" class="marque"/> 
	<img src="{{asset('frontend_assets/images/save2.jpg')}}" width="220" height="160" alt="save water" class="marque"/>
	<img src="{{asset('frontend_assets/images/save3.jpg')}}" width="220" height="160" alt="save water" class="marque"/>
	<img src="{{asset('frontend_assets/images/save4.jpg')}}" width="220" height="160" alt="save water" class="marque"/>
	<img src="{{asset('frontend_assets/images/save5.jpg')}}" width="220" height="160" alt="save water" class="marque"/>
	<img src="{{asset('frontend_assets/images/save6.jpg')}}" width="220" height="160" alt="save water" class="marque"/>
	<img src="{{asset('frontend_assets/images/save7.jpg')}}" width="220" height="160" alt="save water" class="marque"/>
	<img src="{{asset('frontend_assets/images/save1.jpg')}}" width="220" height="160" alt="save water" class="marque"/> 
	<img src="{{asset('frontend_assets/images/save2.jpg')}}" width="220" height="160" alt="save water" class="marque"/>
	<img src="{{asset('frontend_assets/images/save3.jpg')}}" width="220" height="160" alt="save water" class="marque"/>
	<img src="{{asset('frontend_assets/images/save4.jpg')}}" width="220" height="160" alt="save water" class="marque"/>
	<img src="{{asset('frontend_assets/images/save5.jpg')}}" width="220" height="160" alt="save water" class="marque"/>
	<img src="{{asset('frontend_assets/images/save6.jpg')}}" width="220" height="160" alt="save water" class="marque"/>
	<img src="{{asset('frontend_assets/images/save7.jpg')}}" width="220" height="160" alt="save water" class="marque"/>
  </marquee>
		</div>
		</div>
		
		
		</div>
		</div>
    </div>
@stop