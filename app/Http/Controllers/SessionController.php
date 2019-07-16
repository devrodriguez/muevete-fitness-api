<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

use App\Session;

class SessionController extends Controller
{
    public function __construct() {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Session::orderBy("startHour")->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $session = Session::create($data);
        return response()->json([
            'session' => $session,
            'url' => "/sessions/{$session->id}"
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $session = Session::findOrFail($id);
        return $session;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();
        $session = Session::findOrFail($id);
        $session->update($data);
        return $session;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $session = Session::findOrFail($id);
        $session->delete();
        return response()->json([
            'message' => 'Deleted successfully',
            'url' => '/Sessions'
        ], 200);
    }

    public function schedule(Request $request) 
    {
        $reqdata = $request->all();

        $customer = $reqdata['customer'];
        $routine = $reqdata['routine'];
        $session = $reqdata['session'];
        $date = $reqdata['date'];

        DB::table('schedule_session')->insert([
            "customer_id" => $customer,
            "routine_id" => $routine,
            "session_id" => $session,
            "session_date" => $date,
        ]);        

        return response()->json([
            "message" => "Sesion programada",
            "status" => Response::HTTP_OK,
            'url' => '/'
        ]);
    }
}
