@extends('layouts/contentNavbarLayout')

@section('title', 'Tables - Basic Tables')

@section('content')

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
   

    </head>
    <style>
        .export-button-container {
            float: right;
            margin-right: 56px;
            /* Adjust as needed */
        }
    </style>
    <div class="container">

    </div>
    <div class="container mx-auto px-4 lg:w-4/5 xl:w-3/4">
        <a href="{{ route('order.create') }}" class="btn btn-primary btn-sm object-right">Add</a>
        <div class="card mt-5">
            <div class="card-header">
                <h5 class="card-title">Orders</h5>
            </div>
            <div class="table-responsive flex flex-col">
                <table id="order" class="w-auto order">
                    <thead style="text-align: center">

                        <tr>
                            <th>ID</th>
                            <th>Order Name</th>
                            <th>Order Status</th>
                            <th>Product</th>
                            <th>Customer</th>
                            <th>Customer Mail</th>
                            <th>Shipping Address</th>
                            <th>Billing Address</th>
                            <th>Total Amount</th>
                            <th>Discount</th>
                            <th>Discount Amount</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Table body content will be filled dynamically -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>




    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $('.order').dataTable({

                searching: false,
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: '{!! route('order.data') !!}',
                dom: '<"export-button-container"B>lrtip',
                buttons: [{
                    extend: 'collection',
                    text: 'Export',
                    buttons: [{
                            extend: 'excelHtml5',
                            text: 'Export to Excel',
                            exportOptions: {
                                columns: [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10]
                            }
                        },
                        'copy', 'csv', 'pdf', 'print'
                    ]

                }],
                lengthMenu: [10, 25, 50, "All"],
                columns: [{
                        data: 'id',
                        name: 'id'
                    },
                    {
                        data: 'oname',
                        name: 'oname'
                    },
                    {
                        data: 'ostatus',
                        name: 'ostatus'
                    },
                    {
                        data: 'product.pname',
                        name: 'product.pname'
                    },
                    {
                        data: 'customer.fname',
                        name: 'customer.fname'
                    },
                    {
                        data: 'customer.email',
                        name: 'customer.email'
                    },
                    {
                        data: 'saddress',
                        name: 'saddress'
                    },
                    {
                        data: 'baddress',
                        name: 'baddress'
                    },
                    {
                        data: 'tamount',
                        name: 'tamount'
                    },
                    {
                        data: 'discount',
                        name: 'discount'
                    },
                    {
                        data: 'damount',
                        name: 'damount'
                    },
                    {
                        data: null,
                        render: function(data, type, full, meta) {
                            var editUrl = '{{ route('order.edit', ':id') }}'.replace(':id', full
                                .id);
                            var deleteUrl = '{{ route('order.delete', ':id') }}'.replace(':id',
                                full
                                .id);
                            var invoiceUrl = '{{ route('order.invoice', ':id') }}'.replace(':id',
                                full
                                .id);

                            return '<a href="' + editUrl +
                                '" class="btn btn-primary btn-sm pr-2">Edit</a>     ' +
                                '<a href="' + deleteUrl +
                                '" class="btn btn-danger btn-sm">Delete</a>  ' +
                                '<a href="' + invoiceUrl +
                                '" class="btn btn-success btn-sm">Invoice</a> ';
                        }
                    }
                ]
            });
        });
    </script>
   

@endsection
