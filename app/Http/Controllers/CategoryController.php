<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Category;
use App\Routine;

class CategoryController extends Controller
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
        $categories = Category::all();

        return response()->json($categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Category::all();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = Category::findOrFail($id);

        return response()->json($category);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function routines() {
        
        $categories = Category::with('routines')->get();
        
        return response()->json($categories);
    }

    public function routinesByDay(Request $request) {
        date_default_timezone_set('America/Lima');
        $timestam = strtotime($request->date);
        $day = date('N', $timestam);

        //dd($day);

        $categories = DB::table('categories')
        ->join('routine_category', 'categories.id', 'routine_category.category_id')
        ->join('routines', 'routine_category.routine_id', 'routines.id')
        ->join('routine_availability', 'routine_availability.routine_id', 'routines.id')
        ->join('available_days', 'routine_availability.available_day_id', 'available_days.id')
        ->select(
            'categories.name as category_name', 
            'routines.id as routine_id', 
            'routines.name as routine_name', 
            'routines.description as routine_desc',
            'available_days.name as day_name',
            'available_days.id as day_id',
            'available_days.day_of_week'
            )
        ->get();

        $categories = $categories->where('day_of_week', $day)->groupBy('category_name');
        
        return response()->json($categories);
    }

    public function routinesByCategory($id) {
        $categorie = Category::findOrFail($id);
        $routines = $categorie->routines;

        return response()->json($routines);
    }
}
