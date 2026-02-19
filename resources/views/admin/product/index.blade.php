@extends('admin.layouts.app_admin')
@section('styles')
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/dataTable/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/dataTable/css/responsive.bootstrap4.min.css">
@endsection
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Products</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item">Products</li>
                    <li class="breadcrumb-item active">List Products</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row justify-content-center">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">List Products</h5>
                            <table class="table table-bordered table-striped mb-0" id="example1">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Category</th>
                                        <th>Product</th>
                                        <th>Size/Stock</th>
                                        <th>SKU</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($datas as $key => $data)
                                        <tr>
                                            <td class="align-middle">{{ $key < 9 ? '0' . ++$key : ++$key }}</td>
                                            <td class="align-middle">
                                                <b> {{ $data->category->category_name }}</b>
                                            </td>
                                            <td class="align-middle">
                                                <div class="d-flex justify-content-start align-items-center">
                                                    <img src="{{ asset($data->thumbnails) }}" alt="" style="width:60px;" class="border rounded p-1 me-2">
                                                    <div>
                                                        <b class="d-block"> {{ $data->title }}</b>
                                                        <span class="d-block"><b>Price: </b> <span class="text-success">{{ $data->price }}</span> <small class="text-danger"><del>{{ $data->old_price }} tk</del></small></span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="align-middle">
                                                <div class="d-flex justify-content-start align-items-center">
                                                    <div class="border p-1 m-1 text-center">
                                                        <span class="d-block border-bottom">Size:</span>
                                                        <span class="d-block">Stock</span>
                                                    </div>
                                                    @foreach (getSizes($data->id) as $size)
                                                        <div class="border p-1 m-1 text-center">
                                                            <span class="d-block border-bottom {{ $size->stock > 5 ? 'text-success' : 'text-danger' }}">{{ $size->size }}</span>
                                                            <span class="d-block {{ $size->stock > 5 ? 'text-success' : 'text-danger' }}">{{ $size->stock }}</span>
                                                        </div>
                                                    @endforeach
                                                </div>
                                            </td>
                                            <td class="align-middle">{{ $data->sku }}</td>
                                            <td class="align-middle">
                                                <form action="{{ route('product.destroy', $data->id) }}" method="POST" class="text-nowrap">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{ route('product.edit', $data->id) }}" class="btn btn-info btn-sm mx-1" target="_blank">Edit</a>
                                                    <button onclick="return confirm('Are you sure you want to delete this item?');" type="submit" class="btn btn-sm btn-danger">Delete</button>
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
