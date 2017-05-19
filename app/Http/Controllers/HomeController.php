<?php

namespace ProChile\Http\Controllers;

use ProChile\Assistance;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * @var Assistance
     */
    protected $assistance;

    /**
     * Create a new controller instance.
     *
     * @param Assistance $assistance
     */
    public function __construct(Assistance $assistance)
    {
        $this->middleware('auth');

        $this->assistance = $assistance;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nationalities = DB::table('attendances')
            ->select(DB::raw('COUNT(DISTINCT assistance_id) AS count, countries.name'))
            ->join('assistances', 'attendances.assistance_id', 'assistances.id')
            ->join('countries', 'assistances.country_id', '=', 'countries.id')
            ->groupBy('countries.name')
            ->pluck('count', 'name');

        $genders = DB::table('attendances')
            ->select(DB::raw('COUNT(DISTINCT assistance_id) AS count'))
            ->join('assistances', 'attendances.assistance_id', 'assistances.id')
            ->groupBy('assistances.is_male')
            ->pluck('count');

        $firstLapse = DB::table('attendances')
            ->select(DB::raw('COUNT(DISTINCT assistance_id) as num'))
            ->whereRaw("created_at BETWEEN CONCAT(CURDATE(), ' 08:00:00') AND CONCAT(CURDATE(), ' 08:30:00')")
            ->groupBy(DB::raw('UNIX_TIMESTAMP(created_at) DIV 1800'))
            ->pluck('num');

        $lapseTime = DB::table('attendances')
            ->select(DB::raw('COUNT(DISTINCT assistance_id) as num'))
            ->whereRaw("created_at BETWEEN CONCAT(CURDATE(), ' 08:30:00') AND CONCAT(CURDATE(), ' 09:30:00')")
            ->groupBy(DB::raw('UNIX_TIMESTAMP(created_at) DIV 900'))
            ->pluck('num');

        $industries = DB::table('attendances')
            ->select(DB::raw('COUNT(DISTINCT assistance_id) AS count, industries.acr AS acr'))
            ->join('assistances', 'attendances.assistance_id', 'assistances.id')
            ->join('industries', 'assistances.industry_id', '=', 'industries.id')
            ->groupBy('industries.acr')
            ->pluck('count', 'acr');

        // Período 8:00 - 8:30 + lapse de 15 min. hasta 9:30
        $finalLapse = $firstLapse->merge($lapseTime);

        return view('home', compact(
            'nationalities', 'genders', 'finalLapse', 'industries'
        ));
    }


}
