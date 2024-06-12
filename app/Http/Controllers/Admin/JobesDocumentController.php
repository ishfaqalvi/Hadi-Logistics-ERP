<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\Job;
use App\Models\JobDocument;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

/**
 * Class JobDocumentController
 * @package App\Http\Controllers
 */
class JobDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        // $this->middleware('permission:JobDocuments-list',  ['only' => ['index']]);
        // $this->middleware('permission:JobDocuments-view',  ['only' => ['show']]);
        // $this->middleware('permission:JobDocuments-create',['only' => ['create','store']]);
        // $this->middleware('permission:JobDocuments-edit',  ['only' => ['edit','update']]);
        // $this->middleware('permission:JobDocuments-delete',['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id): View
    {
        $job = Job::find($id);
        $documents = Document::get();

        return view('admin.job.documents.index', compact('documents', 'job'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        $jobDocument = JobDocument::create($request->all());
        return redirect()->route('documents-job.index')
            ->with('success', 'JobDocument created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): View
    {
        $jobDocument = JobDocument::find($id);

        return view('admin.documents-job.show', compact('JobDocument'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id): View
    {
        $JobDocument = JobDocument::find($id);

        return view('admin.documents-job.edit', compact('JobDocument'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  JobDocument $JobDocument
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JobDocument $JobDocument): RedirectResponse
    {
        $JobDocument->update($request->all());

        return redirect()->route('documents-job.index')
            ->with('success', 'JobDocument updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id): RedirectResponse
    {
        $JobDocument = JobDocument::find($id)->delete();

        return redirect()->route('documents-job.index')
            ->with('success', 'JobDocument deleted successfully');
    }
}
