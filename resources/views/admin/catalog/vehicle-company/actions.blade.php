@canany(['vehicleCompanies-view', 'vehicleCompanies-edit', 'vehicleCompanies-delete'])
    <div class="d-inline-flex">
        <div class="dropdown">
            <a href="#" class="text-body" data-bs-toggle="dropdown">
                <i class="ph-list"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-end">
                <form action="{{ route('vehicle-companies.destroy', $vehicleCompany->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    @can('vehicleCompanies-view')
                        <a href="{{ route('vehicle-companies.show', $vehicleCompany->id) }}" class="dropdown-item">
                            <i class="ph-eye me-2"></i>{{ __('Show') }}
                        </a>
                    @endcan
                    @can('vehicleCompanies-edit')
                        <a href="{{ route('vehicle-companies.edit', $vehicleCompany->id) }}" class="dropdown-item">
                            <i class="ph-note-pencil me-2"></i>{{ __('Edit') }}
                        </a>
                    @endcan
                    @can('vehicleCompanies-delete')
                        <button type="submit" class="dropdown-item sa-confirm">
                            <i class="ph-trash me-2"></i>{{ __('Delete') }}
                        </button>
                    @endcan
                </form>
            </div>
        </div>
    </div>
@endcanany
