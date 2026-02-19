@extends('admin.layouts.app_admin')
@section('styles')
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/dataTable/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/dataTable/css/responsive.bootstrap4.min.css">
@endsection
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Post</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item">Post</li>
                    <li class="breadcrumb-item active">List Post</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row justify-content-center">
                <div class="col-lg-10">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">List Post</h5>
                            <table class="table table-bordered table-striped mb-0" id="example1">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Category Name</th>
                                        <th>Post</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($datas as $key => $data)
                                        <tr>
                                            <td class="align-middle">{{ $key < 9 ? '0' . ++$key : ++$key }}</td>
                                            <td class="align-middle"> <b>{{ $data->category->category_name }}</b> </td>
                                            <td class="align-middle">
                                                <div class="d-flex justify-content-start align-items-center">
                                                    <img src="{{ asset($data->image) }}" alt="" width="80" class="border rounded">
                                                    <div class="ms-2">
                                                        <a href="#" target="_blank"><b>{{ $data->title }}</b></a>
                                                        <small class="d-block"><span class="text-success">Publish at: </span><i>{{ Carbon\Carbon::parse($data->created_at)->format('d-m-Y') }}</i></small>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle">
                                                @if ($data->status == 'publish')
                                                    <span class="badge bg-success">Publish</span>
                                                @else
                                                    <span class="badge bg-secondary">Draft</span>
                                                @endif
                                            </td>
                                            <td class="align-middle">
                                                <form action="{{ route('post.destroy', $data->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{ route('post.edit', $data->id) }}" class="btn btn-sm btn-info mx-1" target="_blank"><i class="fas fa-pencil-alt"></i> Edit</a>
                                                    <button class="btn btn-sm btn-danger mx-1" type="submit"><i class="fa fa-trash"></i> Delete</button>
                                                </form>
                                            </td>
                                        </tr>


                                    @empty
                                        <tr class="text-center">
                                            <td colspan="50">No Data Available</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection
@section('scripts')
    <script src="{{ asset('assets') }}/plugins/dataTable/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/dataTable/js/dataTables.bootstrap4.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/dataTable/js/dataTables.responsive.min.js"></script>
    <script src="{{ asset('assets') }}/plugins/dataTable/js/responsive.bootstrap4.min.js"></script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
@endsection
