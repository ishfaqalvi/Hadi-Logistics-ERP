<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;

use App\Models\Agent;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

/**
 * Class AgentController
 * @package App\Http\Controllers
 */
class AgentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        $this->middleware('permission:agents-list',  ['only' => ['index']]);
        $this->middleware('permission:agents-view',  ['only' => ['show']]);
        $this->middleware('permission:agents-create',['only' => ['create','store']]);
        $this->middleware('permission:agents-edit',  ['only' => ['edit','update']]);
        $this->middleware('permission:agents-delete',['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        $agents = Agent::get();

        return view('admin.agent.index', compact('agents'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        $agent = new Agent();
        return view('admin.agent.create', compact('agent'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
       $agent = Agent::create($request->all());
        return redirect()->route('agents.index')
            ->with('success', 'Agent created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id): View
    {
        $agent = Agent::find($id);

        return view('admin.agent.show', compact('agent'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id): View
    {
        $agent = Agent::find($id);

        return view('admin.agent.edit', compact('agent'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Agent $agent
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Agent $agent): RedirectResponse
    {
        $agent->update($request->all());

        return redirect()->route('agents.index')
            ->with('success', 'Agent updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id): RedirectResponse
    {
        $agent = Agent::find($id)->delete();

        return redirect()->route('agents.index')
            ->with('success', 'Agent deleted successfully');
    }
}
