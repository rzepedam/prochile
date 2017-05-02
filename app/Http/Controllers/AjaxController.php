<?php

namespace ProChile\Http\Controllers;

use ProChile\City;
use Illuminate\Log\Writer as Log;

class AjaxController extends Controller
{
    protected $log;

    public function __construct(Log $log)
    {
    	$this->log = $log;
    }

    public function loadIndustries()
    {
        try
        {
            $industries = City::findOrFail(request('id'))->industries->pluck('name', 'id');

            return ['status' => true, 'industries' => $industries];
        } catch ( \Exception $e )
        {
            $this->log->error("Error loadIndustries(): " . $e->getMessage());

            return ['status' => false];
        }
    }
}
