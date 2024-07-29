@extends('layouts/contentNavbarLayout')

@section('title', 'Tables - Basic Tables')

@section('content')
@php
    
    use App\Models\Permission;
    

        $readCheck = Permission::checkCRUDPermissionToUser("orders", "read");
        $updateCheck = Permission::checkCRUDPermissionToUser("orders", "update");
        $createCheck = Permission::checkCRUDPermissionToUser("orders", "create");
        $deleteCheck = Permission::checkCRUDPermissionToUser("orders", "delete");
        $isSuperAdmin = Permission::isSuperAdmin();
@endphp
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
        @if ($isSuperAdmin || $createCheck)
        <a href="{{ route('product.create') }}" class="btn btn-primary btn-sm object-right">Add</a>
        @endif
        <div class="card mt-5">
            <div class="card-header">
                <h5 class="card-title">Orders</h5>
            </div>
            <div class="table-responsive flex flex-col">
                <table id="order" class="w-auto order">
                    <thead style="text-align: center">

                        <tr>
                            <th>ID</th>
                            <th>Product Name</th>
                            <th>Company Name</th>
                            <th>Category</th>
                            <th>Quantity</th>
                            <th>Images</th>
                            <th>Action</th>
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
                ajax: '{!! route('product.data') !!}',
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
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'pname', name: 'pname' },
                    { data: 'cname', name: 'cname' },
                    { data: 'pcate', name: 'pcate' },
                    { data: 'pquantity', name: 'pquantity' },
                    {
                        data: 'image',
                        name: 'image',
                        render: function(data, type, full, meta) {
                            return '<img src="{{ asset('public/assets/image/') }}/' + data + '" height="50" width="50">';
                        }
                    },
                    {
                        data: null,
                        render: function(data, type, full, meta) {
                            var editUrl = '{{ route('product.edit', ':id') }}'.replace(':id', full.id);
                            var deleteUrl = '{{ route('product.delete', ':id') }}'.replace(':id', full.id);
                            
                            let buttons = '';
                            if (isSuperAdmin || updateCheck) {
                            buttons +=
                             '<a href="' + editUrl + '" class="btn btn-primary btn-sm">Edit</a> ' ;
                            }

                            if (isSuperAdmin || deleteCheck) {
                             buttons += 
                            '<a href="' + deleteUrl + '" class="btn btn-danger btn-sm">Delete</a>';
                            }

                            return buttons;
                    }
                }
                ],
                dom: 'Blrtip',
                buttons: [
                    {
                        extend: 'excelHtml5',
                        text: 'Export',
                        exportOptions: {
                            columns: [ 0, 1, 2, 3, 4, 5 ]
                        }
                    },
                    'csv', 'pdf', 'print','copy'
                ]
            });
        });
    </script>
   

@endsection
