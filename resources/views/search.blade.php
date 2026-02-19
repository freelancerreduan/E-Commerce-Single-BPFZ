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
                    <h1 class="text-center">Product's for <span class="text-danger">"{{ $search }}"</span></h1>
                </div>

                <div class="site-content shop-content-area col-lg-12 col-12 col-md-12 description-area-before content-with-products wd-builder-off"
                    role="main">
                    <div class="woocommerce-notices-wrapper"></div>




                    <div class="wd-products-element">

                        <div class="products wd-products wd-grid-g grid-columns-4 elements-grid products-bordered-grid pagination-pagination"
                            style="--wd-col-lg:4;--wd-col-md:4;--wd-col-sm:2;--wd-gap-lg:20px;--wd-gap-sm:10px;">
                            @forelse ($products as $product)
                                {{-- <div class="wd-product wd-with-labels wd-hover-icons wd-col product-grid-item product type-product post-36944 status-publish instock product_cat-print has-post-thumbnail sale shipping-taxable purchasable product-type-variable"
                                    data-loop="1" data-id="36944">

                                    <div class="product-wrapper">
                                        <div class="product-element-top wd-quick-shop">
                                            <a href="{{ route('frontend.shop', $product->slug) }}"
                                                class="product-image-link">
                                                <img width="430" height="645" src="{{ asset($product->thumbnails) }}"
                                                    class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail"
                                                    alt="{{ $product->title }}" />
                                            </a>

                                            <div class="wrapp-buttons">
                                                <div class="wd-buttons">
                                                    <a href="{{ route('frontend.shop', $product->slug) }}"
                                                        style="font-size: 20px;padding:5px 10px; opacity: .8; font-weight:400;">
                                                        <i class="fas fa-cart-shopping"></i>
                                                    </a>
                                                    <a href="#"
                                                        style="font-size: 20px;padding:5px 10px; opacity: .8; font-weight:400;">
                                                        <i class="fa fa-magnifying-glass"></i>
                                                    </a>
                                                    <div style="font-size: 20px;padding:5px 10px; opacity: .8; font-weight:400; cursor: pointer;"
                                                        id="wishlist-area">
                                                        @auth
                                                            <span onclick="wishlist(this, {{ $product->id }})"
                                                                data-id="{{ $product->id }}"
                                                                data-status='{{ count(getWishlists($product->id)) > 0 ? 'yes' : 'no' }}'><i
                                                                    class="fa{{ count(getWishlists($product->id)) > 0 ? '' : 'r' }} fa-heart"></i></span>
                                                        @else
                                                            <span
                                                                onclick="return window.location.href='{{ route('login') }}'"><i
                                                                    class="far fa-heart"></i></span>
                                                        @endauth
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <form class="variations_form cart wd-quick-shop-2 wd-clear-none wd-reset-side-lg"
                                            action="#" method="post">
                                            <table class="variations" cellspacing="0">
                                                <tbody>
                                                    <tr>
                                                        <th class="label cell"><label for="pa_size">Size</label></th>
                                                        <td class="value cell with-swatches">
                                                            <div
                                                                class="wd-swatches-product wd-swatches-grid wd-bg-style-1 wd-text-style-1 wd-dis-style-1 wd-size-default wd-shape-round">
                                                                @foreach (getSizes($product->id) as $varient)
                                                                    <div class="wd-swatch wd-text wd-enabled" data-value="l"
                                                                        data-title="L">
                                                                        <span class="wd-swatch-text"> {{ $varient->size }}
                                                                        </span>
                                                                    </div>
                                                                @endforeach


                                                            </div>
                                                            <select id="pa_size" class="" name="attribute_pa_size"
                                                                data-attribute_name="attribute_pa_size"
                                                                data-show_option_none="yes">
                                                                <option value="">Choose an option</option>
                                                                <option value="l">L</option>
                                                                <option value="s">S</option>
                                                                <option value="xxl">XXL</option>
                                                            </select>
                                                            <div class="wd-reset-var"><a class="reset_variations"
                                                                    href="#">Clear</a></div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>

                                            <div class="single_variation_wrap">
                                                <div class="woocommerce-variation single_variation"></div>
                                                <div class="woocommerce-variation-add-to-cart variations_button">


                                                    <div class="quantity">

                                                        <input type="button" value="-" class="minus" />

                                                        <label class="screen-reader-text"
                                                            for="quantity_66e9338f80a1b">{{ $product->title }}
                                                            quantity</label>
                                                        <input type="number" id="quantity_66e9338f80a1b"
                                                            class="input-text qty text" value="1"
                                                            aria-label="Product quantity" min="1" max=""
                                                            name="quantity" step="1" placeholder=""
                                                            inputmode="numeric" autocomplete="off">

                                                        <input type="button" value="+" class="plus" />

                                                    </div>

                                                    <button type="submit"
                                                        class="single_add_to_cart_button button alt">Add to cart</button>


                                                    <input type="hidden" name="add-to-cart" value="36944" />
                                                    <input type="hidden" name="product_id" value="36944" />
                                                    <input type="hidden" name="variation_id" class="variation_id"
                                                        value="0" />
                                                </div>
                                            </div>

                                        </form>

                                        <h3 class="wd-entities-title">
                                            <a
                                                href="{{ route('frontend.shop', $product->slug) }}">{{ $product->title }}</a>
                                        </h3>
                                        <div class="wd-product-cats">
                                            <a href="{{ route('frontend.category', $product->categorySlug) }}" rel="tag">{{ $product->category_name }}</a>
                                        </div>
                                        <div class="wd-star-rating">
                                            <div class="star-rating" role="img" aria-label="Rated 0 out of 5">
                                                @for ($i = 0; $i < 5; $i++)
                                                    <span
                                                        class="{{ $i < getRating($product->id) ? 'star-checked' : '' }}">★</span>
                                                @endfor
                                            </div>
                                        </div>

                                        <span class="price">
                                            @if ($product->old_price > 0)
                                                <del aria-hidden="true">
                                                    <span class="woocommerce-Price-amount amount">
                                                        <bdi>{{ $product->old_price }}<span
                                                                class="woocommerce-Price-currencySymbol">৳</span></bdi>
                                                    </span>
                                                </del>
                                                <span class="screen-reader-text">Original price was:
                                                    {{ $product->old_price }}৳.</span>
                                            @endif
                                            <ins aria-hidden="true">
                                                <span class="woocommerce-Price-amount amount">
                                                    <bdi>{{ $product->price }}<span
                                                            class="woocommerce-Price-currencySymbol">৳</span></bdi>
                                                </span>
                                            </ins>
                                            <span class="screen-reader-text">Current price is:
                                                {{ $product->price }}৳.</span>
                                        </span>

                                        <span class="gtm4wp_productdata" style="display:none; visibility:hidden;"></span>

                                    </div>
                                </div> --}}
                                @include('layouts.partials.product-list')

                                {{-- <a href="{{ route('frontend.category', $product->categorySlug) }}" rel="tag">{{ $product->category_name }}</a> --}}












                            @empty
                                <div class="w-100">
                                    <h1>No data found</h1>
                                </div>
                            @endforelse

                        </div>

                        <div class="wd-loop-footer products-footer">
                            <nav class="woocommerce-pagination wd-pagination">
                                {{ $products->links() }}
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

            } else if (status == 'yes') {
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
