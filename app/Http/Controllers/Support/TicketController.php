<?php

namespace App\Http\Controllers\Support;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Supportticket;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Validator;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mytickets = Supportticket::with('subcategory', 'location', 'user', 'assignedPerson')->orderBy('created_at','DESC')->get();
        $tickets = $this->paginate($mytickets);
       return response()->json(['status' => 200, 'data' => $tickets]); 
    }
    
    public function getTicketComment($id){
        
    $comment = Supportticket::where('id',$id)->orderBy('created_at', 'DESC')->with('comment')->get();
     return response()->json(['status' => 200, 'data' => $comment]); 
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
      
      $paginated = new LengthAwarePaginator($results, $collection->count(), $perPage, $page, ['path' => LengthAwarePaginator::resolveCurrentPage(),
            ]);
      
      $paginated->appends(request()->all());
      
      return $paginated;
    }
}
