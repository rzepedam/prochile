<?php

namespace ProChile\Http\Controllers;

use ProChile\Company;
use Illuminate\Http\Request;
use Illuminate\Log\Writer as Log;

class CompanyController extends Controller
{
    /**
     * @var Company
     */
    protected $company;

    /**
     * @var Log
     */
    protected $log;

    /**
     * CompanyController constructor.
     *
     * @param Company $company
     * @param Log $log
     */
    public function __construct(Company $company, Log $log)
    {
        $this->company = $company;
        $this->log     = $log;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = $this->company->orderBy('created_at', 'DESC')->paginate(10);

        return view('companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->request->add(['user_id' => auth()->id()]);
        $this->validate($request, [
            'name' => ['required', 'unique:companies,name,' . $request->get('name')]
        ]);

        try
        {
            $this->company->create($request->all());

            return ['status' => true, 'url' => '/companies'];
        } catch ( \Exception $e )
        {
            $this->log->error("Error Store Company: " . $e->getMessage());

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
            $company = $this->company->findOrFail($id);
            $company->delete();

            return response()->json(['status' => true]);
        } catch ( \Exception $e )
        {
            $this->log->error('Error Delete Company: ' . $e->getMessage());

            return response()->json(['status' => false]);
        }
    }
}
