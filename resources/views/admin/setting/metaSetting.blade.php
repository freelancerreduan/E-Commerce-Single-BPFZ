@extends('admin.layouts.app_admin')
@section('styles')
<link rel="stylesheet" href="{{ asset('assets/admin/extra') }}/bootstrap-multiselect.css" />
    <link rel="stylesheet" href="{{ asset('assets/admin/extra') }}/bootstrap-tagsinput.css" />
    <style>
        .bootstrap-tagsinput .badge {
            margin: 2px !important;
        }
    </style>
@endsection
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
                            <form role="form" action="{{ route('admin.setting.metaSetting.update') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group mb-3">
                                        <label for="site_title">Site Title</label>
                                        <input type="text" class="form-control" id="site_title" placeholder="Enter site title" name="site_title" value="{{ old('site_title') ? old('site_title') : setting()->site_title }}">
                                        @error('site_title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="meta_title">Meta Title</label>
                                        <input type="text" class="form-control" id="meta_title" data-plugin-maxlength maxlength="60" placeholder="Enter meta title" name="meta_title" value="{{ old('meta_title') ? old('meta_title') : setting()->meta_title }}">
                                        <p>
                                            <code>max-length</code> set to 60.
                                        </p>
                                        @error('meta_title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="meta_description">Meta Description </label>
                                        <textarea name="meta_description" data-plugin-maxlength maxlength="160" id="meta_description" rows="5" class="form-control">{{ old('meta_description') ? old('meta_description') : setting()->meta_description }}</textarea>
                                        <p>
                                            <code>max-length</code> set to 160.
                                        </p>
                                        @error('meta_description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="meta_keyword">Meta Keywords</label>
                                        <input type="text" class="form-control" data-role="tagsinput" id="meta_keyword" placeholder="Enter meta keywords" name="meta_keyword" value="{{ old('meta_keyword') ? old('meta_keyword') : setting()->meta_keyword }}">
                                        @error('meta_keyword')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="focus_keyword">Focus Keywords</label>
                                        <input type="text" class="form-control" data-role="tagsinput" id="focus_keyword" placeholder="Enter meta keywords" name="focus_keyword" value="{{ old('focus_keyword') ? old('focus_keyword') : setting()->focus_keyword }}">
                                        @error('focus_keyword')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
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
@section('scripts')
    <script src="{{ asset('assets/admin/extra') }}/bootstrap-multiselect.js"></script>
    <script src="{{ asset('assets/admin/extra') }}/bootstrap-tagsinput.js"></script>
@endsection
