@extends('layouts.app')
@section('styles')

@endsection
@section('content')
    <div class="main-page-wrapper">




        <!-- MAIN CONTENT AREA -->
        <div class="container">
            <div class="row content-layout-wrapper align-items-start">
                <div class="col-12">
                    <h1 class="text-center">Our Customer Feedback/Reviews </h1>
                </div>

                <div class="site-content shop-content-area col-lg-12 col-12 col-md-12 description-area-before content-with-products wd-builder-off" role="main">
                    <div class="row">
                        @foreach ($reviews as $data)
                            <div class="col-6 col-md-4 col-lg-3 col-xl-2 mb-4">
                                <img src="{{ asset($data->image) }}" alt="" class="border p-1 rounded">
                            </div>
                        @endforeach
                    </div>

                    {{ $reviews->links() }}
                </div>
            </div><!-- .main-page-wrapper -->
        </div> <!-- end row -->
    </div>
@endsection
@section('scripts')

@endsection
