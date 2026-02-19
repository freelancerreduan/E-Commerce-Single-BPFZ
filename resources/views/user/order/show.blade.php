@extends('layouts.app')
@section('styles')
    @include('user.layouts.partials.account-css')
    <link rel='stylesheet' href='{{ asset('assets/frontend/css/woo-mod-shop-table.min.css') }}' type='text/css' />
        <style>
            .woocommerce-table--order-details tfoot tr:last-child th {
                text-transform: uppercase;
                font-size: 20px;
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

                    <article id="post-9" class="post-9 page type-page status-publish hentry">

                        <div class="entry-content">
                            <div class="woocommerce">
                                <div class="woocommerce-my-account-wrapper">
                                    <div class="wd-my-account-sidebar">
                                        <h3 class="woocommerce-MyAccount-title entry-title"> My account </h3>
                                        @include('user.layouts.partials.account-nav')
                                    </div><!-- .wd-my-account-sidebar -->

                                    <div class="woocommerce-MyAccount-content">
                                        <div class="woocommerce-notices-wrapper"></div>
                                        <p> Order #<mark class="order-number">{{ $order->invoice_id }}</mark> was placed on <mark class="order-date">{{ Carbon\Carbon::parse($order->created_at)->format('Y-m-d') }}</mark> and is currently <mark class="order-status">
                                                @if ($order->status == 'pending')
                                                    Processing
                                                @elseif($order->status == 'rejected')
                                                    Rejected
                                                @elseif($order->status == 'canceled')
                                                    Canceled
                                                @elseif($order->status == 'confirmed')
                                                    Confirmed
                                                @elseif($order->status == 'return')
                                                    Returned
                                                @elseif($order->status == 'completed')
                                                    Delivered
                                                @endif
                                            </mark>.</p>


                                        <section class="woocommerce-order-details">

                                            <h2 class="woocommerce-order-details__title">Order details</h2>

                                            <div class="responsive-table">
                                                <table
                                                    class="woocommerce-table woocommerce-table--order-details shop_table order_details">

                                                    <thead>
                                                        <tr>
                                                            <th class="woocommerce-table__product-name product-name">Product
                                                            </th>
                                                            <th class="woocommerce-table__product-table product-total">Total
                                                            </th>
                                                        </tr>
                                                    </thead>

                                                    <tbody>
                                                        @foreach (getOrderItems($order->id) as $item)
                                                            <tr class="woocommerce-table__line-item order_item">
                                                                <td class="woocommerce-table__product-name product-name">
                                                                    <a href="{{ route('frontend.shop', $item->product->slug) }}">{{ $item->product->title }} - {{ $item->verient->size }}</a> <strong class="product-quantity">×&nbsp;{{ $item->qty }}</strong>
                                                                    <ul class="wc-item-meta">
                                                                        <li><strong class="wc-item-meta-label">Size:</strong>
                                                                            <p>{{ $item->verient->size }}</p>
                                                                        </li>
                                                                    </ul>
                                                                </td>

                                                                <td class="woocommerce-table__product-total product-total">
                                                                    <span class="woocommerce-Price-amount amount"><bdi>{{ $item->product->price }}<span class="woocommerce-Price-currencySymbol">৳</span></bdi></span>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    </tbody>

                                                    <tfoot>
                                                        <tr>
                                                            <th scope="row">Subtotal:</th>
                                                            <td><span class="woocommerce-Price-amount amount">{{ $order->sub_total }}<span class="woocommerce-Price-currencySymbol">৳</span></span>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Discount ({{ $order->coupon_name ?? 'N/A' }}):</th>
                                                            <td>
                                                                <span class="woocommerce-Price-amount amount">{{ $order->discount ?? 'N/A' }}<span class="woocommerce-Price-currencySymbol">৳</span></span>
                                                                {{-- &nbsp;
                                                                <small class="shipped_via">via Outside Chattogram DC</small> --}}
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Total:</th>
                                                            <td><span class="woocommerce-Price-amount amount">{{ $order->total }}<span class="woocommerce-Price-currencySymbol">৳</span></span></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Payment method:</th>
                                                            <td>{{ getGetway($order->id)->getway->account_name }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Paid Amount:</th>
                                                            <td><span class="woocommerce-Price-amount amount">{{ getGetway($order->id)->amount }}<span class="woocommerce-Price-currencySymbol">৳</span></span></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Sender Number:</th>
                                                            <td>{{ getGetway($order->id)->sender_number }}</td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">Transaction ID:</th>
                                                            <td>{{ getGetway($order->id)->trx_id }}</td>
                                                        </tr>

                                                        <tr>
                                                            <th>Note:</th>
                                                            <td>{{ $order->note ?? ('N/A') }}</td>
                                                        </tr>
                                                    </tfoot>
                                                </table>
                                            </div>

                                            <div class="responsive-table">
                                                <table
                                                    class="woocommerce-table shop_table order_details has-background awcfe-order-extra-details">
                                                </table>
                                            </div>
                                        </section>

                                        <section class="woocommerce-customer-details">


                                            <h2 class="woocommerce-column__title">Billing address</h2>

                                            <address> {{ $billing->name }}<br>{{ $billing->full_address }}<br>{{ $billing->thana->name }}, {{ $billing->district->name }}
                                                <p class="woocommerce-customer-details--phone">{{ $billing->phone }}</p>

                                                <p class="woocommerce-customer-details--email">{{ $billing->email ?? '' }}</p>

                                            </address>



                                        </section>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </article><!-- #post -->
                </div><!-- .site-content -->
            </div><!-- .main-page-wrapper -->
        </div>
    </div>
@endsection
