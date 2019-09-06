<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpFoundation\Response;
use Carbon\Carbon;

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
        return Session::orderBy("period")->get();
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
        $weekly = $request->weekly;
        $customer = $request->customer;
        $date = $request->date;

        $scheduled = DB::table('schedule_session')
        ->where('weekly_id', '=', $weekly)
        ->where(
            DB::raw("date_format(session_date, '%Y-%m-%d')"), 
            '=', 
            DB::raw("date_format('".$date."', '%Y-%m-%d')")
        )
        ->select('*')
        ->get();

        if($scheduled->count() > 20) {
            return response()->json([
                'message' => 'Full'
            ]);
        }

        DB::table('schedule_session')->insert([
            "weekly_id" => $weekly,
            "customer_id" => $customer,
            "session_date" => $date,
            "created_at" => Carbon::now()
        ]);        

        return response()->json([
            "message" => "Sesion programada",
            "status" => Response::HTTP_OK,
            'url' => '/'
        ]);
    }

    public function scheduled(Request $request) {
        $date = $request->date;
        $routine = $request->routine;
        $customer = $request->customer;
        //dd($date);

        $scheduledSessions = DB::table('schedule_session')
        ->join('customers', 'schedule_session.customer_id', '=', 'customers.id')
        ->rightJoin('weeklies', function($join) use ($customer, $date) {
            $join->on('schedule_session.weekly_id', '=', 'weeklies.id');
            $join->on('schedule_session.customer_id', '=', DB::raw($customer));
            $join->on(
                DB::raw("date_format(schedule_session.session_date, '%Y-%m-%d')"), 
                '=', 
                DB::raw("date_format('".$date."', '%Y-%m-%d')")
            );
        })
        ->join('sessions', 'weeklies.session_id', '=', 'sessions.id')
        ->join('routine_availability', 'weeklies.routine_availability_id', 'routine_availability.id')
        ->join('routines', 'routine_availability.routine_id', 'routines.id')
        ->where('routines.id', '=', $routine)
        ->orderBy('sessions.start_hour', 'asc')
        ->select('schedule_session.customer_id',
                 'schedule_session.session_date', 
                 'weeklies.id as weekly_id',
                 'weeklies.session_id',
                 'sessions.name',
                 'sessions.period',
                 'sessions.start_hour',
                 'sessions.final_hour')
        ->get();

        return response()->json($scheduledSessions);
    }

    public function cancelScheduled(Request $request) {
        $weekly = $request->weekly; 
        $customer = $request->customer; 
        $date = $request->date;

        $deleted = DB::table('schedule_session')
        ->where('schedule_session.weekly_id', '=', $weekly)
        ->where('schedule_session.customer_id', '=', $customer)
        ->where(
            DB::raw("date_format(schedule_session.session_date, '%Y-%m-%d')"), 
            '=', 
            DB::raw("date_format('".$date."', '%Y-%m-%d')")
        )
        ->delete();

        return response()->json($deleted);
    }
}
