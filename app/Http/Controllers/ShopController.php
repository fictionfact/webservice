<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;

class ShopController extends Controller
{

/**
* 
*    @SWG\Get(
*        path="/api/v1/shop",
*        summary="Retrieves the collection of Shop resources.",
*        produces={"application/json"},
*        tags={"shop"},
*        @SWG\Response(
*            response=200,
*            description="Shop collection.",
*            @SWG\Schema(
*                type="array",
*                @SWG\Items(ref="#/definitions/shop")
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
        $shop = Shop::get();
        return $shop;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $shop = new shop();
        $shop->shop = $request->shop;
        $shop->save();
        return $shop;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shop = Shop::find($id);
        if (empty($shop)){
            return response()->json([
                'message' => 'Record not found',
            ], 404);
        }
        return $shop;
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
        $shop = Shop::find($id);
        if (empty($shop)){
            return response()->json([
                'message' => 'Record not found',
            ], 404);
        }
        $shop->shop = $request->shop;
        $shop->save();
        return $shop;
    }

/**
*
*   @SWG\Delete(
*        path="/api/v1/shop/{id}",
*        summary="Removes the Shop resource.",
*        produces={"application/json"},
*        tags={"shop"},
*        @SWG\Response(
*            response=204,
*            description="Shop resource deleted.",
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
        $shop = Shop::find($id);
        if (empty($shop)){
            return response()->json([
                'message' => 'Record not found',
            ], 404);
        }
        $shop->delete();
        return response()->json([
            'message' => 'Record deleted',
        ]);
    }

}
