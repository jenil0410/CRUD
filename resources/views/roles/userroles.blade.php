@extends('layouts/contentNavbarLayout')

@section('title', 'Product Create')

@section('content')
    <style>
        .text-red {
            color: red;
        }
    </style>

    <div class="col-xxl">
        <div class="card mb-4">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="mb-0">Add Roles</h5> <small class="text-muted float-end"></small>
            </div>
            <div class="card-body">
                <form action="{{ route('urole.store') }}" method="POST">
                    @csrf
                    <div class="row mb-3">
                        <div class="col-lg-6 col-xl-2 col-12 mb-0" style="width: 20%">
                            <div class="form-floating form-floating-outline">
                                <select class="form-control select2" aria-label="Select order status" name="role"
                                    data-placeholder="Select Item">
                                    <option value="" selected disabled>Select User</option>
                                    @foreach ($users as $item)
                                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                                    @endforeach
                                </select>
                                <label>Select User</label>
                            </div>
                        </div>
                        @foreach ($errors->get('name') as $error)
                            <small class="text-red">*{{ $error }}</small>
                        @endforeach
                        
                        <div class="col-lg-6 col-xl-2 col-12 mb-0" style="width: 20%">
                            <div class="form-floating form-floating-outline">
                                <select class="form-control select2" aria-label="Select order status" name="role"
                                data-placeholder="Select Item">
                                <option value="" selected disabled>Select Role</option>
                                @foreach ($roles as $item)
                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                @endforeach
                            </select>
                            <label>Select Role</label>
                        </div>
                    </div>
                    </div>
                </div>
                
            <div class="row justify-content-end">
                <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">create</button>
                </div>
            </div>
        </div>
        </form>
    </div>
    </div>
    </div>
@endsection
