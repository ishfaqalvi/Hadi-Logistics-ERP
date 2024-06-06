<?php

namespace App\Http\Controllers\Admin\Catalog;

use App\Http\Controllers\Controller;

use App\Models\Verification;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

/**
 * Class VerificationController
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
        $this->middleware('permission:verifications-list',  ['only' => ['index']]);
        $this->middleware('permission:verifications-view',  ['only' => ['show']]);
        $this->middleware('permission:verifications-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:verifications-edit',  ['only' => ['edit', 'update']]);
        $this->middleware('permission:verifications-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $verifications = Verification::get();

        return view('admin.catalog.verification.index', compact('verifications'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        $verification = new Verification();
        return view('admin.catalog.verification.create', compact('verification'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        $verification = Verification::create($request->all());
        return redirect()->route('catalog.verifications.index')
            ->with('success', 'Verification created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): View
    {
        $verification = Verification::find($id);

        return view('admin.catalog.verification.show', compact('verification'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id): View
    {
        $verification = Verification::find($id);

        return view('admin.catalog.verification.edit', compact('verification'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Verification $verification
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Verification $verification): RedirectResponse
    {
        $verification->update($request->all());

        return redirect()->route('catalog.verifications.index')
            ->with('success', 'Verification updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id): RedirectResponse
    {
        $verification = Verification::find($id)->delete();

        return redirect()->route('catalog.verifications.index')
            ->with('success', 'Verification deleted successfully');
    }
}
