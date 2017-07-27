<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shop;

class ShopController extends Controller
{
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
