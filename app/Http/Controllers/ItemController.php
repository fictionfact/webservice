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
    
    {   $this->grantIfRole('admin');
        $item = Item::get();
        return $item;
    }

/**
* 
*    @SWG\POST(
*        path="/api/v1/item/{id}",
*        summary="add Customer resources.",
*        produces={"application/json"},
*        tags={"item"},
*        @SWG\Response(
*            response=200,
*            description="item collection.",
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
*            ),
*        @SWG\Parameter(
*            name="body",
*            in="body",
*            required=true,
*            type="string",
*            @SWG\Schema(
*            type="string"
*            )
*        )
*        )
*/
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->grantIfRole('admin');
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
        $this->grantIfRole('admin');
        $item = Item::find($id);
        if (empty($item)){
            return response()->json([
                'message' => 'Record not found',
            ], 404);
        }
        return $item;
    }

/**
* 
*    @SWG\Put(
*        path="/api/v1/item/{id}",
*        summary="Edit item resources. name,price,stock",
*        produces={"application/json"},
*        tags={"item"},
*        @SWG\Response(
*            response=200,
*            description="item collection.",
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
*            ),
*           @SWG\Parameter(
*            name="id",
*            in="path",
*            required=true,
*            type="integer"
*           ),
*        @SWG\Parameter(
*            name="body",
*            in="body",
*            required=true,
*            type="string",
*            @SWG\Schema(
*            type="string"
*            )
*        )
*        )
*/
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->grantIfRole('admin');
        $item = Item::find($id);
        if (empty($item)){
            return response()->json([
                'message' => 'Record not found',
            ], 404);
        }
        $item->name = $request->name;
        $item->price = $request->price;
        $item->stock = $request->stock;
        $item->save();
        return $item;
    }





    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->grantIfRole('admin');
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
