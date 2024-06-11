<?php

namespace App\Http\Controllers\Admin\Catalog;

use App\Http\Controllers\Controller;

use App\Models\PassportCheck;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

/**
 * Class PassportCheckController
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
        $this->middleware('permission:passportChecks-list',   ['only' => ['index']]);
        $this->middleware('permission:passportChecks-view',   ['only' => ['show']]);
        $this->middleware('permission:passportChecks-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:passportChecks-edit',   ['only' => ['edit', 'update']]);
        $this->middleware('permission:passportChecks-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $passportChecks = PassportCheck::get();

        return view('admin.catalog.passport-check.index', compact('passportChecks'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        $passportCheck = new PassportCheck();
        return view('admin.catalog.passport-check.create', compact('passportCheck'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        $passportCheck = PassportCheck::create($request->all());
        return redirect()->route('passport-checks.index')
            ->with('success', 'PassportCheck created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): View
    {
        $passportCheck = PassportCheck::find($id);

        return view('admin.catalog.passport-check.show', compact('passportCheck'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id): View
    {
        $passportCheck = PassportCheck::find($id);

        return view('admin.catalog.passport-check.edit', compact('passportCheck'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  PassportCheck $passportCheck
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PassportCheck $passportCheck): RedirectResponse
    {
        $passportCheck->update($request->all());

        return redirect()->route('passport-checks.index')
            ->with('success', 'PassportCheck updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id): RedirectResponse
    {
        $passportCheck = PassportCheck::find($id)->delete();

        return redirect()->route('passport-checks.index')
            ->with('success', 'PassportCheck deleted successfully');
    }
}
