<div class="page-header-content d-lg-flex border-top">
    <div class="d-flex">
        <a href="{{ route('jobs.edit', $job->id) }}" class="d-flex align-items-center text-body p-2
            {{ Route::is('jobs.edit') ? 'active' : ''}}">
            <i class="ph-note-pencil me-1"></i>
            Detail
        </a>
    </div>
    <div class="d-flex">
        <a href="{{ route('jobs.document.index', $job->id) }}" class="d-flex align-items-center text-body p-2
            {{ Route::is('jobs.document.index') ? 'active' : ''}}">
            <i class="ph-files me-1"></i>
            Documents
        </a>
    </div>
    <div class="d-flex">
        <a href="{{ route('jobs.verification.index', $job->id) }}" class="d-flex align-items-center text-body p-2
            {{ Route::is('jobs.verification.index') ? 'active' : ''}}">
            <i class="ph-checks me-1"></i>
            Verifications
        </a>
    </div>
    <div class="d-flex">
        <a href="{{ route('jobs.passport-check.index', $job->id) }}" class="d-flex align-items-center text-body p-2
            {{ Route::is('jobs.passport-check.index') ? 'active' : ''}}">
            <i class="ph-identification-badge me-1"></i>
            Passport Checks
        </a>
    </div>
</div>
