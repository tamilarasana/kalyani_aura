<?php

namespace App\Http\Controllers\Support;

use App\Models\User;
use App\Models\Userrole;
use App\Models\Supportscope;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;



class SupportScopeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $loggedUser = User::where('id','=', session('LoggedUser'))->first();
        $userrole = Userrole::where('id', $loggedUser['role_id'])->first();

        $scopes = Supportscope::get();
        return view('SupportTeam.supportscop.index',['scopes' => $scopes, 'loggedUser' => $loggedUser, 'userrole' => $userrole]);
    }

    //Get All Data 
    public function getAlldata()
    {
        $scopes = Supportscope::get();
        return response()->json(['status' => 200, 'data' => $scopes]); 
        $output= '';
        if ($scopes->count() > 0) {
			$output .= '<div class=" flex-column  text-center">';
           
			foreach ($scopes as $supscop) {
				$output .= '<div class=" addscope active"><b> ' . $supscop->scope_name. '</b></div>';
			}
			$output .= '</div>';
			echo $output;
		} else {
			echo '<h1 class="text-center text-secondary my-5">No record present in the database!</h1>';
		}
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
        $validator = Validator::make($request->all(), [
            'scope_name'=>'required'
        ],[
            'scope_name.required' => 'Support Profile  is required'
        ]);
        if($validator->fails()){
             return response()->json(['status' => 400, 'message'=> $validator->getMessageBag()]);
        }else{
            $data = $request->all();
            $data['scope_name'] = $request->scope_name;
            $scope = Supportscope::create($data);
            return response()->json(['status' => 200, 'data' => $scope, 'message' => 'Saved Successfully']); 
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
         $scopes = Supportscope::find($id);

         return response()->json(['status' => 200, 'data' => $scopes]); 
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $scopes = Supportscope::where('id', $id)->first();
        return response()->json(['status' => 200, 'data' => $scopes]); 
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
        $scope = Supportscope::find($id);

        if($request->has('scope_name'))
        {
            $scope->scope_name = $request->scope_name;
        }
        
        $scope->save();
        return response()->json(['status' => 200, 'data' => $scope]); 

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $scope = Supportscope::find($id);
        $scope->delete();
        return response()->json(['status' => 200, 'data' => $scope]); 
    }
}
