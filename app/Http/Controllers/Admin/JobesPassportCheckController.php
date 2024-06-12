<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\JobPassportCheck;
use App\Models\PassportCheck;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

/**
 * Class JobsPassportCheckController
 * @package App\Http\Controllers
 */
class JobPassportCheckController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        // $this->middleware('permission:jobsPassportChecks-list',  ['only' => ['index']]);
        // $this->middleware('permission:jobsPassportChecks-view',  ['only' => ['show']]);
        // $this->middleware('permission:jobsPassportChecks-create', ['only' => ['create', 'store']]);
        // $this->middleware('permission:jobsPassportChecks-edit',  ['only' => ['edit', 'update']]);
        // $this->middleware('permission:jobsPassportChecks-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id): View
    {
        $job = Job::find($id);
        $passports = PassportCheck::get();

        return view('admin.job.passport-check.index', compact('passports', 'job'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        $jobsPassportCheck = JobsPassportCheck::create($request->all());
        return redirect()->route('jobs-passport-checks.index')
            ->with('success', 'JobsPassportCheck created successfully.');
    }
}
