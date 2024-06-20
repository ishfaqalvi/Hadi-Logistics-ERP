<?php

namespace App\Http\Controllers\Admin\Job;
use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\JobVerification;
use App\Models\Verification;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

/**
 * Class JobVerificationController
 * @package App\Http\Controllers
 */
class VerificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        // $this->middleware('permission:jobVerifications-list',  ['only' => ['index']]);
        // $this->middleware('permission:jobVerifications-view',  ['only' => ['show']]);
        // $this->middleware('permission:jobVerifications-create',['only' => ['create','store']]);
        // $this->middleware('permission:jobVerifications-edit',  ['only' => ['edit','update']]);
        // $this->middleware('permission:jobVerifications-delete',['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id): View
    {
        // $jobVerifications = JobVerification::get();
        $job =  Job::find($id);
        $verifications = Verification::with(['jobVerification'])->get();
        return view('admin.job.verification.index', compact('job', 'verifications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        $jobVerification = new JobVerification();
        return view('admin.job-verification.create', compact('jobVerification'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        try {
            $jobId = $request->job_id;
            DB::beginTransaction();
            $data = [];
            JobVerification::where('job_id', $jobId)->delete();
            foreach ($request->values as $index => $value) {
                $data[] = [
                    'job_id' => $jobId,
                    'verification_id' => $index,
                    'value' => $value
                ];
            }
            $jobPassportCheck = JobVerification::insert($data);
        DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->withErrors(['msg' => $th->getMessage()]);
        }
        return redirect()->route('jobs.verification.index', $jobId)
            ->with('success', 'Job verification stored successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): View
    {
        $jobVerification = JobVerification::find($id);

        return view('admin.job-verification.show', compact('jobVerification'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id): View
    {
        $jobVerification = JobVerification::find($id);

        return view('admin.job-verification.edit', compact('jobVerification'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  JobVerification $jobVerification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JobVerification $jobVerification): RedirectResponse
    {
        $jobVerification->update($request->all());

        return redirect()->route('job-verifications.index')
            ->with('success', 'JobVerification updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id): RedirectResponse
    {
        $jobVerification = JobVerification::find($id)->delete();

        return redirect()->route('job-verifications.index')
            ->with('success', 'JobVerification deleted successfully');
    }
}
