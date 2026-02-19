@extends('admin.layouts.app_admin')
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Profile</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item">Admin</li>
                    <li class="breadcrumb-item active">Profile</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section profile">
            <div class="row">
                <div class="col-xl-4">
                    <div class="card">
                        <div class="card-body profile-card pt-4 d-flex flex-column align-items-center">
                            <img src="{{ asset(auth()->user()->avatar) }}" alt="Profile" class="rounded-circle">
                            <h2>{{ auth()->user()->name }}</h2>
                            <h3>{{ auth()->user()->title ?? '' }}</h3>
                            <div class="social-links mt-2">
                                @if (auth()->user()->twitter_link)
                                    <a target="_blank" href="{{ auth()->user()->twitter_link }}" class="twitter"><i class="bi bi-twitter"></i></a>
                                @endif
                                @if (auth()->user()->facebook_link)
                                    <a target="_blank" href="{{ auth()->user()->facebook_link }}" class="facebook"><i class="bi bi-facebook"></i></a>
                                @endif
                                @if (auth()->user()->instagram_link)
                                    <a target="_blank" href="{{ auth()->user()->instagram_link }}" class="instagram"><i class="bi bi-instagram"></i></a>
                                @endif
                                @if (auth()->user()->linkedin_link)
                                    <a target="_blank" href="{{ auth()->user()->linkedin_link }}" class="linkedin"><i class="bi bi-linkedin"></i></a>
                                @endif
                                @if (auth()->user()->github_link)
                                    <a target="_blank" href="{{ auth()->user()->github_link }}" class="github"><i class="bi bi-github"></i></a>
                                @endif
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-xl-8">

                    <div class="card">
                        <div class="card-body pt-3">
                            <!-- Bordered Tabs -->
                            <ul class="nav nav-tabs nav-tabs-bordered" role="tablist">

                                <li class="nav-item">
                                    <button onclick="return window.location.href='{{ route('admin.profile.index') }}' " class="nav-link {{ Request::url() == route('admin.profile.index') ? 'active' : '' }}" aria-selected="false" role="tab" tabindex="-1">Overview</button>
                                </li>

                                <li class="nav-item">
                                    <button  onclick="return window.location.href='{{ route('admin.profile.edit') }}' " class="nav-link {{ Request::url() == route('admin.profile.edit') ? 'active' : '' }}" >Edit Profile</button>
                                </li>

                                <li class="nav-item">
                                    <button  onclick="return window.location.href='{{ route('admin.profile.password') }}' " class="nav-link  {{ Request::url() == route('admin.profile.password') ? 'active' : '' }}">Change Password</button>
                                </li>

                            </ul>
                            <div class="tab-content pt-2">

                                <div class="tab-pane fade profile-overview active show">
                                    @if (auth()->user()->about)
                                        <h5 class="card-title">About</h5>
                                        <p class="small fst-italic">{{ auth()->user()->about }}</p>
                                    @endif

                                    <h5 class="card-title">Profile Details</h5>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label ">Name</div>
                                        <div class="col-lg-9 col-md-8">{{ auth()->user()->name }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Title</div>
                                        <div class="col-lg-9 col-md-8">{{ auth()->user()->title }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Email</div>
                                        <div class="col-lg-9 col-md-8">{{ auth()->user()->email }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Country</div>
                                        <div class="col-lg-9 col-md-8">{{ auth()->user()->country ?? 'N/A' }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Address</div>
                                        <div class="col-lg-9 col-md-8">{{ auth()->user()->address ?? 'N/A' }}</div>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-3 col-md-4 label">Phone</div>
                                        <div class="col-lg-9 col-md-8">{{ auth()->user()->phone ?? 'N/A' }}</div>
                                    </div>

                                </div>

                            </div><!-- End Bordered Tabs -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main>
@endsection
