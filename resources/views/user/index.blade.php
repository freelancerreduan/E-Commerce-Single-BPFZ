@extends('layouts.app')
@section('styles')
@include('user.layouts.partials.account-css')
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
                                        <p> Hello <strong>{{ auth()->user()->name }}</strong> (not <strong>{{ auth()->user()->name }}</strong>? <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Log out</a>)</p>

                                        <p> From your account dashboard you can view your <a href="#">recent orders</a>, manage your <a href="#">shipping and billing addresses</a>, and <a href="#">edit your password and account details</a>.</p>

                                        <div class="wd-my-account-links wd-grid-g">
                                            <div class="dashboard-link">
                                                <a href="{{ route('user.dashboard') }}"> Dashboard</a>
                                            </div>
                                            <div class="orders-link">
                                                <a href="{{ route('user.order.index') }}">
                                                    <span class="d-block icon" style="font-size: 30px;"><i class="fa fa-list"></i></span>
                                                    <span class="d-block">Orders</span>
                                                </a>
                                            </div>
                                            {{-- <div class="edit-address-link">
                                                <a href="#">
                                                    <span class="d-block icon" style="font-size: 30px;"><i class="fas fa-map-marker-alt"></i></span>
                                                    <span class="d-block">Addresses</span>
                                                </a>
                                            </div> --}}
                                            <div class="edit-account-link">
                                                <a href="{{ route('user.account.edit') }}">
                                                    <span class="d-block icon" style="font-size: 30px;"><i class="far fa-user-circle"></i></span>
                                                    <span class="d-block">Account details</span>
                                                </a>
                                            </div>
                                            <div class="edit-account-link">
                                                <a href="{{ route('user.account.password') }}">
                                                    <span class="d-block icon" style="font-size: 30px;"><i class="fa fa-key"></i></span>
                                                    <span class="d-block">Change Password</span>
                                                </a>
                                            </div>
                                            {{-- <div class="wt-smart-coupon-link">
                                                <a href="#">
                                                    <span class="d-block icon" style="font-size: 30px;"><i class="fas fa-cog"></i></span>
                                                    <span class="d-block">My Coupons</span>
                                                </a>
                                            </div> --}}
                                            <div class="wishlist-link">
                                                <a href="{{ route('user.wishlist.index') }}">
                                                    <span class="d-block icon" style="font-size: 30px;"><i class="far fa-heart"></i></span>
                                                    <span class="d-block">Wishlist</span>
                                                </a>
                                            </div>
                                            <div class="wishlist-link">
                                                <a href="{{ route('user.cart.index') }}">
                                                    <span class="d-block icon" style="font-size: 30px;"><i class="fas fa-cart-shopping"></i></span>
                                                    <span class="d-block">Cart</span>
                                                </a>
                                            </div>
                                            <div class="customer-logout-link">

                                                <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                    <span class="d-block icon" style="font-size: 30px;"><i class="fas fa-sign-out-alt"></i></span>
                                                    <span class="d-block">Logout</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div><!-- .woocommerce-my-account-wrapper -->
                                </div>
                            </div>
                        </div>


                    </article><!-- #post -->



                </div><!-- .site-content -->


<!-- 
===========================================
  🌐 Website Developed & Maintained By: MD REDUAN HOSSEN
  🔹 Full Stack Web Developer | Google Apps Script Expert | Android Developer | Reduan | Redwan | Web Developer | Freelancer Reduan | Freelancer
  📞 Mobile: +8801318532992
  📧 Email: freelancerreduan100@email.com
  📧 Email: reduan360bd@email.com
  🌐 Facebook: https://facebook.com/@reduan97
  🌐 Facebook: https://facebook.com/smartbdhost
  ▶️ YouTube: https://www.youtube.com/@ReduanTravelVlogs
  🔍 Search "Reduan Web Developer Bangladesh" on Google to know more.
  © 2025 All Rights Reserved | Developer Credit Preserved
===========================================
-->
            </div><!-- .main-page-wrapper -->
        </div>
    </div>
@endsection
