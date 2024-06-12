<?php

namespace App\Http\Controllers\Admin\Job;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\JobPassportCheck;
use App\Models\PassportCheck;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;

/**
 * Class JobPassportCheckController
 * @package App\Http\Controllers
 */
class PassportCheckController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        // $this->middleware('permission:jobPassportChecks-list',  ['only' => ['index']]);
        // $this->middleware('permission:jobPassportChecks-view',  ['only' => ['show']]);
        // $this->middleware('permission:jobPassportChecks-create',['only' => ['create','store']]);
        // $this->middleware('permission:jobPassportChecks-edit',  ['only' => ['edit','update']]);
        // $this->middleware('permission:jobPassportChecks-delete',['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id): View
    {
        $job = Job::find($id);
        $jobPassportChecks = JobPassportCheck::get();
        $passportChecks = PassportCheck::with(['jobPassportCheck' => function ($query) use ($job) {
            $query->where('job_id', $job->id);
        }])->get();

        return view('admin.job.passport-check.index', compact('passportChecks', 'job'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        $jobPassportCheck = new JobPassportCheck();
        return view('admin.job-passport-check.create', compact('jobPassportCheck'));
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
            //code...
            $jobId = $request->job_id;
            DB::beginTransaction();
            $data = [];
            JobPassportCheck::where('job_id', $jobId)->delete();
            foreach ($request->checks as $check) {
                $data[] = [
                    'job_id' => $jobId,
                    'passport_check_id' => $check,
                    'checked' => 1
                ];
            }
            $jobPassportCheck = JobPassportCheck::insert($data);
            DB::commit();
        } catch (\Throwable $th) {
            DB::rollBack();
            return redirect()->back()->withErrors(['msg' => $th->getMessage()]);
        }
        return redirect()->route('jobs.passport-check.index', $jobId)
            ->with('success', 'Passport checked successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): View
    {
        $jobPassportCheck = JobPassportCheck::find($id);

        return view('admin.job-passport-check.show', compact('jobPassportCheck'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id): View
    {
        $jobPassportCheck = JobPassportCheck::find($id);

        return view('admin.job-passport-check.edit', compact('jobPassportCheck'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  JobPassportCheck $jobPassportCheck
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JobPassportCheck $jobPassportCheck): RedirectResponse
    {
        $jobPassportCheck->update($request->all());

        return redirect()->route('job-passport-checks.index')
            ->with('success', 'JobPassportCheck updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id): RedirectResponse
    {
        $jobPassportCheck = JobPassportCheck::find($id)->delete();

        return redirect()->route('job-passport-checks.index')
            ->with('success', 'JobPassportCheck deleted successfully');
    }
}
