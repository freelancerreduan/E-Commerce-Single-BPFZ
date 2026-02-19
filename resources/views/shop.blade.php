@extends('layouts.app')
@section('styles')
    <link rel='stylesheet' href='{{ asset('assets/frontend') }}/css/woo-mod-quantity.min.css' type='text/css'/>
    <link rel='stylesheet' href='{{ asset('assets/frontend') }}/css/woo-mod-shop-attributes.min.css' type='text/css'/>
    <link rel='stylesheet' href='{{ asset('assets/frontend') }}/css/woo-single-prod-el-gallery.min.css' type='text/css'/>
    <link rel='stylesheet' href='{{ asset('assets/frontend') }}/css/woo-single-prod-el-gallery-opt-thumb-left-desktop.min.css' type='text/css'/>
    <link rel='stylesheet' href='{{ asset('assets/frontend') }}/css/lib-swiper.min.css' type='text/css'/>
    <link rel='stylesheet' href='{{ asset('assets/frontend') }}/css/lib-swiper-arrows.min.css' type='text/css'/>
    <link rel='stylesheet' href='{{ asset('assets/frontend') }}/css/lib-photoswipe.min.css' type='text/css'/>
    <link rel='stylesheet' href='{{ asset('assets/frontend') }}/css/woo-mod-variation-form.min.css' type='text/css'/>
    <link rel='stylesheet' href='{{ asset('assets/frontend') }}/css/el-accordion.min.css' type='text/css'/>
    <link rel='stylesheet' href='{{ asset('assets/frontend') }}/css/woo-single-prod-el-reviews.min.css' type='text/css'/>
    <link rel='stylesheet' href='{{ asset('assets/frontend') }}/css/mod-comments.min.css' type='text/css'/>
    <link rel='stylesheet' href='{{ asset('assets/frontend') }}/css/opt-scrolltotop.min.css' type='text/css'/>
    <link rel='stylesheet' href='{{ asset('assets/frontend') }}/css/woo-opt-sticky-add-to-cart.min.css' type='text/css'/>
    <link rel='stylesheet' href='{{ asset('assets/frontend') }}/css/header-el-search-fullscreen-general.min.css' type='text/css'/>
    <link rel='stylesheet' href='{{ asset('assets/frontend') }}/css/header-el-search-fullscreen-1.min.css' type='text/css'/>
    <link rel='stylesheet' href='{{ asset('assets/frontend') }}/css/opt-bottom-toolbar.min.css' type='text/css'/>
    <link rel='stylesheet' href='{{ asset('assets/frontend') }}/css/sharing.css' type='text/css'/>
    <link rel='stylesheet' href='{{ asset('assets/frontend') }}/css/social-logos.css' type='text/css'/>
    <style>
        .rate {
            float: left;
            height: 46px;
            padding: 0 10px;
        }
        /* .rate:not(:checked) > input {
            position:absolute;
            top:-9999px;
        } */
        .rate:not(:checked) > label {
            float:right;
            width:1em;
            overflow:hidden;
            white-space:nowrap;
            cursor:pointer;
            font-size:30px;
            color:#ccc;
        }
        .rate:not(:checked) > label:before {
            content: '★ ';
        }
        .rate > input:checked ~ label {
            color: #ffc700;
        }
        .rate:not(:checked) > label:hover,
        .rate:not(:checked) > label:hover ~ label {
            color: #deb217;
        }
        .rate > input:checked + label:hover,
        .rate > input:checked + label:hover ~ label,
        .rate > input:checked ~ label:hover,
        .rate > input:checked ~ label:hover ~ label,
        .rate > label:hover ~ input:checked ~ label {
            color: #c59b08;
        }
        .wd-accordion-title:is(.wd-active,:hover) .wd-accordion-title-text {
            color: #BC6176 !important;
        }
        .comment-form .submit {
            background-color: #BC6377 !important;
        }
    </style>
@endsection
@section('content')

        <div class="main-page-wrapper">


            <!-- MAIN CONTENT AREA -->
            <div class="container-fluid">
                <div class="row content-layout-wrapper align-items-start">

                    <div class="site-content shop-content-area col-12 breadcrumbs-location-summary wd-builder-off"
                        role="main">



                        <div class="container">
                        </div>


                        <div id="product-37140"
                            class="single-product-page single-product-content product-design-default tabs-location-standard tabs-type-accordion meta-location-add_to_cart reviews-location-separate product-no-bg product type-product post-37140 status-publish first instock product_cat-embroidery has-post-thumbnail sale shipping-taxable purchasable product-type-variable">

                            <div class="container">

                                <div class="woocommerce-notices-wrapper"></div>
                                <div class="row product-image-summary-wrap">
                                    <div class="product-image-summary col-lg-12 col-12 col-md-12">
                                        <div class="row product-image-summary-inner">
                                            <div class="col-lg-6 col-12 col-md-6 product-images">
                                                <div class="woocommerce-product-gallery woocommerce-product-gallery--with-images woocommerce-product-gallery--columns-4 images wd-has-thumb thumbs-position-left wd-thumbs-wrap images image-action-zoom">
                                                    <div class="wd-carousel-container wd-gallery-images">
                                                        <div class="wd-carousel-inner">
                                                            <figure class="woocommerce-product-gallery__wrapper wd-carousel wd-grid" style="--wd-col-lg:1;--wd-col-md:1;--wd-col-sm:1;">
                                                                <div class="wd-carousel-wrap">
                                                                    @foreach ($featureds as $item)
                                                                        <div class="wd-carousel-item">
                                                                            <figure data-thumb="{{ asset($item->featured_image) }}" class="woocommerce-product-gallery__image">
                                                                                <a data-elementor-open-lightbox="no" href="{{ asset($item->featured_image) }}?fit=1575%2C2100&#038;ssl=1">
                                                                                    <img fetchpriority="high" width="700" height="933" src="{{ asset($item->featured_image) }}" class="wp-post-image wp-post-image" alt="" title="img_2979" data-caption="" data-src="{{ asset($item->featured_image) }}" data-large_image="{{ asset($item->featured_image) }}" data-large_image_width="1575" data-large_image_height="2100" decoding="async" srcset="{{ asset($item->featured_image) }} 1575w, {{ asset($item->featured_image) }} 225w, {{ asset($item->featured_image) }} 600w, {{ asset($item->featured_image) }} 768w, {{ asset($item->featured_image) }} 1152w, {{ asset($item->featured_image) }} 1536w, {{ asset($item->featured_image) }} 700w, {{ asset($item->featured_image) }}?resize=150%2C200&amp;ssl=1 150w" sizes="(max-width: 700px) 100vw, 700px" />
                                                                                </a>
                                                                            </figure>
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </figure>



                                                            <div class="product-additional-galleries">
                                                                <div class="wd-show-product-gallery-wrap wd-action-btn wd-style-icon-bg-text wd-gallery-btn">
                                                                    <a href="#" rel="nofollow" class="woodmart-show-product-gallery">
                                                                        <span>Click to enlarge</span>
                                                                    </a>
                                                                </div>
                                                            </div>

                                                        </div>

                                                    </div>

                                                    <div class="wd-carousel-container wd-gallery-thumb">
                                                        <div class="wd-carousel-inner">
                                                            <div class="wd-carousel wd-grid"
                                                                style="--wd-col-lg:3;--wd-col-md:4;--wd-col-sm:3;">
                                                                <div class="wd-carousel-wrap">
                                                                    @foreach ($featureds as $item)
                                                                        <div class="wd-carousel-item ">
                                                                            <img loading="lazy" width="150" height="200" src="{{ asset($item->featured_image) }}" class="attachment-150x0 size-150x0" alt="" decoding="async" srcset="{{ asset($item->featured_image) }} 150w, {{ asset($item->featured_image) }} 225w, {{ asset($item->featured_image) }} 600w, {{ asset($item->featured_image) }} 768w, {{ asset($item->featured_image) }} 1152w, {{ asset($item->featured_image) }} 1536w, {{ asset($item->featured_image) }} 700w, {{ asset($item->featured_image) }} 1575w" sizes="(max-width: 150px) 100vw, 150px" />
                                                                        </div>
                                                                    @endforeach
                                                                </div>
                                                            </div>

                                                            <div
                                                                class="wd-nav-arrows wd-thumb-nav wd-custom-style wd-pos-sep wd-icon-1">
                                                                <div class="wd-btn-arrow wd-prev wd-disabled">
                                                                    <div class="wd-arrow-inner"></div>
                                                                </div>
                                                                <div class="wd-btn-arrow wd-next">
                                                                    <div class="wd-arrow-inner"></div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-12 col-md-6 text-left summary entry-summary">
                                                <div class="summary-inner set-mb-l reset-last-child">
                                                    <div class="single-breadcrumbs-wrapper">
                                                        <div class="single-breadcrumbs">
                                                            <div class="wd-breadcrumbs pt-3 pt-lg-0">
                                                                <nav class="woocommerce-breadcrumb" aria-label="Breadcrumb"> <a href="{{ route('frontend.index') }}" class="breadcrumb-link"> Home </a>
                                                                    <a href="{{ route('frontend.category', $product->category->slug) }}" class="breadcrumb-link breadcrumb-link-last"> {{ $product->category->category_name }} </a>
                                                                    <span class="breadcrumb-last"> {{ $product->title }} </span>
                                                                </nav>
                                                            </div>

                                                        </div>
                                                    </div>


                                                    <h1 class="product_title entry-title wd-entities-title">{{ $product->title }}</h1>
                                                    <div class="wd-star-rating">
                                                        <div class="star-rating">
                                                            Rating:
                                                            @for ($i=0; $i < 5; $i++)
                                                                <span class="{{ $i < getRating($product->id) ? 'star-checked' : '' }}">★</span>
                                                            @endfor
                                                        </div>
                                                    </div>
                                                    <p class="price">
                                                        @if ($product->old_price > 0)
                                                            <del aria-hidden="true">
                                                                <span class="woocommerce-Price-amount amount">
                                                                    <bdi>{{ $product->old_price }}<span class="woocommerce-Price-currencySymbol">৳</span></bdi>
                                                                </span>
                                                            </del>
                                                        @endif
                                                        <span class="screen-reader-text">Original price was: {{ $product->old_price }}৳.</span>

                                                        <ins aria-hidden="true">
                                                            <span class="woocommerce-Price-amount amount"><bdi>{{ $product->price }}<span class="woocommerce-Price-currencySymbol">৳</span></bdi></span>
                                                        </ins>
                                                        <span class="screen-reader-text">Current price is: {{ $product->price }}৳.</span>
                                                    </p>




                                                    <form class="variations_form cart wd-reset-side-lg wd-reset-bottom-md wd-label-top-md" action="{{ route('user.cart.store') }}" method="post" enctype='multipart/form-data'>

                                                        <table class="variations" cellspacing="0">
                                                            <tbody>
                                                                <tr>
                                                                    <th class="label cell">
                                                                        <label for="pa_size">Size</label>
                                                                    </th>

                                                                    <style>
                                                                        .variation-text {
                                                                            border: 1px solid #BC6176;
                                                                            border-radius:10px;
                                                                            padding: 1px 10px !important;
                                                                        }
                                                                        .variation-text:hover {
                                                                            border: 1px solid #BC6176;
                                                                            background: #BC6176;
                                                                            color: #fff;
                                                                        }
                                                                        .variation-text.variation-active {
                                                                            border: 1px solid #BC6176;
                                                                            background: #BC6176;
                                                                            color: #fff;
                                                                        }
                                                                        .reset-varient-btn{
                                                                            margin-left: 10px;
                                                                            vertical-align: middle;
                                                                            font-size: 12px;
                                                                            visibility: hidden;
                                                                        }
                                                                    </style>
                                                                    <td class="value cell with-swatches">
                                                                        <div class="wd-swatches-product wd-swatches-single wd-bg-style-1 wd-text-style-1 wd-dis-style-1 wd-size-default wd-shape-round" data-id="pa_size">
                                                                            @foreach (getSizes($product->id) as $varient)
                                                                                <div class="wd-swatch wd-text" data-title="{{ $varient->size }}">
                                                                                    <span class="wd-swatch-text variation-text" onclick="setAllVarient(this)" data-id="{{ $varient->id }}" data-value="{{ $varient->size }}" data-stock="{{ $varient->stock }}" data-sku="{{ $product->sku }}"> {{ $varient->size }} </span>
                                                                                </div>
                                                                            @endforeach

                                                                        </div>



                                                                        <div class="wd-reset-var">
                                                                            <a class="reset-varient-btn" href="#"><i class="fa-solid fa-xmark"></i> Clear</a>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>



                                                        <div class="single_variation_wrap">
                                                            <div class="woocommerce-variation show-varieation single_variation">

                                                            </div>




                                                            <form action="{{ route('user.cart.store') }}" method="POST" class="woocommerce-variation-add-to-cart variations_button" style="display:block">
                                                                @csrf
                                                                <div class="quantity">
                                                                    <input type="button" value="-" class="minus" />
                                                                    <label class="screen-reader-text" for="quantity_66eb156f1bbf9">{{ $product->title }} quantity</label>
                                                                    <input type="number" id="quantity_66eb156f1bbf9" class="input-text qty text" value="1" aria-label="Product quantity" min="1" max="" name="quantity" step="1" placeholder="" inputmode="numeric" autocomplete="off">
                                                                    <input type="button" value="+" class="plus" />
                                                                </div>

                                                                <button onclick="validateVariation()" id="cart-btn" type="button" style="border-radius:0px; color:#fff; box-shadow: inset 0 -2px 0 rgba(0, 0, 0, .15); background-color: #BC6377; margin-left:5px; " class="alt">Add to cart</button>

                                                                <input type="hidden" name="product_id" value="{{ $product->id }}" required/>
                                                                <input type="hidden" name="size_id" value="" id="size_id"  required/>
                                                                <input type="hidden" name="size" value="" id="size"  required/>
                                                            </form>
                                                        </div>

                                                    </form>

                                                    <div class="wd-wishlist-btn wd-action-btn wd-style-text ">
                                                        <a class="" href="#" rel="nofollow" id="wishlist-area">
                                                            @auth
                                                                <span onclick="wishlist(this, {{ $product->id }})" data-status='{{ count(getWishlists($product->id)) > 0 ? 'yes' : 'no' }}'> <i class="fa{{ count(getWishlists($product->id)) > 0 ? '' : 'r' }} fa-heart"></i>  Add to wishlist</span>
                                                            @else
                                                                <span onclick="return window.location.href='{{ route('login') }}'"> <i class="far fa-heart"></i>  Add to wishlist</span>
                                                            @endauth
                                                        </a>
                                                    </div>

                                                    <div class="product_meta">


                                                        <span class="sku_wrapper">
                                                            <span class="meta-label"> SKU: </span> <span class="sku"> {{ $product->sku }} </span>
                                                        </span>

                                                        <span class="posted_in"><span class="meta-label">Category:</span> <a href="{{ route('frontend.category', $product->category->slug) }}" rel="tag">{{ $product->category->category_name }}</a></span>

                                                    </div>


                                                    {{-- <div class="sharedaddy sd-sharing-enabled">
                                                        <div
                                                            class="robots-nocontent sd-block sd-social sd-social-icon sd-sharing">
                                                            <h3 class="sd-title">Share this:</h3>
                                                            <div class="sd-content">
                                                                <ul>
                                                                    <li class="share-facebook">
                                                                        <a rel="nofollow noopener noreferrer" data-shared="sharing-facebook-37140" class="share-facebook sd-button share-icon no-text" href="{{ Request::url() }}/?share=facebook" target="_blank" title="Click to share on Facebook">
                                                                            <span></span>
                                                                            <span class="sharing-screen-reader-text">Click to share on Facebook (Opens in new window)</span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="share-jetpack-whatsapp">
                                                                        <a rel="nofollow noopener noreferrer" data-shared="" class="share-jetpack-whatsapp sd-button share-icon no-text" href="{{ Request::url() }}/?share=jetpack-whatsapp" target="_blank" title="Click to share on WhatsApp">
                                                                            <span></span>
                                                                            <span class="sharing-screen-reader-text">Click to share on WhatsApp (Opens in new window)</span>
                                                                        </a>
                                                                    </li>
                                                                    <li class="share-end"></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                    </div> --}}

                                                </div>
                                            </div>
                                        </div><!-- .summary -->
                                    </div>


                                </div>


                            </div>

                            <div class="product-tabs-wrapper">
                                <div class="container">
                                    <div class="row">
                                        <div class="col-12 poduct-tabs-inner">
                                            <div class="woocommerce-tabs wc-tabs-wrapper tabs-layout-accordion wd-accordion wd-style-default" data-state="first" data-layout="accordion">

                                                <div class="wd-accordion-item">
                                                    <div id="tab-item-title-description" class="wd-accordion-title wd-opener-pos-right tab-title-description wd-active" data-accordion-index="description">
                                                        <div class="wd-accordion-title-text">
                                                            <span> Description </span>
                                                        </div>
                                                        <span class="wd-accordion-opener"><i class="fa fa-angle-down"></i></span>
                                                    </div>

                                                    <div class="entry-content woocommerce-Tabs-panel woocommerce-Tabs-panel--description wd-active wd-scroll wd-accordion-content" id="tab-description" role="tabpanel" aria-labelledby="tab-title-description" data-accordion-index="description">
                                                        <div class="wc-tab-inner wd-scroll-content">
                                                            {!! $product->description !!}
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="wd-accordion-item">
                                                    <div id="tab-item-title-additional_information" class="wd-accordion-title wd-opener-pos-right tab-title-additional_information" data-accordion-index="additional_information">
                                                        <div class="wd-accordion-title-text">
                                                            <span> Additional information </span>
                                                        </div>

                                                        <span class="wd-accordion-opener"><i class="fa fa-angle-down"></i></span>
                                                    </div>

                                                    <div class="entry-content woocommerce-Tabs-panel woocommerce-Tabs-panel--additional_information wd-scroll wd-accordion-content wd-single-attrs wd-style-table" id="tab-additional_information" role="tabpanel" aria-labelledby="tab-title-additional_information" data-accordion-index="additional_information">
                                                        <div class="wc-tab-inner wd-scroll-content">
                                                            {!! $product->additional_info !!}
                                                        </div>
                                                    </div>
                                                </div>


                                            </div>

                                            <br>
                                            <div class="wd-single-reviews wd-layout-two-column">
                                                <div id="reviews" class="woocommerce-Reviews" data-product-id="37140">

                                                    <div id="comments">
                                                        <div class="wd-reviews-heading">
                                                            <div class="wd-reviews-tools">
                                                                <h2 class="woocommerce-Reviews-title"> Reviews </h2>
                                                            </div>
                                                        </div>

                                                        <div class="wd-reviews-content wd-sticky">
                                                            @forelse ($reviws as $review)
                                                                <div class="border-bottom">
                                                                    <div class="d-flex justify-content-start align-items-center">
                                                                        <img src="{{ asset($review->user->avatar) }}" alt="" class="rounded-circle border" style="width:60px; height:60px;">
                                                                        <div class="ms-2">
                                                                            <p class="my-0 fw-bold"><b>{{ $review->user->display_name ?? $review->user->name }}</b></p>
                                                                            <div class="wd-star-rating">
                                                                                <div class="star-rating">
                                                                                    <small><i>Rating:</i></small>
                                                                                    @for ($i=0; $i < 5; $i++)
                                                                                        <span class="{{ $i < $review->rating ? 'star-checked' : '' }}">★</span>
                                                                                    @endfor
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <p class="mt-2"><b>Review: </b>{{ $review->review }}</p>
                                                                </div>
                                                            @empty
                                                                <p class="woocommerce-noreviews">There are no reviews yet.</p>
                                                            @endforelse
                                                        </div>

                                                        <div class="wd-loader-overlay wd-fill"></div>
                                                    </div>

                                                    <div id="review_form_wrapper" class="wd-form-pos-after">
                                                        <div id="review_form">
                                                            <div id="respond" class="comment-respond">
                                                                <span id="reply-title" class="comment-reply-title">Be the first to review &ldquo;{{ $product->title }}&rdquo;
                                                                    <small> <a rel="nofollow" id="cancel-comment-reply-link" href="/shop/a-f-s-a/#respond" style="display:none;">Cancel reply</a></small>
                                                                </span>
                                                                <form action="{{ route('user.review.submit') }}" method="post" class="comment-form">
                                                                    @csrf
                                                                    <p class="comment-form-comment" style="margin-bottom: -10px">
                                                                        <label for="comment">Your review&nbsp;<span class="required">*</span></label>
                                                                        <div class="rate">
                                                                            <input type="radio" class="d-none" id="star5" name="rate" value="5" />
                                                                            <label for="star5" title="text">5 stars</label>

                                                                            <input type="radio" class="d-none" id="star4" name="rate" value="4" />
                                                                            <label for="star4" title="text">4 stars</label>

                                                                            <input type="radio" class="d-none" id="star3" name="rate" value="3" />
                                                                            <label for="star3" title="text">3 stars</label>

                                                                            <input type="radio" class="d-none" id="star2" name="rate" value="2" />
                                                                            <label for="star2" title="text">2 stars</label>

                                                                            <input type="radio" class="d-none" id="star1" name="rate" value="1" />
                                                                            <label for="star1" title="text">1 star</label>
                                                                          </div>
                                                                    </p>



                                                                    <p class="comment-form-comment">
                                                                        <label for="review">Your review&nbsp;<span class="required">*</span></label>
                                                                        <textarea id="review" name="review" cols="45" rows="8" required></textarea>
                                                                    </p>

                                                                    {{-- <div class="comment-form-images">
                                                                        <div class="wd-add-img-btn-wrapper">
                                                                            <label for="wd-add-img-btn">
                                                                                Click to add images </label>

                                                                            <input id="wd-add-img-btn"
                                                                                name="woodmart_image[]" type="file"
                                                                                multiple />

                                                                            <div
                                                                                class="wd-add-img-msg wd-hint wd-tooltip">
                                                                                <div class="wd-add-img-msg-text">
                                                                                    The maximum file size is 1 MB and
                                                                                    you can upload up to 1 images.
                                                                                </div>
                                                                            </div>

                                                                            <div class="wd-add-img-count"></div>
                                                                        </div>
                                                                    </div> --}}
                                                                    <p class="form-submit">
                                                                        <input name="submit" type="submit" id="submit" class="submit" value="Submit" />
                                                                        <input type='hidden' name='product_id' value='{{ $product->id }}'/>
                                                                    </p>
                                                                </form>
                                                            </div><!-- #respond -->
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div class="container related-and-upsells"></div>

                        </div><!-- #product-37140 -->





                    </div>
                </div><!-- .main-page-wrapper -->
            </div> <!-- end row -->
        </div> <!-- end container -->



        <script type="text/template" id="tmpl-variation-template">




            <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/js/all.min.js"> </script>
            <script src="assets/js/main.js"></script>
        </script>
        <script type="text/javascript" id="woodmart-theme-js-extra">
            /* <![CDATA[ */
            var woodmart_settings = { "menu_storage_key": "woodmart_c75e2c4114fb4a112c86ef6ea575e895", "ajax_dropdowns_save": "1", "photoswipe_close_on_scroll": "1", "woocommerce_ajax_add_to_cart": "yes", "variation_gallery_storage_method": "new", "elementor_no_gap": "enabled", "adding_to_cart": "Processing", "added_to_cart": "Product was successfully added to your cart.", "continue_shopping": "Continue shopping", "view_cart": "View Cart", "go_to_checkout": "Checkout", "loading": "Loading...", "countdown_days": "days", "countdown_hours": "hr", "countdown_mins": "min", "countdown_sec": "sc", "cart_url": "https:\/\/chooseyourchoicebd.com\/cart\/", "ajaxurl": "https:\/\/chooseyourchoicebd.com\/wp-admin\/admin-ajax.php", "add_to_cart_action": "popup", "added_popup": "no", "categories_toggle": "yes", "enable_popup": "yes", "popup_delay": "1000", "popup_event": "time", "popup_scroll": "1000", "popup_pages": "0", "promo_popup_hide_mobile": "no", "product_images_captions": "no", "ajax_add_to_cart": "1", "all_results": "View all results", "zoom_enable": "yes", "ajax_scroll": "no", "ajax_scroll_class": ".main-page-wrapper", "ajax_scroll_offset": "100", "infinit_scroll_offset": "300", "product_slider_auto_height": "no", "price_filter_action": "click", "product_slider_autoplay": "", "close": "Close (Esc)", "share_fb": "Share on Facebook", "pin_it": "Pin it", "tweet": "Share on X", "download_image": "Download image", "off_canvas_column_close_btn_text": "Close", "cookies_version": "1", "header_banner_version": "1", "promo_version": "2", "header_banner_close_btn": "yes", "header_banner_enabled": "no", "whb_header_clone": "\n    <div class=\"whb-sticky-header whb-clone whb-main-header <%wrapperClasses%>\">\n        <div class=\"<%cloneClass%>\">\n            <div class=\"container\">\n                <div class=\"whb-flex-row whb-general-header-inner\">\n                    <div class=\"whb-column whb-col-left whb-visible-lg\">\n                        <%.site-logo%>\n                    <\/div>\n                    <div class=\"whb-column whb-col-center whb-visible-lg\">\n                        <%.wd-header-main-nav%>\n                    <\/div>\n                    <div class=\"whb-column whb-col-right whb-visible-lg\">\n                        <%.wd-header-my-account%>\n                        <%.wd-header-search:not(.wd-header-search-mobile)%>\n                        <%.wd-header-wishlist%>\n                        <%.wd-header-compare%>\n                        <%.wd-header-cart%>\n                        <%.wd-header-fs-nav%>\n                    <\/div>\n                    <%.whb-mobile-left%>\n                    <%.whb-mobile-center%>\n                    <%.whb-mobile-right%>\n                <\/div>\n            <\/div>\n        <\/div>\n    <\/div>\n", "pjax_timeout": "5000", "split_nav_fix": "", "shop_filters_close": "no", "woo_installed": "1", "base_hover_mobile_click": "no", "centered_gallery_start": "1", "quickview_in_popup_fix": "", "one_page_menu_offset": "150", "hover_width_small": "1", "is_multisite": "", "current_blog_id": "1", "swatches_scroll_top_desktop": "no", "swatches_scroll_top_mobile": "no", "lazy_loading_offset": "0", "add_to_cart_action_timeout": "no", "add_to_cart_action_timeout_number": "3", "single_product_variations_price": "no", "google_map_style_text": "Custom style", "quick_shop": "yes", "sticky_product_details_offset": "150", "preloader_delay": "300", "comment_images_upload_size_text": "Some files are too large. Allowed file size is 1 MB.", "comment_images_count_text": "You can upload up to 1 images to your review.", "single_product_comment_images_required": "no", "comment_required_images_error_text": "Image is required.", "comment_images_upload_mimes_text": "You are allowed to upload images only in png, jpeg formats.", "comment_images_added_count_text": "Added %s image(s)", "comment_images_upload_size": "1048576", "comment_images_count": "1", "search_input_padding": "no", "comment_images_upload_mimes": { "jpg|jpeg|jpe": "image\/jpeg", "png": "image\/png" }, "home_url": "https:\/\/chooseyourchoicebd.com\/", "shop_url": "https:\/\/chooseyourchoicebd.com\/", "age_verify": "no", "banner_version_cookie_expires": "60", "promo_version_cookie_expires": "7", "age_verify_expires": "30", "cart_redirect_after_add": "no", "swatches_labels_name": "no", "product_categories_placeholder": "Select a category", "product_categories_no_results": "No matches found", "cart_hash_key": "wc_cart_hash_c63e5d4c5ad59caa3a06bbc1e62a3053", "fragment_name": "wc_fragments_c63e5d4c5ad59caa3a06bbc1e62a3053", "photoswipe_template": "<div class=\"pswp\" aria-hidden=\"true\" role=\"dialog\" tabindex=\"-1\"><div class=\"pswp__bg\"><\/div><div class=\"pswp__scroll-wrap\"><div class=\"pswp__container\"><div class=\"pswp__item\"><\/div><div class=\"pswp__item\"><\/div><div class=\"pswp__item\"><\/div><\/div><div class=\"pswp__ui pswp__ui--hidden\"><div class=\"pswp__top-bar\"><div class=\"pswp__counter\"><\/div><button class=\"pswp__button pswp__button--close\" title=\"Close (Esc)\"><\/button> <button class=\"pswp__button pswp__button--share\" title=\"Share\"><\/button> <button class=\"pswp__button pswp__button--fs\" title=\"Toggle fullscreen\"><\/button> <button class=\"pswp__button pswp__button--zoom\" title=\"Zoom in\/out\"><\/button><div class=\"pswp__preloader\"><div class=\"pswp__preloader__icn\"><div class=\"pswp__preloader__cut\"><div class=\"pswp__preloader__donut\"><\/div><\/div><\/div><\/div><\/div><div class=\"pswp__share-modal pswp__share-modal--hidden pswp__single-tap\"><div class=\"pswp__share-tooltip\"><\/div><\/div><button class=\"pswp__button pswp__button--arrow--left\" title=\"Previous (arrow left)\"><\/button> <button class=\"pswp__button pswp__button--arrow--right\" title=\"Next (arrow right)>\"><\/button><div class=\"pswp__caption\"><div class=\"pswp__caption__center\"><\/div><\/div><\/div><\/div><\/div>", "load_more_button_page_url": "yes", "load_more_button_page_url_opt": "yes", "menu_item_hover_to_click_on_responsive": "no", "clear_menu_offsets_on_resize": "yes", "three_sixty_framerate": "60", "three_sixty_prev_next_frames": "5", "ajax_search_delay": "300", "animated_counter_speed": "3000", "site_width": "1222", "cookie_secure_param": "1", "cookie_path": "\/", "slider_distortion_effect": "sliderWithNoise", "current_page_builder": "elementor", "collapse_footer_widgets": "no", "carousel_breakpoints": { "1025": "lg", "768.98": "md", "0": "sm" }, "ajax_fullscreen_content": "yes", "grid_gallery_control": "arrows", "grid_gallery_enable_arrows": "none", "ajax_shop": "0", "add_to_cart_text": "Add to cart", "mobile_navigation_drilldown_back_to": "Back to %s", "mobile_navigation_drilldown_back_to_main_menu": "Back to menu", "mobile_navigation_drilldown_back_to_categories": "Back to categories", "ajax_links": ".wd-nav-product-cat a, .website-wrapper .widget_product_categories a, .widget_layered_nav_filters a, .woocommerce-widget-layered-nav a, .filters-area:not(.custom-content) a, body.post-type-archive-product:not(.woocommerce-account) .woocommerce-pagination a, body.tax-product_cat:not(.woocommerce-account) .woocommerce-pagination a, .wd-shop-tools a:not(.breadcrumb-link), .woodmart-woocommerce-layered-nav a, .woodmart-price-filter a, .wd-clear-filters a, .woodmart-woocommerce-sort-by a, .woocommerce-widget-layered-nav-list a, .wd-widget-stock-status a, .widget_nav_mega_menu a, .wd-products-shop-view a, .wd-products-per-page a, .category-grid-item a, .wd-cat a, body[class*=\"tax-pa_\"] .woocommerce-pagination a", "wishlist_expanded": "no", "wishlist_show_popup": "enable", "wishlist_page_nonce": "ebda52b0db", "wishlist_fragments_nonce": "3d0fc6faa5", "wishlist_remove_notice": "Do you really want to remove these products?", "wishlist_hash_name": "woodmart_wishlist_hash_9565624d7955d7cf232a2f18e7c86bfd", "wishlist_fragment_name": "woodmart_wishlist_fragments_9565624d7955d7cf232a2f18e7c86bfd", "wishlist_save_button_state": "no", "is_criteria_enabled": "", "summary_criteria_ids": "", "review_likes_tooltip": "Please log in to rate reviews.", "vimeo_library_url": "https:\/\/chooseyourchoicebd.com\/wp-content\/themes\/woodmart\/js\/libs\/vimeo-player.min.js", "compare_by_category": "no", "compare_page_nonce": "38d4f6f3f4", "compare_save_button_state": "no", "reviews_criteria_rating_required": "no", "is_rating_summary_filter_enabled": "" };
            var woodmart_page_css = { "wd-widget-price-filter-css": "https:\/\/chooseyourchoicebd.com\/wp-content\/themes\/woodmart\/css\/parts\/woo-widget-price-filter.min.css", "wd-widget-wd-recent-posts-css": "https:\/\/chooseyourchoicebd.com\/wp-content\/themes\/woodmart\/css\/parts\/widget-wd-recent-posts.min.css", "wd-widget-nav-css": "https:\/\/chooseyourchoicebd.com\/wp-content\/themes\/woodmart\/css\/parts\/widget-nav.min.css", "wd-widget-wd-layered-nav-css": "https:\/\/chooseyourchoicebd.com\/wp-content\/themes\/woodmart\/css\/parts\/woo-widget-wd-layered-nav.min.css", "wd-woo-mod-swatches-base-css": "https:\/\/chooseyourchoicebd.com\/wp-content\/themes\/woodmart\/css\/parts\/woo-mod-swatches-base.min.css", "wd-woo-mod-swatches-filter-css": "https:\/\/chooseyourchoicebd.com\/wp-content\/themes\/woodmart\/css\/parts\/woo-mod-swatches-filter.min.css", "wd-widget-layered-nav-stock-status-css": "https:\/\/chooseyourchoicebd.com\/wp-content\/themes\/woodmart\/css\/parts\/woo-widget-layered-nav-stock-status.min.css", "wd-widget-product-list-css": "https:\/\/chooseyourchoicebd.com\/wp-content\/themes\/woodmart\/css\/parts\/woo-widget-product-list.min.css", "wd-widget-slider-price-filter-css": "https:\/\/chooseyourchoicebd.com\/wp-content\/themes\/woodmart\/css\/parts\/woo-widget-slider-price-filter.min.css", "wd-wp-gutenberg-css": "https:\/\/chooseyourchoicebd.com\/wp-content\/themes\/woodmart\/css\/parts\/wp-gutenberg.min.css", "wd-wpcf7-css": "https:\/\/chooseyourchoicebd.com\/wp-content\/themes\/woodmart\/css\/parts\/int-wpcf7.min.css", "wd-elementor-base-css": "https:\/\/chooseyourchoicebd.com\/wp-content\/themes\/woodmart\/css\/parts\/int-elem-base.min.css", "wd-woocommerce-base-css": "https:\/\/chooseyourchoicebd.com\/wp-content\/themes\/woodmart\/css\/parts\/woocommerce-base.min.css", "wd-mod-star-rating-css": "https:\/\/chooseyourchoicebd.com\/wp-content\/themes\/woodmart\/css\/parts\/mod-star-rating.min.css", "wd-woo-el-track-order-css": "https:\/\/chooseyourchoicebd.com\/wp-content\/themes\/woodmart\/css\/parts\/woo-el-track-order.min.css", "wd-woocommerce-block-notices-css": "https:\/\/chooseyourchoicebd.com\/wp-content\/themes\/woodmart\/css\/parts\/woo-mod-block-notices.min.css", "wd-woo-gutenberg-css": "https:\/\/chooseyourchoicebd.com\/wp-content\/themes\/woodmart\/css\/parts\/woo-gutenberg.min.css", "wd-woo-mod-quantity-css": "https:\/\/chooseyourchoicebd.com\/wp-content\/themes\/woodmart\/css\/parts\/woo-mod-quantity.min.css", "wd-woo-single-prod-el-base-css": "https:\/\/chooseyourchoicebd.com\/wp-content\/themes\/woodmart\/css\/parts\/woo-single-prod-el-base.min.css", "wd-woo-mod-stock-status-css": "https:\/\/chooseyourchoicebd.com\/wp-content\/themes\/woodmart\/css\/parts\/woo-mod-stock-status.min.css", "wd-woo-opt-hide-larger-price-css": "https:\/\/chooseyourchoicebd.com\/wp-content\/themes\/woodmart\/css\/parts\/woo-opt-hide-larger-price.min.css", "wd-woo-mod-shop-attributes-css": "https:\/\/chooseyourchoicebd.com\/wp-content\/themes\/woodmart\/css\/parts\/woo-mod-shop-attributes.min.css", "wd-header-base-css": "https:\/\/chooseyourchoicebd.com\/wp-content\/themes\/woodmart\/css\/parts\/header-base.min.css", "wd-mod-tools-css": "https:\/\/chooseyourchoicebd.com\/wp-content\/themes\/woodmart\/css\/parts\/mod-tools.min.css", "wd-header-elements-base-css": "https:\/\/chooseyourchoicebd.com\/wp-content\/themes\/woodmart\/css\/parts\/header-el-base.min.css", "wd-header-mobile-nav-dropdown-css": "https:\/\/chooseyourchoicebd.com\/wp-content\/themes\/woodmart\/css\/parts\/header-el-mobile-nav-dropdown.min.css", "wd-info-box-css": "https:\/\/chooseyourchoicebd.com\/wp-content\/themes\/woodmart\/css\/parts\/el-info-box.min.css", "wd-header-search-css": "https:\/\/chooseyourchoicebd.com\/wp-content\/themes\/woodmart\/css\/parts\/header-el-search.min.css", "wd-header-cart-side-css": "https:\/\/chooseyourchoicebd.com\/wp-content\/themes\/woodmart\/css\/parts\/header-el-cart-side.min.css", "wd-header-cart-css": "https:\/\/chooseyourchoicebd.com\/wp-content\/themes\/woodmart\/css\/parts\/header-el-cart.min.css", "wd-widget-shopping-cart-css": "https:\/\/chooseyourchoicebd.com\/wp-content\/themes\/woodmart\/css\/parts\/woo-widget-shopping-cart.min.css", "wd-woo-single-prod-predefined-css": "https:\/\/chooseyourchoicebd.com\/wp-content\/themes\/woodmart\/css\/parts\/woo-single-prod-predefined.min.css", "wd-woo-single-prod-and-quick-view-predefined-css": "https:\/\/chooseyourchoicebd.com\/wp-content\/themes\/woodmart\/css\/parts\/woo-single-prod-and-quick-view-predefined.min.css", "wd-woo-single-prod-el-tabs-predefined-css": "https:\/\/chooseyourchoicebd.com\/wp-content\/themes\/woodmart\/css\/parts\/woo-single-prod-el-tabs-predefined.min.css", "wd-woo-single-prod-el-gallery-css": "https:\/\/chooseyourchoicebd.com\/wp-content\/themes\/woodmart\/css\/parts\/woo-single-prod-el-gallery.min.css", "wd-woo-single-prod-el-gallery-opt-thumb-left-desktop-css": "https:\/\/chooseyourchoicebd.com\/wp-content\/themes\/woodmart\/css\/parts\/woo-single-prod-el-gallery-opt-thumb-left-desktop.min.css", "wd-swiper-css": "https:\/\/chooseyourchoicebd.com\/wp-content\/themes\/woodmart\/css\/parts\/lib-swiper.min.css", "wd-woo-mod-product-labels-css": "https:\/\/chooseyourchoicebd.com\/wp-content\/themes\/woodmart\/css\/parts\/woo-mod-product-labels.min.css", "wd-woo-mod-product-labels-round-css": "https:\/\/chooseyourchoicebd.com\/wp-content\/themes\/woodmart\/css\/parts\/woo-mod-product-labels-round.min.css", "wd-swiper-arrows-css": "https:\/\/chooseyourchoicebd.com\/wp-content\/themes\/woodmart\/css\/parts\/lib-swiper-arrows.min.css", "wd-photoswipe-css": "https:\/\/chooseyourchoicebd.com\/wp-content\/themes\/woodmart\/css\/parts\/lib-photoswipe.min.css", "wd-woo-single-prod-el-navigation-css": "https:\/\/chooseyourchoicebd.com\/wp-content\/themes\/woodmart\/css\/parts\/woo-single-prod-el-navigation.min.css", "wd-woo-mod-variation-form-css": "https:\/\/chooseyourchoicebd.com\/wp-content\/themes\/woodmart\/css\/parts\/woo-mod-variation-form.min.css", "wd-woo-mod-variation-form-single-css": "https:\/\/chooseyourchoicebd.com\/wp-content\/themes\/woodmart\/css\/parts\/woo-mod-variation-form-single.min.css", "wd-add-to-cart-popup-css": "https:\/\/chooseyourchoicebd.com\/wp-content\/themes\/woodmart\/css\/parts\/woo-opt-add-to-cart-popup.min.css", "wd-mfp-popup-css": "https:\/\/chooseyourchoicebd.com\/wp-content\/themes\/woodmart\/css\/parts\/lib-magnific-popup.min.css", "wd-woo-mod-swatches-style-1-css": "https:\/\/chooseyourchoicebd.com\/wp-content\/themes\/woodmart\/css\/parts\/woo-mod-swatches-style-1.min.css", "wd-woo-mod-swatches-dis-1-css": "https:\/\/chooseyourchoicebd.com\/wp-content\/themes\/woodmart\/css\/parts\/woo-mod-swatches-dis-style-1.min.css", "wd-social-icons-css": "https:\/\/chooseyourchoicebd.com\/wp-content\/themes\/woodmart\/css\/parts\/el-social-icons.min.css", "wd-accordion-css": "https:\/\/chooseyourchoicebd.com\/wp-content\/themes\/woodmart\/css\/parts\/el-accordion.min.css", "wd-woo-single-prod-el-reviews-css": "https:\/\/chooseyourchoicebd.com\/wp-content\/themes\/woodmart\/css\/parts\/woo-single-prod-el-reviews.min.css", "wd-woo-single-prod-el-reviews-style-1-css": "https:\/\/chooseyourchoicebd.com\/wp-content\/themes\/woodmart\/css\/parts\/woo-single-prod-el-reviews-style-1.min.css", "wd-mod-comments-css": "https:\/\/chooseyourchoicebd.com\/wp-content\/themes\/woodmart\/css\/parts\/mod-comments.min.css", "wd-footer-base-css": "https:\/\/chooseyourchoicebd.com\/wp-content\/themes\/woodmart\/css\/parts\/footer-base.min.css", "wd-scroll-top-css": "https:\/\/chooseyourchoicebd.com\/wp-content\/themes\/woodmart\/css\/parts\/opt-scrolltotop.min.css", "wd-wd-search-form-css": "https:\/\/chooseyourchoicebd.com\/wp-content\/themes\/woodmart\/css\/parts\/wd-search-form.min.css", "wd-header-my-account-sidebar-css": "https:\/\/chooseyourchoicebd.com\/wp-content\/themes\/woodmart\/css\/parts\/header-el-my-account-sidebar.min.css", "wd-woo-mod-login-form-css": "https:\/\/chooseyourchoicebd.com\/wp-content\/themes\/woodmart\/css\/parts\/woo-mod-login-form.min.css", "wd-sticky-social-buttons-css": "https:\/\/chooseyourchoicebd.com\/wp-content\/themes\/woodmart\/css\/parts\/opt-sticky-social.min.css", "wd-sticky-add-to-cart-css": "https:\/\/chooseyourchoicebd.com\/wp-content\/themes\/woodmart\/css\/parts\/woo-opt-sticky-add-to-cart.min.css", "wd-header-search-fullscreen-css": "https:\/\/chooseyourchoicebd.com\/wp-content\/themes\/woodmart\/css\/parts\/header-el-search-fullscreen-general.min.css", "wd-header-search-fullscreen-1-css": "https:\/\/chooseyourchoicebd.com\/wp-content\/themes\/woodmart\/css\/parts\/header-el-search-fullscreen-1.min.css", "wd-bottom-toolbar-css": "https:\/\/chooseyourchoicebd.com\/wp-content\/themes\/woodmart\/css\/parts\/opt-bottom-toolbar.min.css", "wd-header-my-account-css": "https:\/\/chooseyourchoicebd.com\/wp-content\/themes\/woodmart\/css\/parts\/header-el-my-account.min.css" };
            /* ]]> */
        </script>
@endsection
@section('scripts')
    <script type="text/javascript" src="{{ asset('assets/frontend') }}/js/jquery.zoom.js"></script>
    <script type="text/javascript" src="{{ asset('assets/frontend') }}/js/helpers.js"></script>
    <script type="text/javascript" src="{{ asset('assets/frontend') }}/js/woocommerceQuantity.js"></script>
    <script type="text/javascript" src="{{ asset('assets/frontend') }}/js/initZoom.js"></script>
    <script type="text/javascript" src="{{ asset('assets/frontend') }}/js/swiper.js"></script>
    <script type="text/javascript" src="{{ asset('assets/frontend') }}/js/swiperInit.js"></script>
    <script type="text/javascript" src="{{ asset('assets/frontend') }}/js/productImagesGallery.js"></script>
    <script type="text/javascript" src="{{ asset('assets/frontend') }}/js/photoswipe-bundle.js"></script>
    <script type="text/javascript" src="{{ asset('assets/frontend') }}/js/productImages.js"></script>
    <script type="text/javascript" src="{{ asset('assets/frontend') }}/js/callPhotoSwipe.js"></script>
    <script type="text/javascript" src="{{ asset('assets/frontend') }}/js/underscore.min.js"></script>
    <script type="text/javascript" src="{{ asset('assets/frontend') }}/js/wp-util.js"></script>
    <script type="text/javascript" id="wc-add-to-cart-variation-js-extra">
        /* <![CDATA[ */
        var wc_add_to_cart_variation_params = { "wc_ajax_url": "\/?wc-ajax=%%endpoint%%", "i18n_no_matching_variations_text": "Sorry, no products matched your selection. Please choose a different combination.", "i18n_make_a_selection_text": "Please select some product options before adding this product to your cart.", "i18n_unavailable_text": "Sorry, this product is unavailable. Please choose a different combination." };
        /* ]]> */
    </script>
    <script type="text/javascript" src="{{ asset('assets/frontend') }}/js/add-to-cart-variation.js"></script>
    <script type="text/javascript" src="{{ asset('assets/frontend') }}/js/tooltips.js" ></script>
    <script type="text/javascript" src="{{ asset('assets/frontend') }}/js/btnsToolTips.js"></script>
    <script type="text/javascript" src="{{ asset('assets/frontend') }}/js/swatchesVariations.js"></script>
    <script type="text/javascript" src="{{ asset('assets/frontend') }}/js/accordion.js" ></script>
    <script type="text/javascript" src="{{ asset('assets/frontend') }}/js/scrollTop.js" ></script>
    <script type="text/javascript" src="{{ asset('assets/frontend') }}/js/promoPopup.js"></script>
    <script type="text/javascript" src="{{ asset('assets/frontend') }}/js/stickyAddToCart.js" ></script>
    <script type="text/javascript" src="{{ asset('assets/frontend') }}/js/searchFullScreen.js"></script>
    <script>
        function setAllVarient(el){
            var sizeId = $(el).attr('data-id');
            var size = $(el).attr('data-value');
            var stock = $(el).attr('data-stock');
            var sku = $(el).attr('data-sku');
            $('.sku').html(sku+'-'+size);
            $('#size_id').val(sizeId);
            $('#size').val(size);





            $('.variation-text').removeClass('variation-active');
            $(el).addClass('variation-active');
            $('.reset-varient-btn').css('visibility','visible');
            $('.show-varieation').removeClass('single_variation');
            $('.show-varieation').css('display','block');
            if (stock > 1) {
                $('.show-varieation').html(
                `<div class="woocommerce-variation-availability">
                    <p class="stock in-stock wd-style-default">
                        <i class="fa-solid fa-check text-success"></i>
                        <span class="stock-number"></span> in stock
                    </p>
                </div>`);
            } else {
                $('.show-varieation').html(
                `<div class="woocommerce-variation-availability">
                    <p class="stock in-stock wd-style-default">
                        <i class="fa-solid fa-xmark text-danger"></i>
                         stock out
                    </p>
                </div>`);
            }


            if (stock < 1) {
                // $('#cart-btn').attr('stock', );
                alert('Please select deffrent product options before adding this product to your cart.');
                $('#cart-btn').attr('type', 'button');
            } else {
                $('#cart-btn').attr('type', 'submit');
            }
            $('.stock-number').text(stock);


        }

        $('.reset-varient-btn').click(function(){
            $('.variation-text').removeClass('variation-active');
            $('.show-varieation').addClass('single_variation');
            $('.show-varieation').css('display','none');
            $('#size_id').val('');
            $('#size').val('');
            $('.reset-varient-btn').css('visibility','hidden');
            $('#cart-btn').attr('type', 'button');
        });

        function validateVariation(){
            var size_id = $('#size_id').val();
            var size = $('#size').val();
            if(size_id == '' && size == ''){
                alert('Please select some product options before adding this product to your cart.');
            }
        }
    </script>

<script>
    function wishlist(el, productId) {
        var product_id = productId;
        var status = $(el).attr('data-status');


        if (status == 'no') {
            $(el).attr('data-status', 'yes');
            $(el).html(`<i class="fa fa-heart"></i> Add to wishlist`);
        } else if(status == 'yes') {
            $(el).attr('data-status', 'no');
            $(el).html(`<i class="far fa-heart"></i> Add to wishlist`);
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
