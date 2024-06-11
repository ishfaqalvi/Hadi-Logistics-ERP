<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Jobe;
use App\Models\JobesPassportCheck;
use App\Models\PassportCheck;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

/**
 * Class JobesPassportCheckController
 * @package App\Http\Controllers
 */
class JobesPassportCheckController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function __construct()
    {
        // $this->middleware('permission:jobesPassportChecks-list',  ['only' => ['index']]);
        // $this->middleware('permission:jobesPassportChecks-view',  ['only' => ['show']]);
        // $this->middleware('permission:jobesPassportChecks-create', ['only' => ['create', 'store']]);
        // $this->middleware('permission:jobesPassportChecks-edit',  ['only' => ['edit', 'update']]);
        // $this->middleware('permission:jobesPassportChecks-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id): View
    {
        $jobe = Jobe::find($id);
        $passports = PassportCheck::get();

        return view('admin.jobe.passport-check.index', compact('passports', 'jobe'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request): RedirectResponse
    {
        $jobesPassportCheck = JobesPassportCheck::create($request->all());
        return redirect()->route('jobes-passport-checks.index')
            ->with('success', 'JobesPassportCheck created successfully.');
    }
}
