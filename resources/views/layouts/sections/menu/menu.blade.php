<!DOCTYPE html>

<html class="light-style layout-menu-fixed" data-theme="theme-default" data-assets-path="{{ asset('/assets') . '/' }}"
    data-base-url="{{ url('/') }}" data-framework="laravel" data-template="vertical-menu-laravel-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>@yield('title') | Materio - HTML Laravel Free Admin Template </title>
    <meta name="description"
        content="{{ config('variables.templateDescription') ? config('variables.templateDescription') : '' }}" />
    <meta name="keywords"
        content="{{ config('variables.templateKeyword') ? config('variables.templateKeyword') : '' }}">
    <!-- laravel CRUD token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Canonical SEO -->
    <link rel="canonical" href="{{ config('variables.productPage') ? config('variables.productPage') : '' }}">
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('assets/img/favicon/favicon.ico') }}" />



    <!-- Include Styles -->
    @include('layouts/sections/styles')

    <!-- Include Scripts for customizer, helper, analytics, config -->
    @include('layouts/sections/scriptsIncludes')

    @yield('style')
    <style>
        .menu-inner .menu-item:hover {
            background: linear-gradient(270deg, #9055fd 0%, #c4a5fe 100%);
        }
    </style>
</head>

<body>


    <!-- Layout Content -->
    @yield('layoutContent')
    <!--/ Layout Content -->
    <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

        <!-- ! Hide app brand if navbar-full -->
        <div class="app-brand demo">
            <a href="{{ url('/') }}" class="app-brand-link">
                <span class="app-brand-logo demo me-1">
                    @include('_partials.macros', ['height' => 20])
                </span>
                <span
                    class="app-brand-text demo menu-text fw-semibold ms-2">{{ config('variables.templateName') }}</span>
            </a>

            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
                <i class="mdi menu-toggle-icon d-xl-block align-middle mdi-20px"></i>
            </a>
        </div>

        <div class="menu-inner-shadow"></div>

        <ul class="menu-inner py-1">
            <li
                class="menu-item {{ in_array(Route::current()->getName(), ['product.index', 'product.create', 'product.edit']) ? 'active' : '' }}">
                <a href="{{ route('product.index') }} " class="menu-link">
                    <i class="menu-icon tf-icons mdi mdi-email-outline"></i>
                    <div>Product </div>
                </a>
            </li>

            <li
                class="menu-item {{ in_array(Route::current()->getName(), ['order.index', 'order.create', 'order.edit']) ? 'active' : '' }}">
                <a href="{{ route('order.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons mdi mdi-email-outline"></i>
                    <div>Order</div>
                </a>
            </li>

            <li
                class="menu-item {{ in_array(Route::current()->getName(), ['customer.index', 'customer.create', 'customer.edit']) ? 'active' : '' }}">
                <a href="{{ route('customer.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons mdi mdi-email-outline"></i>
                    <div>customer</div>
                </a>
            </li>



        </ul>
    </aside>

    @include('orders\dash')


</body>

</html>
