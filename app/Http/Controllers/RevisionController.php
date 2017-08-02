<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Revision;

class RevisionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->grantIfRole('admin');
        $revision = Revision::get();
        return $revision;
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
        $revision = new revision();
        $revision->revision = $request->revision;
        $revision->save();
        return $revision;
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
        $revision = Revision::find($id);
        if (empty($revision)){
            return response()->json([
                'message' => 'Record not found',
            ], 404);
        }
        return $revision;
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
        $revision = Revision::find($id);
        if (empty($revision)){
            return response()->json([
                'message' => 'Record not found',
            ], 404);
        }
        $revision->revision = $request->revision;
        $revision->save();
        return $revision;
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
        $revision = Revision::find($id);
        if (empty($revision)){
            return response()->json([
                'message' => 'Record not found',
            ], 404);
        }
        $revision->delete();
        return response()->json([
            'message' => 'Record deleted',
        ]);
    }
}
