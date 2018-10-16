<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Trainer;

class TrainerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Trainer::all();
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
        $trainer = Trainer::create($data);
        return response()->json([
            'trainer' => $trainer,
            'url' => "/trainers/{$trainer->id}"
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
        $trainer = Trainer::findOrFail($id);
        return $trainer;
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
        $trainer = Trainer::findOrFail($id);
        $trainer->update($data);

        return response()->json($trainer, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $trainer = Auditor::findOrFail($id);
        $trainer->delete();
        return response()->json([
            'message' => 'Deleted successfully',
            'url' => '/api/trainers'
        ], 200);
    }
}
