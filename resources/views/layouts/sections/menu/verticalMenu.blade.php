@php
    use Spatie\Permission\Models\Role;
    use App\Models\Permission;
    use App\Models\User;

    $loggedInUser = Auth::user();

    $permissions = [];
    $roleId = $loggedInUser->Role_id;
    $data = Permission::where('Role_id', $roleId)->pluck('module', 'id')->toArray();
    // dd($data);
    $permissions = array_unique($data);

    $isSuperAdmin = 0;
    if ($loggedInUser->Role_id == 1) {
        $isSuperAdmin = 1;
    }

@endphp
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

    <!-- ! Hide app brand if navbar-full -->
    <div class="app-brand demo">
        <a href="{{ url('/') }}" class="app-brand-link">
            <span class="app-brand-logo demo me-1">
                @include('_partials.macros', ['height' => 20])
            </span>
            <span class="app-brand-text demo menu-text fw-semibold ms-2">{{ config('variables.templateName') }}</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="mdi menu-toggle-icon d-xl-block align-middle mdi-20px"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <li class="menu-item {{ in_array(Route::current()->getName(), ['menu']) ? 'active' : '' }}">
            <a href="{{ route('menu') }}" class="menu-link">
                <i class="menu-icon tf-icons mdi mdi-email-outline"></i>
                <div>Dashboard</div>
            </a>
        </li>
        @if ($isSuperAdmin == 1 || in_array('products', $permissions))
            <li
                class="menu-item {{ in_array(Route::current()->getName(), ['product.index', 'product.create', 'product.edit']) ? 'active' : '' }}">
                <a href="{{ route('product.index') }} " class="menu-link">
                    <i class="menu-icon tf-icons mdi mdi-email-outline"></i>
                    <div>Products </div>
                </a>
            </li>
        @endif

        @if ($isSuperAdmin == 1 || in_array('orders', $permissions))
            <li
                class="menu-item {{ in_array(Route::current()->getName(), ['order.index', 'order.create', 'order.edit']) ? 'active' : '' }}">
                <a href="{{ route('order.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons mdi mdi-email-outline"></i>
                    <div>Orders</div>
                </a>
            </li>
        @endif

        @if ($isSuperAdmin == 1 || in_array('customers', $permissions))
            <li
                class="menu-item {{ in_array(Route::current()->getName(), ['customer.index', 'customer.create', 'customer.edit']) ? 'active' : '' }}">
                <a href="{{ route('customer.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons mdi mdi-email-outline"></i>
                    <div>customers</div>
                </a>
            </li>
        @endif

        {{-- @if ($isSuperAdmin == 1 || in_array('products', $permissions))
            <li
                class="menu-item {{ in_array(Route::current()->getName(), ['permission.index', 'permission.create', 'permission.edit']) ? 'active' : '' }}">
                <a href="{{ route('permission.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons mdi mdi-email-outline"></i>
                    <div>permissions</div>
                </a>
            </li>
        @endif --}}

        @if ($isSuperAdmin == 1 || in_array('roles', $permissions))
            <li
                class="menu-item {{ in_array(Route::current()->getName(), ['role.index', 'role.create', 'role.edit']) ? 'active' : '' }}">
                <a href="{{ route('role.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons mdi mdi-email-outline"></i>
                    <div>Roles</div>
                </a>
            </li>
        @endif

        {{-- @if ($isSuperAdmin == 1 || in_array('roles', $permissions))
            <li class="menu-item {{ in_array(Route::current()->getName(), ['assign.index']) ? 'active' : '' }}">
                <a href="{{ route('assign.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons mdi mdi-email-outline"></i>
                    <div>Assign Permission</div>
                </a>
            </li>
        @endif --}}

        {{-- @if ($isSuperAdmin == 1 || in_array('roles', $permissions))
            <li class="menu-item {{ in_array(Route::current()->getName(), ['urole.index']) ? 'active' : '' }}">
                <a href="{{ route('urole.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons mdi mdi-email-outline"></i>
                    <div>Assign Role</div>
                </a>
            </li>
        @endif --}}

        @if ($isSuperAdmin == 1 || in_array('activity_log', $permissions))
            <li class="menu-item {{ in_array(Route::current()->getName(), ['log.index']) ? 'active' : '' }}">
                <a href="{{ route('log.index') }}" class="menu-link">
                    <i class="menu-icon tf-icons mdi mdi-email-outline"></i>
                    <div>Activity Log</div>
                </a>
            </li>
        @endif

        @if ($isSuperAdmin == 1 || in_array('users', $permissions))
            <li class="menu-item {{ in_array(Route::current()->getName(), ['u.create']) ? 'active' : '' }}">
                <a href="{{ route('u.create') }}" class="menu-link">
                    <i class="menu-icon tf-icons mdi mdi-email-outline"></i>
                    <div>User</div>
                </a>
            </li>
        @endif

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
