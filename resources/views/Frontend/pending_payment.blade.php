@extends('Frontend/includes/layout')
@section('title')
	Save Nature Foundation - Pending Payment
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

                    <button id="rzp-button1" class="btn btn-success">Pay {{ $pending_amount }}</button>
                        <script src="https://checkout.razorpay.com/v1/checkout.js"></script>
                        <script>
                        var options = {
                            "key": "{{ env('PRIVATE_KEY') }}", // Enter the Key ID generated from the Dashboard
                            "amount": "{{ $pending_amount * 100 }}", // Amount is in currency subunits. Default currency is INR. Hence, 50000 refers to 50000 paise
                            "currency": "INR",
                            "name": "Save Nature Foundation",
                            "image": "{{asset('frontend_assets/images/logo.png')}}",
                            "handler": function (response){
                                Swal.fire({
                                    icon: 'warning',
                                    title: 'Please wait...',
                                });
                                $.ajax({
                                    url : "{{url('user/pending-payment-process')}}",
                                    type : 'post',
                                    data : {
                                        "_token": "{{ csrf_token() }}",
                                        razorpay_payment_id : response.razorpay_payment_id,
                                        order_id :  "{{ $order_id }}",
                                        amount : "{{ $pending_amount }}"
                                    },
                                    success : function(res){
                                        if(res.status === 200)
                                        {
                                            window.location.href = "/order-successful";
                                        }
                                        else if(res.status === 400)
                                        {
                                            window.location.href = "/order-failure";
                                        }
                                    }
                                });
                            },
                            "prefill": {
                                "name": "{{ $first_name1 }}",
                                "email": "{{ $email1 }}",
                                "contact": "{{ $phone_number1 }}"
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

                                window.location.href("/order-failure");
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