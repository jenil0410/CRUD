@extends('layouts/contentNavbarLayout')

@section('title', 'Order Create')

@section('content')

    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Update Orders</h5> <small class="text-muted float-end"></small>
            </div>
            <div class="card-body">
                <form action="{{ route('order.update', $id) }}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="order_name">Order item</label>
                        <div class="col-sm-10">
                            <input type="text" id="order_name" class="form-control" placeholder="Enter order name"
                                aria-label="Enter order name" name="oname" value="{{ $order->oname }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="order_status">select item</label>
                        <div class="col-sm-10">
                            <select id="order_status" class="form-control" aria-label="Select order status"
                                name="productid">
                                @foreach ($products as $item)
                                    <option value="{{ $item->id }}" @if ($order->item == 'pname') selected @endif>
                                        {{ $item->pname }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="order_status">select customer</label>
                        <div class="col-sm-10">
                            <select id="order_status" class="form-control" aria-label="Select order status"
                                name="customerid">
                                @foreach ($customer as $custom)
                                    <option value="{{ $custom->id }}" @if ($order->customer == 'fname') selected @endif>
                                        {{ $custom->fname }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">customer email</label>
                        <div class="col-sm-10">
                            <select class="form-control" aria-label="Select order status" name="email">
                                @foreach ($customer as $custom)
                                    <option value="{{ $custom->id }}" @if ($custom == 'email') selected @endif>
                                        {{ $custom->email }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="order_status">Order Status</label>
                        <div class="col-sm-10">
                            <select id="order_status" class="form-control" aria-label="Select order status" name="ostatus">
                                <option value="pending" @if ($order->ostatus == 'pending') selected @endif>Pending</option>
                                <option value="processing" @if ($order->ostatus == 'processing') selected @endif>Processing
                                </option>
                                <option value="shipped" @if ($order->ostatus == 'shipped') selected @endif>Shipped</option>
                                <option value="delivered" @if ($order->ostatus == 'delivered') selected @endif>Delivered
                                </option>
                                <option value="canceled" @if ($order->ostatus == 'canceled') selected @endif>Canceled</option>
                            </select>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="shipping_address">Shipping Address</label>
                        <div class="col-sm-10">
                            <input type="text" id="shipping_address" class="form-control"
                                placeholder="Enter shipping address" aria-label="Enter shipping address" name="saddress"
                                value="{{ $order->saddress }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="billing_address">Billing Address</label>
                        <div class="col-sm-10">
                            <input type="text" id="billing_address" class="form-control"
                                placeholder="Enter billing address" aria-label="Enter billing address" name="baddress"
                                value="{{ $order->baddress }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="total_amount">Total Amount</label>
                        <div class="col-sm-10">
                            <input type="number" id="total_amount" class="form-control" placeholder="Enter total amount"
                                aria-label="Enter total amount" name="tamount" value="{{ $order->tamount }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="total_amount">Total Discount</label>
                        <div class="col-sm-10">
                            <input type="number" id="total_amount" class="form-control" placeholder="Enter total amount"
                                aria-label="Enter total amount" name="discount" value="{{ $order->discount }}">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="discount_amount">Discount Amount</label>
                        <div class="col-sm-10">
                            <input type="number" id="discount_amount" class="form-control"
                                placeholder="Enter discount amount" aria-label="Enter discount amount" name="damount"
                                value="" readonly>
                        </div>
                    </div>



                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
