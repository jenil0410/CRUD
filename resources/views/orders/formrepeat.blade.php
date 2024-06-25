@extends('layouts/contentNavbarLayout')

@section('title', 'Tables - Basic Tables')

@section('content')


    <div class="container">

        <div class="col-12">
            <div class="card">
                <h5 class="card-header">Form Repeater</h5>
                <div class="card-body">
                   
                        <div data-repeater-list="group-a">

                            <div data-repeater-item="" style="">
                                <div class="row g-5">

                                    <div class="col-lg-6 col-xl-3 col-12 mb-0" style="width: 20%">
                                        <div class="form-floating form-floating-outline">
                                            <input type="text" id="order_name" class="form-control"
                                                placeholder="Enter order name" aria-label="Enter order name" name="oname">
                                            <label for="form-repeater-1-1">Order Item</label>
                                            @foreach ($errors->get('oname') as $error)
                                                <small class="text-red">*{{ $error }}</small>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-xl-2 col-12 mb-0" style="width: 20%">
                                        <div class="form-floating form-floating-outline">
                                            <select id="order_status" class="form-control" aria-label="Select order status"
                                                name="productid">
                                                @foreach ($products as $item)
                                                    <option value="{{ $item->id }}"
                                                        @if ($item == 'pname') selected @endif>
                                                        {{ $item->pname }}</option>
                                                @endforeach
                                            </select>
                                            <label for="form-repeater-1-3">select item</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-xl-2 col-12 mb-0" style="width: 20%">
                                        <div class="form-floating form-floating-outline">
                                            <select class="form-control" aria-label="Select order status" name="customerid">
                                                @foreach ($customer as $custom)
                                                    <option value="{{ $custom->id }}"
                                                        @if ($custom == 'fname') selected @endif>
                                                        {{ $custom->fname }}</option>
                                                @endforeach
                                            </select>
                                            <label for="form-repeater-1-3">select customer</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-xl-2 col-12 mb-0" style="width: 20%">
                                        <div class="form-floating form-floating-outline">
                                            <select class="form-control" aria-label="Select order status" name="customerid">
                                                @foreach ($customer as $custom)
                                                    <option value="{{ $custom->id }}"
                                                        @if ($custom == 'email') selected @endif>
                                                        {{ $custom->email }}</option>
                                                @endforeach
                                            </select>
                                            <label for="form-repeater-1-3">customer email</label>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-xl-2 col-12 mb-0" style="width: 20%">
                                        <div class="form-floating form-floating-outline">
                                            <select id="order_status" class="form-control" aria-label="Select order status"
                                                name="ostatus">
                                                <option value="pending">Pending</option>
                                                <option value="processing">Processing</option>
                                                <option value="shipped">Shipped</option>
                                                <option value="delivered">Delivered</option>
                                                <option value="canceled">Canceled</option>
                                            </select>
                                            <label for="order_status">Order Status</label>
                                            @foreach ($errors->get('onstatus') as $error)
                                                <small class="text-red">*{{ $error }}</small>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-xl-3 col-12 mb-0" style="width: 20%">
                                        <div class="form-floating form-floating-outline">
                                            <input type="text" id="shipping_address" class="form-control"
                                                placeholder="Enter shipping address" aria-label="Enter shipping address"
                                                name="saddress">
                                            <label for="shipping_address">Shipping Address</label>
                                            @foreach ($errors->get('saddress') as $error)
                                                <small class="text-red">*{{ $error }}</small>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-xl-3 col-12 mb-0" style="width: 20%">
                                        <div class="form-floating form-floating-outline">
                                            <input type="text" id="billing_address" class="form-control"
                                                placeholder="Enter billing address" aria-label="Enter billing address"
                                                name="baddress">
                                            <label for="billing_address">Billing Address</label>
                                            @foreach ($errors->get('baddress') as $error)
                                                <small class="text-red">*{{ $error }}</small>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-xl-3 col-12 mb-0" style="width: 20%">
                                        <div class="form-floating form-floating-outline">
                                            <input type="number" id="tamount" class="form-control"
                                                placeholder="Enter total amount" aria-label="Enter total amount"
                                                name="tamount">
                                            <label for="tamount">Total Amount</label>
                                            @foreach ($errors->get('tamount') as $error)
                                                <small class="text-red">*{{ $error }}</small>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-xl-3 col-12 mb-0" style="width: 20%">
                                        <div class="form-floating form-floating-outline">
                                            <input type="number" id="discount" class="form-control"
                                                placeholder="Enter total amount" aria-label="Enter total amount"
                                                name="discount">
                                            <label for="discount">Total Discount</label>
                                            @foreach ($errors->get('discount') as $error)
                                                <small class="text-red">*{{ $error }}</small>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-xl-3 col-12 mb-0" style="width: 20%">
                                        <div class="form-floating form-floating-outline">
                                            <input type="number" id="damount" class="form-control"
                                                placeholder="Enter discount amount" aria-label="Enter discount amount"
                                                name="damount" readonly onclick="calculatediscount()">
                                            <label for="damount">Discount Amount</label>
                                            @foreach ($errors->get('damount') as $error)
                                                <small class="text-red">*{{ $error }}</small>
                                            @endforeach
                                        </div>
                                    </div>


                                    {{-- <div class="col-lg-12 col-xl-2 col-12 d-flex align-items-center mb-0">
                                        <button class="btn btn-xl btn-outline-danger waves-effect"
                                            data-repeater-delete="">
                                            <i class="ri-close-line ri-24px me-1"></i>
                                            <span class="align-middle">Delete</span>
                                        </button>
                                    </div> --}}
                                </div>
                                <hr>
                            </div>
                        </div>

                        <div class="mb-0">
                            <button type="submit" class="btn btn-primary">Send</button>
                            <button class="btn btn-primary waves-effect waves-light" data-repeater-create="">
                                <i class="ri-add-line me-1"></i>
                                <span class="align-middle">Add</span>
                            </button>
                            <button class="btn btn-xl btn-outline-danger waves-effect"
                                            data-repeater-delete="">
                                            <i class="ri-close-line ri-24px me-1"></i>
                                            <span class="align-middle">Delete</span>
                                        </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
