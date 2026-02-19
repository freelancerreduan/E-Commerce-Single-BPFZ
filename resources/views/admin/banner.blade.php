@extends('admin.layouts.app_admin')
@section('styles')
@endsection
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Banner</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item">Banner</li>
                    <li class="breadcrumb-item active">Edit Banner</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row justify-content-center">
                <div class="col-lg-8">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Edit Category</h5>
                            <form method="POST" action="{{ route('admin.home.banner.update') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-3">
                                    <label class="control-label pt-2" for="link">Link *</label>
                                    <input type="text" class="form-control" name="link" id="link" placeholder="Enter banner link" value="{{ old('banner_link') ?? setting()->banner_link }}">
                                    @error('link')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label class="control-label pt-2" for="banner">Banner *</label>
                                    <input type="file" class="form-control" name="banner" id="banner">
                                    @error('banner')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                    <img src="{{ asset(setting()->home_banner) }}" alt="" class="img-fluid border rounded p-1 my-3" style="width: 150px">
                                </div>

                                <div class="text-center">
                                    <button class="btn btn-success" type="submit">Save & Update</button>
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
@endsection
