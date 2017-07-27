<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Itag:

class ItagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $itag = Itag::get();
        return $itag;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $itag = new itag();
        $itag->itag = $request->itag;
        $itag->save();
        return $itag;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $itag = Itag::find($id);
        if (empty($itag)){
            return response()->json([
                'message' => 'Record not found',
            ], 404);
        }
        return $itag;
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
        $itag = Itag::find($id);
        if (empty($itag)){
            return response()->json([
                'message' => 'Record not found',
            ], 404);
        }
        $itag->itag = $request->itag;
        $itag->save();
        return $itag;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $itag = Itag::find($id);
        if (empty($itag)){
            return response()->json([
                'message' => 'Record not found',
            ], 404);
        }
        $itag->delete();
        return response()->json([
            'message' => 'Record deleted',
        ]);
    }

}
