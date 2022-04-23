@extends('layouts.backend.backend-layouts')
@section('title', 'Dashboard')
@push('css')
    
@endpush

@section('page-content')
<!-- Start content -->
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-xl-12">
                <div class="page-title-box">
                    <h4 class="page-title float-left">Dashboard</h4>
                    <ol class="breadcrumb float-right">
                        <li class="breadcrumb-item"><a href="#">Uplon</a></li>
                        <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        <!-- end row -->
        <div class="row">
            <div class="col-md-6 col-xl-3">
                <div class="card-box tilebox-one">
                    <i class="icon-layers float-right text-muted"></i>
                    <h6 class="text-muted text-uppercase m-b-20">Orders</h6>
                    <h2 class="m-b-20" data-plugin="counterup">1,587</h2>
                    <span class="badge badge-success"> +11% </span> <span class="text-muted">From previous period</span>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card-box tilebox-one">
                    <i class="icon-paypal float-right text-muted"></i>
                    <h6 class="text-muted text-uppercase m-b-20">Revenue</h6>
                    <h2 class="m-b-20">$<span data-plugin="counterup">46,782</span></h2>
                    <span class="badge badge-danger"> -29% </span> <span class="text-muted">From previous period</span>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card-box tilebox-one">
                    <i class="icon-chart float-right text-muted"></i>
                    <h6 class="text-muted text-uppercase m-b-20">Average Price</h6>
                    <h2 class="m-b-20">$<span data-plugin="counterup">15.9</span></h2>
                    <span class="badge badge-pink"> 0% </span> <span class="text-muted">From previous period</span>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card-box tilebox-one">
                    <i class="icon-rocket float-right text-muted"></i>
                    <h6 class="text-muted text-uppercase m-b-20">Product Sold</h6>
                    <h2 class="m-b-20" data-plugin="counterup">1,890</h2>
                    <span class="badge badge-warning"> +89% </span> <span class="text-muted">Last year</span>
                </div>
            </div>
        </div>
        <!-- end row -->
    </div> <!-- container -->
</div> <!-- content -->
    
@endsection
@push('js')
   
@endpush