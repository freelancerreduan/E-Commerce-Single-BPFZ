@extends('admin.layouts.app_admin')
@section('styles')
@endsection
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Coupon</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item">Coupon</li>
                    <li class="breadcrumb-item active">Add Coupon</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row justify-content-center">
                <div class="col-lg-8">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Add Coupon</h5>
                            <form method="POST" action="{{ route('coupon.store') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-3">
                                    <label class="control-label pt-2" for="name">Name *</label>
                                    <input type="text" class="form-control" name="name" id="name"
                                        placeholder="Enter name" value="{{ old('name') }}">
                                    @error('name')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="form-group mb-3">
                                    <label class="control-label pt-2" for="discount">Discount * <small class="text-danger">Calculate by %</small></label>
                                    <input type="text" class="form-control" name="discount" id="discount"
                                        placeholder="Enter discount" value="{{ old('discount') }}">
                                    @error('discount')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>


                                <div class="form-group mb-3">
                                    <label class="control-label pt-2" for="end_date">End Date *</label>
                                    <input type="date" class="form-control" name="end_date" id="end_date">
                                    @error('end_date')
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
