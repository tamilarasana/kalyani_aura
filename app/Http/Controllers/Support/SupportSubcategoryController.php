<?php

namespace App\Http\Controllers\Support;

use App\Models\Supportscope;
use Illuminate\Http\Request;
use App\Models\Supportcategory;
use App\Models\Supportsubcategory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;


class SupportSubcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $sub_category = Supportscope::all();

        // return response()->json($sub_category);
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
            'supportcategory_id'=>'required',
            'sub_category'=>'required'
        ]);
        

        if($validator->fails()){
            return response()->json(['status' => 400, 'message'=> $validator->getMessageBag()]);
       }else{
        $data = $request->all();
        $sub_category = Supportsubcategory::create($data);

        //  return response()->json(['status' => 200, 'data' => $sub_category]); 
        }
        return response()->json(['status' => 200, 'data' => $sub_category, 'message' => 'Saved Successfully']); 

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $sub_category = Supportsubcategory::where('supportcategory_id', $id)->get();
        
        // $output= '';
      
        // if ($sub_category->count() > 0) {
        //     $output .='    <div class="col-md-10 mb-3 ">
        //     <div class="scope-input">
        //         <input type="text" class="form-control" id="sub_category"
        //             placeholder="Support Profile" required>
        //     </div>
        //     <input type="hidden" class="subcategory" value="'.$sub_category[0]->supportcategory_id.'" id="subcategory_id">
        // </div>
        // <div class="col-md-2 mb-3 ">
        //     <div class="pull-right" data-toggle="modal">
        //         <button class="btn btn-success" id="addNewSubScop"> Save </button>
        //     </div>
        // </div>';
          
		// 	$output .= '<div class=" flex-column  text-center">';
           
		// 	foreach ($sub_category as $cat) {
		// 		$output .= '<div class=" addscope active subCategory" id="' . $cat->id . '"><b> ' . $cat->sub_category. '</b></div>';
		// 	}
		// 	$output .= '</div>';
		// 	echo $output;
		// } else {
            
		// 	echo '<h3 class="text-center text-secondary my-5">No record present in the database!</h3 >';
		// } 
        return response()->json(['status' => 200, 'data' => $sub_category]); 

    }

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
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $general = Supportsubcategory::find($id);
        $general->delete();
        return response()->json($general);
    }

    
    
}
