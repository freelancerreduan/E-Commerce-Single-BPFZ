@extends('admin.layouts.app_admin')
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Setting</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item">Setting</li>
                    <li class="breadcrumb-item active">General Setting</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row justify-content-center">
                <div class="col-lg-8">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Edit General Setting</h5>

                            <!-- Horizontal Form -->
                            <form role="form" action="{{ route('admin.setting.generalSetting.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group mb-3">
                                        <label for="author_image">Author Name</label>
                                        <input type="text" class="form-control" id="author_name" placeholder="Enter email" name="author_name" value="{{ old('author_name') ? old('author_name') : setting()->author_name }}">
                                        @error('author_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group row mb-3">
                                        <div class="col-md-9 mb-3">
                                            <label for="author_image">Author Image</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input form-control" id="author_image" name="author_image">
                                                    <label class="custom-file-label" for="author_image">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <img src="{{ asset(setting()->author_image) }}" alt="" class="img-fluid mt-3 border p-1" width="75">
                                        </div>
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="site_name">Site Name</label>
                                        <input type="text" class="form-control" id="site_name" placeholder="Enter site name" name="site_name" value="{{ old('site_name') ? old('site_name') : setting()->site_name }}">
                                        @error('site_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="address">Address</label>
                                        <input type="text" class="form-control" id="address" placeholder="Enter fb link" name="address" value="{{ old('address') ? old('address') : setting()->address }}">
                                        @error('address')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="email">Email</label>
                                        <input type="email" class="form-control" id="email" placeholder="Enter fb link" name="email" value="{{ old('email') ? old('email') : setting()->email }}">
                                        @error('email')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="phone">Phone</label>
                                        <input type="text" class="form-control" id="phone" placeholder="Enter fb link" name="phone" value="{{ old('phone') ? old('phone') : setting()->phone }}">
                                        @error('phone')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="fb_link">Facebook Link</label>
                                        <input type="text" class="form-control" id="fb_link" placeholder="Enter fb link" name="fb_link" value="{{ old('fb_link') ? old('fb_link') : setting()->fb_link }}">
                                        @error('fb_link')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="tw_link">Twitter Link</label>
                                        <input type="text" class="form-control" id="tw_link" placeholder="Enter tw link" name="tw_link" value="{{ old('tw_link') ? old('tw_link') : setting()->tw_link }}">
                                        @error('tw_link')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="ins_link">Instagram Link</label>
                                        <input type="text" class="form-control" id="ins_link" placeholder="Enter ins link" name="ins_link" value="{{ old('ins_link') ? old('ins_link') : setting()->ins_link }}">
                                        @error('ins_link')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="yt_link">YouTube Link</label>
                                        <input type="text" class="form-control" id="yt_link" placeholder="Enter youtube link" name="yt_link" value="{{ old('yt_link') ? old('yt_link') : setting()->yt_link }}">
                                        @error('yt_link')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="tt_link">TikTok Link</label>
                                        <input type="text" class="form-control" id="tt_link" placeholder="Enter tiktok link" name="tt_link" value="{{ old('tt_link') ? old('tt_link') : setting()->tt_link }}">
                                        @error('tt_link')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group row mb-3">
                                        <div class="col-md-9 mb-3">
                                            <label for="site_logo">Logo</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input form-control" id="site_logo" name="site_logo">
                                                    <label class="custom-file-label" for="site_logo">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <img src="{{ asset(setting()->site_logo) }}" alt="" class="img-fluid mt-3 border p-2">
                                        </div>
                                    </div>
                                    <div class="form-group row mb-3">
                                        <div class="col-md-9 mb-3">
                                            <label for="site_favicon">Favicon (<small class="text-danger">Size: 50*50</small>)</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input form-control" id="site_favicon" name="site_favicon">
                                                    <label class="custom-file-label" for="site_favicon">Choose file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <img src="{{ asset(setting()->site_favicon) }}" alt="" class="img-fluid mt-3 border p-2">
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                </div>
                            </form>

                        </div>
                    </div>

                </div>
            </div>
        </section>

    </main>
@endsection
