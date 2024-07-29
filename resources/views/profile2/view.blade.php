@extends('layouts/contentNavbarLayout')

@section('title', 'Account settings - Account')

@section('page-script')
    <script src="{{ asset('assets/js/pages-account-settings-account.js') }}"></script>
@endsection

@section('content')
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light">Account Settings /</span> Account
    </h4>
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-pills flex-column flex-md-row mb-4 gap-2 gap-lg-0">
                    <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i
                                class="mdi mdi-account-outline mdi-20px me-1"></i>Account</a></li>

                </ul>
                <div class="card mb-4">
                    <h4 class="card-header">Profile Details</h4>
                    <div class="card-body pt-2 mt-1 my-5">
                        <form id="formAccountSettings" method="POST" action="{{ route('profile.update') }}">
                            @csrf
                            @method('patch')
                            <div class="row mt-2 gy-4">
                                <div class="col-md-6">
                                    <div class="form-floating form-floating-outline">
                                        <input class="form-control" type="text" id="firstName" name="name"
                                            value="{{ old('name', $user->name) }}" autofocus />
                                        <label for="firstName">{{ __('Name') }}</label>
                                    </div>
                                </div> <br>
                                <div class="col-md-6">
                                    <div class="form-floating form-floating-outline">
                                        <input class="form-control" type="email" id="email" name="email"
                                            placeholder="john.doe@example.com" value="{{ old('email', $user->email) }}" />
                                        <label for="email">{{ __('Email') }}</label>
                                    </div>
                                </div>

                                <div class="mt-4">
                                    <button type="submit" class="btn btn-primary me-2">Save changes</button>
                                    <button type="reset" class="btn btn-outline-secondary">Reset</button>
                                </div>
                        </form>
                    </div>
                    <!-- /Account -->
                </div>
            </div>


        </div>
    </div>
@endsection
