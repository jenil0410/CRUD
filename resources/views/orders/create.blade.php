@extends('layouts.contentNavbarLayout')

@section('title', 'Order Form')

@section('style')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <style>
        .text-red {
            color: red;
        }
    </style>
@endsection

@section('content')
    <div class="container">
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Add Orders</h5>
                    <small class="text-muted float-end"></small>
                </div>
                <div class="card-body">
                    <form id="rp" action="{{ route('order.store') }}" method="POST">
                        @csrf
                        <div class="repeaterContainer" data-repeater-list="group-a">
                            <div class="repeater-item" data-repeater-item>
                                <div class="row g-5">
                                    <div class="col-lg-6 col-xl-3 col-12 mb-0" style="width: 20%">
                                        <div class="form-floating form-floating-outline">
                                            <input type="text" class="form-control" placeholder="Enter order name"
                                                aria-label="Enter order name" name="oname[]">
                                            @error('oname.*')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                            <label>Order Item</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-xl-2 col-12 mb-0" style="width: 20%">
                                        <div class="form-floating form-floating-outline">
                                            <select class="form-control" aria-label="Select order status"
                                                name="productid[]" data-placeholder="Select Item">
                                                {{-- <option value="" selected disabled>Select Item</option> --}}
                                                @foreach ($products as $item)
                                                    <option value="{{ $item->id }}">{{ $item->pname }}</option>
                                                @endforeach
                                            </select>
                                            <label>Select Item</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-xl-2 col-12 mb-0" style="width: 20%">
                                        <div class="form-floating form-floating-outline">
                                            <select class="form-control" aria-label="Select order status"
                                                name="customerid[]">
                                                @foreach ($customer as $custom)
                                                    <option value="{{ $custom->id }}">{{ $custom->fname }}</option>
                                                @endforeach
                                            </select>
                                            <label>Select Customer</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-xl-2 col-12 mb-0" style="width: 20%">
                                        <div class="form-floating form-floating-outline">
                                            <select class="form-control" aria-label="Select order status"
                                                name="customerid[]">
                                                @foreach ($customer as $custom)
                                                    <option value="{{ $custom->id }}">{{ $custom->email }}</option>
                                                @endforeach
                                            </select>
                                            <label>Customer Email</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-xl-2 col-12 mb-0" style="width: 20%">
                                        <div class="form-floating form-floating-outline">
                                            <select class="form-control" aria-label="Select order status" name="ostatus[]">
                                                <option value="pending">Pending</option>
                                                <option value="processing">Processing</option>
                                                <option value="shipped">Shipped</option>
                                                <option value="delivered">Delivered</option>
                                                <option value="canceled">Canceled</option>
                                            </select>
                                            @error('ostatus.*')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                            <label>Order Status</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-xl-3 col-12 mb-0" style="width: 20%">
                                        <div class="form-floating form-floating-outline">
                                            <input type="text" class="form-control" placeholder="Enter shipping address"
                                                aria-label="Enter shipping address" name="saddress[]">
                                            @error('saddress.*')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                            <label>Shipping Address</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-xl-3 col-12 mb-0" style="width: 20%">
                                        <div class="form-floating form-floating-outline">
                                            <input type="text" class="form-control" placeholder="Enter billing address"
                                                aria-label="Enter billing address" name="baddress[]">
                                            @error('baddress.*')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                            <label>Billing Address</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-xl-3 col-12 mb-0" style="width: 20%">
                                        <div class="form-floating form-floating-outline">
                                            <input type="number" class="form-control" placeholder="Enter total amount"
                                                aria-label="Enter total amount" name="tamount[]" id="tamount">
                                            @error('tamount.*')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                            <label>Total Amount</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-xl-3 col-12 mb-0" style="width: 20%">
                                        <div class="form-floating form-floating-outline">
                                            <input type="number" class="form-control" placeholder="Enter total discount"
                                                aria-label="Enter total discount" name="discount[]" id="discount">
                                            @error('discount.*')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                            <label>Total Discount (%)</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-xl-3 col-12 mb-0" style="width: 20%">
                                        <div class="form-floating form-floating-outline">
                                            <input type="number" class="form-control" placeholder="Discount Amount"
                                                aria-label="Discount Amount" name="damount[]" id="damount" readonly
                                                onclick="calculatediscount()">
                                            @error('damount.*')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                            <label>Discount Amount</label>
                                        </div>
                                    </div>
                                    {{-- <div class="col-lg-12 col-xl-2 col-12 d-flex align-items-center mb-0">
                                        <button class="btn btn-xl btn-outline-danger waves-effect del" data-repeater-delete>
                                            <i class="ri-close-line ri-24px me-1"></i>
                                            <span>Delete</span>
                                        </button> --}}
                                    <div id="nw" class="ml-2 my-4">
                                        <button class="btn btn-primary waves-effect waves-light add" data-repeater-create>
                                            <i class="ri-add-line me-1"></i>
                                            <span>Add</span>
                                        </button>
                                    </div>
                                </div>
                                <div class="mb-0">
                                    <button type="submit" class="btn btn-primary sub">Send</button>
                                </div>
                            </div>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    {{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.repeater/1.2.1/jquery.repeater.min.js"></script> --}}
   
    <script>
        $(document).ready(function() {
            $(".add").click(function(e) {
                e.preventDefault();
                $(".repeater-item").prepend(`<div class="row g-5">
                                    <div class="col-lg-6 col-xl-3 col-12 mb-0" style="width: 20%">
                                        <div class="form-floating form-floating-outline">
                                            <input type="text" class="form-control oname" placeholder="Enter order name"
                                                aria-label="Enter order name" name="oname[]" required>
                                                @error('oname.*')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                            <label>Order Item</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-xl-2 col-12 mb-0" style="width: 20%">
                                        <div class="form-floating form-floating-outline">
                                            <select class="form-control" aria-label="Select order status" name="productid[]">
                                                @foreach ($products as $item)
                                                    <option value="{{ $item->id }}">{{ $item->pname }}</option>
                                                    @endforeach
                                            </select>
                                            <label>Select Item</label>
                                            </div>
                                    </div>
                                    <div class="col-lg-6 col-xl-2 col-12 mb-0" style="width: 20%">
                                        <div class="form-floating form-floating-outline">
                                            <select class="form-control" aria-label="Select order status" name="customerid[]" required>
                                                @foreach ($customer as $custom)
                                                <option value="{{ $custom->id }}">{{ $custom->fname }}</option>
                                                @endforeach
                                            </select>
                                            <label>Select Customer</label>
                                        </div>
                                        </div>
                                    <div class="col-lg-6 col-xl-2 col-12 mb-0" style="width: 20%">
                                        <div class="form-floating form-floating-outline">
                                            <select class="form-control" aria-label="Select order status" name="customerid[]" required>
                                                @foreach ($customer as $custom)
                                                    <option value="{{ $custom->id }}">{{ $custom->email }}</option>
                                                    @endforeach
                                            </select>
                                            <label>Customer Email</label>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-xl-2 col-12 mb-0" style="width: 20%">
                                        <div class="form-floating form-floating-outline">
                                            <select class="form-control ostatus" aria-label="Select order status" name="ostatus[]" required>
                                                <option value="pending">Pending</option>
                                                <option value="processing">Processing</option>
                                                <option value="shipped">Shipped</option>
                                                <option value="delivered">Delivered</option>
                                                <option value="canceled">Canceled</option>
                                                </select>
                                                @foreach ($errors->get('ostatus[]') as $error)
                                                <small class="text-red">*{{ $error }}</small>
                                            @endforeach
                                                <label>Order Status</label>
                                                </div>
                                                </div>
                                    <div class="col-lg-6 col-xl-3 col-12 mb-0" style="width: 20%">
                                        <div class="form-floating form-floating-outline">
                                            <input type="text" class="form-control saddress" placeholder="Enter shipping address"
                                                aria-label="Enter shipping address" name="saddress[]" required>
                                                @error('saddress.*')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                            <label>Shipping Address</label>
                                            </div>
                                            </div>
                                            <div class="col-lg-6 col-xl-3 col-12 mb-0" style="width: 20%">
                                                <div class="form-floating form-floating-outline">
                                                    <input type="text" class="form-control baddress" placeholder="Enter billing address"
                                                aria-label="Enter billing address" name="baddress[]" required>
                                                @error('baddress.*')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                            <label>Billing Address</label>
                                            </div>
                                    </div>
                                    <div class="col-lg-6 col-xl-3 col-12 mb-0" style="width: 20%">
                                        <div class="form-floating form-floating-outline">
                                            <input type="number" class="form-control tamount" placeholder="Enter total amount"
                                            aria-label="Enter total amount" name="tamount[]" id="tamount" required>
                                                                                        @error('tamount.*')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                            <label>Total Amount</label>
                                        </div>
                                        </div>
                                        <div class="col-lg-6 col-xl-3 col-12 mb-0" style="width: 20%">
                                            <div class="form-floating form-floating-outline">
                                                <input type="number" class="form-control discount" placeholder="Enter total discount"
                                                aria-label="Enter total discount" name="discount[]" id="discount"
                                                required>
                                                 @error('discount.*')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                                <label>Total Discount (%)</label>
                                                </div>
                                                </div>
                                                <div class="col-lg-6 col-xl-3 col-12 mb-0" style="width: 20%">
                                                    <div class="form-floating form-floating-outline">
                                            <input type="number" class="form-control damount" placeholder="Discount Amount"
                                            aria-label="Discount Amount" name="damount[]" id="damount" readonly onclick="calculatediscount()" required>
                                            @error('damount.*')
                                                <small class="text-danger">{{ $message }}</small>
                                            @enderror
                                            <label>Discount Amount</label>
                                        </div>
                                        </div>
                                        <div class="col-lg-12 col-xl-2 col-12 d-flex align-items-center mb-0">
                                        <button class="btn btn-xl btn-outline-danger waves-effect del my-3" data-repeater-delete>
                                            <i class="ri-close-line ri-24px me-1"></i>
                                            <span>Delete</span>
                                            </button>
                                            </div>
                                </div>
                                <hr class="opacity-100">`);
                                // addValidation();

            });

            // function addValidation() {
            //     $(".oname").each((i, e) => {
            //         $(e).rules("add", {
            //             required: true
            //         })
            //     });

            //     $(".ostatus").each((i, e) => {
            //         $(e).rules("add", {
            //             required: true
            //         })
            //     });

            //     $(".saddress").each((i, e) => {
            //         $(e).rules("add", {
            //             required: true
            //         })
            //     });

            //     $(".baddress").each((i, e) => {
            //         $(e).rules("add", {
            //             required: true
            //         })
            //     });

            //     $(".tamount").each((i, e) => {
            //         $(e).rules("add", {
            //             required: true
            //         })
            //     });

            //     $(".discount").each((i, e) => {
            //         $(e).rules("add", {
            //             required: true
            //         })
            //     });

            //     $(".damount").each((i, e) => {
            //         $(e).rules("add", {
            //             required: true
            //         })
            //     });
            // };

            // addValidation();

        $(document).on('click', '.del', function(e) {
            if (!confirm('do you want to remove the form?')) {
                e.preventDefault();
                return;
            }
            let row_item = $(this).parent().parent();
            $(row_item).remove();
        });

        $(".sub").submit(function(e) {
            e.preventDefault();
            $.ajax({
                type: $(this).attr('method'),
                url: $(this).attr('action'),
                data: $(this).serialize(),
                dataType: "dataType",
                success: function(response) {
                    $("#rp").reset();
                }
            });
        });



        $('#rp').parsley();

        });

        function calculatediscount() {

            var tamount = parseFloat(document.getElementById('tamount').value);
            var discount = parseFloat(document.getElementById('discount').value);


            var damount = tamount - (tamount * discount / 100);


            document.getElementById('damount').value = damount;
        }
        calculatediscount();


    </script>

@endsection
