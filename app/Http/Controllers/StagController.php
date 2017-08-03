<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stag;

class StagController extends Controller
{
/**
* 
*    @SWG\Get(
*        path="/api/v1/Stag",
*        summary="Retrieves the collection of Stag resources.",
*        produces={"application/json"},
*        tags={"stag"},
*        @SWG\Response(
*            response=200,
*            description="Stag collection.",
*            @SWG\Schema(
*                type="array",
*                @SWG\Items(ref="#/definitions/stag")
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
        $this->grantIfRole('admin');
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
        $this->grantIfRole('admin');
        $stag = Stag::find($id);
        if (empty($stag)){
            return response()->json([
                'message' => 'Record not found',
            ], 404);
        }
        return $stag;
    }

/**
* 
*    @SWG\Put(
*        path="/api/v1/Stag/{id}",
*        summary="Edit stag resources.",
*        produces={"application/json"},
*        tags={"stag"},
*        @SWG\Response(
*            response=200,
*            description="stag collection.",
*            @SWG\Schema(
*                type="array",
*                @SWG\Items(ref="#/definitions/stag")
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
        $stag = Stag::find($id);
        if (empty($stag)){
            return response()->json([
                'message' => 'Record not found',
            ], 404);
        }
        $stag->name = $request->name;
        $stag->save();
        return $stag;
    }

/**
*
*   @SWG\Delete(
*        path="/api/v1/Stag/{id}",
*        summary="Removes the Stag resource.",
*        produces={"application/json"},
*        tags={"stag"},
*        @SWG\Response(
*            response=204,
*            description="Stag resource deleted.",
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
        $this->grantIfRole('admin');
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
