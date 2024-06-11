<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jobe;
use App\Models\JobesVerification;
use App\Models\Verification;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

/**
 * Class JobesVerificationController
 * @package App\Http\Controllers
 */
class JobesVerificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        // $this->middleware('permission:jobesVerifications-list',  ['only' => ['index']]);
        // $this->middleware('permission:jobesVerifications-view',  ['only' => ['show']]);
        // $this->middleware('permission:jobesVerifications-create',['only' => ['create','store']]);
        // $this->middleware('permission:jobesVerifications-edit',  ['only' => ['edit','update']]);
        // $this->middleware('permission:jobesVerifications-delete',['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id): View
    {
        $jobe = Jobe::find($id);
        $verifications = Verification::get();
        // dd($verifications);
        return view('admin.jobe.verification.index', compact('verifications', 'jobe'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        $jobesVerification = new JobesVerification();
        return view('admin.jobes-verification.create', compact('jobesVerification'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        $jobesVerification = JobesVerification::create($request->all());
        return redirect()->route('jobes-verifications.index')
            ->with('success', 'JobesVerification created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): View
    {
        $jobesVerification = JobesVerification::find($id);

        return view('admin.jobes-verification.show', compact('jobesVerification'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id): View
    {
        $jobesVerification = JobesVerification::find($id);

        return view('admin.jobes-verification.edit', compact('jobesVerification'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  JobesVerification $jobesVerification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JobesVerification $jobesVerification): RedirectResponse
    {
        $jobesVerification->update($request->all());

        return redirect()->route('jobes-verifications.index')
            ->with('success', 'JobesVerification updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id): RedirectResponse
    {
        $jobesVerification = JobesVerification::find($id)->delete();

        return redirect()->route('jobes-verifications.index')
            ->with('success', 'JobesVerification deleted successfully');
    }
}
