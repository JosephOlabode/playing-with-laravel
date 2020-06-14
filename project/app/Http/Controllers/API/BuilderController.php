<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\BuildersResource;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Builder;
use Validator;

class BuilderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listBuilder = Builder::all();
        return $listBuilder;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'location' => 'required'
        ]);
        if($validator->fails()) {
           return response()->json($validator->errors(), 422);
        }
        $createBuilder = Builder::create($request->all());
        return $createBuilder;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($builder)
    {
        /*$showBuilderById = Builder::with('Bike')->findOrFail($id);
        return $showBuilderById;*/
        return new BuildersResource($builder);
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
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'description' => 'required',
            'location' => 'required'
        ]);
        if($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $updateBuilderById = Builder::findOrFail($id);
        $updateBuilderById->update($request->all());
        return $updateBuilderById;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteBikeById = Bike::find($id)->delete();
        return response()->json([], 204);
    }
}
