<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Itag;

class ItagController extends Controller
{


/**
* 
*    @SWG\Get(
*        path="/api/v1/itag",
*        summary="Retrieves the collection of Itag resources.",
*        produces={"application/json"},
*        tags={"itag"},
*        @SWG\Response(
*            response=200,
*            description="Itag collection.",
*            @SWG\Schema(
*                type="array",
*                @SWG\Items(ref="#/definitions/itag")
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
*
*   @SWG\Delete(
*        path="/api/v1/itag/{id}",
*        summary="Removes the Itag resource.",
*        produces={"application/json"},
*        tags={"itag"},
*        @SWG\Response(
*            response=204,
*            description="Itag resource deleted.",
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
