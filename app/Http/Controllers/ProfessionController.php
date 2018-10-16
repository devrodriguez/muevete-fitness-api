<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Profession;

class ProfessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Profession::all();
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
        $profession = Profession::create($data);
        return response()->json([
            'profession' => $profession,
            'url' => "/professions/{$profession->id}"
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
        $profession = Profession::findOrFail($id);
        return $profession;
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
        $profession = Profession::findOrFail($id);
        $profession->update($data);
        return $profession;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $profession = Profession::findOrFail($id);
        $profession->delete();
        return response()->json([
            'message' => 'Deleted successfully',
            'url' => '/professions'
        ], 200);
    }
}
