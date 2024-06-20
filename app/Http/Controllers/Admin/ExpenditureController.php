<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Expenditure;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

/**
 * Class ExpenditureController
 * @package App\Http\Controllers
 */
class ExpenditureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:expenditures-list',  ['only' => ['index']]);
        $this->middleware('permission:expenditures-view',  ['only' => ['show']]);
        $this->middleware('permission:expenditures-create',['only' => ['create','store']]);
        $this->middleware('permission:expenditures-edit',  ['only' => ['edit','update']]);
        $this->middleware('permission:expenditures-delete',['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $expenditures = Expenditure::get();

        return view('admin.expenditure.index', compact('expenditures'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        $expenditure = new Expenditure();
        return view('admin.expenditure.create', compact('expenditure'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
       $expenditure = Expenditure::create($request->all());
        return redirect()->route('expenditures.index')
            ->with('success', 'Expenditure created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): View
    {
        $expenditure = Expenditure::find($id);

        return view('admin.expenditure.show', compact('expenditure'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id): View
    {
        $expenditure = Expenditure::find($id);

        return view('admin.expenditure.edit', compact('expenditure'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Expenditure $expenditure
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expenditure $expenditure): RedirectResponse
    {
        $expenditure->update($request->all());

        return redirect()->route('expenditures.index')
            ->with('success', 'Expenditure updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id): RedirectResponse
    {
        $expenditure = Expenditure::find($id)->delete();

        return redirect()->route('expenditures.index')
            ->with('success', 'Expenditure deleted successfully');
    }
}
