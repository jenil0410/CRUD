@extends('layouts/contentNavbarLayout')

@section('title', 'Account settings - Account')

@section('page-script')
    <script src="{{ asset('assets/js/pages-account-settings-account.js') }}"></script>
@endsection

@section('content')
    <h4 class="py-3 mb-4">
        <span class="text-muted fw-light"> Update</span> Password
    </h4>
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <ul class="nav nav-pills flex-column flex-md-row mb-4 gap-2 gap-lg-0">
                    <li class="nav-item"><a class="nav-link active" href="javascript:void(0);"><i
                                class="mdi mdi-account-outline mdi-20px me-1"></i>Password</a></li>

                </ul>
            </div>

            <div class="card mb-6 my-3">
                <h5 class="card-header">Change Password</h5>
                <div class="card-body pt-1">
                    <form id="formAccountSettings" method="post" action="{{ route('password.update') }}"
                        class="fv-plugins-bootstrap5 fv-plugins-framework" novalidate="novalidate">
                        @csrf
                        @method('put')
                        <div class="row">
                            <div class="mb-5 col-md-6 form-password-toggle fv-plugins-icon-container">
                                <div class="input-group input-group-merge">
                                    <div class="form-floating form-floating-outline">
                                        <input class="form-control" type="password" name="current_password"
                                            id="currentPassword" placeholder="············">
                                        <label for="currentPassword">{{ __('Current Password') }}</label>
                                    </div>
                                    <span class="input-group-text cursor-pointer"><i
                                            class="ri-eye-off-line ri-20px"></i></span>
                                </div>
                                <div
                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                </div>
                            </div>
                        </div>
                        <div class="row g-5 mb-4">
                            <div class="col-md-6 form-password-toggle fv-plugins-icon-container">
                                <div class="input-group input-group-merge">
                                    <div class="form-floating form-floating-outline">
                                        <input class="form-control" type="password" id="newPassword" name="password"
                                            placeholder="············">
                                        <label for="newPassword">{{ __('New Password') }}</label>
                                    </div>
                                    <span class="input-group-text cursor-pointer"><i
                                            class="ri-eye-off-line ri-20px"></i></span>
                                </div>
                                <div
                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                </div>
                            </div>
                            <div class="col-md-6 form-password-toggle fv-plugins-icon-container">
                                <div class="input-group input-group-merge">
                                    <div class="form-floating form-floating-outline">
                                        <input class="form-control" type="password" name="password_confirmation"
                                            id="confirmPassword" placeholder="············">
                                        <label for="confirmPassword">{{ __('Confirm Password') }}</label>
                                    </div>
                                    <span class="input-group-text cursor-pointer"><i
                                            class="ri-eye-off-line ri-20px"></i></span>
                                </div>
                                <div
                                    class="fv-plugins-message-container fv-plugins-message-container--enabled invalid-feedback">
                                </div>
                            </div>
                        </div>
                        <h6 class="text-body">Password Requirements:</h6>
                        <ul class="ps-4 mb-4">
                            <li class="mb-4">Minimum 8 characters long - the more, the better</li>
                            <li class="mb-4">At least one lowercase character</li>
                            <li>At least one number, symbol, or whitespace character</li>
                        </ul>
                        <div class="mt-6">
                            <button type="submit" class="btn btn-primary me-3 waves-effect waves-light">Save
                                changes</button>
                            <button type="reset" class="btn btn-outline-secondary waves-effect">Reset</button>
                        </div>
                        <input type="hidden">
                    </form>
                </div>
            </div>


        </div>
    </div>
@endsection
