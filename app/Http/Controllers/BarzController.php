<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\bar;
use App\Http\Requests\StoreBar;
use Exception;

class BarzController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  

     public function index()
    {   
        $bars = bar::get();
        return response()->json($bars->toArray());
       }
    public function store(Request $request)
    {
            try{
                $this->validate($request,[
                    'bar' => 'required',
                    ]);
            }catch(Exception $e){
                throw new Exception('salah pek');

            }
        $bar = new Bar();
        $bar->bar = $request->input('bar');
        $bar->save();
        return response()->json($bar);
    }
    public function show($id)
    {
        $bar = bar::find($id);
        return response()->json($bar->toArray());
    }
    public function update(Request $request, $id)
    {   
    //find one by Id  
        $bar = bar::find($id);
    //replace value of bar
        $bar->bar = $request->input('bar');
    //update
        $bar->save();
        return response()->json($bar->toArray());
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


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
 

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $bar = bar::destroy($id);
        return response()->json($bar->toArray());
    }
}
