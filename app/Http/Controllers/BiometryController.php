<?php

namespace ProChile\Http\Controllers;

use ProChile\Biometry;
use Illuminate\Http\Request;

class BiometryController extends Controller
{
    protected $biometry;

    public function __construct(Biometry $biometry)
    {
        $this->biometry = $biometry;
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
