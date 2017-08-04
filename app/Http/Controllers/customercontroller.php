<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Customer;

class customercontroller extends Controller
{
/**
* 
*    @SWG\Get(
*        path="/api/v1/customer",
*        summary="Retrieves the collection of Customer resources.",
*        produces={"application/json"},
*        tags={"customer"},
*        @SWG\Response(
*            response=200,
*            description="customer collection.",
*            @SWG\Schema(
*                type="array",
*                @SWG\Items(ref="#/definitions/customer")
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
    {   $this->grantIfRole('admin');
        $customer = Customer::get();
        return $customer;
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
* 
*    @SWG\POST(
*        path="/api/v1/customer/{id}",
*        summary="add Customer resources.",
*        produces={"application/json"},
*        tags={"customer"},
*        @SWG\Response(
*            response=200,
*            description="customer collection.",
*            @SWG\Schema(
*                type="array",
*                @SWG\Items(ref="#/definitions/customer")
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {    $this->grantIfRole('admin');
    try{
                $this->validate($request,[
                    'birthday' => 'required',
                    'gender' => 'required',
                    'email' => 'required',
                    'phone' => 'required',
                    ]);
            }catch(Exception $e){
                throw new Exception('salah pek');

            }
        $customer = new Customer();
        $customer->birthday = $request->input('birthday');
        $customer->gender = $request->input('gender');
        $customer->email = $request->input('email');
        $customer->phone = $request->input('phone');
        $customer->save();
        return response()->json($customer);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {  $this->grantIfRole('admin');
       $customer = Customer::find($id);
        if (empty($customer)){
            return response()->json([
                'message' => 'Record not found',
            ], 404);
        }
        return $customer;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {  $this->grantIfRole('admin');
       $customer = Customer::find($id);
        if (empty($customer)){
            return response()->json([
                'message' => 'Record not found',
            ], 404);
        }
        $customer->customer = $request->customer;
        $customer->save();
        return $customer;
    }
/**
* 
*    @SWG\Put(
*        path="/api/v1/customer/{id}",
*        summary="Edit Customer resources.phone,gender,birthday,credit",
*        produces={"application/json"},
*        tags={"customer"},
*        @SWG\Response(
*            response=200,
*            description="customer collection.",
*            @SWG\Schema(
*                type="array",
*                @SWG\Items(ref="#/definitions/customer")
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
       $customer = Customer::find($id);
        if (empty($customer)){
            return response()->json([
                'message' => 'Record not found',
            ], 404);
        }
        $customer->phone = $request->phone;
        $customer->gender = $request->gender;
        $customer->birthday = $request->birthday;
        $customer->credit = $request->credit;
        $customer->save();
        return $customer;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {  $this->grantIfRole('admin');
        $customer = Customer::find($id);
        if (empty($customer)){
            return response()->json([
                'message' => 'Record not found',
            ], 404);
        }
        $customer->delete();
        return response()->json([
            'message' => 'Record deleted',
        ]);
    }
}