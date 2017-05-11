<?php

namespace ProChile\Http\Controllers;

use ProChile\Assistance;
use ProChile\Attendance;
use Illuminate\Http\Request;
use Illuminate\Log\Writer as Log;
use Illuminate\Support\Facades\DB;
use ProChile\Notifications\WelcomeSMS;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class AttendanceController extends Controller
{
    /**
     * @var Assistance
     */
    protected $assistance;

    /**
     * @var Attendance
     */
    protected $attendance;

    /**
     * @var Log
     */
    protected $log;

    /**
     * AttendanceController constructor.
     *
     * @param Assistance $assistance
     * @param Attendance $attendance
     * @param Log $log
     */
    public function __construct(Assistance $assistance, Attendance $attendance, Log $log)
    {
        $this->assistance = $assistance;
        $this->attendance = $attendance;
        $this->log        = $log;
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        $attendances = $this->attendance->with(['assistance'])
            ->orderBy('created_at', 'DESC')
            ->paginate(10);

        return view('attendances.index', compact('attendances'));
    }

    /**
     * @param Request $request
     *
     * @return array
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'rut'        => ['required'],
            'created_at' => ['required', 'unique:attendances,created_at']
        ]);

        DB::beginTransaction();
        try
        {
            $assistance = $this->assistance->with(['attendances'])->whereRut($request->get('rut'))->firstOrFail();
            $assistance->attendances()->create($request->all());
            if ( $assistance->attendances->count() == 0 )
            {
                $assistance->notify(new WelcomeSMS($assistance));
            }
            DB::commit();

            return response()->json(['created' => 'Resource created successfully'], 201);
        } catch ( \Exception $e )
        {
            $this->log->error("Error Store Attendance: " . $e->getMessage());
            DB::rollback();
            if ( $e instanceof ModelNotFoundException )
            {
                $e = new NotFoundHttpException($e->getMessage(), $e);

                return response()->json(['error' => 'Model not found'], 404);
            }

            return response()->json(['status' => false], 500);
        }
    }
}
