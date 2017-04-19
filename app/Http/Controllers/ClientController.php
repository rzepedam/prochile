<?php

namespace ProChile\Http\Controllers;

use ProChile\Client;
use ProChile\Company;
use Illuminate\Http\Request;
use Illuminate\Log\Writer as Log;
use ProChile\Http\Requests\ClientRequest;
use ProChile\Industry;

class ClientController extends Controller
{
    /**
     * @var Client
     */
    protected $client;

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
     * ClientController constructor.
     *
     * @param Client $client
     * @param Company $company
     * @param Industry $industry
     * @param Log $log
     */
    public function __construct(Client $client, Company $company, Industry $industry, Log $log)
    {
        $this->middleware(['auth'])->only('create', 'store', 'show', 'edit', 'update');

        $this->client   = $client;
        $this->company  = $company;
        $this->industry = $industry;
        $this->log      = $log;
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
        $companies = $this->company->pluck('name', 'id');
        $industries = $this->industry->pluck('name', 'id');

        return view('clients.create', compact('companies', 'industries'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ClientRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ClientRequest $request)
    {
        $request->request->add(['user_id' => auth()->id()]);
        try
        {
            $this->client->create($request->all());

            return ['status' => true];
        } catch ( \Exception $e )
        {
            $this->log->error("Error Store Client: " . $e->getMessage());

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
            $client = $this->client->with(['company'])->findOrFail($id);

            return view('clients.show', compact('client'));
        } catch ( \Exception $e )
        {
            $this->log->error("Error Show Client: " . $e->getMessage());

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
            $client     = $this->client->findOrFail($id);
            $companies  = $this->company->pluck('name', 'id');
            $industries = $this->industry->pluck('name', 'id');

            return view('clients.edit', compact('client', 'companies', 'industries'));
        } catch ( \Exception $e )
        {
            $this->log->error("Error Edit Client: " . $e->getMessage());

            return ['status' => false];
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param ClientRequest $request
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(ClientRequest $request, $id)
    {
        $request->request->add(['user_id' => auth()->id()]);
        try
        {
            $client = $this->client->findOrFail($id);
            $client->update($request->all());

            return ['status' => true];
        } catch ( \Exception $e )
        {
            $this->log->error("Error Update Client: " . $e->getMessage());

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
