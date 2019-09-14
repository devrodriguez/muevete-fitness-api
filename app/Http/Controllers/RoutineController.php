<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Routine;
use App\Category;

class RoutineController extends Controller
{
    public function __construct() {
        //$this->middleware('auth', ['only' => ['index', 'create', 'update', 'delete']]);
        //$this->middleware('auth');
        //$this->middleware('jwt.auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Routine::all();
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
        $routine = Routine::create($data);
        return response()->json([
            'routine' => $routine,
            'url' => "/routines/{$routine->id}"
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
        $routine = Routine::findOrFail($id);
        return $routine;
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
        $routine = Routine::findOrFail($id);
        $routine->update($data);
        return $routine;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $routine = Routine::findOrFail($id);
        $routine->delete();
        return response()->json([
            'message' => 'Deleted successfully',
            'url' => '/routines'
        ], 200);
    }

    public function byCategory($id) 
    {
        $category = Category::findOrFail($id);
        $routines = $category->routines;

        return response()->json($routines);
    }

    public function scheduled(Request $request) {
        $id = $request->id;
        $date = $request->date;

        $scheduled = DB::table('schedule_session')
        ->join('customers', 'schedule_session.customer_id', 'customers.id')
        ->join('weeklies', 'schedule_session.weekly_id', 'weeklies.id')
        ->join('routine_availability', 'weeklies.routine_availability_id', 'routine_availability.id')
        ->join('routines', 'routine_availability.routine_id', 'routines.id')
        ->join('sessions', 'weeklies.session_id', 'sessions.id')
        ->select(
            'customers.name as customer_name', 
            'customers.last_name as customer_last_name', 
            'routines.name as routine_name',
            'sessions.name as session_name',
            'sessions.period as session_period',
            'schedule_session.session_date');

        if ($id > 0) {
            $scheduled->where('routines.id', '=', $id);
        }

        if (!empty($date)) {
            $scheduled->where(
                DB::raw("date_format(schedule_session.session_date, '%Y-%m-%d')"), 
                '=', 
                DB::raw("date_format('".$date."', '%Y-%m-%d')")
            );
        }

        return response()->json($scheduled->get());
    }

    public function createScheduleRoutine(Request $request) {
        $routine = $request->routine;
        $day = $request->day;
        $session = $request->session;
        $message = [];
        $inserted = -1;

        $available = DB::table('routine_availability')
        ->where('routine_id', $routine)
        ->where('available_day_id', $day)
        ->where('enabled', true)
        ->first();

        if($available) {
            $inserted = DB::table('weeklies')
            ->updateOrInsert([
                "routine_availability_id" => $available->id,
                "session_id" => $session
            ],
            [
                "enabled" => true
            ]);

            if($inserted) {
                array_push($message, "Sesion creada");
            } else {
                array_push($message, "Esta sesion ya existe");
            }
        }
        else {
            array_push($message, "Esta rutina no tiene disponibilidad para este día");
        }

        return response()->json([
            "data" => $inserted,
            "message" => $message
        ]);
    }

    public function removeScheduleRoutine(Request $request) {
        $removed = -1;

        $scheduledCount = DB::table('schedule_session')
        ->join('weeklies', 'schedule_session.weekly_id', 'weeklies.id')
        ->where('weeklies.enabled', true)
        ->where('weeklies.id', $request->weeklie_id)
        ->count();

        if($scheduledCount > 0) {
            return response()->json([
                "data" => $removed,
                "message" => ["Esta sesion ya tiene agenda"]
            ]);
        }

        $disabled = DB::table('weeklies')
        ->where('id', $request->weeklie_id)
        ->update([
            'weeklies.enabled' => false
        ]);

        return response()->json([
            "data" => $disabled,
            "message" => ["Session deshabilitada"]
        ]);
    }

    public function getScheduleRoutine(Request $request) {
        $schedules = DB::table('weeklies')
        ->join('sessions', 'weeklies.session_id', 'sessions.id')
        ->join('routine_availability', 'weeklies.routine_availability_id', 'routine_availability.id')
        ->join('routines', 'routine_availability.routine_id', 'routines.id')
        ->join('available_days', 'routine_availability.available_day_id', 'available_days.id')
        ->where('weeklies.enabled', true)
        ->orderBy('routines.name')
        ->orderBy('available_days.day_of_week')
        ->orderBy('sessions.start_hour')
        ->orderBy('sessions.period')
        ->select(
            'routines.id as routine_id',
            'routines.name as routine_name',
            'weeklies.id as weeklie_id',
            'weeklies.routine_availability_id',
            'sessions.id as session_id',
            'sessions.name as session_name',
            'sessions.period',
            'available_days.id as available_day_id',
            'available_days.name as available_day_name'
        )
        ->get();

        return response()->json($schedules);
    }

    public function getRoutineAvailabilities() {
        $availables = DB::table('routine_availability')
        ->join('routines', 'routine_availability.routine_id', 'routines.id')
        ->join('available_days', 'routine_availability.available_day_id', 'available_days.id')
        ->where('routine_availability.enabled', true)
        ->orderBy('routines.name')
        ->orderBy('available_days.day_of_week')
        ->select(
            'routine_availability.id',
            'routines.id as routine_id',
            'routines.name as routine_name',
            'available_days.id as available_days_id',
            'available_days.name as available_days_name'
        )
        ->get();

        return response()->json($availables);
    }

    public function removeRoutineAvailabilities(Request $request) {
        $removed = -1;

        $scheduledCount = DB::table('schedule_session')
        ->join('weeklies', 'schedule_session.weekly_id', 'weeklies.id')
        ->join('routine_availability', 'weeklies.routine_availability_id', 'routine_availability.id')
        ->where('weeklies.enabled', true)
        ->where('routine_availability.id', $request->id)
        ->count();

        $weeklieCount = DB::table('weeklies')
        ->where('routine_availability_id', $request->id)
        ->where('enabled', true)
        ->count();

        if($scheduledCount > 0) {
            return response()->json([
                "data" => $removed,
                "message" => ["Esta rutina ya tiene ".$scheduledCount." sesiones agendadas"]
            ]);
        }
        else if ($weeklieCount > 0) {
            return response()->json([
                "data" => $removed,
                "message" => ["Esta rutina ya tiene ".$weeklieCount." sesiones programadas"]
            ]);
        }

        $removed = DB::table('routine_availability')
        ->where('id', $request->id)
        ->update([
            'enabled' => false
        ]);

        return response()->json([
            "data" => $removed,
            "message" => ["Disponibilidad eliminada"]
        ]);
    }

    public function createRoutineAvailability(Request $request) {
        $routine = $request->routine;
        $day = $request->day;

        $inserted = DB::table('routine_availability')
        ->updateOrInsert([
            "routine_id" => $routine,
            "available_day_id" => $day
        ],
        [
            "enabled" => true
        ]);

        return response()->json([
            "data" => $inserted,
            "message" => "Rutina asignada"
        ]);
    }

    public function getRoutineCategories() {
        $routines = DB::table('routine_category as rc')
        ->join('categories as c', 'rc.category_id', 'c.id')
        ->join('routines as r', 'rc.routine_id', 'r.id')
        ->orderBy('c.name')
        ->orderBy('r.name')
        ->select(
            'c.id as category_id',
            'c.name as category_name',
            'r.id as routine_id',
            'r.name as routine_name'
        )->get();

        return response()->json($routines);
    }

    public function removeRoutineCategory(Request $request) {
        //dd($request);

        $removed = DB::table('routine_category')
        ->where('category_id', $request->category_id)
        ->where('routine_id', $request->routine_id)
        ->delete();

        return response()->json($removed);
    }

    public function createRoutineCategory(Request $request) {
        $inserted = DB::table('routine_category')
        ->insert([
            "category_id" => $request->category_id,
            "routine_id" => $request->routine_id
        ]);

        return response()->json($inserted);
    }
}
