<?php

namespace ProChile\Http\Controllers;

use ProChile\Role;
use ProChile\User;
use ProChile\Mail\SignUp;
use Illuminate\Http\Request;
use Illuminate\Log\Writer as Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use ProChile\Http\Requests\UserRequest;

class UserController extends Controller
{
    /**
     * @var Log
     */
    protected $log;

    /**
     * @var Role
     */
    protected $role;

    /**
     * @var User
     */
    protected $user;

    /**
     * UserController constructor.
     *
     * @param Log $log
     * @param Role $role
     * @param User $user
     */
    public function __construct(Log $log, Role $role, User $user)
    {
        $this->log  = $log;
        $this->role = $role;
        $this->user = $user;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = $this->user->with(['role'])
            ->orderBy('created_at', 'DESC')
            ->paginate(10);

        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = $this->role->pluck('name', 'id');

        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param UserRequest $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $password = str_random(15);
        $request->request->add(['password' => bcrypt($password)]);
        DB::beginTransaction();

        try
        {
            $user = $this->user->create($request->all());
            Mail::to($user)->send(new SignUp($password, $user));   // Sending email with credentials...
            DB::commit();

            return ['status' => true, 'url' => '/users'];
        } catch ( \Exception $e )
        {
            $this->log->error("Error Store User: " . $e->getMessage());
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
        //
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
            $user = $this->user->findOrFail($id);
            $user->delete();

            return response()->json(['status' => true]);
        } catch ( \Exception $e )
        {
            $this->log->error('Error Delete User: ' . $e->getMessage());

            return response()->json(['status' => false]);
        }
    }
}
