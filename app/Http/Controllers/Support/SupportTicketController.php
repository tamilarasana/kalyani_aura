<?php

namespace App\Http\Controllers\Support;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Supportticket;
use App\Models\Supportsubcategory;
use App\Http\Controllers\Controller;

class SupportTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $mytickets = Supportticket::where('user_id',$request->user_id)->orderBy('created_at', 'DESC')->with('message')->get();
        $tickets = $this->paginate($mytickets);
        return response()->json(['status' => 200, 'data' => $tickets]);
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
    public function store(Request $request,User $user, Supportsubcategory $subcategory)
    {
        $rules = [
            'sub_category_id',
            'user_id',
            'location_id',
            'ticket_description',
            'status',
        ];

        $this->validate($request, $rules);
        $data = $request->all();

        $data['sub_category_id'] = $request->subcategory->id;
        $data['user_id'] = $request->user->id;
        $data['location_id'] = $request->location_id;
        $data['ticket_description'] = $request->ticket_description;
        $data['status'] = $request->status;
        if($request->has('image'))
         { 
            $data['image'] = $request->image->store('public');
         }
       
        $ticket = Supportticket::create($data);
                    
        return response()->json(['status' => 200, 'data' => $ticket]);  
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        dd($id);
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
        //
    }
    
       protected function paginate(Collection $collection)
    {
      $rules = [
          'per_page' => 'integer|min:2|max:50',
      ];
      
      Validator::validate(request()->all(), $rules);
      $page = LengthAwarePaginator::resolveCurrentPage();
      $perPage = 10;
      
      if(request()->has('per_page'))
      {
          $perPage = (int) request()->per_page;
      }
      
      $results = $collection->slice(($page - 1) * $perPage, $perPage)->values();
      
    //   $paginated = new LengthAwarePaginator($results, $collection->count(), $perPage, $page, ['path' => LengthAwarePaginator::resolveCurrentPage(),
    //         ]);
      
    //   $paginated->appends(request()->all());
      
      return $results;
    }
}
