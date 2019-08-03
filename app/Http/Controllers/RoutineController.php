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

    public function scheduled($id = null) {
        $scheduled = DB::table('schedule_session')
        ->join('customers', 'schedule_session.customer_id', 'customers.id')
        ->join('weeklies', 'schedule_session.weekly_id', 'weeklies.id')
        ->join('routines', 'weeklies.routine_id', 'routines.id')
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

        return response()->json($scheduled->get());
    }
}
