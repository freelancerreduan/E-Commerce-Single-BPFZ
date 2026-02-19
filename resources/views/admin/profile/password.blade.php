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
                            <ul class="nav nav-tabs nav-tabs-bordered">

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

                                <div class="tab-pane fade pt-3 show active">
                                    <!-- Change Password Form -->
                                    <form action="{{ route('admin.profile.updatePassword') }}" method="POST">
                                        @csrf
                                        <div class="row mb-3">
                                            <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current
                                                Password</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="current_password" type="password" class="form-control"
                                                    id="currentPassword" placeholder="Enter current password">
                                                    @error('current_password')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                    @if (session('notMatch'))
                                                        <span class="text-danger">{{ session('notMatch') }}</span>
                                                    @endif
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="password" class="col-md-4 col-lg-3 col-form-label">New
                                                Password</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="password" type="password" class="form-control"
                                                    id="password" placeholder="Enter new password">
                                                    @error('password')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="password_confirmation" class="col-md-4 col-lg-3 col-form-label">Re-enter
                                                New Password</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="password_confirmation" type="password" class="form-control"
                                                    id="password_confirmation" placeholder="Enter confirmation password">
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Change Password</button>
                                        </div>
                                    </form><!-- End Change Password Form -->

                                </div>

                            </div><!-- End Bordered Tabs -->

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main>
@endsection
@section('scripts')
<script type="text/javascript">
    function open_file() {
        document.getElementById('input_file').click();
    }
</script>
@endsection
