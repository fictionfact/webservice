<?php

namespace App\Http\Controllers;
use Auth;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    protected function grantIfRole(string $status){
    	 $user = Auth::user();
    	if($user->status !== $status)
    	{
            throw new AccessDeniedHttpException(Auth::user()->name . ', bukan admin');
            //return response()->json(['error'=>Auth::user()->name.', bukan admin'],403);
        }
    }
}

/** 
*	@SWG\Swagger(
*		basePath="",
*		host="wshgay.app",
*		schemes={"http"},
*	@SWG\Info(
*		version="1.0",
*		title="Sample API",
*		@SWG\Contact(
*			name="Henry",
*			url="https://www.google.com"
*		),
*	),
*	@SWG\Definition(
*		definition="Error",
*		required={"code", "message"},
*		@SWG\Property(
*			property="code",
*			type="integer",
*			format="int32"
*		),
*		@SWG\Property(
*			property="message",
*			type="string"
*		)
*	)
*)
*/

