<?php

namespace App\Http\Controllers;

use App\Traits\ApiResponser;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\UserNotDefinedException;

class ApiController extends Controller
{
    use ApiResponser;
    /* public function __construct() 
     {
      //$this->middleware('auth:api');
     }*/
      public function __construct()
    {
    	auth()->setDefaultDriver('api');
    	//$this->middleware('auth:api');
    }

    public function authUser()
    {
      try
      {
        $user = auth()->userOrFail();
      }
      catch(UserNotDefinedException $e){
           return response()->json(['error' => $e->getMessage()]);
      }
      return $user;
    }
}
