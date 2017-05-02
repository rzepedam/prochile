<?php

namespace ProChile\Http\Controllers;

use ProChile\City;
use ProChile\Company;
use ProChile\Country;
use ProChile\Industry;
use ProChile\Assistance;
use ProChile\TypeAssistance;
use Illuminate\Log\Writer as Log;
use ProChile\Http\Requests\AssistanceRequest;

class AssistanceController extends Controller
{
    /**
     * @var Assistance
     */
    protected $assistance;

    /**
     * @var City
     */
    protected $city;

    /**
     * @var Company
     */
    protected $company;

    /**
     * @var Country
     */
    protected $country;

    /**
     * @var Industry
     */
    protected $industry;

    /**
     * @var Log
     */
    protected $log;

    /**
     * @var TypeAssistance
     */
    protected $typeAssistances;

    /**
     * AssistanceController constructor.
     *
     * @param Assistance $assistance
     * @param City $city
     * @param Company $company
     * @param Country $country
     * @param Industry $industry
     * @param Log $log
     * @param TypeAssistance $typeAssistances
     */
    public function __construct(Assistance $assistance, City $city, Company $company, Country $country,
        Industry $industry, Log $log, TypeAssistance $typeAssistances)
    {
        $this->middleware(['auth']);

        $this->assistance      = $assistance;
        $this->city            = $city;
        $this->company         = $company;
        $this->country         = $country;
        $this->industry        = $industry;
        $this->log             = $log;
        $this->typeAssistances = $typeAssistances;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assistances = $this->assistance->with(['city', 'company', 'country', 'industry', 'typeAssistance'])
            ->orderBy('created_at', 'DESC')
            ->paginate(10);

        return view('assistances.index', compact('assistances'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $citiesAux       = $this->city->get();
        $cities          = $citiesAux->pluck('name', 'id');
        $countries       = $this->country->pluck('name', 'id');
        $companies       = $this->company->pluck('name', 'id');
        $industries      = $this->industry->where('city_id', $citiesAux->first()->id)->pluck('name', 'id');
        $typeAssistances = $this->typeAssistances->pluck('name', 'id');

        return view('assistances.create', compact(
            'cities', 'companies', 'countries', 'industries', 'typeAssistances'
        ));
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

            return ['status' => true, 'url' => '/assistances'];
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
            $assistance = $this->assistance
                ->with(['city', 'company', 'country', 'industry', 'typeAssistance'])
                ->findOrFail($id);

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
            $assistance = $this->assistance
                ->with(['city', 'company', 'country', 'industry', 'typeAssistance'])
                ->findOrFail($id);

            $cities          = $this->city->pluck('name', 'id');
            $companies       = $this->company->pluck('name', 'id');
            $industries      = $this->industry->pluck('name', 'id');
            $typeAssistances = $this->typeAssistances->pluck('name', 'id');

            return view('assistances.edit', compact(
                'assistance', 'cities', 'companies', 'industries', 'typeAssistances'
            ));
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
        try
        {
            $assistance = $this->assistance->findOrFail($id);
            $assistance->delete();

            return response()->json(['status' => true]);
        } catch ( \Exception $e )
        {
            $this->log->error('Error Delete Assistance: ' . $e->getMessage());

            return response()->json(['status' => false]);
        }
    }
}
