@extends('layouts/contentNavbarLayout')

@section('title', 'Product Create')

@section('content')
    <style>
        .text-red {
            color: red;
        }
    </style>
    <div class="container">

        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Add Roles</h5> <small class="text-muted float-end"></small>
                </div>
                <div class="card-body">
                    <form action="{{ route('assign.store') }}" method="POST">
                        @csrf
                        <div class="row mb-3">
                            <div class="col-lg-6 col-xl-2 col-12 mb-0" style="width: 20%">
                                <div class="form-floating form-floating-outline">
                                    <select class="form-control select2" aria-label="Select order status" name="role"
                                        data-placeholder="Select Item">
                                        <option value="" selected disabled>Select Item</option>
                                        @foreach ($roles as $item)
                                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                                        @endforeach
                                    </select>
                                    <label>Select Role</label>
                                </div>
                            </div>
                            @foreach ($errors->get('name') as $error)
                                <small class="text-red">*{{ $error }}</small>
                            @endforeach
                        </div>

                        @foreach ($permissions as $permission)
                            {{-- {{dd($permission)}} --}}
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="custom-control-input" id="permission_{{ $permission->id }}"
                                    name="permission_id[]" value="{{ $permission->id }}" >
                                <label class="custom-control-label"
                                    for="permission_{{ $permission->id }}">{{ $permission->name }}</label>
                            </div>
                        @endforeach
                </div>

                <div class="row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-primary">create</button>
                    </div>
                </div>
            </div>
            </form>
        </div>


        <a href="{{ route('role.create') }}" class="btn btn-primary btn-sm object-right">Add</a>
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
                            <th>Roles</th>
                            <th>Permissions</th>
                            {{-- <th>Actions</th> --}}
                        </tr>
                    </thead>
                    <tbody style="text-align: center">
                        @foreach ($permissions as $item)
                            @foreach ($item->roles as $role)
                                {{-- {{dd($role)}} --}}
                                <tr>

                                    <td>{{ $role->id }}</td>
                                    <td>{{ $role->name }}</td>
                                    <td>
                                        @if ($role->pivot->permission_id == $item->id)
                                            <span>{{ $item->name }}</span>
                                        @endif
                                    </td>
                                    {{-- <td> <a href="{{ route('role.edit',$role->id) }}" class="btn btn-primary btn-sm object-right">Edit</a>
                                    <a href="{{ route('role.delete',$role->id) }}" class="btn btn-primary btn-sm object-right">Delete</a></td> --}}
                                </tr>
                            @endforeach
                            {{-- <td>{{ $item['name'] }}</td> --}}
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
            let permission = @json($permissions); // Convert PHP array/object to JSON
            let roles = @json($roles); // Convert PHP array/object to JSON

            console.log(roles); 
            console.log(permission); 

            $(".select2").change(function() {

                let roles_seleted = $(".select2").val();

                permission.forEach(function(item) {
                    // console.log(item); 
                    item.roles.forEach(function(role) {

                        // console.log(role); 
                        if ((role.pivot.permission_id == item.id)) {
                            console.log(item.name);

                        }

                    });
                });
            });
        });
    </script> --}}

@endsection
