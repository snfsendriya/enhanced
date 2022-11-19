<!-- Footer -->
<footer class="site-footer">
        <div class="footer-top" style="">
            <div class="container">
                <div class="row">
                    <div class="col-md-3 col-sm-6 footer-col-4">
                        <div class="widget widget_about">
                            <h4 class="m-b15 text-uppercase">About Us</h4>
							<div class="dez-separator bg-primary"></div>
                            <p class="m-tb20">Save Nature Foundation is formed to save nature & environment by starting own Natural Farm to produce all varieties of Fruits, Vegetables & Millets, with Natural Farming methods. By using Desi cow dung, Urine and Kasayams, without using any kind of Fertilizers & Pesticides.</p>
                            <ul class="dez-social-icon border dez-social-icon-lg">
                                <li><a href="https://www.facebook.com/snfsendriya" class="fab fa-facebook-f fb-btn"></a></li>
                                <li><a href="https://www.instagram.com/snf_sendriya/" class="fab fa-instagram in-btn"></a></li>
                                <li><a href="https://www.youtube.com/channel/UConebq4I0Oy8w3bdBE6sZ4Q" class="fab fa-youtube y-btn"></a></li>
			                    <li><a href="https://g.page/r/CRFvsx7b0s-PEAE" class="fab fa-google go-btn"></a></li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="col-md-6 col-sm-6 footer-col-4">
                        <div class="widget widget_services">
                            <h4 class="m-b15 text-uppercase">Our services</h4>
                        <div class="footer-menu-responsive">
							<div class="col-md-6">
    							<div class="dez-separator bg-primary"></div>
                                <ul>
                                    <li><a href="{{url('/')}}">Home</a></li>
                                    <li><a href="{{url('/about-us')}}">About Us</a></li>
                                    <li><a href="{{url('/our-story')}}">Our Story</a></li>
                                    <li><a href="{{url('/our-project')}}">Our Projects</a></li>
                                    <li><a href="{{url('/privacy-policy')}}">Privacy Policy</a></li>
                                    <li><a href="{{url('/terms-and-conditions')}}">Terms & Conditions</a></li>
                                </ul>
                            </div>
						    <div class="col-md-6" style="padding-top:20px;">
                                <ul>
                                    
                                    <li><a href="{{url('/vision-mission')}}">Vision & Mission</a></li>
                                    <li><a href="{{url('/donate')}}">Donate </a></li>
                                    <li><a href="{{url('/news')}}">News</a></li>
                                    <li><a href="{{url('/contact-us')}}">Contact Us</a></li>
                                    <li><a href="{{url('/refund-policy')}}">Refund Policy</a></li>
                                </ul>
                            </div>
                        </div>
						
                    </div>
                    </div>
                    <div class="col-md-3 col-sm-6 footer-col-4">
                        <div class="widget widget_getintuch">
                            <h4 class="m-b15 text-uppercase">Contact us</h4>
                            <div class="dez-separator bg-primary"></div>
                             <ul>
                                <li><i class="fas fa-map-marker-alt"></i><strong>address</strong> SNF Sendriya, Amrutha Residency
Mangapuram Colony, Alwal <br>Hyderabad - 500010	</li>
                                <li><i class="fa fa-phone"></i><strong>Phone</strong>+91-9515021387</li>
                                <li><i class="fas fa-envelope-open"></i><strong>Email</strong>teamsnfsendriya@gmail.com</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
       
    <!-- scroll top button -->
    <button class="scroltop fa fa-chevron-up" style="margin-bottom: 70px"></button>
</div>
<!-- JavaScript  files ========================================= -->
<script  src="{{asset('frontend_assets/js/jquery.min.js')}}"></script>
<!-- jquery.min js -->
<script  src="{{asset('frontend_assets/js/bootstrap.min.js')}}"></script>

<!-- bootstrap.min js -->
<script  src="{{asset('frontend_assets/js/bootstrap-select.min.js')}}"></script>
<!-- Form js -->
<script  src="{{asset('frontend_assets/js/jquery.bootstrap-touchspin.js')}}"></script>
<!-- Form js -->
<script  src="{{asset('frontend_assets/js/magnific-popup.js')}}"></script>
<!-- magnific-popup js -->
<script  src="{{asset('frontend_assets/js/waypoints-min.js')}}"></script>
<!-- waypoints js -->
<script  src="{{asset('frontend_assets/js/counterup.min.js')}}"></script>
<!-- counterup js -->
<script src="{{asset('frontend_assets/js/imagesloaded.js')}}"></script>
<!-- masonry  -->
<script src="{{asset('frontend_assets/js/masonry-3.1.4.js')}}"></script>
<!-- masonry  -->
<script src="{{asset('frontend_assets/js/masonry.filter.js')}}"></script>
<!-- masonry  -->
<script  src="{{asset('frontend_assets/js/owl.carousel.js')}}"></script>
<!-- OWL  Slider  -->
<script  src="{{asset('frontend_assets/js/custom.js')}}"></script>
<!-- custom fuctions  -->
<script  src="{{asset('frontend_assets/js/dz.carousel.js')}}"></script>
<!-- sortcode fuctions  -->


<!-- switcher fuctions  -->
<script  src="{{asset('frontend_assets/js/dz.ajax.js')}}"></script>
<!-- contact-us js -->
<!-- revolution JS FILES -->

 <script src="{{asset('frontend_assets/js/wow.min.js')}}"></script>
              <script>
              new WOW().init();
              </script>
              
    <script type="text/javascript">
      function increment_qty(id)
      {
        let qty = $(`#product_qty_${id}`).val();
        qty++;
        $(`#product_qty_${id}`).val(qty);
      }
      function decrement_qty(id)
      {
        let qty = $(`#product_qty_${id}`).val();
        qty--;
        if(qty == 0)
        {
            return;
        }
        $(`#product_qty_${id}`).val(qty);
      }
      function increment_cart_qty(id,product_attr_id)
      {
        let qty = $(`#product_qty_${id}`).val();
        qty++;
        $(`#product_qty_${id}`).val(qty);
        $.ajax({
            url : "{{url('increment-cart')}}",
            type : 'post',
            data : {
                "_token": "{{ csrf_token() }}",
                cart_id : id,
                product_attr_id : product_attr_id,
                qty : 1
            },
            success : function(data)
            {
                if(data.status === 200)
                {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: data.message,
                        timer : 3000
                    });

                    window.location.reload();
                }
                else if(data.status === 400)
                {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Warning',
                        text: data.message,
                        timer : 3000
                    });

                    window.location.reload();
                }
            },
            error : function()
            {
                Swal.fire({
                    icon: 'warning',
                    title: 'Warning',
                    text: "Something Error!",
                    timer : 3000
                });
            }
        });
      }
      function decrement_cart_qty(id,product_attr_id)
      {
        let qty = $(`#product_qty_${id}`).val();
        qty--;
        if(qty == 0)
        {
            return;
        }
        $(`#product_qty_${id}`).val(qty);

        $.ajax({
            url : "{{url('decrement-cart')}}",
            type : 'post',
            data : {
                "_token": "{{ csrf_token() }}",
                cart_id : id,
                product_attr_id : product_attr_id,
                qty : 1
            },
            success : function(data)
            {
                if(data.status === 200)
                {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: data.message,
                        timer : 3000
                    });

                    window.location.reload();
                }
            },
            error : function()
            {
                Swal.fire({
                    icon: 'warning',
                    title: 'Warning',
                    text: "Something Error!",
                    timer : 3000
                });
            }
        });
      }

      function cart_delete(cart_id,product_attr_id)
      {
        let con = confirm("Are you sure to delete this item ?")
        if(!con)
        {
            return;
        }

        $.ajax({
            url : "{{url('delete-cart')}}",
            type : 'post',
            data : {
                "_token": "{{ csrf_token() }}",
                cart_id : cart_id,
                product_attr_id : product_attr_id
            },
            success : function(data)
            {
                if(data.status === 200)
                {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: data.message,
                        timer : 3000
                    });

                    window.location.reload();
                }
            },
            error : function()
            {
                Swal.fire({
                    icon: 'warning',
                    title: 'Warning',
                    text: "Something Error!",
                    timer : 3000
                });

            }
        });
      }

      function same_address()
      {
          let is_checked = $("#check_billing_address").prop('checked');

          if(is_checked)
          {
              $("#first_name2").val($("#first_name1").val());
              $("#last_name2").val($("#last_name1").val());
              $("#email2").val($("#email1").val());
              $("#phone_number2").val($("#phone_number1").val());
              $("#address2").val($("#address1").val());
              $("#address22").val($("#address21").val());
              $("#state2").val($("#state1").val()).change();
              $("#city2").val($("#city1").val());
              $("#zip_code2").val($("#zip_code1").val());
          }
          else
          {
              $("#first_name2").val("");
              $("#last_name2").val("");
              $("#email2").val("");
              $("#phone_number2").val("");
              $("#address2").val("");
              $("#address22").val("");
              $("#state2").val("");
              $("#city2").val("");
              $("#zip_code2").val("");
          }
      }

    </script>

    <script type="text/javascript">
		let thumbnails = document.getElementsByClassName('thumbnail')

		let activeImages = document.getElementsByClassName('img-active')

		for (var i=0; i < thumbnails.length; i++){

			thumbnails[i].addEventListener('click', function(){
				//console.log(activeImages)
				
				if (activeImages.length > 0){
					activeImages[0].classList.remove('img-active')
				}
				

				this.classList.add('img-active')
				document.getElementById('featured').src = this.src
			})
		}


		let buttonRight = document.getElementById('slideRight');
		let buttonLeft = document.getElementById('slideLeft');

		buttonLeft.addEventListener('click', function(){
		    
		    let thumbnails = document.getElementsByClassName('thumbnail');
		    
		    let previous_active_index = 0;
		    
		    for (var i=1; i <= thumbnails.length; i++){
		        
		        let thumbnail_id = document.getElementById(`thumbnail_id_${i}`); 
		        
		        if(thumbnail_id.classList.value === "thumbnail img-active")
		        {
		            thumbnail_id.classList.remove('img-active');
		            if(i === 1)
		            {
		                previous_active_index = i;
		            }
		            else
		            {
		                previous_active_index = i - 1;
		            }
		            break;
		        }
		        
		    }
		    
		    let thumbnail_id = document.getElementById(`thumbnail_id_${previous_active_index}`); 
		    
		    thumbnail_id.classList.add('img-active');
		    
		    document.getElementById('featured').src = thumbnail_id.src;
		    
			document.getElementById('slider').scrollLeft -= 180
		})

		buttonRight.addEventListener('click', function(){
		   
		    let thumbnails = document.getElementsByClassName('thumbnail');
		    
		    let next_active_index = 0;
		    
		    for (var i=1; i <= thumbnails.length; i++){
		        
		        let thumbnail_id = document.getElementById(`thumbnail_id_${i}`); 
		        
		        if(thumbnail_id.classList.value === "thumbnail img-active")
		        {
		            thumbnail_id.classList.remove('img-active');
		            if(i == thumbnails.length)
		            {
		                next_active_index = i;
		            }
		            else
		            {
		                next_active_index = i + 1;
		            }
		            break;
		        }
		        
		    }
		    
		    let thumbnail_id = document.getElementById(`thumbnail_id_${next_active_index}`); 
		    
		    thumbnail_id.classList.add('img-active');
		    
		    document.getElementById('featured').src = thumbnail_id.src;
		    
			document.getElementById('slider').scrollLeft += 180
		})

	</script>

    <script>
        function openDesComment(evt, tabName) {
  // Declare all variables
  var i, tabcontent, tablinks;
  
  //console.log(tabName);

  // Get all elements with class="tabcontent" and hide them
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }

  // Get all elements with class="tablinks" and remove the class "active"
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" tab-active", "");
  }

  // Show the current tab, and add an "active" class to the button that opened the tab
  document.getElementById(tabName).style.display = "block";
  evt.currentTarget.className += " tab-active";
}
    </script>

@if($message = session('success'))

<script>
    Swal.fire({
      icon: 'success',
      title: 'Success',
      text: "{{ $message }}",
      timer : 3000
    });
</script>

@endif

@if($message = session('error'))

<script>
    Swal.fire({
      icon: 'warning',
      title: 'Warning',
      text: "{{ $message }}",
      timer : 3000
    });
</script>

@endif

<script>
    
    function change_product_attr(id,count)
    {
        
        let product_attr_id = $(`#pro_attr_id_${id}_${count}`).val();
        
        //console.log(product_attr_id);
        
        let stock_value = $(`#pro_attri_id_${id}_${product_attr_id}`).attr('data-stock-value');
        
        if(stock_value > 0)
        {
            $(`#stock_available_msg_${count}`).addClass("text-success");
            $(`#stock_available_msg_${count}`).removeClass("text-danger");
            $(`#stock_available_msg_${count}`).html("In Stock!");
        }
        else
        {
            $(`#stock_available_msg_${count}`).addClass("text-danger");
            $(`#stock_available_msg_${count}`).removeClass("text-success");
            $(`#stock_available_msg_${count}`).html("Out Of Stock!");
        }
        
        $(`#product_attr_id_${id}`).val(product_attr_id);
    }

    function add_to_cart(product_id,is_available=null)
    {
        if(!is_available)
        {
            <?php
                if(!auth()->check())
                {
            ?>
                Swal.fire({
                    icon: 'warning',
                    title: 'Warning',
                    text: "Login to Continue",
                    timer : 3000
                });
                
                return;
                
            <?php
                }
            ?>
        }
        
        let product_attr_id = $(`#product_attr_id_${product_id}`).val();

        $.ajax({
            url : "{{url('add-to-cart')}}",
            type : 'post',
            data : {
                "_token": "{{ csrf_token() }}",
                product_id : product_id,
                product_attr_id : product_attr_id,
                qty : $(`#product_qty_${product_id}`).val()
            },
            success : function(data){
                if(data.status === 200)
                {
                    Swal.fire({
                        icon: 'success',
                        title: 'Success',
                        text: data.message,
                        timer : 3000
                    });
                    
                    if(data.total_cart_items)
                    {
                        $(".cart-badge").html(data.total_cart_items);
                    }
                    else
                    {
                        window.location.reload();
                    }
                }
                else if(data.status === 400)
                {
                    Swal.fire({
                        icon: 'warning',
                        title: 'Warning',
                        text: data.message,
                        timer : 3000
                    });
                }
            },
            error : function(data){
                Swal.fire({
                    icon: 'warning',
                    title: 'Warning',
                    text: "Something Error!",
                    timer : 3000
                });
            }
        });
    }
    
    if(localStorage.getItem("name"))
    {
        $("#name").val(localStorage.getItem("name"));
        $('#check_author').prop('checked', true);
    }
        
    if(localStorage.getItem("email"))
    {
        $("#email").val(localStorage.getItem("email"));
    }
    
    function add_comment()
        {
            $("#comment_error").html('');
            $("#name_error").html('');
            $("#email_error").html('');
           
            if($("#check_author").prop('checked') == true)
            {
                localStorage.setItem("name",$("#name").val());
                localStorage.setItem("email",$("#email").val());
            }
            else
            {
                localStorage.removeItem("name");
                localStorage.removeItem("email");
            }
            
            $.ajax({
                url : "{{url('product-comment')}}",
                type : 'POST',
                data : {
                    "_token": "{{ csrf_token() }}",
                    "product_id" : $("#product_id").val(),
                    "name" : $("#name").val(),
                    "email" : $("#email").val(),
                    "comment" : $("#comment").val()
                },
                success : function(data)
                {
                    if(data.status == 400)
                    {
                        $("#comment_error").html('* '+data.validation_errors.comment);
                        
                        if(typeof data.validation_errors.name !== 'undefined')
                        {
                            $("#name_error").html('* '+data.validation_errors.name);
                        }
                        
                        if(typeof data.validation_errors.email !== 'undefined')
                        {
                            $("#email_error").html('* '+data.validation_errors.email);
                        }
                    }
                    else if(data.status == 200)
                    {
                        $("#comment").val('');
                        
                        window.location.reload();
                    }
                    
                    // console.log(data);
                }
            });
        }
        
        
    function add_blog_comment()
        {
            $("#comment_error").html('');
            $("#name_error").html('');
           
            if($("#check_author").prop('checked') == true)
            {
                localStorage.setItem("name",$("#name").val());
                localStorage.setItem("email",$("#email").val());
            }
            else
            {
                localStorage.removeItem("name");
                localStorage.removeItem("email");
            }
            
            $.ajax({
                url : "{{url('blog-comment')}}",
                type : 'POST',
                data : {
                    "_token": "{{ csrf_token() }}",
                    "blog_id" : $("#blog_id").val(),
                    "name" : $("#name").val(),
                    "email" : $("#email").val(),
                    "comment" : $("#comment").val()
                },
                success : function(data)
                {
                    if(data.status == 400)
                    {
                        $("#comment_error").html('* '+data.validation_errors.comment);
                        
                        if(typeof data.validation_errors.name !== 'undefined')
                        {
                            $("#name_error").html('* '+data.validation_errors.name);
                        }
                    }
                    else if(data.status == 200)
                    {
                        $("#comment").val('');
                        
                        window.location.reload();
                    }
                    
                    // console.log(data);
                }
            });
        }
        
        var $temp = $("<input>");
        var $url = $(location).attr('href');
            
        $('.clipboard').on('click', function() {
              $("body").append($temp);
              $temp.val($url).select();
              document.execCommand("copy");
              $temp.remove();
              $("#copy_text").text("URL copied!");
        });
        
</script>

</body>


</html>