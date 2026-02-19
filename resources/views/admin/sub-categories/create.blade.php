@extends('admin.layouts.app_admin')
@section('styles')
@endsection
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Sub Category</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item">Sub Category</li>
                    <li class="breadcrumb-item active">Add Sub Category</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row justify-content-center">
                <div class="col-lg-8">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Add Sub-Category</h5>
                            <form method="POST" action="{{ route('subcategory.store') }}" enctype="multipart/form-data">
                                @csrf

                                <div class="form-group mb-3">
                                    <label class="control-label pt-2" for="category">Category *</label>
                                    <select name="category" id="category" class="form-control">
                                        <option value="">Select Category</option>
                                        @foreach ($categories as $category)
                                            <option {{ old('category') == $category->id ? 'selected' : '' }} value="{{ $category->id }}">{{ $category->category_name }}</option>
                                        @endforeach
                                    </select>
                                    @error('category')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label class="control-label pt-2" for="subcategory_name">Sub Category Name *</label>
                                    <input type="text" class="form-control" name="subcategory_name" id="subcategory_name"
                                        placeholder="Enter subcategory name" value="{{ old('subcategory_name') }}">
                                    @error('subcategory_name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group mb-3">
                                    <label class="control-label pt-2" for="use_menu">Use Menu *</label>
                                    <select name="use_menu" id="use_menu" class="form-control">
                                        <option {{ old('use_menu') == 'no' ? 'selected' : '' }} value="no"> No</option>
                                        <option {{ old('use_menu') == 'yes' ? 'selected' : '' }} value="yes"> Yes</option>
                                    </select>
                                    @error('use_menu')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="text-center">
                                    <button class="btn btn-success" type="submit">Save & Create</button>
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
