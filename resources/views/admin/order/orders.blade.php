@extends('admin.layouts.app_admin')
@section('styles')
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/dataTable/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="{{ asset('assets') }}/plugins/dataTable/css/responsive.bootstrap4.min.css">
@endsection
@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Orders</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item">Orders</li>
                    <li class="breadcrumb-item active">Pending Orders</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row justify-content-center">
                <div class="col-lg-12">

                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Pending Orders</h5>
                            <table class="table table-bordered table-striped mb-0" id="example1">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Date/Time</th>
                                        <th>User</th>
                                        <th>Invoice ID</th>
                                        <th>Sub Total</th>
                                        <th>C. Discount</th>
                                        <th>D. Zone</th>
                                        <th>Shipping</th>
                                        <th>Total</th>
                                        <th>C. Name</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($datas as $key => $data)
                                        <tr id="remove{{ $data->id }}">
                                            <td class="align-middle">{{ $key < 9 ? '0' . ++$key : ++$key }}</td>
                                            <td class="align-middle">
                                                {{ Carbon\Carbon::parse($data->created_at)->format('d-M-Y | g:i a') }}

                                            </td>
                                            <td class="align-middle"><b> {{ $data->user->name }}</b></td>
                                            <td class="align-middle fw-bold">#{{ $data->invoice_id }}</td>
                                            <td class="align-middle">{{ $data->sub_total }} tk</td>
                                            <td class="align-middle">{{ $data->discount ?? 'N/A' }} tk</td>
                                            <td class="align-middle">{{ $data->shipping == 100 ? 'Inside Dhaka' : 'OutSide Dhaka' }}</td>
                                            <td class="align-middle">{{ $data->shipping }} tk</td>
                                            <td class="align-middle">{{ $data->total }} tk</td>
                                            <td class="align-middle">{{ $data->coupon_name ?? 'N/A' }}</td>
                                            <td class="align-middle text-center">
                                                <span class="badge bg-info text-capitalize" id="status{{ $data->id }}">{{ $data->status }}</span>
                                                @if (Request::url() != route('admin.checkout.completed') && Request::url() != route('admin.checkout.rejected') && Request::url() != route('admin.checkout.canceled') && Request::url() != route('admin.checkout.return'))
                                                    <form action="#" class="mt-2">
                                                        <select onchange="updateStatus(this)"
                                                            data-order-id="{{ $data->id }}">
                                                            @if ($data->status != 'confirmed')
                                                                <option {{ $data->status == 'pending' ? 'selected' : '' }} value="pending">Pending</option>
                                                            @endif

                                                            <option {{ $data->status == 'confirmed' ? 'selected' : '' }} value="confirmed">Confirmed</option>
                                                            <option {{ $data->status == 'rejected' ? 'selected' : '' }} value="rejected">Rejected</option>
                                                            <option {{ $data->status == 'canceled' ? 'selected' : '' }} value="canceled">Canceled</option>
                                                            <option {{ $data->status == 'return' ? 'selected' : '' }} value="return">Return</option>
                                                            <option {{ $data->status == 'completed' ? 'selected' : '' }} value="completed">Completed</option>
                                                        </select>
                                                    </form>
                                                @endif
                                            </td>
                                            <td class="align-middle">
                                                <button type="button" data-bs-toggle="modal"
                                                    data-bs-target="#obd{{ $key }}"
                                                    class="btn btn-sm btn-primary">O. B. D</button>
                                                <button type="button" data-bs-toggle="modal"
                                                    data-bs-target="#oi{{ $key }}"
                                                    class="btn btn-sm btn-primary">O. I</button>
                                                <button type="button" data-bs-toggle="modal"
                                                    data-bs-target="#opd{{ $key }}"
                                                    class="btn btn-sm btn-primary">O. Pay. D</button>
                                            </td>


                                        </tr>
                                        <!-- obd Modal -->
                                        <div class="modal fade" id="obd{{ $key }}" tabindex="-1"
                                            aria-labelledby="obd{{ $key }}" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="obd{{ $key }}title"><b>
                                                                {{ $data->user->name }}'s</b> Order Billing Details</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <div class="row mb-2 border-bottom">
                                                            <div class="col-lg-6">
                                                                <p><b>Name:</b></p>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p>{{ getOBD($data->id)->name }}</p>
                                                            </div>
                                                        </div>

                                                        <div class="row mb-2 border-bottom">
                                                            <div class="col-lg-6">
                                                                <p><b>Phone Number:</b></p>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p><a href="tel:{{ getOBD($data->id)->phone }}"
                                                                        title="Click to open dialpad">{{ getOBD($data->id)->phone }}</a>
                                                                </p>
                                                            </div>
                                                        </div>

                                                        <div class="row mb-2 border-bottom">
                                                            <div class="col-lg-6">
                                                                <p><b>Email Address:</b></p>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p><a href="mailto:{{ getOBD($data->id)->email ?? 'N/A' }}"
                                                                        title="Click to open gmail">{{ getOBD($data->id)->email ?? 'N/A' }}</a>
                                                                </p>
                                                            </div>
                                                        </div>

                                                        <div class="row mb-2 border-bottom">
                                                            <div class="col-lg-6">
                                                                <p><b>Division:</b></p>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p>{{ getDivision(getOBD($data->id)->division_id)->name }}
                                                                </p>
                                                            </div>
                                                        </div>

                                                        <div class="row mb-2 border-bottom">
                                                            <div class="col-lg-6">
                                                                <p><b>District:</b></p>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p>{{ getDistrict(getOBD($data->id)->district_id)->name }}
                                                                </p>
                                                            </div>
                                                        </div>

                                                        <div class="row mb-2 border-bottom">
                                                            <div class="col-lg-6">
                                                                <p><b>Thana:</b></p>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p>{{ getThana(getOBD($data->id)->thana_id)->name }}</p>
                                                            </div>
                                                        </div>

                                                        <div class="row mb-2 border-bottom">
                                                            <div class="col-lg-6">
                                                                <p><b>Full Address:</b></p>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p>{{ getOBD($data->id)->full_address }}</p>
                                                            </div>
                                                        </div>

                                                        <div class="row mb-2 ">
                                                            <div class="col-lg-6">
                                                                <p><b>Additional Info:</b></p>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p>{{ getOBD($data->id)->addition_info ?? 'N/A' }}</p>
                                                            </div>
                                                        </div>




                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <!-- oi Modal -->
                                        <div class="modal fade" id="oi{{ $key }}" tabindex="-1"
                                            aria-labelledby="oi{{ $key }}" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="oi{{ $key }}title"><b>
                                                                {{ $data->user->name }}'s</b> Order Items
                                                            ({{ count(getOrderItems($data->id)) }})</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">

                                                        @foreach (getOrderItems($data->id) as $item)
                                                            <div
                                                                class="d-flex justify-content-between align-items-center mb-2 border-bottom">
                                                                <p>
                                                                    <img src="{{ asset($item->product->thumbnails) }}" alt="" class="img-fluid border rounded" width="50">
                                                                     {{ $item->product->title ?? '(N/A)' }} - {{ $item->verient->size ?? '(N/A)' }} * {{ $item->qty ?? '(N/A)' }}</p>
                                                                <p class="fw-bold">
                                                                    {{ $item->product->price * $item->qty }} tk</p>
                                                            </div>
                                                        @endforeach




                                                        <div
                                                            class="d-flex justify-content-between align-items-center mb-2">
                                                            <p class="fw-bold" style="font-size: 18px"><b>Sub Total: </b>
                                                            </p>
                                                            <p class="fw-bold" style="font-size: 18px">
                                                                {{ $data->sub_total }} tk</p>
                                                        </div>

                                                        <div
                                                            class="d-flex justify-content-between align-items-center mb-2">
                                                            <p class="fw-bold" style="font-size: 18px"><b>Discount
                                                                    ({{ $data->coupon_name ?? 'N/A' }}): </b></p>
                                                            <p class="fw-bold" style="font-size: 18px">
                                                                {{ $data->discount ?? 0 }} tk</p>
                                                        </div>

                                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                                            <p class="fw-bold" style="font-size: 18px"><b>Shipping Charge: </b></p>
                                                            <p class="fw-bold" style="font-size: 18px">
                                                                {{ $data->shipping }} tk</p>
                                                        </div>

                                                        <div
                                                            class="d-flex justify-content-between align-items-center mb-2">
                                                            <p class="fw-bold text-success" style="font-size: 18px">
                                                                <b>Total: </b></p>
                                                            <p class="fw-bold" style="font-size: 18px">
                                                                {{ $data->total }} tk</p>
                                                        </div>

                                                        <div
                                                            class="d-flex justify-content-between align-items-center mb-2">
                                                            <p>&nbsp;</p>
                                                            @if ($data->status == 'completed')
                                                                <p class="fw-bold" style="font-size: 18px"> <span
                                                                        class="badge badge-lg bg-success">Paid</span></p>
                                                            @else
                                                                <p class="fw-bold" style="font-size: 18px"> <span
                                                                        class="badge badge-lg bg-secondary">Unpaid</span>
                                                                </p>
                                                            @endif
                                                        </div>



                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <!-- opd Modal -->
                                        <div class="modal fade" id="opd{{ $key }}" tabindex="-1"
                                            aria-labelledby="opd{{ $key }}" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="opd{{ $key }}title"><b>
                                                                {{ $data->user->name }}'s</b> Order Payment Info</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">

                                                        <div class="row mb-2 border-bottom">
                                                            <div class="col-lg-6">
                                                                <p><b>Date/Time:</b></p>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p>{{ Carbon\Carbon::parse(getGetway($data->id)->created_at)->format('d-M-Y | g:i a') }}
                                                                </p>
                                                            </div>
                                                        </div>

                                                        <div class="row mb-2 border-bottom">
                                                            <div class="col-lg-6">
                                                                <p><b>Method:</b></p>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p>{{ getGetway($data->id)->getway->account_name }}</p>
                                                            </div>
                                                        </div>

                                                        <div class="row mb-2 border-bottom">
                                                            <div class="col-lg-6">
                                                                <p><b>Sender Number:</b></p>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p><a
                                                                        href="tel:{{ getGetway($data->id)->sender_number }}">{{ getGetway($data->id)->sender_number }}</a>
                                                                </p>
                                                            </div>
                                                        </div>

                                                        <div class="row mb-2 border-bottom">
                                                            <div class="col-lg-6">
                                                                <p><b>Trx ID:</b></p>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p>{{ getGetway($data->id)->trx_id }}</p>
                                                            </div>
                                                        </div>

                                                        <div class="row mb-2 border-bottom">
                                                            <div class="col-lg-6">
                                                                <p><b>Amount:</b></p>
                                                            </div>
                                                            <div class="col-lg-6">
                                                                <p>{{ getGetway($data->id)->amount }} tk</p>
                                                            </div>
                                                        </div>



                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

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

        function updateStatus(el) {
            var orderId = $(el).attr('data-order-id');
            var status = $(el).val();
            $.ajax({
                type: 'POST',
                url: '{{ route('admin.order.status') }}',
                data: {
                    orderId: orderId,
                    status:status
                },
                success: function(data) {
                    $('#status'+orderId).text(status);
                    $('#remove'+orderId).remove();
                    toastr.success('Updated Successfully');
                },
            });

        }
    </script>
@endsection
