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
                                        <form class="woocommerce-EditAccountForm edit-account" action="{{ route('user.account.passwordUpdate') }}" method="post" enctype="multipart/form-data">
                                            @csrf

                                            <fieldset>
                                                <legend>Password change</legend>

                                                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                    <label for="current_password">Current password (leave blank to leave unchanged)</label>
                                                    <span class="password-input">
                                                        <input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="current_password" id="current_password" autocomplete="off">
                                                        @error('current_password')
                                                            <span class="text-danger">{{$message}}</span>
                                                        @enderror
                                                        @if (session('notMatch'))
                                                            <span class="text-danger">{{ session('notMatch') }}</span>
                                                        @endif
                                                    </span>
                                                </p>
                                                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                    <label for="password">New password (leave blank to leave unchanged)</label>
                                                    <span class="password-input">
                                                        <input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password" id="password" autocomplete="off">

                                                        @error('password')
                                                            <span class="text-danger">{{ $message }}</span>
                                                        @enderror
                                                    </span>
                                                </p>
                                                <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                    <label for="password_confirmation">Confirm new password</label>
                                                    <span class="password-input">
                                                        <input type="password" class="woocommerce-Input woocommerce-Input--password input-text" name="password_confirmation" id="password_confirmation" autocomplete="off">
                                                        <span class="show-password-input"></span>
                                                    </span>
                                                </p>
                                            </fieldset>
                                            <div class="clear"></div>


                                            <p>
                                                <button type="submit" class="woocommerce-Button button" name="save_account_details" value="Save changes">Save changes</button>
                                            </p>

                                        </form>

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
