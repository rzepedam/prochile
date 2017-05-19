<?php

namespace ProChile\Http\Controllers;

use ProChile\Biometry;
use ProChile\Assistance;

class BiometryController extends Controller
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
     * BiometryController constructor.
     *
     * @param Assistance $assistance
     * @param Biometry $biometry
     */
    public function __construct(Assistance $assistance, Biometry $biometry)
    {
        $this->biometry   = $biometry;
        $this->assistance = $assistance;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $biometries = $this->biometry->all();

        return view('biometries.index', compact('biometries'));
    }
}
