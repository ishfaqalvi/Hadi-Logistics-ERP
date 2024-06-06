@canany(['documents-view', 'documents-edit', 'documents-delete'])
    <div class="d-inline-flex">
        <div class="dropdown">
            <a href="#" class="text-body" data-bs-toggle="dropdown">
                <i class="ph-list"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-end">
                <form action="{{ route('catalog.documents.destroy', $document->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    @can('documents-view')
                        <a href="{{ route('catalog.documents.show', $document->id) }}" class="dropdown-item">
                            <i class="ph-eye me-2"></i>{{ __('Show') }}
                        </a>
                    @endcan
                    @can('documents-edit')
                        <a href="{{ route('catalog.documents.edit', $document->id) }}" class="dropdown-item">
                            <i class="ph-note-pencil me-2"></i>{{ __('Edit') }}
                        </a>
                    @endcan
                    @can('documents-delete')
                        <button type="submit" class="dropdown-item sa-confirm">
                            <i class="ph-trash me-2"></i>{{ __('Delete') }}
                        </button>
                    @endcan
                </form>
            </div>
        </div>
    </div>
@endcanany
