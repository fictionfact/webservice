<?php

namespace App\Http\Controllers;

use App\Models\ShopLocation;
use Illuminate\Http\Request;

class ShopLocationController extends Controller
{

/**
* 
*    @SWG\Get(
*        path="/api/v1/shop_location",
*        summary="Retrieves the collection of Shop's Locations resources.",
*        produces={"application/json"},
*        tags={"shop_location"},
*        @SWG\Response(
*            response=200,
*            description="Shop Locations collection.",
*            @SWG\Schema(
*                type="array",
*                @SWG\Items(ref="#/definitions/shop_location")
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
        $shop_location = ShopLocation::get();
        return $shop_location;
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
        $shop_location = new shop_location();
        $shop_location->shop_location = $request->shop_location;
        $shop_location->save();
        return $shop_location;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ShopLocation  $shopLocation
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->grantIfRole('admin');
        $shop_location = ShopLocation::find($id);
        if (empty($shop_location)){
            return response()->json([
                'message' => 'Record not found',
            ], 404);
        }
        return $shop_location;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ShopLocation  $shopLocation
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        //
    }

/**
* 
*    @SWG\Put(
*        path="/api/v1/shop_location/{id}",
*        summary="Edit shops location resources.",
*        produces={"application/json"},
*        tags={"shop_location"},
*        @SWG\Response(
*            response=200,
*            description="shop location collection.",
*            @SWG\Schema(
*                type="array",
*                @SWG\Items(ref="#/definitions/shop_location")
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
     * @param  \App\Models\ShopLocation  $shopLocation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->grantIfRole('admin');
        $shop_location = ShopLocation::find($id);
        if (empty($shop_location)){
            return response()->json([
                'message' => 'Record not found',
            ], 404);
        }
        $shop_location->name = $request->name;
        $shop_location->save();
        return $shop_location;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShopLocation  $shopLocation
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->grantIfRole('admin');
        $shop_location = ShopLocation::find($id);
        if (empty($shop_location)){
            return response()->json([
                'message' => 'Record not found',
            ], 404);
        }
        $shop_location->delete();
        return response()->json([
            'message' => 'Record deleted',
        ]);
    }
}
