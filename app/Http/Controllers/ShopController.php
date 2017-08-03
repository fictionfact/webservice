<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;

class ShopController extends Controller
{

/**
* 
*    @SWG\Get(
*        path="/api/v1/Shop",
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
        $this->grantIfRole('admin');
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
        $this->grantIfRole('admin');
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
        $this->grantIfRole('admin');
        $shop = Shop::find($id);
        if (empty($shop)){
            return response()->json([
                'message' => 'Record not found',
            ], 404);
        }
        return $shop;
    }

/**
* 
*    @SWG\Put(
*        path="/api/v1/Shop/{id}",
*        summary="Edit shops resources.",
*        produces={"application/json"},
*        tags={"shop"},
*        @SWG\Response(
*            response=200,
*            description="shop collection.",
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
        $shop = Shop::find($id);
        if (empty($shop)){
            return response()->json([
                'message' => 'Record not found',
            ], 404);
        }
        $shop->name = $request->name;
        $shop->save();
        return $shop;
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
