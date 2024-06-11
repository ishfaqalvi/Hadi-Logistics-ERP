@canany(['passportChecks-view', 'passportChecks-edit', 'passportChecks-delete'])
<div class="d-inline-flex">
    <div class="dropdown">
        <a href="#" class="text-body" data-bs-toggle="dropdown">
            <i class="ph-list"></i>
        </a>
        <div class="dropdown-menu dropdown-menu-end">
            <form action="{{ route('passport-checks.destroy', $passportCheck->id) }}" method="POST">
                @csrf
                @method('DELETE')
                @can('passportChecks-view')
                    <a href="{{ route('passport-checks.show', $passportCheck->id) }}" class="dropdown-item">
                        <i class="ph-eye me-2"></i>{{ __('Show') }}
                    </a>
                @endcan
                @can('passportChecks-edit')
                    <a href="{{ route('passport-checks.edit', $passportCheck->id) }}" class="dropdown-item">
                        <i class="ph-note-pencil me-2"></i>{{ __('Edit') }}
                    </a>
                @endcan
                @can('passportChecks-delete')
                    <button type="submit" class="dropdown-item sa-confirm">
                        <i class="ph-trash me-2"></i>{{ __('Delete') }}
                    </button>
                @endcan
            </form>
        </div>
    </div>
</div>
@endcanany
