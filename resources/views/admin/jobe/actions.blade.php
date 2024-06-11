@canany(['jobes-view', 'jobes-edit', 'jobes-delete'])
    <div class="d-inline-flex">
        <div class="dropdown">
            <a href="#" class="text-body" data-bs-toggle="dropdown">
                <i class="ph-list"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-end">
                <form action="{{ route('jobes.destroy', $jobe->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    @can('jobes-view')
                        <a href="{{ route('jobes.documents', $jobe->id) }}" class="dropdown-item">
                            <i class="ph-clipboard-text me-2"></i>Documents
                        </a>
                    @endcan
                    @can('jobes-view')
                        <a href="{{ route('jobes.verifications', $jobe->id) }}" class="dropdown-item">
                            <i class="ph-list-checks me-2"></i>Verifications
                        </a>
                    @endcan
                    @can('jobes-view')
                        <a href="{{ route('jobes.passport', $jobe->id) }}" class="dropdown-item">
                            <i class="ph-checks me-2"></i>Passport Checks
                        </a>
                    @endcan
                    @can('jobes-view')
                        <a href="{{ route('jobes.show', $jobe->id) }}" class="dropdown-item">
                            <i class="ph-eye me-2"></i>{{ __('Show') }}
                        </a>
                    @endcan
                    @can('jobes-edit')
                        <a href="{{ route('jobes.edit', $jobe->id) }}" class="dropdown-item">
                            <i class="ph-note-pencil me-2"></i>{{ __('Edit') }}
                        </a>
                    @endcan
                    @can('jobes-delete')
                        <button type="submit" class="dropdown-item sa-confirm">
                            <i class="ph-trash me-2"></i>{{ __('Delete') }}
                        </button>
                    @endcan
                </form>
            </div>
        </div>
    </div>
@endcanany
