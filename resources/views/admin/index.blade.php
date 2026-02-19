@extends('admin.layouts.app_admin')
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Dashboard</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section dashboard">
            <div class="row">

                <!-- Left side columns -->
                <div class="col-12">
                    <div class="row justify-content-center">

                        <!-- Sales Card -->
                        <div class="col-xxl-3 col-md-6">
                            <div class="card info-card sales-card">

                                <div class="card-body">
                                    <h5 class="card-title">Total Products</h5>
                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-cart"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $allProduct }}</h6>
                                            {{-- <span class="text-success small pt-1 fw-bold">12%</span> <span class="text-muted small pt-2 ps-1">increase</span> --}}

                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Sales Card -->

                        <!-- Revenue Card -->
                        <div class="col-xxl-3 col-md-6">
                            <div class="card info-card revenue-card">

                                <div class="card-body">
                                    <h5 class="card-title">Total Categories</h5>

                                    <div class="d-flex align-items-center">
                                        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="fas fa-list"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $totalCategories }}</h6>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div><!-- End Revenue Card -->

                        <!-- Customers Card -->
                        <div class="col-xxl-3 col-xl-12">

                            <div class="card info-card customers-card">
                                <div class="card-body">
                                    <h5 class="card-title">Total Blog</h5>

                                    <div class="d-flex align-items-center">
                                        <div  class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="fas fa-list"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $totalBlogs }}</h6>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div><!-- End Customers Card -->

                        <!-- Customers Card -->
                        <div class="col-xxl-3 col-xl-12">

                            <div class="card info-card customers-card">
                                <div class="card-body">
                                    <h5 class="card-title">Total Order</h5>

                                    <div class="d-flex align-items-center">
                                        <div  class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-currency-dollar"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $totalOrder }}</h6>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div><!-- End Customers Card -->

                        <!-- Customers Card -->
                        <div class="col-xxl-3 col-xl-12">

                            <div class="card info-card customers-card">
                                <div class="card-body">
                                    <h5 class="card-title">Total Pending Order</h5>

                                    <div class="d-flex align-items-center">
                                        <div  class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-currency-dollar"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $totalPendingOrder }}</h6>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div><!-- End Customers Card -->

                        <!-- Customers Card -->
                        <div class="col-xxl-3 col-xl-12">

                            <div class="card info-card customers-card">
                                <div class="card-body">
                                    <h5 class="card-title">Total Confirmed Order</h5>

                                    <div class="d-flex align-items-center">
                                        <div  class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-currency-dollar"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $totalConfirmedOrder }}</h6>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div><!-- End Customers Card -->

                        <!-- Customers Card -->
                        <div class="col-xxl-3 col-xl-12">

                            <div class="card info-card customers-card">
                                <div class="card-body">
                                    <h5 class="card-title">Total Rejected Order</h5>

                                    <div class="d-flex align-items-center">
                                        <div  class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-currency-dollar"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $totalRejectedOrder }}</h6>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div><!-- End Customers Card -->

                        <!-- Customers Card -->
                        <div class="col-xxl-3 col-xl-12">

                            <div class="card info-card customers-card">
                                <div class="card-body">
                                    <h5 class="card-title">Total Cancel Order</h5>

                                    <div class="d-flex align-items-center">
                                        <div  class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-currency-dollar"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $totalCancelOrder }}</h6>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div><!-- End Customers Card -->

                        <!-- Customers Card -->
                        <div class="col-xxl-3 col-xl-12">

                            <div class="card info-card customers-card">
                                <div class="card-body">
                                    <h5 class="card-title">Total Return Order</h5>

                                    <div class="d-flex align-items-center">
                                        <div  class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-currency-dollar"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $totalReturnOrder }}</h6>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div><!-- End Customers Card -->

                        <!-- Customers Card -->
                        <div class="col-xxl-3 col-xl-12">

                            <div class="card info-card customers-card">
                                <div class="card-body">
                                    <h5 class="card-title">Total Completed Order</h5>

                                    <div class="d-flex align-items-center">
                                        <div  class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                            <i class="bi bi-currency-dollar"></i>
                                        </div>
                                        <div class="ps-3">
                                            <h6>{{ $totalCompletedOrder }}</h6>
                                        </div>
                                    </div>

                                </div>
                            </div>

                        </div><!-- End Customers Card -->



                    </div>
                </div><!-- End Left side columns -->



            </div>
        </section>

    </main>
@endsection
