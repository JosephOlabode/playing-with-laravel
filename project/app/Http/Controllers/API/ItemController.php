<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Item;
use Validator;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $listItems = Item::all();
        return $listItems;
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
            'type' => 'required',
            'name' => 'required',
            'company' => 'required',
            'bike_id' => 'required'
        ]);
        if($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $createItem = Item::create($request->all());
        return $createItem;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $showItemById = Item::with('Bike')->findOrFail($id);
        return $showItemById;
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
            'type' => 'required',
            'name' => 'required',
            'company' => 'required',
            'bike_id' => 'required'
        ]);
        if($validator->fails()) {
            return response()->json($validator->errors(), 422);
        }
        $updateItemById = Item::findOrFail($id);
        $updateItemById->update($request->all());
        return $updateItemById;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteItemById = Item::findOrFail($id)->delete();
        return response()->json([], 204);
    }
}
