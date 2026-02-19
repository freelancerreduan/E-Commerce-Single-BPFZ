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
                                        <form class="woocommerce-EditAccountForm edit-account" action="{{ route('user.account.update') }}" method="post" enctype="multipart/form-data">
                                            @csrf

                                            <p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
                                                <label for="name">Name&nbsp;<span class="required">*</span></label>
                                                <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="name" id="name" autocomplete="given-name" value="{{ old('name') ?? auth()->user()->name }}" placeholder="Enter name">
                                                @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </p>

                                            <p class="woocommerce-form-row woocommerce-form-row--first form-row form-row-first">
                                                <label for="display_name">Display Name&nbsp;<span class="required">*</span></label>
                                                <input type="text" class="woocommerce-Input woocommerce-Input--text input-text" name="display_name" id="display_name" autocomplete="given-name" value="{{ old('display_name') ?? auth()->user()->display_name }}" placeholder="Enter display name">
                                                @error('display_name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </p>



                                            <div class="clear"></div>

                                            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                <label for="email">Email address&nbsp;<span class="required">*</span></label>
                                                <input type="email" class="woocommerce-Input woocommerce-Input--email input-text" name="email" id="email" autocomplete="email" value="{{ old('email') ?? auth()->user()->email }}" placeholder="Enter email">
                                                @error('email')
                                                    <span class="text-da">{{ $message }}</span>
                                                @enderror
                                            </p>



                                            <div class="clear"></div>

                                            <p class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                <label for="avatar">Avatar&nbsp;<span class="required">*</span></label>
                                                <input type="file" class="woocommerce-Input woocommerce-Input--email input-text" name="avatar" id="avatar">
                                                <img src="{{ asset(auth()->user()->avatar) }}" alt="" style="width:60px; height:60px;" class="border rounded-circle p-1">
                                                @error('avatar')
                                                    <span class="text-danger d-block">{{ $message }}</span>
                                                @enderror
                                            </p>
                                            <div class="clear"></div>




                                            {{-- <fieldset>
                                                <legend>Password change</legend>

                                                <p
                                                    class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                    <label for="password_current">Current password (leave blank to leave
                                                        unchanged)</label>
                                                    <span class="password-input"><input type="password"
                                                            class="woocommerce-Input woocommerce-Input--password input-text"
                                                            name="password_current" id="password_current"
                                                            autocomplete="off"><span
                                                            class="show-password-input"></span></span>
                                                </p>
                                                <p
                                                    class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                    <label for="password_1">New password (leave blank to leave
                                                        unchanged)</label>
                                                    <span class="password-input"><input type="password"
                                                            class="woocommerce-Input woocommerce-Input--password input-text"
                                                            name="password_1" id="password_1" autocomplete="off"><span
                                                            class="show-password-input"></span></span>
                                                </p>
                                                <p
                                                    class="woocommerce-form-row woocommerce-form-row--wide form-row form-row-wide">
                                                    <label for="password_2">Confirm new password</label>
                                                    <span class="password-input"><input type="password"
                                                            class="woocommerce-Input woocommerce-Input--password input-text"
                                                            name="password_2" id="password_2" autocomplete="off"><span
                                                            class="show-password-input"></span></span>
                                                </p>
                                            </fieldset> --}}
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
