<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\JobVerification;
use App\Models\Verification;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

/**
 * Class JobsVerificationController
 * @package App\Http\Controllers
 */
class JobVerificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        // $this->middleware('permission:jobsVerifications-list',  ['only' => ['index']]);
        // $this->middleware('permission:jobsVerifications-view',  ['only' => ['show']]);
        // $this->middleware('permission:jobsVerifications-create',['only' => ['create','store']]);
        // $this->middleware('permission:jobsVerifications-edit',  ['only' => ['edit','update']]);
        // $this->middleware('permission:jobsVerifications-delete',['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id): View
    {
        $job = Job::find($id);
        $verifications = Verification::get();
        // dd($verifications);
        return view('admin.job.verification.index', compact('verifications', 'job'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        $jobsVerification = new JobVerification();
        return view('admin.jobs-verification.create', compact('jobsVerification'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        $jobsVerification = JobVerification::create($request->all());
        return redirect()->route('jobs-verifications.index')
            ->with('success', 'JobsVerification created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): View
    {
        $jobsVerification = JobsVerification::find($id);

        return view('admin.jobs-verification.show', compact('jobsVerification'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id): View
    {
        $jobsVerification = JobsVerification::find($id);

        return view('admin.jobs-verification.edit', compact('jobsVerification'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  JobsVerification $jobsVerification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JobsVerification $jobsVerification): RedirectResponse
    {
        $jobsVerification->update($request->all());

        return redirect()->route('jobs-verifications.index')
            ->with('success', 'JobsVerification updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id): RedirectResponse
    {
        $jobsVerification = JobsVerification::find($id)->delete();

        return redirect()->route('jobs-verifications.index')
            ->with('success', 'JobsVerification deleted successfully');
    }
}
