<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\ApiController;
use Illuminate\Http\Request;
use App\Models\User;

class LoginController extends ApiController
{
    public function login(Request $request, User $user)
   
    {
     $creds = $request->only(['email', 'password']);

     if(auth()->attempt($creds)) {
         return response()->json(200);
     }
 
     $id = $request->user()->id;
     
     $alldetail = User::findOrFail($id);
     return response()->json(['id' => $alldetail]);
    }

    public function refresh(Request $request)
    {
    	try 
    	{
    		$newToken = auth()->refresh();
    	}catch(\Tymon\JWTAuth\Exceptions\TokenInvalidException $e)
             {
             	return response()->json(['error' => $e->getMessage()], 401);
             }
        $id = $request->user()->id;
        return response()->json(['token' => $newToken]);      
    
    }
}



