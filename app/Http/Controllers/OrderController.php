<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{


/**
* 
*    @SWG\Get(
*        path="/api/v1/order",
*        summary="Retrieves the collection of Order resources.",
*        produces={"application/json"},
*        tags={"order"},
*        @SWG\Response(
*            response=200,
*            description="Order collection.",
*            @SWG\Schema(
*                type="array",
*                @SWG\Items(ref="#/definitions/order")
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
        $order = Order::get();
        return $order;
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
        $order = new order();
        $order->order = $request->order;
        $order->save();
        return $order;
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
        $order = Order::find($id);
        if (empty($order)){
            return response()->json([
                'message' => 'Record not found',
            ], 404);
        }
        return $order;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }


/**
* 
*    @SWG\Put(
*        path="/api/v1/order/{id}",
*        summary="Edit order resources.",
*        produces={"application/json"},
*        tags={"order"},
*        @SWG\Response(
*            response=200,
*            description="order collection.",
*            @SWG\Schema(
*                type="array",
*                @SWG\Items(ref="#/definitions/order")
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
        $order = Order::find($id);
        if (empty($order)){
            return response()->json([
                'message' => 'Record not found',
            ], 404);
        }
        $order->order = $request->order;
        $order->save();
        return $order;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

/**
*
*   @SWG\Delete(
*        path="/api/v1/order/{id}",
*        summary="Removes the Order resource.",
*        produces={"application/json"},
*        tags={"order"},
*        @SWG\Response(
*            response=204,
*            description="Order resource deleted.",
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

    public function destroy($id)
    {
        $this->grantIfRole('admin');
        $order = Order::find($id);
        if (empty($order)){
            return response()->json([
                'message' => 'Record not found',
            ], 404);
        }
        $order->delete();
        return response()->json([
            'message' => 'Record deleted',
        ]);
    }
}
