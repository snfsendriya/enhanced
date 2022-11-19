@extends('Backend/user/includes/layout')

@section('title')
    <title>Dashboard</title>
@stop

@section('main-content')

<!-- Content wrapper -->
<div class="content-wrapper">
            <!-- Content -->

            <div class="container-xxl flex-grow-1 container-p-y">
              <div class="row">
                <div class="col-lg-12 mb-4 order-0">
                  <div class="card">
                    <div class="d-flex align-items-end row">
                      <div class="col-sm-12">
                        <div class="card-body">
                          <h5 class="card-title text-primary">Dashboard</h5>
                           <div class="col-lg-12 col-md-4 order-1">
                              <div class="row">
                                <div class="col-lg-6 col-md-12 col-6 mb-4">
                                  <div class="card">
                                    <div class="card-body" style="background: beige;">
                                      <div class="card-title d-flex align-items-start justify-content-between">
                                        <div class="avatar flex-shrink-0">
                                         <i class="menu-icon tf-icons bx bx bxs-user"></i>
                                        </div>
                                      </div>
                                      <span class="fw-semibold d-block mb-1">No Of Orders</span>
                                      <h3 class="card-title mb-2">{{ $total_orders }}</h3>
                                    </div>
                                  </div>
                                </div>
                              </div>
                            </div>
                        </div>
                      </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- / Content -->

@stop