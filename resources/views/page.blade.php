@extends('layouts.app')
@section('styles')

@endsection
@section('content')
    <div class="main-page-wrapper">

        <br>
        <!-- MAIN CONTENT AREA -->
        <div class="container">
            <div class="row content-layout-wrapper align-items-start">
                <div class="col-12">
                    <h1 class="text-center">{{ $data->name }}</h1>
                </div>

                <div
                    class="site-content shop-content-area col-lg-12 col-12 col-md-12 description-area-before content-with-products wd-builder-off">
                    <div class="woocommerce-notices-wrapper"></div>
                    <div class="wd-products-element">

                        {!! $data->content !!}
                    </div>


                </div>
            </div><!-- .main-page-wrapper -->
        </div> <!-- end row -->
    </div>
@endsection
