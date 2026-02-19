@extends('layouts.app')
@section('styles')
    {{-- @include('user.layouts.partials.account-css') --}}
    <style>
        .cart-content-wrapper {
            display: flex;
            flex-wrap: wrap;
            column-gap: 30px;
        }

        .cart-content-wrapper>*:not(:is(.cart-data-form, .cart-totals-section)) {
            max-width: 100%;
            width: 100%;
        }



        @media (min-width: 1200px) {
            .woocommerce>.cart-data-form {
                flex: 0 0 calc(66.666667% - 15px);
                max-width: calc(66.666667% - 15px);
            }
        }

        @media (min-width: 1025px) {
            .woocommerce>.cart-data-form {
                flex: 0 0 calc(58.333333% - 15px);
                max-width: calc(58.333333% - 15px);
            }
        }

        .cart-table-section>.cart {
            margin-bottom: 0;
        }

        table {
            margin-bottom: 35px;
            width: 100%;
            border-spacing: 0;
            border-collapse: collapse;
            line-height: 1.4;
        }

        th.product-remove {
            width: 40px;
        }

        th:is(.product-remove, .product-thumbnail) {
            font-size: 0;
        }

        table th {
            padding: 15px 10px;
            border-bottom: 2px solid #00000013;
            color: #242424;
            text-transform: uppercase;
            font-weight: 600;
            font-style: var(--wd-title-font-style);
            font-size: 16px;
            font-family: var(--wd-title-font);
        }

        .screen-reader-text {
            clip: rect(1px, 1px, 1px, 1px);
            word-wrap: normal !important;
            border: 0;
            clip-path: inset(50%);
            height: 1px;
            margin: -1px;
            overflow: hidden;
            overflow-wrap: normal !important;
            padding: 0;
            position: absolute !important;
            width: 1px;
        }

        th.product-thumbnail {
            width: 10px;
        }

        th.product-name {
            text-align: left;
        }

        .cart-table-section>.cart tbody {
            position: relative;
        }

        td.product-remove {
            padding: 0;
            text-align: center;
        }

        td.product-remove a,
        .woocommerce-remove-coupon {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 30px;
            height: 30px;
            color: #333;
            font-size: 0;
        }



        td.product-thumbnail>a {
            display: block;
            overflow: hidden;
        }

        a {
            color: var(--wd-link-color);
            text-decoration: none;
            transition: all .25s ease;
        }

        td.product-thumbnail img {
            min-width: 80px;
            max-width: 80px;
            border-radius: calc(var(--wd-brd-radius) / 1.5);
        }

        a img {
            border: none;
        }

        td.product-name a {
            display: block;
            color: #333333;
            word-wrap: break-word;
            font-weight: 600;
            line-height: 1.4;
            display: inline-block;
            font-size: 14px;
        }

        table td {
            padding: 15px 12px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.105);
        }

        td.product-price>.amount {
            color: #777;
            font-weight: 400;
        }

        td.product-price :is(.amount, .wd-price-unit) {
            font-size: 14px;
        }

        div.quantity {
            display: inline-flex;
            vertical-align: top;
            white-space: nowrap;
            font-size: 0;
        }

        div.quantity input[type="button"] {
            padding: 0 5px;
            min-width: 25px;
            min-height: unset;
            height: 42px;
            border: 1px solid rgba(0, 0, 0, 0.1);
            background: transparent;
            box-shadow: none;
        }

        div.quantity input[type="button"]:hover {
            color: #fff;
            background-color: #BC6176;
            border-color: #BC6176;
        }

        div.quantity input[type="number"] {
            width: 30px;
            border-radius: 0;
            border-right: none;
            border-left: none;
        }

        div.quantity :is(input[type="number"], input[type="text"]) {
            height: 42px;
        }

        div.quantity :is(input[type="number"], input[type="text"], input[type="button"]) {
            display: inline-block;
            color: inherit;
        }

        input:not([type="image" i],
        [type="range" i],
        [type="checkbox" i],
        [type="radio" i]) {
            overflow-clip-margin: 0px !important;
            overflow: clip !important;
        }

        input[type="number"] {
            padding: 0;
            text-align: center;
        }

        input[type="number" i] {
            padding-block: 1px;
            padding-inline: 2px;
        }

        td.product-subtotal span {
            font-size: 16px;
        }

        .amount {
            color: #BC6176;
            font-weight: 600;
        }

        .cart-table-section>.cart .wd-cart-action-row td {
            border-bottom: none;
            padding: 0;
        }

        .cart-actions {
            display: flex;
            column-gap: 20px;
        }

        .cart-table-section>.cart .cart-actions>:is(.button, .wd-coupon-form) {
            margin-top: 30px;
        }

        .wd-coupon-form {
            display: flex;
            flex-grow: 1;
            gap: 10px;
        }

        .wd-coupon-form label {
            display: none;
        }

        .wd-coupon-form .input-text {
            max-width: 230px;
        }

        .wd-coupon-form .button[name="apply_coupon"] {
            flex: 0 0 auto;
            border-radius: 0;
            color: #fff;
            box-shadow: inset 0 -2px 0 rgba(0, 0, 0, .15);
            background-color: #BC6176;
            text-transform: uppercase;
            font-weight: 600;
            font-family: inherit;
            font-style: var(--btn-accented-font-style, var(--btn-font-style));
        }

        .cart-actions .button[name="update_cart"] {
            border-radius: 0;
            color: #333;
            box-shadow: none;
            background-color: #f7f7f7;
            text-transform: uppercase;
            font-weight: 600;
        }

        .cart-actions .button[name="update_cart"]:hover {
            color: #333;
            box-shadow: none;
            background-color: #efefef;
        }

        .wt_coupon_wrapper {
            width: 100%;
            position: relative;
            flex-direction: row;
            flex-wrap: wrap;
            display: flex;
            justify-content: flex-start;
            margin-bottom: 15px;
            gap: 26px;
            padding: 15px 4px 4px 4px;
        }

        @media (min-width: 1200px) {
            .woocommerce>.cart-totals-section {
                flex: 0 0 calc(33.333333% - 15px);
                max-width: calc(33.333333% - 15px);
            }
        }

        @media (min-width: 1025px) {
            .woocommerce>.cart-totals-section {
                flex: 0 0 calc(41.666667% - 15px);
                max-width: calc(41.666667% - 15px);
            }
        }

        .cart-content-wrapper>.cart-totals-section .cart-totals-inner {
            padding: 25px;
            border: 3px solid rgba(0, 0, 0, 0.075);
            border-radius: 0px;
        }

        .cart-totals-inner>h2 {
            text-transform: uppercase;
            font-size: 22px;
            padding-inline-start: 6px;
        }

        table {
            margin-bottom: 35px;
            width: 100%;
            border-spacing: 0;
            border-collapse: collapse;
            line-height: 1.4;
        }

        .reset-last-child>*:last-child {
            margin-bottom: 0;
        }

        table :is(tbody, tfoot) th {
            border-bottom: 1px solid rgba(0, 0, 0, 0.105);
            text-transform: none;
            font-size: inherit;
        }

        .shop_table tr :is(td, th):last-child {
            text-align: right;
        }

        table td {
            padding: 15px 12px;
            border-bottom: 1px solid rgba(0, 0, 0, 0.105);
        }

        .cart-totals-inner table tr:last-child th,
        .cart-totals-inner table tr:last-child td {
            border-bottom: none;
        }

        tr.order-total th {
            font-size: 18px;
        }

        tr.order-total strong .amount {
            font-size: 22px;
        }

        .amount {
            color: #BC6176;
            font-weight: 600;
        }

        .reset-last-child>*:last-child {
            margin-bottom: 0;
        }

        .cart-content-wrapper>.cart-totals-section .cart-totals-inner .checkout-button {
            width: 100%;
        }

        .wc-proceed-to-checkout>*:last-child {
            margin-bottom: 0;
        }

        .cart-totals-inner .checkout-button {
            border-radius: 0px;
            color: #fff;
            box-shadow: inset 0 -2px 0 rgba(0, 0, 0, .15);
            background-color: #BC6377;
            text-transform: uppercase;
            font-weight: 600;
        }
        :is(.btn,.button,button,[type="submit"],[type="button"]):hover {
            color: #fff !important;
            background-color: #BC6377 !important;
        }
    </style>

@endsection
@section('content')
    <div class="main-page-wrapper">

        <br>
        <!-- MAIN CONTENT AREA -->
        <div class="container">
            <div class="row content-layout-wrapper align-items-start">
                <div class="site-content col-lg-12 col-12 col-md-12" role="main">


                    <article id="post-7" class="post-7 page type-page status-publish hentry">

                        <div class="entry-content">
                            <div class="woocommerce">
                                <div class="woocommerce cart-content-wrapper">

                                    <div class="woocommerce-notices-wrapper"></div>
                                    <div class="woocommerce-cart-form cart-data-form" style="width: 100%;">

                                        <div class="cart-table-section">
                                            <form action="{{ route('user.cart.update') }}" method="post">
                                                @csrf
                                            <div class="table-responsive">
                                                <table>
                                                    <thead>
                                                        <tr>
                                                            <th></th>
                                                            <th class="text-nowrap">Thumbnails</th>
                                                            <th>Product</th>
                                                            <th class="text-nowrap">Price</th>
                                                            <th class="text-nowrap">Quantity</th>
                                                            <th class="text-nowrap">Subtotal</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @php
                                                            $subTotal = 0;
                                                            $flag = false;
                                                        @endphp
                                                        @foreach ($datas as $data)
                                                            <tr>
                                                                <td><a href="{{ route('user.cart.delete', Crypt::encrypt($data->id)) }}"><i class="fa-solid fa-xmark "></i></a></td>
                                                                <td class="text-nowrap">
                                                                    <a href="{{ route('frontend.shop', $data->product->slug) }}">
                                                                        <img width="80" src="{{ asset($data->product->thumbnails) }}" alt="">
                                                                    </a>
                                                                </td>
                                                                <td>
                                                                    <a href="{{ route('frontend.shop', $data->product->slug) }}">
                                                                        <span class="fw-bold">{{ $data->product->title.' - '.$data->size }}</span>
                                                                    </a>
                                                                </td>
                                                                <td class="text-nowrap">{{ $data->product->price }}৳</td>
                                                                <td class="text-nowrap">
                                                                    <div class="quantity">
                                                                        <input type="button" value="-" class="minus" data-id="quantity{{ $data->id }}" onclick="decrement(this)">
                                                                        <input type="number" id="quantity{{ $data->id }}" class="input-text qty text" value="{{ $data->quantity }}" aria-label="Product quantity" min="1" max="{{ $data->sizeRelation->stock }}" step="1" placeholder="" inputmode="numeric" autocomplete="off" name="carts[{{ $data->id }}]">
                                                                        <input type="button" value="+" class="plus" data-id="quantity{{ $data->id }}" onclick="increment(this)">
                                                                        @if ($data->sizeRelation->stock < 1)
                                                                            @php
                                                                                $flag = true
                                                                            @endphp
                                                                        @endif
                                                                    </div>
                                                                </td>
                                                                <td class="text-nowrap">
                                                                    <span style="color: #BC6176; font-weight:600; font-size:18px;">
                                                                        @php
                                                                            $subTotal += ($data->product->price * $data->quantity);
                                                                        @endphp
                                                                        {{ $data->product->price * $data->quantity }}৳
                                                                    </span>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>
                                            </div>


                                            <div class="row">
                                                <div class="col-md-4 mb-3">
                                                    <button type="submit" style="background-color: #BC6377 !important;" class="text-white mt-2 mt-md-0">Update Cart</button>
                                                </div>
                                            </form>
                                                <div class="col-md-4">
                                                    <form action="">
                                                    <input type="text" placeholder="Coupon Code" name="coupon_name" value="{{ $couponName }}">
                                                </div>
                                                <div class="col-md-4">
                                                    <button type="submit" class="mt-2 mt-md-0 w-100" style="border-radius: 0px; color: #fff; box-shadow: inset 0 -2px 0 rgba(0, 0, 0, .15); background-color: #BC6377; text-transform: uppercase; font-weight: 600;">Apply Coupon</button>
                                                </form>
                                                </div>
                                            </div>


                                            <div class="wt_coupon_wrapper">
                                                <style type="text/css">
                                                    .wt_sc_single_coupon {
                                                        display: inline-block;
                                                        width: 300px;
                                                        max-width: 100%;
                                                        height: auto;
                                                        padding: 5px;
                                                        text-align: center;
                                                        background: #2890a8;
                                                        color: #ffffff;
                                                        position: relative;
                                                    }

                                                    .wt_sc_single_coupon .wt_sc_hidden {
                                                        display: none;
                                                    }

                                                    .wt_sc_single_coupon.active-coupon {
                                                        cursor: pointer;
                                                    }

                                                    .wt_sc_coupon_amount {
                                                        font-size: 30px;
                                                        margin-right: 5px;
                                                        line-height: 22px;
                                                        font-weight: 500;
                                                    }

                                                    .wt_sc_coupon_type {
                                                        font-size: 20px;
                                                        font-weight: 500;
                                                        line-height: 22px;
                                                    }

                                                    .wt_sc_coupon_code {
                                                        float: left;
                                                        width: 100%;
                                                        font-size: 19px;
                                                        line-height: 22px;
                                                    }

                                                    .wt_sc_coupon_code code {
                                                        background: none;
                                                        font-size: 15px;
                                                        opacity: 0.7;
                                                        display: inline-block;
                                                        line-height: 22px;
                                                        max-width: 100%;
                                                        word-wrap: break-word;
                                                    }

                                                    .wt_sc_coupon_content {
                                                        padding: 10px 0px;
                                                        float: left;
                                                        width: 100%;
                                                    }

                                                    .wt_sc_coupon_desc_wrapper:hover .wt_sc_coupon_desc {
                                                        display: block
                                                    }

                                                    .wt_sc_coupon_desc {
                                                        position: absolute;
                                                        top: -18px;
                                                        background: #333;
                                                        color: #fff;
                                                        text-shadow: none;
                                                        text-align: left;
                                                        font-size: 12px;
                                                        width: 200px;
                                                        right: -220px;
                                                        padding: 10px 20px;
                                                        z-index: 100;
                                                        border-radius: 8px;
                                                        display: none;
                                                    }

                                                    .wt_sc_coupon_desc ul {
                                                        margin: 0 !important;
                                                        text-align: left;
                                                        list-style-type: disc
                                                    }

                                                    .wt_sc_coupon_desc ul li {
                                                        padding: 0;
                                                        margin: 0;
                                                        width: 100%;
                                                        height: auto;
                                                        min-height: auto;
                                                        list-style-type: disc !important
                                                    }

                                                    .wt_sc_coupon_desc_wrapper i.info {
                                                        position: absolute;
                                                        top: 6px;
                                                        right: 10px;
                                                        font-size: 13px;
                                                        font-weight: 700;
                                                        border-radius: 100%;
                                                        width: 20px;
                                                        height: 20px;
                                                        background: #fff;
                                                        text-shadow: none;
                                                        color: #2890a8;
                                                        font-style: normal;
                                                        cursor: pointer;
                                                        line-height: 20px;
                                                        box-shadow: 1px 1px 4px #333;
                                                    }

                                                    .wt_sc_credit_history_url {
                                                        font-size: 13px;
                                                        font-weight: 700;
                                                        border-radius: 100%;
                                                        width: 20px;
                                                        height: 20px;
                                                        text-shadow: none;
                                                        font-style: normal;
                                                        cursor: pointer;
                                                        position: absolute;
                                                        right: 12px;
                                                        bottom: 10px;
                                                        text-align: center;
                                                        line-height: 20px;
                                                        text-decoration: none !important;
                                                        background: #fff
                                                    }

                                                    .wt_sc_credit_history_url span {
                                                        font: bold 14px/1 dashicons
                                                    }

                                                    a.wt_sc_credit_history_url span:before {
                                                        line-height: 20px;
                                                        color: #2890a8;
                                                    }

                                                    @media only screen and (max-width: 700px) {
                                                        .wt_sc_coupon_content {
                                                            z-index: 5;
                                                        }

                                                        .wt_sc_single_coupon .wt_sc_coupon_desc {
                                                            z-index: 100;
                                                            right: auto;
                                                            top: 30px;
                                                            left: 0px;
                                                        }
                                                    }
                                                </style>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="cart-totals-section cart-collaterals" style="width: 100%;">
                                        <div class="cart_totals ">

                                            <div class="cart-totals-inner set-mb-m reset-last-child">
                                                <h2>Cart totals</h2>

                                                <table cellspacing="0" class="shop_table shop_table_responsive">

                                                    <tbody>
                                                        <tr class="cart-subtotal">
                                                            <th>Subtotal</th>
                                                            <td data-title="Subtotal">

                                                                <span class="woocommerce-Price-amount amount"><bdi>{{ $subTotal }}<span class="woocommerce-Price-currencySymbol">৳</span></bdi></span>
                                                            </td>
                                                        </tr>
                                                        <tr class="cart-subtotal">
                                                            <th class="text-nowrap">Discount ({{ $couponName ? $couponName : 'N/A' }})</th>
                                                            <td data-title="Subtotal">
                                                                @php
                                                                    $discountAmount = $subTotal * $discount / 100;
                                                                    $total = $subTotal - $discountAmount;
                                                                    Session::put('discountAmount', $discountAmount);
                                                                    Session::put('couponName', $couponName ? $couponName : 'N/A');
                                                                @endphp
                                                                <span class="woocommerce-Price-amount amount"><bdi>{{ $discountAmount }}<span class="woocommerce-Price-currencySymbol">৳</span></bdi></span>
                                                            </td>
                                                        </tr>




                                                        {{-- <tr class="woocommerce-shipping-totals shipping">
                                                            <th>Shipping</th>
                                                            <td data-title="Shipping">
                                                                Enter your address to view shipping options.


                                                                <form class="woocommerce-shipping-calculator"
                                                                    action="https://chooseyourchoicebd.com/cart/"
                                                                    method="post">

                                                                    <a href="#"
                                                                        class="shipping-calculator-button">Calculate
                                                                        shipping</a>
                                                                    <section class="shipping-calculator-form"
                                                                        style="display:none;">

                                                                        <p class="form-row form-row-wide"
                                                                            id="calc_shipping_country_field">
                                                                            <label for="calc_shipping_country"
                                                                                class="screen-reader-text">Country /
                                                                                region:</label>
                                                                            <select name="calc_shipping_country"
                                                                                id="calc_shipping_country"
                                                                                class="country_to_state country_select"
                                                                                rel="calc_shipping_state">
                                                                                <option value="default">Select a country /
                                                                                    region…</option>
                                                                                <option value="BD"
                                                                                    selected="selected">Bangladesh</option>
                                                                            </select>
                                                                        </p>

                                                                        <p class="form-row form-row-wide validate-required"
                                                                            id="calc_shipping_state_field"
                                                                            data-o_class="form-row form-row-wide">
                                                                            <span>
                                                                                <label for="calc_shipping_state"
                                                                                    class="screen-reader-text">State /
                                                                                    County:&nbsp;<abbr class="required"
                                                                                        title="required">*</abbr></label>
                                                                                <select name="calc_shipping_state"
                                                                                    class="state_select"
                                                                                    id="calc_shipping_state"
                                                                                    data-placeholder="State / County">
                                                                                    <option value="">Select an
                                                                                        option…</option>
                                                                                    <option value="BD-05">Bagerhat
                                                                                    </option>
                                                                                    <option value="BD-01">Bandarban
                                                                                    </option>
                                                                                    <option value="BD-02">Barguna</option>
                                                                                    <option value="BD-06">Barishal
                                                                                    </option>
                                                                                    <option value="BD-07">Bhola</option>
                                                                                    <option value="BD-03">Bogura</option>
                                                                                    <option value="BD-04">Brahmanbaria
                                                                                    </option>
                                                                                    <option value="BD-09">Chandpur
                                                                                    </option>
                                                                                    <option value="BD-10">Chattogram
                                                                                    </option>
                                                                                    <option value="BD-12">Chuadanga
                                                                                    </option>
                                                                                    <option value="BD-11">Cox's Bazar
                                                                                    </option>
                                                                                    <option value="BD-08">Cumilla</option>
                                                                                    <option value="BD-13">Dhaka</option>
                                                                                    <option value="BD-14">Dinajpur
                                                                                    </option>
                                                                                    <option value="BD-15">Faridpur
                                                                                    </option>
                                                                                    <option value="BD-16">Feni</option>
                                                                                    <option value="BD-19">Gaibandha
                                                                                    </option>
                                                                                    <option value="BD-18">Gazipur</option>
                                                                                    <option value="BD-17">Gopalganj
                                                                                    </option>
                                                                                    <option value="BD-20">Habiganj
                                                                                    </option>
                                                                                    <option value="BD-21">Jamalpur
                                                                                    </option>
                                                                                    <option value="BD-22">Jashore</option>
                                                                                    <option value="BD-25">Jhalokati
                                                                                    </option>
                                                                                    <option value="BD-23">Jhenaidah
                                                                                    </option>
                                                                                    <option value="BD-24">Joypurhat
                                                                                    </option>
                                                                                    <option value="BD-29">Khagrachhari
                                                                                    </option>
                                                                                    <option value="BD-27">Khulna</option>
                                                                                    <option value="BD-26">Kishoreganj
                                                                                    </option>
                                                                                    <option value="BD-28">Kurigram
                                                                                    </option>
                                                                                    <option value="BD-30">Kushtia</option>
                                                                                    <option value="BD-31">Lakshmipur
                                                                                    </option>
                                                                                    <option value="BD-32">Lalmonirhat
                                                                                    </option>
                                                                                    <option value="BD-36">Madaripur
                                                                                    </option>
                                                                                    <option value="BD-37">Magura</option>
                                                                                    <option value="BD-33">Manikganj
                                                                                    </option>
                                                                                    <option value="BD-39">Meherpur
                                                                                    </option>
                                                                                    <option value="BD-38">Moulvibazar
                                                                                    </option>
                                                                                    <option value="BD-35">Munshiganj
                                                                                    </option>
                                                                                    <option value="BD-34">Mymensingh
                                                                                    </option>
                                                                                    <option value="BD-48">Naogaon</option>
                                                                                    <option value="BD-43">Narail</option>
                                                                                    <option value="BD-40">Narayanganj
                                                                                    </option>
                                                                                    <option value="BD-42">Narsingdi
                                                                                    </option>
                                                                                    <option value="BD-44">Natore</option>
                                                                                    <option value="BD-45">Nawabganj
                                                                                    </option>
                                                                                    <option value="BD-41">Netrakona
                                                                                    </option>
                                                                                    <option value="BD-46">Nilphamari
                                                                                    </option>
                                                                                    <option value="BD-47">Noakhali
                                                                                    </option>
                                                                                    <option value="BD-49">Pabna</option>
                                                                                    <option value="BD-52">Panchagarh
                                                                                    </option>
                                                                                    <option value="BD-51">Patuakhali
                                                                                    </option>
                                                                                    <option value="BD-50">Pirojpur
                                                                                    </option>
                                                                                    <option value="BD-53">Rajbari</option>
                                                                                    <option value="BD-54">Rajshahi
                                                                                    </option>
                                                                                    <option value="BD-56">Rangamati
                                                                                    </option>
                                                                                    <option value="BD-55">Rangpur</option>
                                                                                    <option value="BD-58">Satkhira
                                                                                    </option>
                                                                                    <option value="BD-62">Shariatpur
                                                                                    </option>
                                                                                    <option value="BD-57">Sherpur</option>
                                                                                    <option value="BD-59">Sirajganj
                                                                                    </option>
                                                                                    <option value="BD-61">Sunamganj
                                                                                    </option>
                                                                                    <option value="BD-60">Sylhet</option>
                                                                                    <option value="BD-63">Tangail</option>
                                                                                    <option value="BD-64">Thakurgaon
                                                                                    </option>
                                                                                </select>
                                                                            </span>
                                                                        </p>

                                                                        <p class="form-row form-row-wide"
                                                                            id="calc_shipping_city_field"
                                                                            data-o_class="form-row form-row-wide">
                                                                            <label for="calc_shipping_city"
                                                                                class="screen-reader-text">City:&nbsp;<span
                                                                                    class="optional">(optional)</span></label>
                                                                            <input type="text" class="input-text"
                                                                                value="" placeholder="City"
                                                                                name="calc_shipping_city"
                                                                                id="calc_shipping_city">
                                                                        </p>

                                                                        <p class="form-row form-row-wide"
                                                                            id="calc_shipping_postcode_field"
                                                                            data-o_class="form-row form-row-wide">
                                                                            <label for="calc_shipping_postcode"
                                                                                class="screen-reader-text">Postcode /
                                                                                ZIP:&nbsp;<span
                                                                                    class="optional">(optional)</span></label>
                                                                            <input type="text" class="input-text"
                                                                                value=""
                                                                                placeholder="Postcode / ZIP"
                                                                                name="calc_shipping_postcode"
                                                                                id="calc_shipping_postcode">
                                                                        </p>

                                                                        <p><button type="submit" name="calc_shipping"
                                                                                value="1"
                                                                                class="button">Update</button></p>
                                                                        <input type="hidden"
                                                                            id="woocommerce-shipping-calculator-nonce"
                                                                            name="woocommerce-shipping-calculator-nonce"
                                                                            value="4a892768d4"><input type="hidden"
                                                                            name="_wp_http_referer" value="/cart/">
                                                                    </section>
                                                                </form>

                                                            </td>
                                                        </tr> --}}






                                                        <tr class="order-total">
                                                            <th>Total</th>
                                                            <td data-title="Total"><strong><span class="woocommerce-Price-amount amount"><bdi>{{ $total }}<span class="woocommerce-Price-currencySymbol">৳</span></bdi></span></strong>
                                                            </td>
                                                        </tr>


                                                    </tbody>
                                                </table>

                                                <div class="wc-proceed-to-checkout">
                                                    @if ($flag)
                                                        <div class="alert alert-danger">
                                                            Please remove stock out products
                                                        </div>
                                                    @else
                                                        <a href="{{ route('user.checkout.create') }}" class="checkout-button button alt wc-forward"> Proceed to checkout</a>
                                                    @endif
                                                </div>

                                            </div><!--.cart-totals-inner-->
                                        </div>
                                    </div>

                                    <div class="cart-collaterals">


                                    </div>

                                </div>
                            </div>
                        </div>


                    </article>

                </div><!-- .site-content -->



            </div><!-- .main-page-wrapper -->
        </div>
    </div>
@endsection
@section('scripts')
<script>
    function decrement(dec){
        var inputId = $(dec).attr('data-id');
        var val = $('#'+inputId).val();
        if (val == 1) {
            return alert('You dont decrese quantity.');
        }else{
            val--
            $('#'+inputId).val(val);
        }
    }
    function increment(inc){
        var inputId = $(inc).attr('data-id');
        var val = $('#'+inputId).val();
        val++
        $('#'+inputId).val(val);
    }
</script>
@endsection
