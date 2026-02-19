<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="description" content="{{ setting()->meta_description }}">
    <meta name="keywords" content="{{ setting()->meta_keyword }}">
    <meta name="keywords" content="{{ setting()->focus_keyword }}">
    <meta name="author" content="{{ setting()->author_name }}">
    <meta name="robots" content="max-image-preview:large" />
    <link rel="canonical" href="{{ Request::url() }}" />
    <link rel="alternate" media="only screen and (max-width: 640px)" href="{{ Request::url() }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">


    <title>Home | {{ setting()->site_name }}</title>
    <link href="https://use.fontawesome.com/releases/v5.0.1/css/all.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">

    {{-- <link rel='stylesheet' href='{{ asset('assets/frontend') }}/css/bootstrap-light.min.css' type='text/css' /> --}}
    <link rel='stylesheet' href='{{ asset('assets/frontend') }}/css/base.min.css' type='text/css' />
    <link rel='stylesheet' href='{{ asset('assets/frontend') }}/css/woo-mod-swatches-base.min.css' type='text/css' />
    <link rel='stylesheet' href='{{ asset('assets/frontend') }}/css/opt-bottom-toolbar.min.css' type='text/css' />
    <link rel='stylesheet' href='{{ asset('assets/frontend') }}/css/woocommerce-base.min.css' type='text/css' />
    <link rel='stylesheet' href='{{ asset('assets/frontend') }}/css/xts-theme_settings_default-1725104485.css'
        type='text/css' />
    <link rel='stylesheet' href='{{ asset('assets/frontend') }}/css/footer-base.min.css' type='text/css' />
    <link rel='stylesheet' href='{{ asset('assets/frontend') }}/css/mod-tools.min.css' type='text/css' />
    <!-- product styles -->
    <link rel="shortcut icon" href="{{ asset(setting()->site_favicon) }}" type="image/x-icon">

    @yield('styles')
    <link rel="stylesheet" href="{{ asset('assets/frontend') }}/css/style.css">
    <style>
        .main-page-wrapper{
            background-color: #FEF4F3 !important;
        }



        .dropdown {
            position: relative;
            display: inline-block;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            padding: 12px 16px;
            right: 0px;
            top: 39px;
            z-index: 1;
        }

        .dropdown:hover .dropdown-content {
            display: block;
        }
        .star-checked {
             color: orange;
         }
         :is(.btn,.button,button,[type="submit"],[type="button"]):hover {
            color: transparent;
            background-color: transparent !important;
        }
        .amount {
            color: #BC6176 !important;
        }
        :is(.btn,.button,button,[type="submit"],[type="button"]):hover {
            color: transparent;
            background-color: #BC6176 !important;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            padding: 12px 16px;
            right: 0px;
            top: 30px;
            z-index: 1;
            left: 0px !important;
        }
    </style>



</head>

<body>

    <div class="website-wrapper">
        <header class="whb-header whb-header_409317 whb-scroll-stick whb-sticky-real">
            <div class="jss29">
                <div class="MuiGrid-root MuiGrid-container MuiGrid-spacing-xs-1 css-tuxzvu">
                    <div class="MuiGrid-root MuiGrid-item MuiGrid-grid-xs-5 css-1b2k0zv">
                        <ul class="jss32">
                            <span>
                                <div class="jss40">
                                    <div class="jss41" onclick="return window.location.href='{{ route('frontend.index') }}'" style="color: #BC6377">Home</div>
                                </div>
                            </span>

                            @foreach (getCategoryMenu() as $category)

                                @if (count(getSubCategories($category->id)) > 0)
                                    <span class="dropdown">
                                        <div class="jss40">
                                            <div class="jss41 dropdown-toggle text-capitalize" data-bs-toggle="dropdown" aria-expanded="false" style="color: #BC6377">{{ $category->category_name }}</div>
                                            <ul class="dropdown-menu px-2"  style="background: #F5F5F5">
                                                @foreach (getSubCategories($category->id) as $subItem)
                                                    <li><a style="color: #BC6377" class="d-block" href="{{ route('frontend.subCategory.product', $subItem->slug) }}">{{ $subItem->subcategory_name }}</a></li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </span>
                                @else
                                    <span>
                                        <div class="jss40 ">
                                            <div class="jss41" onclick="return window.location.href='{{ route('frontend.category', $category->slug) }}'" style="color: #BC6377">{{ $category->category_name }}</div>
                                        </div>
                                    </span>
                                @endif

                            @endforeach


                            <span>
                                <div class="jss40">
                                    <div class="jss41" onclick="return window.location.href='{{ route('frontend.reviews') }}'" style="color: #BC6377">Reviews</div>
                                </div>
                            </span>

                            <span>
                                <div class="jss40">
                                    <div class="jss41"  onclick="return window.location.href='{{ route('frontend.blog') }}'" style="color: #BC6377">Blog</div>
                                </div>
                            </span>


                            {{-- <span class="dropdown">
                                <div class="jss40">
                                    <div class="jss41 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="color: #BC6377">Home</div>
                                    <ul class="dropdown-menu px-2">
                                        <li><a href="#">HTML dsf</a></li>
                                        <li><a href="#">CSS</a></li>
                                        <li><a href="#">JavaScript</a></li>
                                    </ul>
                                </div>
                            </span> --}}



                        </ul>
                    </div>
                    <div class="MuiGrid-root MuiGrid-item MuiGrid-grid-xs-2 jss30 css-1no5enf">
                        <div class="jss31" style="width: 1000px;">
                            <div class="jss9"
                                style="position: relative; width: auto; height: 100%; max-width: 100%; max-height: 100%; cursor: pointer;">
                                <span
                                    style="box-sizing: border-box; display: block; overflow: hidden; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; position: absolute; inset: 0px;">
                                    <img onclick="return window.location.href='{{ route('frontend.index') }}'"
                                        alt="{{ setting()->site_name }}" src="{{ asset(setting()->site_logo) }}"
                                        style="display: block; position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: none; margin: auto; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%; object-fit: contain;">
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="MuiGrid-root MuiGrid-item MuiGrid-grid-xs-5 css-1b2k0zv">

                        <div class="jss34">
                            <div class="jss35">
                                <form action="{{ route('frontend.search') }}">
                                    <div class="jss42 bg-white" style="border-radius: 25px;">
                                        <input type="text" name="search" placeholder="Search for Products &amp; Categories" value="{{ isset($search) ? $search : '' }}" style="padding: 25px;">
                                        <button style="min-height: 0; border:none; padding:0px;" type="submit">
                                            <div class="jss36 jss37" style="background-color: #BC6377 !important; border-radius:50%; right:10px;">
                                                <img alt="search-icon" src="{{ asset('assets/frontend') }}/img/Search.svg" decoding="async" data-nimg="intrinsic">
                                            </div>
                                        </button>
                                    </div>
                                </form>
                            </div>






                            @auth
                                <div class="jss38 dropdown">
                                   <div class="d-flex align-items-center">
                                    <div class="jss36" id="account-menu" style="border-radius: 50%;">
                                        <span style="box-sizing: border-box; cursor:pointer; display: inline-block; overflow: hidden; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; position: relative; max-width: 100%;">
                                            <img alt="avatar-icon" src="{{ asset(auth()->user()->avatar) }}" style="" class="rounded-circle border">
                                        </span>
                                    </div>
                                    @php
                                        $fName = explode(' ', auth()->user()->name);
                                    @endphp
                                    <span class="ms-1" style="cursor: pointer">{{ auth()->user()->display_name ?? $fName[0] }}</span>
                                   </div>
                                    <div class="dropdown-content">
                                        <ul>
                                            <li class="list-unstyled"><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
                                            <li class="list-unstyled"><a href="{{ route('user.order.index') }}">Orders</a></li>
                                            {{-- <li class="list-unstyled"><a href="">Addresses</a></li> --}}
                                            <li class="list-unstyled"><a href="{{ route('user.account.edit') }}">Account Details</a></li>
                                            <li class="list-unstyled"><a href="{{ route('user.wishlist.index') }}"> Wishlists</a></li>
                                            <li class="list-unstyled"><a href="{{ route('user.cart.index') }}"> Cart</a></li>
                                            <li class="list-unstyled"><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                                        </ul>
                                    </div>
                                </div>
                            @else
                                <div class="jss38">
                                    <div class="jss36" id="account-menu" style="border-radius: 50%;" onclick="return window.location.href='{{ route('login') }}'">
                                        <span style="box-sizing: border-box; cursor:pointer; display: inline-block; overflow: hidden; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; position: relative; max-width: 100%;">
                                            <span style="box-sizing: border-box; display: block; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; max-width: 100%;">
                                                <img alt="" src="data:image/svg+xml,%3csvg%20xmlns=%27http://www.w3.org/2000/svg%27%20version=%271.1%27%20width=%2716%27%20height=%2716%27/%3e" style="display: block; max-width: 100%; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px;">
                                            </span>
                                            <img alt="avatar-icon" src="{{ asset('assets/frontend') }}/img/Avatar.svg" style="display: block; position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: none; margin: auto; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%;">
                                        </span>
                                    </div>
                                </div>
                            @endauth



                        </div>
                    </div>
                </div>
            </div>


            <div class="jss52">
                <div class="MuiGrid-root MuiGrid-container css-1d3bbye">
                    <div class="MuiGrid-root MuiGrid-item MuiGrid-grid-xs-3 MuiGrid-grid-sm-3 css-1nggcet">
                        <span
                            style="box-sizing: border-box; display: inline-block; overflow: hidden; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; position: relative; max-width: 100%;">
                            <span
                                style="box-sizing: border-box; display: block; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; max-width: 100%;">
                                <img alt=""
                                    src="data:image/svg+xml,%3csvg%20xmlns=%27http://www.w3.org/2000/svg%27%20version=%271.1%27%20width=%2729%27%20height=%2715%27/%3e"
                                    style="display: block; max-width: 100%; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px;">
                            </span>
                            <img src="{{ asset('assets/frontend') }}/img/stack-icon.svg" onclick="toggleMenu()"
                                data-nimg="intrinsic"
                                style="display: block; position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: none; margin: auto; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%;">
                        </span>
                    </div>
                    <div class="MuiGrid-root MuiGrid-item MuiGrid-grid-xs-9 MuiGrid-grid-sm-9 css-bnsouw">
                        <div class="MuiGrid-root MuiGrid-container css-1d3bbye">
                            <div
                                class="MuiGrid-root MuiGrid-item MuiGrid-grid-xs-8 MuiGrid-grid-sm-8 jss53 css-o0f1to">
                                <div class="jss9"
                                    style="position: relative; width: auto; height: 100%; max-width: 100%; max-height: 100%; cursor: pointer;">
                                    <span
                                        style="box-sizing: border-box; display: block; overflow: hidden; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; position: absolute; inset: 0px;">
                                        <img onclick="return window.location.href='{{ route('frontend.index') }}'" alt="logo" src="{{ asset(setting()->site_logo) }}" style="display: block; position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: none; margin: auto; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%; object-fit: contain;">
                                    </span>
                                </div>
                            </div>
                            <div class="MuiGrid-root MuiGrid-item MuiGrid-grid-xs-4 MuiGrid-grid-sm-4 css-lj0nh5">
                                <div class="jss54">
                                    <div class="jss55" style="background-color: #BC6176; border-radius:50%;">
                                        <span style="box-sizing: border-box; display: inline-block; overflow: hidden; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; position: relative; max-width: 100%;">
                                            <span style="">
                                                <img alt="" src="data:image/svg+xml,%3csvg%20xmlns=%27http://www.w3.org/2000/svg%27%20version=%271.1%27%20width=%2713%27%20height=%2713%27/%3e" style="display: block; max-width: 100%; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px;">
                                            </span>
                                            <img src="{{ asset('assets/frontend') }}/img/Search.svg" onclick="showHideSearchForm()" style="display: block; position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: none; margin: auto; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%;">
                                        </span>
                                    </div>

                                    @auth
                                        <div class="jss38 dropdown">
                                            <div class="jss36" id="account-menu" style="border-radius: 50%;">
                                                <span style="box-sizing: border-box; cursor:pointer; display: inline-block; overflow: hidden; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; position: relative; max-width: 100%;">
                                                    <img alt="avatar-icon" src="{{ asset(auth()->user()->avatar) }}" class="rounded-circle rounded-circle border mb-2">
                                                </span>
                                            </div>
                                            <div class="dropdown-content">
                                                <ul>
                                                    <li class="list-unstyled my-2"><a href="{{ route('user.dashboard') }}">Dashboard</a></li>
                                                    <li class="list-unstyled my-2"><a href="{{ route('user.order.index') }}">Orders</a></li>
                                                    {{-- <li class="list-unstyled my-2"><a href="#">Addresses</a></li> --}}
                                                    <li class="list-unstyled my-2"><a href="{{ route('user.account.edit') }}">Account Details</a></li>
                                                    <li class="list-unstyled my-2"><a href="{{ route('user.wishlist.index') }}">Wishlist</a></li>
                                                    <li class="list-unstyled my-2"><a href="{{ route('user.cart.index') }}">Cart</a></li>
                                                    <li class="list-unstyled my-2">
                                                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a>

                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    @else
                                        <div class="jss55" id="account-menu" aria-haspopup="true"
                                            style="border-radius: 50%;"
                                            onclick="return window.location.href='{{ route('login') }}'">
                                            <span
                                                style="box-sizing: border-box; display: inline-block; overflow: hidden; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; position: relative; max-width: 100%;">
                                                <span
                                                    style="box-sizing: border-box; display: block; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px; max-width: 100%;">
                                                    <img alt="" aria-hidden="true"
                                                        src="data:image/svg+xml,%3csvg%20xmlns=%27http://www.w3.org/2000/svg%27%20version=%271.1%27%20width=%2713%27%20height=%2713%27/%3e"
                                                        style="display: block; max-width: 100%; width: initial; height: initial; background: none; opacity: 1; border: 0px; margin: 0px; padding: 0px;"></span><img
                                                    alt="avatar-icon" src="{{ asset('assets/frontend') }}/img/Avatar.svg"
                                                    decoding="async" data-nimg="intrinsic"
                                                    style="display: block; position: absolute; inset: 0px; box-sizing: border-box; padding: 0px; border: none; margin: auto; width: 0px; height: 0px; min-width: 100%; max-width: 100%; min-height: 100%; max-height: 100%;">
                                            </span>
                                        </div>
                                    @endauth

                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="jss57 toggle-menu">
                    <div style="padding: 19px;">
                        <div class="mb-2">
                            <div class="jss115" onclick="return window.location.href='{{ route('frontend.index') }}'" style="padding-left: 0px; color: #BC6377"><span>Home</span></div>
                        </div>

                        @foreach (getCategoryMenu() as $category)
                            @if (count(getSubCategories($category->id)) > 0)
                                <div class="dropdown mb-2 d-block">
                                    <div class="jss40">
                                        <div class="jss41 dropdown-toggle text-capitalize" data-bs-toggle="dropdown" aria-expanded="false" style="color: #BC6377">{{ $category->category_name }}</div>
                                        <ul class="dropdown-menu px-2"  style="background: #F5F5F5" >
                                            @foreach (getSubCategories($category->id) as $subItem)
                                                <li><a style="color: #BC6377" class="d-block" href="{{ route('frontend.subCategory.product', $subItem->slug) }}" style="font-size: 16px">{{ $subItem->subcategory_name }}</a></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            @else
                                <div class="mb-2">
                                    <div class="jss115" onclick="return window.location.href='{{ route('frontend.category', $category->slug) }}'" style="padding-left: 0px; color: #BC6377"><span>{{ $category->category_name }}</span></div>
                                </div>
                            @endif
                        @endforeach

                        <div class="mb-2">
                            <div class="jss115" onclick="return window.location.href='{{ route('frontend.reviews') }}'" style="padding-left: 0px; color: #BC6377"><span>Reviews</span></div>
                        </div class="mb-2">

                        <div class="mb-2">
                            <div class="jss115" onclick="return window.location.href='{{ route('frontend.blog') }}'" style="padding-left: 0px; color: #BC6377"><span>Blog</span></div>
                        </div>

                        {{-- <div class="dropdown">
                            <div class="jss40">
                                <div class="jss41 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="color: #BC6377">Home</div>
                                <ul class="dropdown-menu px-2">
                                    <li><a href="#">HTML</a></li>
                                    <li><a href="#">CSS</a></li>
                                    <li><a href="#">JavaScript</a></li>
                                </ul>
                            </div>
                        </div> --}}
                    </div>
                </div>

                <div class="jss124 toggle-search">
                    <div>
                        <div class="jss125">Search</div>
                        <form action="{{ route('frontend.search') }}">
                            <div class="jss126">
                                <input class="jss127 shadow-sm" placeholder="Search for Products &amp; Categories" name="search" value="{{ $search ?? '' }}"
                                    style="padding: 8px; border-radius: 25px;"
                                >
                                <button type="submit" class="jss128 search_icon" style="right: 20px !important; background: transparent !important; height:-13px !important">
                                    <span  style="background-color: #BC6176; padding:5px; border-radius:50%;">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%" viewBox="0 0 9.068 9.068">
                                            <g fill="none" stroke="#fff" stroke-linecap="round" stroke-linejoin="round" stroke-width="0.5" data-name="Icon feather-search" transform="translate(.25 .25)">
                                                <path d="M7.524 3.762A3.762 3.762 0 113.762 0a3.762 3.762 0 013.762 3.762z" data-name="Path 13"></path>
                                                <path d="M8.465 8.465L6.419 6.419" data-name="Path 14"></path>
                                            </g>
                                        </svg>
                                    </span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </header>
        <br>




        @yield('content')



        <footer class="footer-container color-scheme-light" style="background-color: #FFD1D1;background-image: none; color: #947171;">
            <div class="container main-footer">
                <aside class="footer-sidebar widget-area row">
                    <div class="footer-column footer-column-1 col-12 col-sm-6 col-lg-4">
                        <div id="nav_menu-16" class="wd-widget widget footer-widget  widget_nav_menu">
                            <h5 class="widget-title" style="color: #000">Important links</h5>
                            <div class="menu-footer-menu-footer-menu-container">
                                <ul id="menu-footer-menu-footer-menu" class="menu">
                                    <li id="menu-item-31768"
                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-31768">
                                        <a href="{{ route('frontend.termsAndCondition') }}" style="color: #947171">Terms &amp; Conditions</a>
                                    </li>
                                    <li id="menu-item-31769"
                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-31769">
                                        <a href="{{ route('frontend.returnPolicy') }}" style="color: #947171">Refund and Returns Policy</a>
                                    </li>
                                    <li id="menu-item-31770"
                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-31770">
                                        <a href="{{ route('frontend.privacyPolicy') }}" style="color: #947171">Privacy Policy</a>
                                    </li>
                                    <li id="menu-item-32723"
                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-32723">
                                        <a href="{{ route('frontend.about') }}" style="color: #947171">About us</a>
                                    </li>
                                    <li id="menu-item-31793"
                                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-31793">
                                        <a href="#" style="color: #947171">Contact us</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="footer-column footer-column-2 col-12 col-sm-6 col-lg-4">
                        <div id="text-3" class="wd-widget widget footer-widget  widget_text">
                            <h5 class="widget-title" style="color: #000">Contact</h5>
                            <div class="textwidget">
                                <p style="color: #947171"><strong>Address</strong>: {{ setting()->address }}</p>
                                <p style="color: #947171"><strong>Email</strong>: {{ setting()->email }}</p>
                                <p style="color: #947171"><strong>Phone</strong>: {{ setting()->phone }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="footer-column footer-column-3 col-12 col-sm-6 col-lg-4">
                        <div id="nav_menu-25" class="wd-widget widget footer-widget  widget_nav_menu">
                            <h5 class="widget-title" style="color: #000">Social Media</h5>
                            <div class="menu-social-links-container">
                                <ul id="menu-social-links" class="menu">
                                    @if (setting()->fb_link)
                                        <li id="menu-item-31796"
                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-31796">
                                            <a target="_blank" href="{{ setting()->fb_link }}" style="color: #947171">Facebook</a>
                                        </li>
                                    @endif

                                    @if (setting()->ins_link)
                                        <li id="menu-item-31797"
                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-31797">
                                            <a target="_blank" href="{{ setting()->ins_link }}" style="color: #947171">Instagram</a>
                                        </li>
                                    @endif

                                    @if (setting()->tw_link)
                                        <li id="menu-item-31798"
                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-31798">
                                            <a target="_blank" href="{{ setting()->tw_link }}" style="color: #947171">Twitter</a>
                                        </li>
                                    @endif

                                    @if (setting()->yt_link)
                                        <li id="menu-item-31798"
                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-31798">
                                            <a target="_blank" href="{{ setting()->yt_link }}" style="color: #947171">YouTube</a>
                                        </li>
                                    @endif

                                    @if (setting()->tt_link)
                                        <li id="menu-item-31798"
                                            class="menu-item menu-item-type-custom menu-item-object-custom menu-item-31798">
                                            <a target="_blank" href="{{ setting()->tt_link }}" style="color: #947171">TikTok</a>
                                        </li>
                                    @endif
                                </ul>
                            </div>
                        </div>
                    </div>
                </aside><!-- .footer-sidebar -->
            </div>

            <div class="copyrights-wrapper copyrights-two-columns">
                <div class="container">
                    <div class="min-footer">
                        <div class="col-left set-cont-mb-s reset-last-child">
                            {{-- <small><a href="#"><strong>All Rights Reserved 2022</strong></a></small> --}}
                            {{ Carbon\Carbon::now()->format('Y') }} All rights reserved by
                            <b>{{ setting()->site_name }}</b>.
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
    <div class="wd-close-side wd-fill"></div>

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>




    <div class="wd-toolbar wd-toolbar-label-show">
        <div class="wd-toolbar-shop wd-toolbar-item wd-tools-element">
            <a href="{{ route('frontend.index') }}"  style="color:#BC6377">
                <i class="fa-solid fa-house"></i>
                <span class="wd-toolbar-label"> Home </span>
            </a>
        </div>
        <div class="wd-header-wishlist wd-tools-element wd-design-5" title="My wishlist">
            <a href="{{ route('user.wishlist.index') }}"  style="color:#BC6377 ">
                <i class="fa-solid fa-heart"></i>
                {{-- <span class="wd-tools-count"> 0 </span> --}}
                <span class="wd-toolbar-label"> Wishlist </span>
            </a>
        </div>
        <div class="wd-header-cart wd-tools-element wd-design-5 cart-widget-opener" title="My cart">
            <a href="{{ route('user.cart.index') }}"  style="color:#BC6377">
                <i class="fa-solid fa-cart-shopping"></i>
                {{-- <span class="wd-cart-number wd-tools-count">1 <span>item</span></span> --}}
                <span class="wd-toolbar-label"> Cart </span>
            </a>
        </div>
        <div class="wd-header-my-account wd-tools-element wd-style-icon">
            <a href="{{ route('user.dashboard') }}" style="color:#BC6377">
                <i class="fa-solid fa-user"></i>
                <span class="wd-toolbar-label"> My account </span>
            </a>
        </div>
    </div>




    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script type="text/javascript" src="{{ asset('assets/frontend') }}/js/jquery-migrate.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/js/all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <script>
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        toastr.options = {
            "debug": false,
            "positionClass": "toast-bottom-right",
            "onclick": null,
            "fadeIn": 300,
            "fadeOut": 1000,
            "timeOut": 5000,
            "extendedTimeOut": 1000
        }
    </script>
    @yield('scripts')
    <script src="{{ asset('assets/frontend') }}/js/main.js"></script>

    @if (session('success'))
    <script>
        toastr.success('{{ session('success') }}');
    </script>
    @endif
    @if (session('error'))
    <script>
        toastr.error('{{ session('error') }}');
    </script>
    @endif


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
</body>

</html>
