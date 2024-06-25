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
                <h5 class="mb-0">Add Products</h5> <small class="text-muted float-end"></small>
            </div>
            <div class="card-body">
                <form action="{{ route('product.insert') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-name">Product Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="basic-default-name" placeholder="Product"
                                name="pname" />
                            @foreach ($errors->get('pname') as $error)
                                <small class="text-red">*{{ $error }}</small>
                            @endforeach
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="basic-default-company">Company</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" id="basic-default-company" placeholder="Company Name"
                                name="cname" />
                            @foreach ($errors->get('cname') as $error)
                                <small class="text-red">*{{ $error }}</small>
                            @endforeach
                        </div>
                    </div>


                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label">category</label>
                        <div class="col-sm-10">
                            <select class="form-select" id="exampleFormControlSelect1" aria-label="Default select example"
                                name="pcate">
                                <option selected>Select Product category</option>
                                <option value="Software">Software</option>
                                <option value="Hardware">Hardware</option>
                            </select>
                            @foreach ($errors->get('pcate') as $error)
                                <small class="text-red">*{{ $error }} </small>
                            @endforeach
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="quantity">Quantity</label>
                        <div class="col-sm-10">
                            <input type="number" id="quantity" class="form-control" min="1" step="1"
                                placeholder="Enter quantity" aria-label="Enter quantity" name="pquantity">
                            @foreach ($errors->get('pquantity') as $error)
                                <small class="text-red">*{{ $error }}</small>
                            @endforeach
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label class="col-sm-2 col-form-label" for="img">image</label>
                        <div class="col-sm-10">
                            <input type="file" class="form-control" placeholder="upload Images"
                                aria-label="upload Images" name="image">
                        </div>
                    </div>

                    <div class="row justify-content-end">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                    </div>
            </div>

            </form>
        </div>
    </div>
    </div>
@endsection
