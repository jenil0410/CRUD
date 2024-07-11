@extends('layouts/contentNavbarLayout')

@section('title', 'Customer Form')

@section('content')
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    </head>

    <body>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Import</h4>
                        </div>
                        <div class="card-body">


                            <form action="{{ route('order.import') }}" method="POST" enctype="multipart/form-data">

                                {{-- @if (isset($errors) && $errors->any()) --}}
                                @foreach ($errors->all() as $errors)
                                    <div class="alert alert-danger">
                                        {{ $errors }}
                                    </div>
                                @endforeach
                                {{-- <div class="alert alert-danger">
                                    {{ $err }}
                                </div>
                                <div class="alert alert-danger">
                                    {{ $er }}
                                </div> --}}


                                {{-- @endisset --}}
                                @csrf
                                <input type="file" name="file" class="form-control">
                                <br>
                                <button class="btn btn-primary" type="submit">Import</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
        </script>
    </body>

    </html>
@endsection
