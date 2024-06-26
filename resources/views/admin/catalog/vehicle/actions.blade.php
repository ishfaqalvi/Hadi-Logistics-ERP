@canany(['vehicles-view', 'vehicles-edit', 'vehicles-delete'])
<div class="d-inline-flex">
    <div class="dropdown">
        <a href="#" class="text-body" data-bs-toggle="dropdown">
            <i class="ph-list"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-end">
            <form action="{{ route('vehicles.destroy', $vehicle->id) }}" method="POST">
                @csrf
                @method('DELETE')
                @can('vehicles-view')
                    <a href="{{ route('vehicles.show', $vehicle->id) }}" class="dropdown-item">
                        <i class="ph-eye me-2"></i>{{ __('Show') }}
                    </a>
                @endcan
                @can('vehicles-edit')
                    <a href="{{ route('vehicles.edit', $vehicle->id) }}" class="dropdown-item">
                        <i class="ph-note-pencil me-2"></i>{{ __('Edit') }}
                    </a>
                @endcan
                @can('vehicles-delete')
                    <button type="submit" class="dropdown-item sa-confirm">
                        <i class="ph-trash me-2"></i>{{ __('Delete') }}
                    </button>
                @endcan
            </form>
        </div>
    </div>
</div>
@endcanany
