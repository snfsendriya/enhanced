@extends('Frontend/includes/layout')
@section('title')
	Save Nature Foundation - Cart
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
                                <li class="active">Payment</li>
                        </ol>
                </div>
            </div>
        </div>  
        
        <div class="container">
            <div class="row">
                <div class="col-sm-12" align="center">
                    <div class="card-body text-center">

                    <button id="rzp-button1" class="btn btn-success">Pay {{ $amount }}</button>
                        <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
                        <script>
                        var options = {
                            "key": "{{env('PRIVATE_KEY')}}", // Enter the Key ID generated from the Dashboard
                            "amount": "{{ $amount * 100 }}", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                            "currency": "INR",
                            "name": "Save Nature Foundation",
                            "image": "{{asset('frontend_assets/images/logo.png')}}",
                            "handler": function (response){
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'Please wait...',
                                });
                                $.ajax({
                                    url : "{{url('donate-gateway-process')}}",
                                    type : 'post',
                                    data : {
                                        "_token": "{{ csrf_token() }}",
                                        razorpay_payment_id : response.razorpay_payment_id,
                                        first_name : "{{ $first_name }}",
                                        last_name : "{{ $last_name }}",
                                        email : "{{ $email }}",
                                        phone_number : "{{ $phone_number }}",
                                        amount : "{{ $amount }}",
                                        note : "{{ $note }}"
                                    },
                                    success : function(res){
                                        if(res.status === 200)
                                        {
                                            window.location.href = "/donate-successful";
                                        }
                                        else if(res.status === 400)
                                        {
                                            window.location.href = "/donate-failure";
                                        }
                                    },
                                    error : function(){
                                        Swal.fire({
                                            icon: 'warning',
                                            title: 'Please wait...',
                                            timer : 3000
                                        });

                                        window.location.href = "/donate-failure";
                                    }
                                });
                            },
                            "prefill": {
                                "name": "{{ $first_name }}",
                                "email": "{{ $email }}",
                                "contact": "{{ $phone_number }}"
                            },
                            "theme": {
                                "color": "#3399cc"
                            }
                        };
                        var rzp1 = new Razorpay(options);
                        rzp1.on('payment.failed', function (response){
                                alert(response.error.code);
                                alert(response.error.description);
                                alert(response.error.source);
                                alert(response.error.step);
                                alert(response.error.reason);
                                alert(response.error.metadata.order_id);
                                alert(response.error.metadata.payment_id);

                                window.location.href = "/donate-failure";
                        });
                        document.getElementById('rzp-button1').onclick = function(e){
                            rzp1.open();
                            e.preventDefault();
                        }
                        </script>
                            
                    </div>
                </div>
            </div>
        </div>

    </div>
@stop