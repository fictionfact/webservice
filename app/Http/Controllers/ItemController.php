<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;

class ItemController extends Controller
{

    
/**
* 
*    @SWG\Get(
*        path="/api/v1/item",
*        summary="Retrieves the collection of Item resources.",
*        produces={"application/json"},
*        tags={"item"},
*        @SWG\Response(
*            response=200,
*            description="Item collection.",
*            @SWG\Schema(
*                type="array",
*                @SWG\Items(ref="#/definitions/item")
*                )
*            ),
*            @SWG\Response(
*                response=401,
*                description="Unauthorized action.",
*            ),
*            @SWG\Parameter(
*                name="Authorization",
*                in="header",
*                required=true,
*                type="string"
*            )
*        )
*/


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $item = Item::get();
        return $item;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $item = new item();
        $item->item = $request->item;
        $item->save();
        return $item;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Item::find($id);
        if (empty($item)){
            return response()->json([
                'message' => 'Record not found',
            ], 404);
        }
        return $item;
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
        $item = Item::find($id);
        if (empty($item)){
            return response()->json([
                'message' => 'Record not found',
            ], 404);
        }
        $item->item = $request->item;
        $item->save();
        return $item;
    }

/**
*
*   @SWG\Delete(
*        path="/api/v1/item/{id}",
*        summary="Removes the Item resource.",
*        produces={"application/json"},
*        tags={"item"},
*        @SWG\Response(
*            response=204,
*            description="Item resource deleted.",
*        ),
*        @SWG\Response(
*            response=401,
*            description="Unauthorized action.",
*        ),
*        @SWG\Response(
*            response=404,
*            description="Resource not found.",
*        ),
*        @SWG\Parameter(
*            name="id",
*            in="path",
*            required=true,
*            type="integer"
*        )
*    )
*/



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Item::find($id);
        if (empty($item)){
            return response()->json([
                'message' => 'Record not found',
            ], 404);
        }
        $item->delete();
        return response()->json([
            'message' => 'Record deleted',
        ]);
    }

}
