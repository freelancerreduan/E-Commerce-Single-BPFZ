@extends('layouts.app')
@section('styles')
    @include('user.layouts.partials.account-css')
    <link rel='stylesheet' href='{{ asset('assets/frontend/css/woo-mod-shop-table.min.css') }}' type='text/css' />
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

                                        <table class="woocommerce-orders-table woocommerce-MyAccount-orders shop_table shop_table_responsive my_account_orders account-orders-table">
                                            <thead>
                                                <tr>
                                                    <th scope="col" class="woocommerce-orders-table__header woocommerce-orders-table__header-order-number"> <span class="nobr">Order</span></th>
                                                    <th scope="col" class="woocommerce-orders-table__header woocommerce-orders-table__header-order-date"> <span class="nobr">Date</span></th>
                                                    <th scope="col" class="woocommerce-orders-table__header woocommerce-orders-table__header-order-status"> <span class="nobr">Status</span></th>
                                                    <th scope="col" class="woocommerce-orders-table__header woocommerce-orders-table__header-order-total"> <span class="nobr">Total</span></th>
                                                    <th scope="col" class="woocommerce-orders-table__header woocommerce-orders-table__header-order-actions"> <span class="nobr">Actions</span></th>
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @forelse ($orders as $order)
                                                    <tr class="woocommerce-orders-table__row woocommerce-orders-table__row--status-processing order">
                                                        <th class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-number" data-title="Order" scope="row">
                                                            <a href="{{ route('user.order.show', $order->invoice_id) }}" aria-label="View order number {{ $order->invoice_id }}"> #{{ $order->invoice_id }} </a>
                                                        </th>
                                                        <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-date" data-title="Date">
                                                            <time>{{ Carbon\Carbon::parse($order->created_at)->format('Y-m-d') }}</time>
                                                        </td>
                                                        <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-status" data-title="Status">

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
                                                        </td>
                                                        <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-total" data-title="Total">
                                                            <span class="woocommerce-Price-amount amount">{{ $order->total }}<span class="woocommerce-Price-currencySymbol">৳</span></span> for {{ count(getOrderItems($order->id)) }} items
                                                        </td>
                                                        <td class="woocommerce-orders-table__cell woocommerce-orders-table__cell-order-actions" data-title="Actions">
                                                            <a href="{{ route('user.order.show', $order->invoice_id) }}" class="woocommerce-button button view" aria-label="View order number {{ $order->invoice_id }}">View</a>
                                                        </td>
                                                    </tr>
                                                @empty

                                                @endforelse
                                            </tbody>
                                        </table>




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
