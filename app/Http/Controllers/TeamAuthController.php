<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Member;
use Illuminate\Http\Request;
use App\Http\Requests\LoginMember;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TeamAuthController extends Controller
{
    public function login(Request $request, Member $user) { 
        
         $credentials['email'] = $request->input('email'); 
         $credentials['password'] = $request->input('password'); 
         $user = Member::where('email', $credentials['email'])->first(); 
         
         $req_pass = $request->password;
         
         if($user !=null){
         $pass = $user->password;
         
         $status = Hash::check($req_pass, $pass);
            if($status == true)
               {
            $detail = DB::table('members')->where('email', $request->email)->first();
            $tokenable_id = $detail->id;
            $delete_old_token = DB::table('personal_access_tokens')->where('tokenable_id', $tokenable_id)->delete();  

                    $tokenResult = $user->createToken('authToken')->plainTextToken;
                    $result = ['token' =>$tokenResult, 'details' => $detail];
                    return response()->json([ 'status' => 200, 'data' => $result]);
               }
               elseif(!($status == true)){
                     return response()->json([ 'status' => 401, 'data' => 'Wrong Password'], 200);
               }
               else{
                   return response()->json([ 'status' => 500, 'data' => 'something went wrong please try again later'], 200);
               }
    }
    else {
        return response()->json(['status' => 401, 'data'=>'Wrong Email'], 200);
    }
}
    

    }