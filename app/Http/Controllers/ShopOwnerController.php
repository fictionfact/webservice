<?php

namespace App\Http\Controllers;

use App\Models\ShopOwner;
use Illuminate\Http\Request;

class ShopOwnerController extends Controller
{

/**
* 
*    @SWG\Get(
*        path="/api/v1/shop_owner",
*        summary="Retrieves the collection of Shop's Owners resources.",
*        produces={"application/json"},
*        tags={"shop_owner"},
*        @SWG\Response(
*            response=200,
*            description="Shop Owners collection.",
*            @SWG\Schema(
*                type="array",
*                @SWG\Items(ref="#/definitions/shop_owner")
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
        $shop_owner = ShopOwner::get();
        return $shop_owner;
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
        $shop_owner = new shop_owner();
        $shop_owner->shop_owner = $request->shop_owner;
        $shop_owner->save();
        return $shop_owner;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ShopOwner  $shopOwner
     * @return \Illuminate\Http\Response
     */
    public function show(ShopOwner $shopOwner)
    {
        $this->grantIfRole('admin');
        $shop_owner = ShopOwner::find($id);
        if (empty($shop_owner)){
            return response()->json([
                'message' => 'Record not found',
            ], 404);
        }
        return $shop_owner;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ShopOwner  $shopOwner
     * @return \Illuminate\Http\Response
     */
    public function edit(ShopOwner $shopOwner)
    {
        //
    }

/**
* 
*    @SWG\Put(
*        path="/api/v1/shop_owner/{id}",
*        summary="Edit shops owner resources.",
*        produces={"application/json"},
*        tags={"shop_owner"},
*        @SWG\Response(
*            response=200,
*            description="shop owner collection.",
*            @SWG\Schema(
*                type="array",
*                @SWG\Items(ref="#/definitions/shop_owner")
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
     * @param  \App\Models\ShopOwner  $shopOwner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ShopOwner $shopOwner)
    {
        $this->grantIfRole('admin');
        $shop_owner = ShopOwner::find($id);
        if (empty($shop_owner)){
            return response()->json([
                'message' => 'Record not found',
            ], 404);
        }
        $shop_owner->name = $request->name;
        $shop_owner->save();
        return $shop_owner;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ShopOwner  $shopOwner
     * @return \Illuminate\Http\Response
     */
    public function destroy(ShopOwner $shopOwner)
    {
        $this->grantIfRole('admin');
        $shop_owner = ShopOwner::find($id);
        if (empty($shop_owner)){
            return response()->json([
                'message' => 'Record not found',
            ], 404);
        }
        $shop_owner->delete();
        return response()->json([
            'message' => 'Record deleted',
        ]);
    }
}
