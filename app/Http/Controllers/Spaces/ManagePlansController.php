<?php

namespace App\Http\Controllers\Spaces;

use Exception;
use App\Models\Plan;
use App\Models\User;
use App\Models\Userrole;
use App\Models\Inventory;
use Illuminate\Http\Request;
use App\Models\LocationGeneral;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\ApiController;
use App\Http\Requests\ManagePlanRequest;
use Illuminate\Database\QueryException;

class ManagePlansController extends ApiController
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

        $plans = Plan::with('inventory', 'location')->get();
        
        return view('Space.manageplan.index',['plans' => $plans, 'loggedUser' => $loggedUser, 'userrole' => $userrole]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $loggedUser = User::where('id','=', session('LoggedUser'))->first();
        $userrole = Userrole::where('id', $loggedUser['role_id'])->first();

        $inventory = Inventory::all();
        $location = LocationGeneral::where('status', 0)->get();
        return view('Space.manageplan.create',['inventory' => $inventory, 'location' => $location,'loggedUser' => $loggedUser, 'userrole' => $userrole]);
    

        // return view('Space.managelocation.edit',['locationgeneral'=>$locationgeneral, 'locationbank' => $locationbank,'locationbilling' => $locationbilling]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ManagePlanRequest $request)
    {
        try{
            $data = $request->all();
            $plan = Plan::create($data);
            return redirect('manageplan')->with('success', 'Created successfully!');
        } catch (\Illuminate\Database\QueryException $ex) {
            // if ($e->getCode() == 22003) {
        //         return redirect()->back()->with('error', 'The email provided is already taken.')->withInput();
        //     // }
           Log::error($ex->getMessage());
          return redirect()->back()->with('error', 'An error occurred while Saving the plan.')->withInput();
         }
        // } catch (Exception $e) {
            //  return back()->withError($exception->getMessage())->withInput();
        // }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $loggedUser = User::where('id','=', session('LoggedUser'))->first();
        $userrole = Userrole::where('id', $loggedUser['role_id'])->first();
        $plans = Plan::findOrFail($id);
        $inventory = Inventory::all();
        $location = LocationGeneral::where('status', 0)->get();
        return view('Space.manageplan.show',['plans' => $plans,'inventory' => $inventory, 'location' => $location,'loggedUser' => $loggedUser, 'userrole' => $userrole]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $loggedUser = User::where('id','=', session('LoggedUser'))->first();
        $userrole = Userrole::where('id', $loggedUser['role_id'])->first();
        $plans = Plan::findOrFail($id);
        $inventory = Inventory::all();

        $location = LocationGeneral::where('status', 0)->get();
        return view('Space.manageplan.edit',['plans' => $plans,'inventory' => $inventory, 'location' => $location,'loggedUser' => $loggedUser, 'userrole' => $userrole]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ManagePlanRequest $request, $id)
    {
        $plans = Plan::find($id);
        if($request->has('inventory_id'))
        {
            $plans->inventory_id = $request->inventory_id;
        }
   
        if($request->has('location'))
        {
            $plans->location = $request->location;
        }
    
        if($request->has('description'))
        {
            $plans->description = $request->description;
        }

        if($request->has('resource_price'))
        {
            $plans->resource_price = $request->resource_price;
        }

        if($request->has('num_seats'))
        {
            $plans->num_seats = $request->num_seats;
        }

        if($request->has('area'))
        {
            $plans->area = $request->area;
        }

        if($request->has('meeting_room_credits'))
        {
            $plans->meeting_room_credits = $request->meeting_room_credits;
        }
 
        if($request->has('printer_credits'))
        {
            $plans->printer_credits = $request->printer_credits;
        }
   
        $plans->save();
        return redirect('manageplan')->with('success', 'Updated successfully!');
        //   return response()->json($plans);   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $plan = Plan::find($id);
        $plan->delete();
        return redirect('manageplan')->with('success', 'deleted successfully!');
    }
}