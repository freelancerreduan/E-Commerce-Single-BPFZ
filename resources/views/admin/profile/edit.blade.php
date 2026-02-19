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

                                <div class="tab-pane fade profile-edit pt-3 active show">

                                    <!-- Profile Edit Form -->
                                    <form action="{{ route('admin.profile.update') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        @php
                                            $arr = explode('/', auth()->user()->avatar);
                                            $img = end($arr);
                                        @endphp
                                        <div class="row mb-3">
                                            <label for="profileImage" class="col-md-4 col-lg-3 col-form-label">Profile Image</label>
                                            <div class="col-md-8 col-lg-9">
                                                <img src="{{ asset(auth()->user()->avatar) }}" alt="Profile" id="image_id" style="width:65px; height:65px; border-radius:100%;">
                                                <div class="pt-2">
                                                    <a href="#" onclick="open_file();" class="btn btn-primary btn-sm" title="Upload new profile image"><i class="bi bi-upload"></i></a>
                                                    @if ($img != 'avatar.png')
                                                        <button type="button" role="button" onclick="return window.location.href='{{ route('admin.profile.remove') }}' " class="btn btn-danger btn-sm"
                                                        title="Remove my profile image"><i class="bi bi-trash"></i></button>
                                                    @endif
                                                </div>
                                                @error('avatar')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>

                                        <input type="file" name="avatar" id="input_file" hidden onchange="document.getElementById('image_id').src = window.URL.createObjectURL(this.files[0])">

                                        <div class="row mb-3">
                                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Name</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="name" type="text" class="form-control" id="fullName" value="{{ old('name') ?? auth()->user()->name }}" placeholder="Enter name">
                                                @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Email" class="col-md-4 col-lg-3 col-form-label">Email</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="email" type="email" class="form-control" id="Email"
                                                    value="{{ old('email') ?? auth()->user()->email }}" placeholder="Enter Email">
                                                @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="about" class="col-md-4 col-lg-3 col-form-label">About</label>
                                            <div class="col-md-8 col-lg-9">
                                                <textarea name="about" class="form-control" id="about" style="height: 100px" placeholder="Enter About">{{ old('about') ?? auth()->user()->about }}</textarea>

                                                @error('about')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="title" class="col-md-4 col-lg-3 col-form-label">Title</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="title" type="text" class="form-control" id="title" value="{{ old('title') ?? auth()->user()->title }}" placeholder="Enter title">
                                                @error('title')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Country" class="col-md-4 col-lg-3 col-form-label">Country</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="country" type="text" class="form-control" id="Country"
                                                    value="{{ old('country') ?? auth()->user()->country }}" placeholder="Enter country">
                                                    @error('country')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Address" class="col-md-4 col-lg-3 col-form-label">Address</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="address" type="text" class="form-control" id="Address"
                                                    value="{{ old('address') ?? auth()->user()->address }}" placeholder="Enter address">
                                                    @error('address')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Phone" class="col-md-4 col-lg-3 col-form-label">Phone</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="phone" type="text" class="form-control" id="Phone"
                                                    value="{{ old('phone') ?? auth()->user()->phone }}" placeholder="Enter phone">
                                                    @error('phone')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Twitter" class="col-md-4 col-lg-3 col-form-label">Twitter
                                                Profile</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="twitter_link" type="text" class="form-control" id="Twitter"
                                                    value="{{ old('twitter_link') ?? auth()->user()->twitter_link }}" placeholder="Enter twitter profile">
                                                    @error('twitter_link')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Facebook" class="col-md-4 col-lg-3 col-form-label">Facebook
                                                Profile</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="facebook_link" type="text" class="form-control"
                                                    id="Facebook" value="{{ old('facebook_link') ?? auth()->user()->facebook_link }}" placeholder="Enter facebook profile">
                                                    @error('facebook_link')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Instagram" class="col-md-4 col-lg-3 col-form-label">Instagram
                                                Profile</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="instagram_link" type="text" class="form-control"
                                                    id="Instagram" value="{{ old('instagram_link') ?? auth()->user()->instagram_link }}" placeholder="Enter instagram profile">
                                                    @error('instagram_link')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="Linkedin" class="col-md-4 col-lg-3 col-form-label">Linkedin
                                                Profile</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="linkedin_link" type="text" class="form-control"
                                                    id="Linkedin" value="{{ old('linkedin_link') ?? auth()->user()->linkedin_link }}" placeholder="Enter linkedin profile">
                                                    @error('linkedin_link')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="github" class="col-md-4 col-lg-3 col-form-label">Github
                                                Profile</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="github_link" type="text" class="form-control"
                                                    id="github" value="{{ old('github_link') ?? auth()->user()->github_link }}" placeholder="Enter github profile">
                                                    @error('github_link')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </form><!-- End Profile Edit Form -->

                                </div>

                                {{-- <div class="tab-pane fade pt-3" id="profile-settings" role="tabpanel">

                                    <!-- Settings Form -->
                                    <form>

                                        <div class="row mb-3">
                                            <label for="fullName" class="col-md-4 col-lg-3 col-form-label">Email
                                                Notifications</label>
                                            <div class="col-md-8 col-lg-9">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="changesMade"
                                                        checked="">
                                                    <label class="form-check-label" for="changesMade">
                                                        Changes made to your account
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="newProducts"
                                                        checked="">
                                                    <label class="form-check-label" for="newProducts">
                                                        Information on new products and services
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="proOffers">
                                                    <label class="form-check-label" for="proOffers">
                                                        Marketing and promo offers
                                                    </label>
                                                </div>
                                                <div class="form-check">
                                                    <input class="form-check-input" type="checkbox" id="securityNotify"
                                                        checked="" disabled="">
                                                    <label class="form-check-label" for="securityNotify">
                                                        Security alerts
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </form><!-- End settings Form -->

                                </div>

                                <div class="tab-pane fade pt-3" id="profile-change-password" role="tabpanel">
                                    <!-- Change Password Form -->
                                    <form>

                                        <div class="row mb-3">
                                            <label for="currentPassword" class="col-md-4 col-lg-3 col-form-label">Current
                                                Password</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="password" type="password" class="form-control"
                                                    id="currentPassword">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="newPassword" class="col-md-4 col-lg-3 col-form-label">New
                                                Password</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="newpassword" type="password" class="form-control"
                                                    id="newPassword">
                                            </div>
                                        </div>

                                        <div class="row mb-3">
                                            <label for="renewPassword" class="col-md-4 col-lg-3 col-form-label">Re-enter
                                                New Password</label>
                                            <div class="col-md-8 col-lg-9">
                                                <input name="renewpassword" type="password" class="form-control"
                                                    id="renewPassword">
                                            </div>
                                        </div>

                                        <div class="text-center">
                                            <button type="submit" class="btn btn-primary">Change Password</button>
                                        </div>
                                    </form><!-- End Change Password Form -->

                                </div> --}}

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
