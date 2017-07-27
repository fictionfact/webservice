<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stag;

class StagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stag = Stag::get();
        return $stag;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $stag = new stag();
        $stag->stag = $request->stag;
        $stag->save();
        return $stag;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
        public function show($id)
    {
        $stag = Stag::find($id);
        if (empty($stag)){
            return response()->json([
                'message' => 'Record not found',
            ], 404);
        }
        return $stag;
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
        $stag = Stag::find($id);
        if (empty($stag)){
            return response()->json([
                'message' => 'Record not found',
            ], 404);
        }
        $stag->stag = $request->stag;
        $stag->save();
        return $stag;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $stag = Stag::find($id);
        if (empty($stag)){
            return response()->json([
                'message' => 'Record not found',
            ], 404);
        }
        $stag->delete();
        return response()->json([
            'message' => 'Record deleted',
        ]);
    }

}
