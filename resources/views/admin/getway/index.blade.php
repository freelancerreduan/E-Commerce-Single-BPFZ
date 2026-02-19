@extends('admin.layouts.app_admin')
@section('styles')
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/dataTable/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/dataTable/css/responsive.bootstrap4.min.css">
@endsection
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Getway</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item">Getway</li>
                    <li class="breadcrumb-item active">List Getway</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row justify-content-center">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">List Getway</h5>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Account Name</th>
                                        <th>Account Number</th>
                                        <th>Account Type</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($getways as $getway)
                                        <tr>
                                            <td>{{ ++$loop->index }}</td>
                                            <td class="align-middle">
                                                <img src="{{ asset($getway->logo) }}" alt="" class="img-fluid" width="40">
                                                {{ $getway->account_name }}

                                            </td>
                                            <td  class="align-middle">{{ $getway->account_number }}</td>
                                            <td>
                                                <span class="badge bg-primary text-capitalize">{{ $getway->account_type }}</span>
                                            </td>

                                            <td>
                                                <form action="{{ route('payment-getway.destroy', $getway->id) }}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <a href="{{ route('payment-getway.edit', $getway->id) }}" class="btn btn-sm btn-info">Edit</a>
                                                    <button onclick="return confirm('Are you sure you want to delete this item?');" class="btn btn-sm btn-danger" type="submit">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
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
