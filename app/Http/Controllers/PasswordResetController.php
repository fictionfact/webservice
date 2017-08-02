<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PasswordReset;

class PasswordResetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->grantIfRole('admin');
        $password_reset = PasswordReset::get();
        return $password_reset;
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
        $password_reset = new password_reset();
        $password_reset->password_reset = $request->password_reset;
        $password_reset->save();
        return $password_reset;
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
        $password_reset = PasswordReset::find($id);
        if (empty($password_reset)){
            return response()->json([
                'message' => 'Record not found',
            ], 404);
        }
        return $password_reset;
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
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->grantIfRole('admin');
        $password_reset = PasswordReset::find($id);
        if (empty($password_reset)){
            return response()->json([
                'message' => 'Record not found',
            ], 404);
        }
        $password_reset->password_reset = $request->password_reset;
        $password_reset->save();
        return $password_reset;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->grantIfRole('admin');
        $password_reset = PasswordReset::find($id);
        if (empty($password_reset)){
            return response()->json([
                'message' => 'Record not found',
            ], 404);
        }
        $password_reset->delete();
        return response()->json([
            'message' => 'Record deleted',
        ]);
    }
}
