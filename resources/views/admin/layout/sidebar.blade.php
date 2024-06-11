<li class="nav-item-header pt-0">
    <div class="text-uppercase fs-sm lh-sm opacity-50 sidebar-resize-hide">Main</div>
    <i class="ph-dots-three sidebar-resize-show"></i>
</li>
<li class="nav-item">
    <a class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}" href="{{ route('dashboard') }}">
        <i class="ph-house"></i>
        <span>Dashboard</span>
    </a>
</li>
@can('customers-list')
    <li class="nav-item">
        <a class="nav-link {{ Route::is('customers.*') ? 'active' : '' }}" href="{{ route('customers.index') }}">
            <i class="ph-users"></i>
            <span>Customers</span>
        </a>
    </li>
@endcan
@can('consignees-list')
    <li class="nav-item">
        <a class="nav-link {{ Route::is('consignees.*') ? 'active' : '' }}" href="{{ route('consignees.index') }}">
            <i class="ph-users"></i>
            <span>Consignee</span>
        </a>
    </li>
@endcan
@can('agents-list')
    <li class="nav-item">
        <a class="nav-link {{ Route::is('agents.*') ? 'active' : '' }}" href="{{ route('agents.index') }}">
            <i class="ph-users"></i>
            <span>Agents</span>
        </a>
    </li>
@endcan
@canany(['documents-list', 'verifications-list', 'passportChecks-list', 'vehicles-list', 'vehicleCompanies-list'])
    <li class="nav-item nav-item-submenu {{ request()->is('admin/catalog*') ? 'nav-item-expanded nav-item-open' : '' }}">
        <a href="#" class="nav-link ">
            <i class="ph-notebook"></i>
            <span>Catalog</span>
        </a>
        <ul class="nav-group-sub collapse {{ request()->is('admin/catalog*') ? 'show' : '' }}">
            @can('documents-list')
                <li class="nav-item  ">
                    <a href="{{ route('documents.index') }}"
                        class="nav-link  {{ Route::is('documents.*') ? 'active' : '' }}">
                        <span>Documents</span>
                    </a>
                </li>
            @endcan
            @can('verifications-list')
                <li class="nav-item  ">
                    <a href="{{ route('verifications.index') }}"
                        class="nav-link  {{ Route::is('verifications.*') ? 'active' : '' }}">
                        <span>Verifications</span>
                    </a>
                </li>
            @endcan
            @can('passportChecks-list')
                <li class="nav-item  ">
                    <a href="{{ route('passport-checks.index') }}"
                        class="nav-link  {{ Route::is('passport-checks.*') ? 'active' : '' }}">
                        <span>Passport Checks</span>
                    </a>
                </li>
            @endcan
            @can('vehicles-list')
                <li class="nav-item  ">
                    <a href="{{ route('vehicles.index') }}"
                        class="nav-link  {{ Route::is('vehicles.*') ? 'active' : '' }}">
                        <span>Vehicles</span>
                    </a>
                </li>
            @endcan
            @can('vehicleCompanies-list')
                <li class="nav-item  ">
                    <a href="{{ route('vehicle-companies.index') }}"
                        class="nav-link  {{ Route::is('vehicle-companies.*') ? 'active' : '' }}">
                        <span>Vehicle Companies</span>
                    </a>
                </li>
            @endcan
        </ul>
    </li>
@endcanany

@canany(['roles-list', 'users-list'])
    <li class="nav-item-header">
        <div class="text-uppercase fs-sm lh-sm opacity-50 sidebar-resize-hide">Access Management</div>
        <i class="ph-dots-three sidebar-resize-show"></i>
    </li>
@endcanany
@can('roles-list')
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('roles*') ? 'active' : '' }}" href="{{ route('roles.index') }}">
            <i class="ph-atom"></i>
            <span>Roles</span>
        </a>
    </li>
@endcan
@can('users-list')
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('users*') ? 'active' : '' }}" href="{{ route('users.index') }}">
            <i class="ph-users"></i>
            <span>Users</span>
        </a>
    </li>
@endcan
@canany(['notifications-list', 'audits-list', 'logs-list'])
    <li class="nav-item-header">
        <div class="text-uppercase fs-sm lh-sm opacity-50 sidebar-resize-hide">Configuration</div>
        <i class="ph-dots-three sidebar-resize-show"></i>
    </li>
@endcanany
@can('audits-list')
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('notifications*') ? 'active' : '' }}"
            href="{{ route('notifications.index') }}">
            <i class="ph-bell"></i>
            <span>Notifications</span>
        </a>
    </li>
@endcan
@can('audits-list')
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('audits*') ? 'active' : '' }}" href="{{ route('audits.index') }}">
            <i class="ph-diamonds-four"></i>
            <span>Audit</span>
        </a>
    </li>
@endcan
@can('logs-list')
    <li class="nav-item">
        <a class="nav-link {{ request()->routeIs('logs*') ? 'active' : '' }}" href="{{ route('logs') }}" target="_blank">
            <i class="ph-bug"></i>
            <span>Errors</span>
        </a>
    </li>
@endcan
<li class="nav-item">
    <a class="nav-link {{ request()->routeIs('settings*') ? 'active' : '' }}" href="{{ route('settings.index') }}">
        <i class="ph-gear"></i>
        <span>Settings</span>
    </a>
</li>
