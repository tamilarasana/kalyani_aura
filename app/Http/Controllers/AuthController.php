<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\Models\User;
use App\Models\Userrole;
use Illuminate\Http\Request;
use App\Http\Requests\LoginUser;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
  
  // public function __construct()
  // {
  //     $this->middleware('guest')->except('logout');
  // }
  public function index()
  { 
    if(session()-> has('LoggedUser')){
      return redirect("/dashbord");
    }else{
    return view('AuthPage.login');
    }
  }
  public function register()
  {
    if(session()-> has('LoggedUser')){
      return redirect("/dashbord");
    }else{
      return view('AuthPage.register');
    }
  }

    public function loginUser(Request $request) { 
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6',
      ]);

      $userInfo = User::where('email',$request->email)->first();
      if($userInfo){
            if (Hash::check($request->password, $userInfo->password)) {
                $request->session()->put('LoggedUser', $userInfo->id);
                $user = User::where('email',$request->email)->first();
                $userrole = Userrole::find( $user->role_id);
                 $loggedUser = User::where('id','=', session('LoggedUser'))->first();
                 return redirect("/dashbord");
                // return view('Dashboard.dash',['userrole' => $userrole ,'loggedUser' => $loggedUser]);
             }else{
                 return redirect()->back()->with('error', 'Password not Matches.');
             }
        }else{
            return redirect()->back()->with('error', 'This E-mail is not Matches.');
        }
    }
  public function saveUser(Request $request)
    {  
          $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'role_id' => 'required',
            'user_status' => 'required'
        ]);
          
        $data = $request->all();
        $check = $this->create($data);
        if($check){
            return redirect("/")->with('success', 'You have Registered Successfully');
            // return back() ->with('Succes', 'You have Registered Successfully');
        }else{
             return back()->with('error', 'Somthing wrong');
        }
    }

    public function create(array $data)
    {
      
      return User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
        'role_id' => $data['role_id'],
        'user_status' => $data['user_status']
      ]);

    }    

    public function dashBoard (){

          try {
              $loggedUser = User::where('id','=', session('LoggedUser'))->first();
              $userrole = Userrole::where('id', $loggedUser['role_id'])->first();
              return view('Dashboard.dash',['userrole' => $userrole ,'loggedUser' => $loggedUser]);
          } catch (\Throwable $th) {
                Session::flush();
                Auth::logout();
                return Redirect('/');
              }       
    }

    public function logOut() {
      if(session()->has('LoggedUser')){
        session()->pull('LoggedUser');
        return Redirect('/')->with('success', 'Logout Successfully');

        // return Redirect('/')->back()->with('error', 'Password not Matches.');
      }
      // Session::flush();
      // Auth::logout();
      // return Redirect('/');
  }
 

//  public function loginv(LoginUser $request, User $user) { 
//     try 
//     { 
//       $credentials['email'] = $request->input('email'); 
//         $credentials['password'] = $request->input('password'); 
//           if (!Auth::attempt($credentials)) { 
//              return response()->json(['error' => 'wrong credentials', 'code' => 401], 200);
//                 } 
//          $user = User::where('email', $credentials['email'])->first(); 
//           if ( !Hash::check($credentials['password'], $user->password, [])) 
//           { 
//             throw new \Exception('Exception in login'); 
//              }
//               $tokenResult = $user->createToken('authToken')->plainTextToken;
//               $id = $request->user()->id;
     
//                 $alldetail = User::findOrFail($id); 

//                return response()->json([ 'status' => 200, 'access_token' => $tokenResult, 'token_type' => 'Bearer', 'detail' => $alldetail]);
//                   } 
//                  catch (\Exception $error) { 
//                          return response()->json([ 'status' => 500, 'message' => 'Exception in Login', 'error' => $error, ]);
//                              }
                      
//   }

  }
  
