@extends('layouts.app')
@section('styles')
<link rel='stylesheet' href='{{ asset('assets/frontend') }}/css/woo-opt-bordered-product.min.css' type='text/css' />
<link rel='stylesheet' href='{{ asset('assets/frontend') }}/css/woo-product-loop.min.css' type='text/css' />
<link rel='stylesheet' href='{{ asset('assets/frontend') }}/css/woo-product-loop-icons.min.css' type='text/css' />
<link rel='stylesheet' href='{{ asset('assets/frontend') }}/css/footer-base.min.css' type='text/css' />
<link rel='stylesheet' href='{{ asset('assets/frontend') }}/css/woo-opt-quick-shop-2.min.css' type='text/css' />
<link rel='stylesheet' href='{{ asset('assets/frontend') }}/css/woo-mod-variation-form.min.css' type='text/css' />

@endsection
@section('content')
    <div class="main-page-wrapper">
        <!-- MAIN CONTENT AREA -->
        <div class="container">
            <div class="row content-layout-wrapper align-items-start">
                <div class="col-12">
                    @if (setting()->announcement_status == 'yes')
                        <div class="border rounded py-2" style="background-color: #FFD1D1">
                            <marquee behavior="" direction="" style="font-size: 18px;">{{ setting()->announcement }}</marquee>
                        </div>
                    @endif
                </div>

                <div class="col-12">
                    <a href="{{ setting()->banner_link }}">
                        <img src="{{ asset(setting()->home_banner) }}" alt="" class="banner-img">
                    </a>
                </div>
            </div>
        </div>



        <!-- MAIN CONTENT AREA -->
        <div class="container">
            <div class="row content-layout-wrapper align-items-start">
                <div class="col-12">
                    <h1 class="text-center">Latest Products</h1>
                </div>

                <div class="site-content shop-content-area col-lg-12 col-12 col-md-12 description-area-before content-with-products wd-builder-off"
                    role="main">
                    <div class="woocommerce-notices-wrapper"></div>




                    <div class="wd-products-element">

                        <div class="products wd-products wd-grid-g grid-columns-4 elements-grid products-bordered-grid pagination-pagination"
                            style="--wd-col-lg:4;--wd-col-md:4;--wd-col-sm:2;--wd-gap-lg:20px;--wd-gap-sm:10px;">



                            @foreach ($products as $product)
                                @include('layouts.partials.product-list')
                            @endforeach

                        </div>

                        <div class="wd-loop-footer products-footer">
                            <nav class="woocommerce-pagination wd-pagination">
                                {{$products->links()}}
                            </nav>
                        </div>
                    </div>


                </div>
            </div><!-- .main-page-wrapper -->
        </div> <!-- end row -->
    </div>
@endsection
@section('scripts')
    <script>
        function wishlist(el, productId) {
            var product_id = productId;
            var status = $(el).attr('data-status');


            if (status == 'no') {
                $(el).attr('data-status', 'yes');
                $(el).html(`<i class="fa fa-heart"></i>`);

            } else if(status == 'yes') {
                $(el).attr('data-status', 'no');
                $(el).html(`<i class="far fa-heart"></i>`);
            }


            $.ajax({
                type: 'POST',
                url: '{{ route('user.wishlist.store') }}',
                data: {
                    product_id: productId
                },
                success: function(data) {
                    if (data == 'added') {
                        toastr.success('Added to wishlist Successfully');
                    } else {
                        toastr.success('Remove from wishlist Successfully');
                    }
                },
            });
        }
    </script>
@endsection
