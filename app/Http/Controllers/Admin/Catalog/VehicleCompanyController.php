<?php

namespace App\Http\Controllers\Admin\Catalog;

use App\Http\Controllers\Controller;

use App\Models\VehicleCompany;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

/**
 * Class VehicleCompanyController
 * @package App\Http\Controllers
 */
class VehicleCompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:vehicleCompanies-list',   ['only' => ['index']]);
        $this->middleware('permission:vehicleCompanies-view',   ['only' => ['show']]);
        $this->middleware('permission:vehicleCompanies-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:vehicleCompanies-edit',   ['only' => ['edit', 'update']]);
        $this->middleware('permission:vehicleCompanies-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $vehicleCompanies = VehicleCompany::get();

        return view('admin.catalog.vehicle-company.index', compact('vehicleCompanies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        $vehicleCompany = new VehicleCompany();
        return view('admin.catalog.vehicle-company.create', compact('vehicleCompany'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        $vehicleCompany = VehicleCompany::create($request->all());
        return redirect()->route('catalog.vehicle-companies.index')
            ->with('success', 'VehicleCompany created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): View
    {
        $vehicleCompany = VehicleCompany::find($id);

        return view('admin.catalog.vehicle-company.show', compact('vehicleCompany'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id): View
    {
        $vehicleCompany = VehicleCompany::find($id);

        return view('admin.catalog.vehicle-company.edit', compact('vehicleCompany'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  VehicleCompany $vehicleCompany
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VehicleCompany $vehicleCompany): RedirectResponse
    {
        $vehicleCompany->update($request->all());

        return redirect()->route('catalog.vehicle-companies.index')
            ->with('success', 'VehicleCompany updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id): RedirectResponse
    {
        $vehicleCompany = VehicleCompany::find($id)->delete();

        return redirect()->route('catalog.vehicle-companies.index')
            ->with('success', 'VehicleCompany deleted successfully');
    }
}
