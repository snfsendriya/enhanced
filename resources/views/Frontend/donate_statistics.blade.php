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
                                <li class="active">Donate</li>
                        </ol>
                </div>
            </div>
        </div>  
        
        <div class="container">
            <div class="page-header" style="text-align:left;color: #333333;">
                {{ $heading }}
            </div>
            <div class="row">
                <div class="col-sm-12" align="center">
                    @if($message_type == 1)
                        <span class="text-success">{{ $message }}</span>
                    @elseif($message_type == 2)
                        <span class="text-danger">{{ $message }}</span>
                    @endif
                    <div style="margin-top: 25px;">
                        <a href="{{url('/')}}" class="btn btn-primary">Home</a>
                    </div>
                </div>
            </div>
        </div>

    </div>
@stop