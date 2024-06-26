<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Consignee;
use App\Models\Customer;
use App\Models\Document;
use App\Models\Job;
use App\Models\Shed;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

/**
 * Class JobController
 * @package App\Http\Controllers
 */
class JobController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:jobs-list',  ['only' => ['index']]);
        $this->middleware('permission:jobs-view',  ['only' => ['show']]);
        $this->middleware('permission:jobs-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:jobs-edit',  ['only' => ['edit', 'update']]);
        $this->middleware('permission:jobs-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $jobs = Job::with('customer', 'consignee', 'vehicle.vehicleCompany')->get();
        return view('admin.job.index', compact('jobs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        $job = new Job();
        $customers = Customer::pluck('name', 'id');
        $consignees = Consignee::pluck('name', 'id');
        $vehicles = Vehicle::active()->pluck('title', 'id');
        $sheds = Shed::pluck('title', 'id');
        return view('admin.job.create', compact('job', 'customers', 'vehicles', 'consignees', 'sheds'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        $job = Job::create($request->all());
        return redirect()->route('jobs.index')
            ->with('success', 'Job created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): View
    {
        $job = Job::find($id);

        return view('admin.job.show', compact('job'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id): View
    {
        $job = Job::find($id);
        $customers = Customer::pluck('name', 'id');
        $consignees = Consignee::pluck('name', 'id');
        $vehicles = Vehicle::active()->pluck('title', 'id');
        $sheds = Shed::pluck('title', 'id');
        return view('admin.job.edit', compact('job', 'customers', 'vehicles', 'consignees', 'sheds'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Job $job
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Job $job): RedirectResponse
    {
        $job->update($request->all());

        return redirect()->route('jobs.index')
            ->with('success', 'Job updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id): RedirectResponse
    {
        $job = Job::find($id)->delete();

        return redirect()->route('jobs.index')
            ->with('success', 'Job deleted successfully');
    }
}
