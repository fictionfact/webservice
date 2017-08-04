<?php

namespace App\Http\Controllers;

use App\Models\ShopStag;
use Illuminate\Http\Request;

class ShopStagController extends Controller
{

/**
* 
*    @SWG\Get(
*        path="/api/v1/shop_stag",
*        summary="Retrieves the collection of Shop's Stag resources.",
*        produces={"application/json"},
*        tags={"shop_stag"},
*        @SWG\Response(
*            response=200,
*            description="Shop Stag collection.",
*            @SWG\Schema(
*                type="array",
*                @SWG\Items(ref="#/definitions/shop_stag")
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
        $shop_stag = ShopStag::get();
        return $shop_stag;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        $shop_stag = new shop_stag();
        $shop_stag->shop_stag = $request->shop_stag;
        $shop_stag->save();
        return $shop_stag;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ShopStag  $shopStag
     * @return \Illuminate\Http\Response
     */
    public function show(ShopStag $shopStag)
    {
        $this->grantIfRole('admin');
        $shop_stag = ShopStag::find($id);
        if (empty($shop_stag)){
            return response()->json([
                'message' => 'Record not found',
            ], 404);
        }
        return $shop_stag;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ShopStag  $shopStag
     * @return \Illuminate\Http\Response
     */
    public function edit(ShopStag $shopStag)
    {
        //
    }

/**
* 
*    @SWG\Put(
*        path="/api/v1/shop_stag/{id}",
*        summary="Edit shops stag resources.",
*        produces={"application/json"},
*        tags={"shop_stag"},
*        @SWG\Response(
*            response=200,
*            description="shop stag collection.",
*            @SWG\Schema(
*                type="array",
*                @SWG\Items(ref="#/definitions/shop_stag")
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
     * @param  \App\Models\ShopStag  $shopStag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ShopStag $shopStag)
    {
        $this->grantIfRole('admin');
        $shop_stag = ShopStag::find($id);
        if (empty($shop_stag)){
            return response()->json([
                'message' => 'Record not found',
            ], 404);
        }
        $shop_stag->name = $request->name;
        $shop_stag->save();
        return $shop_stag;
    }

/**
*
*   @SWG\Delete(
*        path="/api/v1/shop_stag/{id}",
*        summary="Removes the Shop Stag resource.",
*        produces={"application/json"},
*        tags={"shop_stag"},
*        @SWG\Response(
*            response=204,
*            description="Shop Stag resource deleted.",
*        ),
*            @SWG\Parameter(
*                name="Authorization",
*                in="header",
*                required=true,
*                type="string"
*            ),
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
     * @param  \App\Models\ShopStag  $shopStag
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShopStag $shopStag)
    {
        $this->grantIfRole('admin');
        $shop_stag = ShopStag::find($id);
        if (empty($shop_stag)){
            return response()->json([
                'message' => 'Record not found',
            ], 404);
        }
        $shop_stag->delete();
        return response()->json([
            'message' => 'Record deleted',
        ]);
    }
}
