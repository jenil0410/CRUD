@extends('layouts/contentNavbarLayout')

@section('title', 'Tables - Basic Tables')

@section('content')

    <style>
        .card{
            margin: 0%;
        }
    </style>

    <body>
        <div class="container flex md:flex-row columns-12 justify-center x" style="display: flex">

            <div class="card mx-3 px-5 py-5">
                <div class="card-body text-nowrap content-center px-5">
                    <h5 class="card-title mb-0 flex-wrap text-nowrap pt-4 px-4">Orders 🎉</h5> <br>
                    {{-- <p class="mb-2">Best seller of the month</p> --}}
                
                    <h4 class="text-primary text-center">{{ $count }} 🚀</h4>
                    {{-- <p class="mb-2">78% of target 🚀</p> --}}
                    {{-- <a href="javascript:;" class="btn btn-sm btn-primary waves-effect waves-light">View Sales</a> --}}
                </div>
                <img src="https://demos.themeselection.com/materio-bootstrap-html-admin-template/assets/img/illustrations/trophy.png"
                    class="position-absolute bottom-0 end-0 me-4" width="50" alt="view sales">
            </div>
            <div class="card mx-3 px-5 py-5" >
                <div class="card-body text-nowrap px-5 ">
                    <h5 class="card-title mb-0 flex-wrap text-nowrap pt-4">Customers 🎉</h5><br>
                    {{-- <p class="mb-2">Best seller of the month</p> --}}
                    
                    <h4 class="text-primary text-center">{{ $param }} 🚀</h4>
                    {{-- <p class="mb-2">78% of target 🚀</p> --}}
                    {{-- <a href="javascript:;" class="btn btn-sm btn-primary waves-effect waves-light">View Sales</a> --}}
                </div>
                <img src="https://demos.themeselection.com/materio-bootstrap-html-admin-template/assets/img/illustrations/trophy.png"
                    class="position-absolute bottom-0 end-0 me-4 " width="50" alt="view sales">
            </div>
            <div class="card mx-3 px-5 py-5">
                <div class="card-body text-nowrap px-5">
                    <h5 class="card-title mb-0 flex-wrap text-nowrap pt-4">products 🎉</h5><br>
                    {{-- <p class="mb-2">Best seller of the month</p> --}}
                    
                    <h4 class="text-primary mb-0 text-center">{{ $prod }} 🚀</h4>
                    {{-- <p class="mb-2">78% of target </p> --}}
                    {{-- <a href="javascript:;" class="btn btn-sm btn-primary waves-effect waves-light">View Sales</a> --}}
                </div>
                <img src="https://demos.themeselection.com/materio-bootstrap-html-admin-template/assets/img/illustrations/trophy.png"
                    class="position-absolute bottom-0 end-0 me-4 " width="50" alt="view sales">
            </div>
        </div>
    </body>

    </html>

@endsection
