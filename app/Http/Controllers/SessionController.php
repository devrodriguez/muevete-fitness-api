<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;

use App\Session;

class SessionController extends Controller
{
    public function __construct() {
        //$this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Session::orderBy("start_hour")->get();
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
            'url' => '/sessions'
        ], 200);
    }

    public function schedule(Request $request) 
    {
        $reqdata = $request->all();

        $customer = $reqdata['customer'];
        $calendar = $reqdata['calendar'];

        DB::table('schedule_session')->insert([
            "customer_id" => $customer,
            "calendar_id" => $calendar
        ]);        

        return response()->json([
            "message" => "Sesion programada",
            "status" => Response::HTTP_OK,
            'url' => '/'
        ]);
    }

    public function scheduled($date, $routine) {
        //$sessions = Session::all();

        $scheduledSessions = DB::table('schedule_session')
        ->join('customers', 'schedule_session.customer_id', '=', 'customers.id')
        //->join('routines', 'schedule_session.routine_id', '=', 'routines.id')
        ->rightJoin('calendars', 'schedule_session.calendar_id', 'calendars.id')
        ->join('sessions', 'calendars.session_id', '=', 'sessions.id')
        ->where('calendars.routine_id', '=', $routine)
        ->whereDate('calendars.session_date', '=', $date)
        ->orderBy('sessions.start_hour', 'asc')
        ->select('schedule_session.customer_id',
                 'calendars.session_date', 
                 'calendars.id as calendar_id',
                 'calendars.routine_id', 
                 'calendars.session_id',
                 'sessions.name',
                 'sessions.period',
                 'sessions.start_hour',
                 'sessions.final_hour')
        ->get();

        return response()->json($scheduledSessions);
    }
}
