@extends('layouts/contentNavbarLayout')

@section('title', 'Customer Form')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Import</h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('customer.fimport') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="file" name="import" class="form-control">
                    <button class="btn btn-primary" type="submit">Import</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection