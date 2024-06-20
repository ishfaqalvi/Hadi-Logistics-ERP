<?php

namespace App\Http\Controllers\Admin\Job;

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
class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        // $this->middleware('permission:jobDocuments-list',  ['only' => ['index']]);
        // $this->middleware('permission:jobDocuments-view',  ['only' => ['show']]);
        // $this->middleware('permission:jobDocuments-create',['only' => ['create','store']]);
        // $this->middleware('permission:jobDocuments-edit',  ['only' => ['edit','update']]);
        // $this->middleware('permission:jobDocuments-delete',['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id): View
    {
        $job =  Job::find($id);
        $documents = Document::with(['jobDocument' => function ($query) use ($job) {
            $query->where('job_id', $job->id);
        }])->get();
        // dd($documents);
        // $jobDocuments = JobDocument::get();

        return view('admin.job.document.index', compact('documents', 'job'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        $jobDocument = new JobDocument();
        return view('admin.job-document.create', compact('jobDocument'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        // dd($request->all());
        $jobDocument = JobDocument::create($request->all());
        return redirect()->route('jobs.document.index', $request->job_id)
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

        return view('admin.job-document.show', compact('jobDocument'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id): View
    {
        $jobDocument = JobDocument::find($id);

        return view('admin.job-document.edit', compact('jobDocument'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  JobDocument $jobDocument
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JobDocument $jobDocument): RedirectResponse
    {
        $jobDocument->update($request->all());

        return redirect()->route('job-documents.index')
            ->with('success', 'JobDocument updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id): RedirectResponse
    {
        $jobDocument = JobDocument::find($id)->delete();

        return redirect()->route('job-documents.index')
            ->with('success', 'JobDocument deleted successfully');
    }
}
