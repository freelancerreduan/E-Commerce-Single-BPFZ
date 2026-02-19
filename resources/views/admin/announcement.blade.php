@extends('admin.layouts.app_admin')
@section('styles')
@endsection
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Announcement</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item">Announcement</li>
                    <li class="breadcrumb-item active">Edit Announcement</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row justify-content-center">
                <div class="col-lg-8">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Edit Announcement</h5>
                            <form method="POST" action="{{ route('admin.announcementUpdate') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group mb-3">
                                    <label class="control-label pt-2" for="announcement">Announcement *</label>
                                    <textarea name="announcement" id="announcement" rows="5" class="form-control" placeholder="Enter announcement">{{ old('announcement') ?? setting()->announcement }}</textarea>
                                    @error('announcement')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group mb-3">
                                    <label class="control-label pt-2" for="status">Status *</label>
                                    <select name="status" id="status" class="form-control">
                                        <option {{ setting()->announcement_status == 'yes' ? 'selected' : '' }} value="yes">On</option>
                                        <option {{ setting()->announcement_status == 'no' ? 'selected' : '' }} value="no">Off</option>
                                    </select>
                                    @error('status')
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
