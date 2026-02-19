@extends('admin.layouts.app_admin')
@section('styles')
@endsection
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Category</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item">Category</li>
                    <li class="breadcrumb-item active">Edit Category</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row justify-content-center">
                <div class="col-lg-8">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Edit Category</h5>
                                <form method="POST" action="{{ route('category.update', $data->id) }}" enctype="multipart/form-data">
                                    @csrf
                                    @method('PATCH')
                                    <div class="form-group mb-3">
                                        <label class="control-label pt-2" for="category_name">Cantegory Name</label>
                                        <input type="text" class="form-control" name="category_name" id="category_name" placeholder="Enter category name" value="{{ old('category_name') ? old('category_name') : $data->category_name }}">
                                        @error('category_name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-3">
                                        <label class="control-label pt-2" for="use_menu">Use Menu *</label>
                                        <select name="use_menu" id="use_menu" class="form-control">
                                            <option {{ $data->useMainMenu == 'no' ? 'selected' : '' }} value="no"> No</option>
                                            <option {{ $data->useMainMenu == 'yes' ? 'selected' : '' }} value="yes"> Yes</option>
                                        </select>
                                        @error('use_menu')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
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
