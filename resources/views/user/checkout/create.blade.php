@extends('layouts.app')
@section('styles')
@include('user.layouts.partials.checkout-css')
@endsection
@section('content')
    <div class="main-page-wrapper">

        <br>
        <!-- MAIN CONTENT AREA -->
        <div class="container">
            <div class="row content-layout-wrapper align-items-start">
                <div class="site-content col-lg-12 col-12 col-md-12" role="main">

                    <article id="post-8" class="post-8 page type-page status-publish hentry">

                        <div class="entry-content">
                            <div class="woocommerce">
                                <form method="POST" class="" action="#" enctype="multipart/form-data" id="checkout-form">
                                    @csrf

                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="customer-details" id="customer_details">
                                                <div class="woocommerce-billing-fields">
                                                    <h3>Billing &amp; Shipping</h3>
                                                    <div class="woocommerce-billing-fields__field-wrapper">
                                                        <p class="form-row form-row-wide  validate-required" id="name_field" data-priority="20">
                                                            <label for="name" class="">Name&nbsp;<abbr class="required" title="required">*</abbr></label>
                                                            <span class="woocommerce-input-wrapper">
                                                                <input type="text" class="input-text " name="name" id="name" placeholder="Enter name" aria-required="true" autocomplete="given-name" value="{{ old('name') }}">
                                                                @error('name')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                    <span class="text-danger" id="nameError"></span>
                                                            </span>
                                                        </p>

                                                        <p class="form-row form-row-wide  validate-required validate-phone validate-phone" id="phone_field" data-priority="90">
                                                            <label for="phone" class="">Phone&nbsp;<abbr class="required" title="required">*</abbr></label>
                                                            <span class="woocommerce-input-wrapper">
                                                                <input type="tel" class="input-text " name="phone" id="phone" placeholder="01*******87" value="{{ old('phone') }}" aria-required="true" autocomplete="tel">
                                                                @error('phone')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                    @enderror
                                                                    <span class="text-danger" id="phoneError"></span>
                                                            </span>
                                                        </p>

                                                        <p class="form-row form-row-wide  validate-email validate-email" id="email_field" data-priority="100">
                                                            <label for="email" class="">Email address&nbsp;<span class="optional">(optional)</span></label>
                                                            <span class="woocommerce-input-wrapper">
                                                                <input type="email" class="input-text" name="email" id="email" placeholder="example@gmail.com" value="{{ old('email') }}" autocomplete="email username">
                                                                @error('email')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                                <span class="text-danger" id="emailError"></span>
                                                            </span>
                                                        </p>

                                                        <p class="form-row form-row-wide address-field validate-required validate-state" id="divition_field" data-priority="70" data-o_class="form-row form-row-wide address-field  validate-required validate-state">
                                                            <label for="divition" class="">Division&nbsp;<abbr class="required" title="required">*</abbr></label>
                                                            <span class="woocommerce-input-wrapper">
                                                                <select name="division" id="divition" required onchange="setDistrict(this)" class="state_select select2-hidden-accessible" aria-required="true" autocomplete="address-level1" data-placeholder="Select an option…" data-input-classes="" data-label="Divition" tabindex="-1" aria-hidden="true">
                                                                    <option value="">Select an option…</option>
                                                                    @foreach ($divisions as $division)
                                                                        <option {{ old('division') == $division->id ? 'selectd' : '' }} value="{{ $division->id }}">{{ $division->name }}</option>
                                                                    @endforeach
                                                                </select>
                                                                @error('divition')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                                <span class="text-danger" id="divitionError"></span>
                                                            </span>
                                                        </p>

                                                        <p class="form-row form-row-wide address-field validate-required validate-state" id="District_field" data-priority="70" data-o_class="form-row form-row-wide address-field  validate-required validate-state">
                                                            <label for="District" class="">District&nbsp;<abbr class="required" title="required">*</abbr></label>
                                                            <span class="woocommerce-input-wrapper">
                                                                <select name="district" id="District" required onchange="getThana(this)" class="state_select disabled select2-hidden-accessible" aria-required="true" autocomplete="address-level1" data-placeholder="Select an option…" data-input-classes="" data-label="Divition" tabindex="-1" aria-hidden="true">
                                                                    <option value="">Select Division first…</option>
                                                                </select>
                                                                @error('district')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                                <span class="text-danger" id="districtError"></span>
                                                            </span>
                                                        </p>

                                                        <p class="form-row form-row-wide address-field validate-required validate-state" id="Thana_field" data-priority="70" data-o_class="form-row form-row-wide address-field  validate-required validate-state">
                                                            <label for="Thana" class="">Thana&nbsp;<abbr class="required" title="required">*</abbr></label>
                                                            <span class="woocommerce-input-wrapper">
                                                                <select name="thana" id="Thana" required class="state_select select2-hidden-accessible" aria-required="true" autocomplete="address-level1" data-placeholder="Select an option…" data-input-classes="" data-label="Divition" tabindex="-1" aria-hidden="true">
                                                                    <option value="">Select District first…</option>
                                                                </select>
                                                                @error('thana')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                                <span class="text-danger" id="thanaError"></span>
                                                            </span>
                                                        </p>

                                                        <p class="form-row form-row-wide  validate-required" id="full_address_field" data-priority="20">
                                                            <label for="full_address" class="">Full Address&nbsp;<abbr class="required" title="required">*</abbr></label>
                                                            <span class="woocommerce-input-wrapper">
                                                                <input type="text" class="input-text " name="full_address" id="full_address" placeholder="House no, road no, thana, district" value="" aria-required="true" autocomplete="given-full_address">
                                                                @error('full_address')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                                <span class="text-danger" id="full_addressError"></span>
                                                            </span>
                                                        </p>

                                                        <p class="form-row form-row-wide address-field validate-required validate-state" id="divition_field" data-priority="70" data-o_class="form-row form-row-wide address-field  validate-required validate-state">
                                                            <label for="delivary_zone" class="">Delivary Zone&nbsp;<abbr class="required" title="required">*</abbr></label>
                                                            <span class="woocommerce-input-wrapper">
                                                                <select name="delivary_zone" id="delivary_zone" required onchange="setShippingCharge(this)" class="state_select select2-hidden-accessible" aria-required="true" data-placeholder="Select an option…" data-input-classes="" >
                                                                    <option value="">Select an option…</option>
                                                                    <option value="100">Inside Dhaka 100tk</option>
                                                                    <option value="150">Outside Dhaka 150tk</option>
                                                                </select>
                                                                @error('delivary_zone')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                                <span class="text-danger" id="delivary_zoneError"></span>
                                                            </span>
                                                        </p>


                                                    </div>
                                                </div>

                                                <div class="woocommerce-shipping-fields"> </div>
                                                <div class="woocommerce-additional-fields">


                                                    <br>
                                                    <h3>Additional information</h3>


                                                    <div class="woocommerce-additional-fields__field-wrapper">
                                                        <p class="form-row form-row-wide notes " id="order_comments_field" data-priority="20">
                                                            <label for="order_comments" class="">Order notes&nbsp;<span class="optional">(optional)</span></label>
                                                            <span class="woocommerce-input-wrapper">
                                                                <textarea name="order_comments" class="input-text " id="order_comments" placeholder="Notes about your order, e.g. special notes for delivery." rows="2" cols="5"></textarea>
                                                            </span>
                                                        </p>
                                                    </div>


                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="checkout-order-review">

                                                <h3 id="order_review_heading">Your order</h3>


                                                <div id="order_review" class="woocommerce-checkout-review-order" style="position: relative; margin-bottom: 40px; padding: 30px; background-color: var(--bgcolor-gray-200);">
                                                    <div class="wd-table-wrapper">
                                                        <table class="shop_table woocommerce-checkout-review-order-table">
                                                            <thead>
                                                                <tr>
                                                                    <th class="product-name">Product</th>
                                                                    <th class="product-total">Subtotal</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                @php
                                                                    $subTotal = 0;
                                                                @endphp
                                                                @foreach ($carts as $data)
                                                                    <tr class="cart_item">
                                                                        <td class="product-name"> {{ $data->product->title }} - {{ $data->size }}&nbsp; <strong class="product-quantity">×&nbsp;{{ $data->quantity }}</strong> </td>
                                                                        <td class="product-total">
                                                                            @php
                                                                                $subTotal += ($data->product->price * $data->quantity);
                                                                            @endphp
                                                                            <span class="woocommerce-Price-amount amount"><bdi>{{ $data->product->price * $data->quantity }}<span class="woocommerce-Price-currencySymbol">৳</span></bdi></span>
                                                                        </td>
                                                                    </tr>
                                                                    <input type="hidden" name="carts[]" value="{{ $data->id }}">
                                                                @endforeach
                                                            </tbody>
                                                            <tfoot>

                                                                <tr class="cart-subtotal">
                                                                    <th>Subtotal</th>
                                                                    <td>
                                                                        <span class="woocommerce-Price-amount amount"><bdi>{{ $subTotal }}<span class="woocommerce-Price-currencySymbol">৳</span></bdi></span>
                                                                    </td>
                                                                </tr>
                                                                        @php
                                                                            $discountAmount = Session::get('discountAmount');
                                                                            $couponName = Session::get('couponName');
                                                                            $total = $subTotal - $discountAmount;
                                                                        @endphp
                                                                <tr class="cart-subtotal">
                                                                    <th>Discount ({{ $couponName ?? 'N/A' }})</th>
                                                                    <td>
                                                                        <span class="woocommerce-Price-amount amount"><bdi>{{ $discountAmount ?? 0 }}<span class="woocommerce-Price-currencySymbol">৳</span></bdi></span>
                                                                    </td>
                                                                </tr>
                                                                <tr class="cart-subtotal">
                                                                    <th>Shipping Charge</th>
                                                                    <td>
                                                                        <span class="woocommerce-Price-amount amount"><bdi><span class="shippingtCharge">00</span><span class="woocommerce-Price-currencySymbol">৳</span></bdi></span>
                                                                    </td>
                                                                </tr>

                                                                <input type="hidden" required name="sub_total" value="{{ $subTotal }}">
                                                                <input type="hidden" required name="discount" value="{{ $discountAmount }}">
                                                                <input type="hidden" required name="coupon_name" value="{{ $couponName }}">
                                                                <input type="hidden" required class="shippingtCharge" name="shipping" value="">
                                                                <input type="hidden" required name="total" id="totalInput" value="{{ $total }}">

                                                                <tr class="order-total">
                                                                    <th>Total</th>
                                                                    <td><strong>
                                                                        <span class="woocommerce-Price-amount amount"><bdi><span id="totalAmount">{{ $total }}</span><span class="woocommerce-Price-currencySymbol">৳</span></bdi></span>
                                                                    </strong>
                                                                    </td>
                                                                </tr>


                                                            </tfoot>
                                                        </table>

                                                    </div><!-- .wd-table-wrapper -->



                                                    <div id="payment" class="woocommerce-checkout-payment">
                                                        <div class="form-row place-order">
                                                            <h4 class="text-uppercase">Payment Option</h4>
                                                            <div class="row justify-content-center">
                                                                @forelse ($getways as $getway)
                                                                    <div class="col-lg-2 col-md-3 col-4 mb-3">
                                                                        <div class="card custom-card {{ old('getway_id') == $getway->id ? 'active' : '' }}" data-id="{{ $getway->id }}" data-ac-name="{{ $getway->account_name }}" data-step="{{ $getway->step }}" onclick="setGetway(this)">
                                                                            <img src="{{asset($getway->logo)}}" alt="{{ $getway->account_name }}">
                                                                        </div>
                                                                    </div>
                                                                @empty
                                                                    <div class="text-center">
                                                                        <p class="text-danger">No Payment Getway</p>
                                                                    </div>
                                                                @endforelse

                                                                <div id="payment-details-area">
                                                                    <h4 class="text-uppercase">Payment With <span id="accountName" style="color: #BC6176;">Bkash</span></h4>
                                                                    <div id="step"></div>
                                                                    <input type="hidden" id="getwayId" name="getway_id" required value="{{ old('getway_id') }}">

                                                                    <div class="row">
                                                                        <div class="form-group mb-3">
                                                                            <label for="amount">Amount</label>
                                                                            <input type="text" class="from-control" placeholder="Enter amount" value="{{ old('amount') }}" id="amount" name="amount">
                                                                            @error('amount')
                                                                                <span class="text-danger">{{ $message }}</span>
                                                                            @enderror
                                                                            <span class="text-danger" id="amountError"></span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="form-group mb-3">
                                                                            <label for="amount">Sender Number</label>
                                                                            <input type="text" class="from-control" placeholder="Enter sender number" value="{{ old('sender_number') }}" id="sender_number" name="sender_number">
                                                                            @error('sender_number')
                                                                                <span class="text-danger">{{ $message }}</span>
                                                                            @enderror
                                                                            <span class="text-danger" id="sender_numberError"></span>
                                                                        </div>
                                                                    </div>

                                                                    <div class="row">
                                                                        <div class="form-group mb-3">
                                                                            <label for="transaction_id">Trx ID</label>
                                                                            <input type="text" class="from-control" placeholder="Enter transaction id" value="{{ old('transaction_id') }}" id="transaction_id" name="transaction_id">
                                                                            @error('transaction_id')
                                                                                <span class="text-danger">{{ $message }}</span>
                                                                            @enderror
                                                                            <span class="text-danger" id="transaction_idError"></span>
                                                                        </div>
                                                                    </div>
                                                                </div>


                                                            </div>

                                                            @if (count($getways) > 0)
                                                                <button type="submit" class="button alt d-none" id="place_order">Pay with &nbsp;  <span id="account-btn"> </span></button>
                                                            @endif



                                                        </div>
                                                    </div>

                                                </div>


                                            </div>
                                        </div>
                                    </div>





                                </form>

                            </div>
                        </div>


                    </article>

                </div><!-- .site-content -->
            </div><!-- .main-page-wrapper -->
        </div>
    </div>
@endsection
@section('scripts')
<script>
    function setShippingCharge(sh){
        var zone = parseInt($(sh).val());
        var total = parseInt({{ $total }});
        $('.shippingtCharge').text(zone);
        $('.shippingtCharge').val(zone);
        $('#totalInput').val(zone+total);
        $('#totalAmount').text(zone+total);


    }
    function setDistrict(dis) {
        var divisionId = $(dis).val();
        $.ajax({
            type: 'POST',
            url: '{{ route('user.getDistrict') }}',
            data: {
                divisionId: divisionId
            },
            success: function(data) {
                $('#District').html(data);
            },
        });
    }

    function getThana(tha) {
        var districtId = $(tha).val();
        $.ajax({
            type: 'POST',
            url: '{{ route('user.gettThana') }}',
            data: {
                districtId: districtId
            },
            success: function(data) {
                $('#Thana').html(data);
            },
        });
    }




    $('#payment-details-area').hide();
    function setGetway(el) {
        $('.custom-card').removeClass('active');
        $(el).addClass('active');
        var acName = $(el).attr('data-ac-name');
        var getwayId = $(el).attr('data-id');
        var step = $(el).attr('data-step');
        $('#payment-details-area').slideDown();
        $('#accountName').text(acName);
        $('#step').html(step);
        $('#place_order').removeClass('d-none');
        $('#account-btn').text(acName);
        $('#getwayId').val(getwayId);
    }
</script>

<script>
    $('#checkout-form').submit(function(e){
        e.preventDefault();

        function clearData()
        {
            $('#nameError').text('');
            $('#phoneError').text('');
            $('#emailError').text('');
            $('#divitionError').text('');
            $('#districtError').text('');
            $('#thanaError').text('');
            $('#full_addressError').text('');
            $('#delivary_zoneError').text('');
            $('#amountError').text('');
            $('#sender_numberError').text('');
            $('#transaction_idError').text('');
        }

        $.ajax({
            type:'POST',
            processData: false,
            contentType: false,
            cache: false,
            enctype: 'multipart/form-data',
            url:'{{ route('user.checkout.store') }}',
            cache: false,
            data:new FormData(this),
            success:function(data){
                $('#name').val('');
                $('#phone').val('');
                $('#email').val('');
                $('#divition').val('');
                $('#district').val('');
                $('#thana').val('');
                $('#full_address').val('');
                $('#delivary_zone').val('');
                $('#amount').val('');
                $('#sender_number').val('');
                $('#transaction_id').val('');
                clearData();

                toastr.success('Order Submited Successfully');
                var seconds = 3;
                setInterval(function () {
                    seconds--;
                    $("#lblCount").html(seconds);
                    if (seconds == 0) {
                        $("#dvCountDown").hide();
                        window.location = "{{ route('frontend.index') }}";
                    }
                }, 1000);
            },error:function(error)
            {
                clearData();
                $('#nameError').text(error.responseJSON.errors.name);
                $('#phoneError').text(error.responseJSON.errors.phone);
                $('#emailError').text(error.responseJSON.errors.email);
                $('#divitionError').text(error.responseJSON.errors.divition);
                $('#districtError').text(error.responseJSON.errors.district);
                $('#thanaError').text(error.responseJSON.errors.thana);
                $('#full_addressError').text(error.responseJSON.errors.full_address);
                $('#delivary_zoneError').text(error.responseJSON.errors.delivary_zone);
                $('#amountError').text(error.responseJSON.errors.amount);
                $('#sender_numberError').text(error.responseJSON.errors.sender_number);
                $('#transaction_idError').text(error.responseJSON.errors.transaction_id);
            }
        });
    });


</script>


@if (old('amount') || old('sender_number') || old('transaction_id'))
    <script>
        $('#payment-details-area').show();
    </script>

@else
    <script>
        $('#payment-details-area').hide();
    </script>
@endif
@endsection
