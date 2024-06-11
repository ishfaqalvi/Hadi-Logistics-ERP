<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Document;
use App\Models\Jobe;
use App\Models\JobesDocument;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

/**
 * Class JobesDocumentController
 * @package App\Http\Controllers
 */
class JobesDocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        // $this->middleware('permission:JobesDocuments-list',  ['only' => ['index']]);
        // $this->middleware('permission:JobesDocuments-view',  ['only' => ['show']]);
        // $this->middleware('permission:JobesDocuments-create',['only' => ['create','store']]);
        // $this->middleware('permission:JobesDocuments-edit',  ['only' => ['edit','update']]);
        // $this->middleware('permission:JobesDocuments-delete',['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id): View
    {
        $jobe = Jobe::find($id);
        $documents = Document::get();

        return view('admin.jobe.documents.index', compact('documents', 'jobe'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        $JobesDocument = JobesDocument::create($request->all());
        return redirect()->route('documents-jobes.index')
            ->with('success', 'JobesDocument created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): View
    {
        $JobesDocument = JobesDocument::find($id);

        return view('admin.documents-jobe.show', compact('JobesDocument'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id): View
    {
        $JobesDocument = JobesDocument::find($id);

        return view('admin.documents-jobe.edit', compact('JobesDocument'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  JobesDocument $JobesDocument
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, JobesDocument $JobesDocument): RedirectResponse
    {
        $JobesDocument->update($request->all());

        return redirect()->route('documents-jobes.index')
            ->with('success', 'JobesDocument updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id): RedirectResponse
    {
        $JobesDocument = JobesDocument::find($id)->delete();

        return redirect()->route('documents-jobes.index')
            ->with('success', 'JobesDocument deleted successfully');
    }
}
