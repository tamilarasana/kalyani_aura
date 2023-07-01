<?php

namespace App\Http\Controllers\Support;

use App\Models\User;
use App\Models\Userrole;
use Illuminate\Http\Request;
use App\Models\Supportticket;
use Illuminate\Support\Collection;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Pagination\LengthAwarePaginator;

class SupportTicketFilterController extends Controller
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

        $tickets = Supportticket::with('subcategory', 'location', 'user', 'assignedPerson')->get();
        $collection = $this->filterData($tickets);
        $tickets = $this->paginate($collection);
        // dd($tickets[0]->assignedPerson);
        // $collection = $this->sortData($collection);
        return view('SupportTeam.supportticket.index',['tickets' =>$tickets, 'loggedUser' => $loggedUser, 'userrole' => $userrole]);

        // return response()->json(['status' =>200, 'data' => $tickets]);
    }


    public function ticketData()
    {
        $tickets = Supportticket::with('subcategory', 'location', 'user', 'assignedPerson')->get();
        return response()->json(['status' =>200, 'data' => $tickets]);
    }

    protected function filterData(Collection $collection)  
    {
      foreach(request()->query() as $query => $value)
      {
          if(isset($query, $value))
          {
              $collection = $collection->where($query, $value);
          }
      }
      return $collection;
    }
    protected function sortData(Collection $collection)
    {
      if(request()->has('sort_by'))
      {
          $collection = $collection->sortBy->{(request()->sort_by)};
      }

      return $collection;
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
        $teams = Supportticket::with('subcategory', 'location', 'user', 'assignedPerson')->where('id',$id)->first();
        return response()->json(['status' => 200, 'data' => $teams]); 
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
      $perPage = 2000000;
      
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
