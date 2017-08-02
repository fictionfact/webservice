<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
/**
* 
*    @SWG\Get(
*        path="/api/v1/user",
*        summary="Retrieves the collection of User resources.",
*        produces={"application/json"},
*        tags={"user"},
*        @SWG\Response(
*            response=200,
*            description="User collection.",
*            @SWG\Schema(
*                type="array",
*                @SWG\Items(ref="#/definitions/user")
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
        $user = User::get();
        return $user;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new user();
        $user->user = $request->user;
        $user->save();
        return $user;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        if (empty($user)){
            return response()->json([
                'message' => 'Record not found',
            ], 404);
        }
        return $user;
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
        $user = User::find($id);
        if (empty($user)){
            return response()->json([
                'message' => 'Record not found',
            ], 404);
        }
        $user->user = $request->user;
        $user->save();
        return $user;
    }

/**
*
*   @SWG\Delete(
*        path="/api/v1/user/{id}",
*        summary="Removes the User resource.",
*        produces={"application/json"},
*        tags={"user"},
*        @SWG\Response(
*            response=204,
*            description="User resource deleted.",
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
        $user = User::find($id);
        if (empty($user)){
            return response()->json([
                'message' => 'Record not found',
            ], 404);
        }
        $user->delete();
        return response()->json([
            'message' => 'Record deleted',
        ]);
    }

}
