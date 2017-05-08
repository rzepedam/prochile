<?php

namespace ProChile\Http\Controllers;

use ProChile\City;
use ProChile\Company;
use ProChile\Country;
use ProChile\Biometry;
use ProChile\Industry;
use ProChile\Assistance;
use Illuminate\Http\Request;
use ProChile\TypeAssistance;
use Illuminate\Log\Writer as Log;
use Illuminate\Support\Facades\DB;
use ProChile\Http\Requests\AssistanceRequest;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AssistanceController extends Controller
{
    /**
     * @var Assistance
     */
    protected $assistance;

    /**
     * @var Biometry
     */
    protected $biometry;

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
     * @param Biometry $biometry
     * @param City $city
     * @param Company $company
     * @param Country $country
     * @param Industry $industry
     * @param Log $log
     * @param TypeAssistance $typeAssistances
     */
    public function __construct(Assistance $assistance, Biometry $biometry, City $city, Company $company, Country $country,
        Industry $industry, Log $log, TypeAssistance $typeAssistances)
    {
        $this->middleware(['auth']);

        $this->assistance      = $assistance;
        $this->biometry        = $biometry;
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
        $assistances = $this->assistance
            ->with(['city', 'company', 'country', 'industry', 'typeAssistance'])
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
        DB::beginTransaction();

        try
        {
            $assistance = $this->assistance->create($request->all());
            $this->biometry->create($assistance);
            DB::commit();
            session()->flash('message', 'El registro fue almacenado satisfactoriamente.');

            return ['status' => true, 'url' => '/assistances'];
        } catch ( \Exception $e )
        {
            $this->log->error("Error Store Assistance: " . $e->getMessage());
            DB::rollback();

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

            $citiesAux       = $this->city->get();
            $cities          = $citiesAux->pluck('name', 'id');
            $countries       = $this->country->pluck('name', 'id');
            $companies       = $this->company->pluck('name', 'id');
            $industries      = $this->industry->where('city_id', $assistance->city_id)->pluck('name', 'id');
            $typeAssistances = $this->typeAssistances->pluck('name', 'id');

            return view('assistances.edit', compact(
                'assistance', 'cities', 'countries', 'companies', 'industries', 'typeAssistances'
            ));
        } catch ( \Exception $e )
        {
            $this->log->error("Error Edit Assistance: " . $e->getMessage());

            return ['status' => false];
        }
    }

    /**
     * @param Request $request
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function apiUpdatePhotoAssistance(Request $request)
    {
        $this->validate($request, [
            'rut'   => ['required'],
            'photo' => ['required'],
        ]);

        try
        {
            $assistance        = $this->assistance->whereRut($request->get('rut'))->firstOrFail();
            $assistance->photo = $request->get('photo');
            $assistance->save();

            return response()->json(['updated' => 'Resource updated successfully'], 200);
        } catch ( \Exception $e )
        {
            $this->log->error("Error apiUpdatePhotoUser User: " . $e->getMessage());
            if ( $e instanceof ModelNotFoundException )
            {
                $e = new NotFoundHttpException($e->getMessage(), $e);

                return response()->json(['error' => 'Model not found'], 404);
            }

            return response()->json(['status' => false], 500);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request['rut'] = str_replace('.', '', $request->get('rut'));
        $this->validate($request, [
            'type_assistance_id' => ['required', 'in:1,2,3'],
            'city_id'            => ['required', 'exists:cities,id'],
            'company_id'         => ['required', 'exists:companies,id'],
            'industry_id'        => ['required', 'exists:industries,id'],
            'rut'                => ['required', 'unique:assistances,rut,' . $id],
            'first_name'         => ['required'],
            'male_surname'       => ['required'],
            'female_surname'     => ['required'],
            'country_id'         => ['required', 'exists:countries,id'],
            'phone'              => ['required'],
            'email'              => ['required', 'email', 'unique:assistances,email,' . $id]
        ]);

        $request->request->add(['user_id' => auth()->id()]);
        try
        {
            $assistance = $this->assistance->findOrFail($id);
            $assistance->update($request->all());
            session()->flash('message', 'El registro fue actualizado satisfactoriamente.');

            return ['status' => true, 'url' => '/assistances'];
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
        DB::beginTransaction();

        try
        {
            $assistance = $this->assistance->findOrFail($id);
            $this->biometry->delete($assistance);
            $assistance->delete();
            DB::commit();

            return response()->json(['status' => true]);
        } catch ( \Exception $e )
        {
            $this->log->error('Error Delete Assistance: ' . $e->getMessage());
            DB::rollback();

            return response()->json(['status' => false]);
        }
    }
}
