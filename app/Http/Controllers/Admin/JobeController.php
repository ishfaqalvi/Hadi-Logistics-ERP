<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Consignee;
use App\Models\Customer;
use App\Models\Document;
use App\Models\Jobe;
use App\Models\Shed;
use App\Models\Vehicle;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

/**
 * Class JobeController
 * @package App\Http\Controllers
 */
class JobeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:jobes-list',  ['only' => ['index']]);
        $this->middleware('permission:jobes-view',  ['only' => ['show']]);
        $this->middleware('permission:jobes-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:jobes-edit',  ['only' => ['edit', 'update']]);
        $this->middleware('permission:jobes-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $jobes = Jobe::with('customer', 'consignee', 'vehicle.vehicleCompany')->get();
        return view('admin.jobe.index', compact('jobes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        $jobe = new Jobe();
        $customers = Customer::pluck('name', 'id');
        $consignees = Consignee::pluck('name', 'id');
        $vehicles = Vehicle::active()->pluck('title', 'id');
        $sheds = Shed::pluck('title', 'id');
        return view('admin.jobe.create', compact('jobe', 'customers', 'vehicles', 'consignees', 'sheds'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        $jobe = Jobe::create($request->all());
        return redirect()->route('jobes.index')
            ->with('success', 'Jobe created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): View
    {
        $jobe = Jobe::find($id);

        return view('admin.jobe.show', compact('jobe'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id): View
    {
        $jobe = Jobe::find($id);
        $customers = Customer::pluck('name', 'id');
        $consignees = Consignee::pluck('name', 'id');
        $vehicles = Vehicle::active()->pluck('title', 'id');
        $sheds = Shed::pluck('title', 'id');
        return view('admin.jobe.edit', compact('jobe', 'customers', 'vehicles', 'consignees', 'sheds'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Jobe $jobe
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jobe $jobe): RedirectResponse
    {
        $jobe->update($request->all());

        return redirect()->route('jobes.index')
            ->with('success', 'Jobe updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id): RedirectResponse
    {
        $jobe = Jobe::find($id)->delete();

        return redirect()->route('jobes.index')
            ->with('success', 'Jobe deleted successfully');
    }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function createDocuments($id): View
    // {
    //     // dd($id);
    //     $jobe = Jobe::find($id);
    //     $documents = Document::with('jobe')->active()->get();
    //     // $documents->job()->attach($id, ['attachment' => 'abc']);
    //     dd($documents);
    //     return view('admin.jobe.documents.index', compact('jobe', 'documents'));
    // }
}
