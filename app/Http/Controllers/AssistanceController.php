<?php

namespace ProChile\Http\Controllers;

use ProChile\Company;
use ProChile\Industry;
use ProChile\Assistance;
use Illuminate\Http\Request;
use Illuminate\Log\Writer as Log;
use ProChile\Http\Requests\AssistanceRequest;

class AssistanceController extends Controller
{
    /**
     * @var Assistance
     */
    protected $assistance;

    /**
     * @var Company
     */
    protected $company;

    /**
     * @var Industry
     */
    protected $industry;

    /**
     * @var Log
     */
    protected $log;

    /**
     * AssistanceController constructor.
     *
     * @param Assistance $assistance
     * @param Company $company
     * @param Industry $industry
     * @param Log $log
     */
    public function __construct(Assistance $assistance, Company $company, Industry $industry, Log $log)
    {
        $this->middleware(['auth'])->only('create', 'store', 'show', 'edit', 'update');
        $this->assistance = $assistance;
        $this->company    = $company;
        $this->industry   = $industry;
        $this->log        = $log;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies  = $this->company->pluck('name', 'id');
        $industries = $this->industry->pluck('name', 'id');

        return view('assistances.create', compact('companies', 'industries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param AssistanceRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(AssistanceRequest $request)
    {
        $request->request->add(['user_id' => auth()->id()]);
        try
        {
            $this->assistance->create($request->all());

            return ['status' => true];
        } catch ( \Exception $e )
        {
            $this->log->error("Error Store Assistance: " . $e->getMessage());

            return ['status' => false];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try
        {
            $assistance = $this->assistance->with(['company'])->findOrFail($id);

            return view('assistances.show', compact('assistance'));
        } catch ( \Exception $e )
        {
            $this->log->error("Error Show Assistance: " . $e->getMessage());

            return ['status' => false];
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try
        {
            $assistance = $this->assistance->with(['company', 'industry'])->findOrFail($id);
            $companies  = $this->company->pluck('name', 'id');
            $industries = $this->industry->pluck('name', 'id');

            return view('assistances.edit', compact('assistance', 'companies', 'industries'));
        } catch ( \Exception $e )
        {
            $this->log->error("Error Edit Assistance: " . $e->getMessage());

            return ['status' => false];
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param AssistanceRequest $request
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(AssistanceRequest $request, $id)
    {
        $request->request->add(['user_id' => auth()->id()]);
        try
        {
            $assistance = $this->assistance->findOrFail($id);
            $assistance->update($request->all());

            return ['status' => true];
        } catch ( \Exception $e )
        {
            $this->log->error("Error Update Assistance: " . $e->getMessage());

            return ['status' => false];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
