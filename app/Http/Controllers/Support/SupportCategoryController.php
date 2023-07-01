<?php

namespace App\Http\Controllers\Support;

use App\Models\User;
use App\Models\Userrole;
use App\Models\Supportscope;
use Illuminate\Http\Request;
use App\Models\Supportcategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;


class SupportCategoryController extends Controller
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
        // $category = Supportcategory::with('subcategory', 'scope')->get();
        $support_scop = Supportscope::get();
        return view('SupportTeam.supportcategory.index',['support_scop' => $support_scop, 'loggedUser' => $loggedUser, 'userrole' => $userrole]);

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
            'category'=>'required',
            'scope_id'=>'required'
        ],[
            'category.required' => 'Category Field is required',
            'scope_id.required' => 'Scop  Field is required'
        ]);
        

        if($validator->fails()){
            return response()->json(['status' => 400, 'message'=> $validator->getMessageBag()]);
       }else{
       

        $data = $request->all();

        $data['category'] = $request->category;
         $data['scope_id'] = $request->scope_id;
       
        $category = Supportcategory::create($data);
        return response()->json(['status' => 200, 'data' => $category, 'message' => 'Saved Successfully']); 

       }
                    
        //  return response()->json(['status' => 200, 'data' => $category]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $general = Supportcategory::where('scope_id',$id)->get();
        return response()->json(['status' => 200, 'data' => $general]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $general = Supportcategory::findOrFail($id);
        $support_scop = Supportscope::get();
        return response()->json(['status' => 200, 'data' => $general, 'support_scop' => $support_scop ]);
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
       $general = Supportcategory::find($id);
      
         if($request->has('category'))
         {
             $general->category = $request->category;
         }
        $general->scope_id = $request->scope_id;
         $general->update();       
        return response()->json(['status' => 200, 'data' => $general ]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete ($id)
    {
       $general = Supportcategory::find($id);
        $general->delete();
        return response()->json(['status' => 200, 'data' => $general]);
    }


    

    public function getAlldata (){
        $category = Supportcategory::all();

        return response()->json(['status' => 200, 'data' => $category]);


    }



    // public function getAlldata (){
    //     $category = Supportcategory::all();

    //     $output= '';
    //     if ($category->count() > 0) {
	// 		$output .= '<div class=" flex-column  text-center">';
           
	// 		foreach ($category as $cat) {
	// 			$output .= '<div class=" addscope active subCategory" id="' . $cat->id . '"><b> ' . $cat->category. '</b></div>';
	// 		}
	// 		$output .= '</div>';
	// 		echo $output;
	// 	} else {
	// 		echo '<h1 class="text-center text-secondary my-5">No record present in the database!</h1>';
	// 	} 

    // }
}
