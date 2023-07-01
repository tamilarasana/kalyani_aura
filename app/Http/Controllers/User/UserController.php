<?php

namespace App\Http\Controllers\User;


use App\Http\Controllers\ApiController;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends ApiController
{

    /*public function __construct() 
        {
        $this->middleware('client.credentials')->only(['store']);
        }*/
    public function index(Request $request, User $user)
    {

        $users = User::all();

        // return [ $users, 
        //     'links' => [
        //             [
        //             'rel' => 'self',
        //             'href' => route('sellers.supplies.index', $users['id']),
        //         ],
        //         [
        //             'rel' => 'buyers.requirements',
        //             'href' => route('buyers.requirements.index', 1),
        //         ],
        //         [
        //             'rel' => 'sellers.supplies',
        //             'href' => route('sellers.supplies.index', 1),
        //         ],
        //     ] 
        // ];       
            return $this->showAll($users);
            
    }
    public function store(Request $request)
    {
        $rules = [
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',      
        ];

        $this->validate($request, $rules);
        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        $data['admin'] = User::REGULAR_USER;
        $user = User::create($data);
        
        return $this->showMessage('SignedIn', 201);
         
    }

  
    public function show(User $user)
    {
      //  $user = User::findOrFail($id);

        return $this->showOne($user);
    }

    public function update(Request $request,User $user)
    {
       //$user = User::findOrFail($id);

        $rules = [ 
          'email' => 'email|unique:users,email,' . $user->id,
          'password' => 'min:6|confirmed',
          'admin' => 'in:' . User::ADMIN_USER . ',' . User::REGULAR_USER,
        ];

        if($request->has('name'))
        {
            $user->name = $request->name;        
        }
        if($request->has('email') && $user->email != $request->email )
        {
            $user->verified = User::UNVERIFIED_USER;
            $user->verification_token = User::generateVerificationCode();
            $user->email = $request->email;
        }
        if($request->has('password'))
        {
            $user->password = bcrypt($request->password);
        }
        if($request->has('file'))
        {
            $user->password = bcrypt($request->password);
        }
        if($request->has('admin'))
        {
            if(!$user->isVerified())
            {
                return $this->errorResponse('Only verified Users can modify the admin field', 409);
            }
            $user->admin = $request->admin;
        }
       
        $user->save();

        return $this->showOne($user);    
    }

   
    public function destroy(User $user)
    {
        //$user = User::findOrFail($id);
        $user -> delete();
 
        return $this->showOne($user);  
    }

    public function verify($token)
    {
        $user = User::where('verification_token', $token)->firstOrFail();

        $user->verified = User::VERIFIED_USER;
        $user->verification_token = null;

        $user->save();

        return $this->showMessage('The Account has been verified successfully');
    }
}
