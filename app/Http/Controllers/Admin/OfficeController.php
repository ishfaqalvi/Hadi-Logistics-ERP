<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Office;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

/**
 * Class OfficeController
 * @package App\Http\Controllers
 */
class OfficeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:offices-list',  ['only' => ['index']]);
        $this->middleware('permission:offices-view',  ['only' => ['show']]);
        $this->middleware('permission:offices-create',['only' => ['create','store']]);
        $this->middleware('permission:offices-edit',  ['only' => ['edit','update']]);
        $this->middleware('permission:offices-delete',['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $offices = Office::get();

        return view('admin.office.index', compact('offices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        $office = new Office();
        return view('admin.office.create', compact('office'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
       $office = Office::create($request->all());
        return redirect()->route('offices.index')
            ->with('success', 'Office created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): View
    {
        $office = Office::find($id);

        return view('admin.office.show', compact('office'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id): View
    {
        $office = Office::find($id);

        return view('admin.office.edit', compact('office'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Office $office
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Office $office): RedirectResponse
    {
        $office->update($request->all());

        return redirect()->route('offices.index')
            ->with('success', 'Office updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id): RedirectResponse
    {
        $office = Office::find($id)->delete();

        return redirect()->route('offices.index')
            ->with('success', 'Office deleted successfully');
    }
}
