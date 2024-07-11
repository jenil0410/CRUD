<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&ampdisplay=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/materialdesignicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/node-waves/node-waves.css') }}" />
    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />
    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <!-- Vendor Styles -->
    @yield('vendor-style')


    <!-- Page Styles -->
    @yield('page-style')
</head>

<body>

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
                <a href="{{ route('product.create') }} " class="menu-link">
                    <i class="menu-icon tf-icons mdi mdi-email-outline"></i>
                    <div>Product </div>
                </a>
            </li>

            <li
                class="menu-item {{ in_array(Route::current()->getName(), ['order.index', 'order.create', 'order.edit']) ? 'active' : '' }}">
                <a href="{{ route('order.create') }}" class="menu-link">
                    <i class="menu-icon tf-icons mdi mdi-email-outline"></i>
                    <div>Order</div>
                </a>
            </li>

            <li
                class="menu-item {{ in_array(Route::current()->getName(), ['customer.index', 'customer.create', 'customer.edit']) ? 'active' : '' }}">
                <a href="{{ route('customer.create') }}" class="menu-link">
                    <i class="menu-icon tf-icons mdi mdi-email-outline"></i>
                    <div>customer</div>
                </a>
            </li>

            {{-- <li class="menu-item {{ in_array(Route::current()->getName(), ['menu']) ? 'active' : '' }}">
                <a href="{{ route('menu') }}" class="menu-link">
                    <i class="menu-icon tf-icons mdi mdi-email-outline"></i>
                    <div>Dashboard</div>
                </a>
            </li> --}}
            <li class="menu-item">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-dropdown-link :href="route('logout')"
                        onclick="event.preventDefault();
                                  this.closest('form').submit();">
                        <i class='mdi mdi-power me-1 mdi-20px'></i>
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
            </li>
        </ul>
    </aside>

    <!-- BEGIN: Vendor JS-->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/node-waves/node-waves.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
    @yield('vendor-script')
    <!-- END: Page Vendor JS-->
    <!-- BEGIN: Theme JS-->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <!-- END: Theme JS-->
    <!-- Pricing Modal JS-->
    @stack('pricing-script')
    <!-- END: Pricing Modal JS-->
    <!-- BEGIN: Page JS-->
    @yield('page-script')
    <!-- END: Page JS-->
</body>

</html>
