<?php

namespace App\Http\Controllers\Admin\Catalog;

use App\Http\Controllers\Controller;

use App\Models\Shed;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

/**
 * Class ShedController
 * @package App\Http\Controllers
 */
class ShedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:sheds-list',  ['only' => ['index']]);
        $this->middleware('permission:sheds-view',  ['only' => ['show']]);
        $this->middleware('permission:sheds-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:sheds-edit',  ['only' => ['edit', 'update']]);
        $this->middleware('permission:sheds-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $sheds = Shed::get();

        return view('admin.catalog.shed.index', compact('sheds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        $shed = new Shed();
        return view('admin.catalog.shed.create', compact('shed'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        $shed = Shed::create($request->all());
        return redirect()->route('sheds.index')
            ->with('success', 'Shed created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): View
    {
        $shed = Shed::find($id);

        return view('admin.catalog.shed.show', compact('shed'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id): View
    {
        $shed = Shed::find($id);

        return view('admin.catalog.shed.edit', compact('shed'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Shed $shed
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shed $shed): RedirectResponse
    {
        $shed->update($request->all());

        return redirect()->route('sheds.index')
            ->with('success', 'Shed updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id): RedirectResponse
    {
        $shed = Shed::find($id)->delete();

        return redirect()->route('sheds.index')
            ->with('success', 'Shed deleted successfully');
    }
}
