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
        <a href="{{ route('permission.create') }}" class="btn btn-primary btn-sm object-right">Add</a>
        {{-- <a href="{{ route('customer.import') }}" class="btn btn-primary btn-sm object-right">Import</a>
        <a href="{{ route('customer.export') }}" class="btn btn-primary btn-sm object-right">Export</a> --}}
        <div class="card mt-5">
            <div class="card-header">
                <h5 class="card-title">Orders</h5>
            </div>
            <div class="table-responsive flex flex-col">
                <table id="table">
                    <thead style="text-align: center">

                        <tr>
                            <th>ID</th>
                            <th>Permission</th>
                            {{-- <th>Role</th> --}}
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody style="text-align: center">
                        @foreach ($permission as $item)
                            <tr>

                                <td>{{ $item->id }}</td>
                                <td>{{ $item->name }}</td>
                                <td> <a href="{{ route('permission.edit', $item->id) }}"
                                        class="btn btn-primary btn-sm object-right">Edit</a>
                                    <a href="{{ route('permission.delete', $item->id) }}"
                                        class="btn btn-primary btn-sm object-right">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>




    {{-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    {{-- <script>
        $(document).ready(function() {
            $('#table').dataTable({

                searching: false,
                responsive: true,
                processing: true,
                serverSide: true,
                ajax: '{!! route('permission.data') !!}',
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
                            data: 'name',
                            name: 'name'
                        },
                        {
                            data: 'Role',
                            name: 'role'
                        },
                        
                        {
                            data: null,
                            render: function(data, type, full, meta) {
                                var editUrl = '{{ route('permission.edit', ':id') }}'.replace(':id', full
                                    .id);
                                var deleteUrl = '{{ route('permission.delete', ':id') }}'.replace(':id',
                                    full.id);

                                return '<div class="d-flex justify-content-center space-x-4">' +
                                    '<a href="' + editUrl +
                                    '" class="btn btn-primary btn-sm">Edit</a> ' +
                                    '<a href="' + deleteUrl +
                                    '" class="btn btn-danger btn-sm ml-4">Delete</a>'; +
                                '</div>';
                            }
                        }
                    ]
                });
            });
    </script> --}}


@endsection
