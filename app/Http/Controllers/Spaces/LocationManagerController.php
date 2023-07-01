<?php

namespace App\Http\Controllers\Spaces;

use Auth;
use Exception;
use App\Models\Location;
use App\Models\Userrole;
use App\Models\LocationBank;
use Illuminate\Http\Request;
use App\Models\LocationBilling;
use App\Models\LocationGeneral;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;

use Illuminate\Foundation\Auth\User;
use App\Http\Controllers\ApiController;
use Illuminate\Database\QueryException;
use App\Http\Requests\LocationManagerRequest;


class LocationManagerController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $loggedUser = User::where('id','=', session('LoggedUser'))->first();
        $userrole = Userrole::where('id', $loggedUser['role_id'])->first();
        $location = LocationGeneral::where('status', '=', 0)->with('billing', 'bank')->get();
        return view('Space.managelocation.index',['location' => $location, 'userrole' => $userrole, 'loggedUser' => $loggedUser ]);
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
        return view('Space.managelocation.create',['userrole' => $userrole, 'loggedUser' => $loggedUser ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LocationManagerRequest $request)
    {
       
        // try{
            $locationgeneral = New LocationGeneral;
        if($request ->has('location_name')){
            $locationgeneral->location_name = $request->location_name;
        }
        if($request ->has('contact_number')){
            $locationgeneral->contact_number = $request->contact_number;
        }
        if($request ->has('email')){
            $locationgeneral->email = $request->email;
        }
        if($request ->has('seating_capacity')){
            $locationgeneral->seating_capacity = $request->seating_capacity;
        }
        if($request ->has('area')){
            $locationgeneral->area = $request->area;
        }
            
        if($request ->has('business_hours_s')){
            $locationgeneral->business_hours_s = $request->business_hours_s;
        }
        if($request ->has('business_hours_e')){
            $locationgeneral->business_hours_e = $request->business_hours_e;
        }
        $locationgeneral->save();

        //Location Bank
        $locationbank = new LocationBank;

        $locationbank->location_general_id = $locationgeneral->id;
        
        if($request ->has('bank_name')){
            $locationbank->bank_name = $request->bank_name;
        }
        if($request ->has('account_number')){
            $locationbank->account_number = $request->account_number;
        }
        if($request ->has('benificiary_name')){
            $locationbank->benificiary_name = $request->benificiary_name;
        }
        if($request ->has('ifsc')){
            $locationbank->ifsc = $request->ifsc;
        }
        if($request ->has('branch')){
            $locationbank->branch = $request->branch;
        }
        $locationbank->save();
        //Location LocationBilling
        $locationbilling = new LocationBilling;
            $locationbilling->location_general_id = $locationgeneral->id;
            if($request ->has('legal_business_name')){
                $locationbilling->legal_business_name = $request->legal_business_name;
            }
            if($request ->has('address')){
                $locationbilling->address = $request->address;
            }
            if($request ->has('notes_top')){
                $locationbilling->notes_top = $request->notes_top;
            }
            if($request ->has('notes_bottom')){
                $locationbilling->notes_bottom = $request->notes_bottom;
            }
            if($request ->has('gstn')){
                $locationbilling->gstn = $request->gstn;
            }
            if($request ->has('state')){
                $locationbilling->state = $request->state;
            }
            if($request ->has('city')){
                $locationbilling->city = $request->city;
            }
            $locationbilling->save();
            return redirect('managelocations')->with('success', 'Created successfully!');

        // }catch(Exception $e){
        // if ($e->getCode() == 23000) {
        //     return redirect()->back()->with('error', 'The email provided is already taken. Please choose a different email.')->withInput();
        // }
        //     Log::error($e->getMessage());
        //     return redirect()->back()->with('error', 'An error occurred while creating the user. Please try again later.');
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
        $locationgeneral = LocationGeneral::findOrFail($id);
        $locgenId = $locationgeneral->id;
        $locationbank  =  LocationBank::where('location_general_id', $locgenId )->first();
        $locationbilling =  LocationBilling::where('location_general_id', $locgenId )->first();
        return view('Space.managelocation.show',['locationgeneral'=>$locationgeneral, 'locationbank' => $locationbank,'locationbilling' => $locationbilling,
                     'loggedUser' => $loggedUser, 'userrole' => $userrole]);
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

        $locationgeneral = LocationGeneral::findOrFail($id);
        $locgenId = $locationgeneral->id;
        $locationbank  =  LocationBank::where('location_general_id', $locgenId )->first();
        $locationbilling =  LocationBilling::where('location_general_id', $locgenId )->first();
        return view('Space.managelocation.edit',['locationgeneral'=>$locationgeneral, 'locationbank' => $locationbank,'locationbilling' => $locationbilling,
                    'loggedUser' => $loggedUser, 'userrole' => $userrole]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LocationManagerRequest $request, $id)
    {

        try{
            $locationgeneral = LocationGeneral::findOrFail($id);
            if($request ->has('location_name')){
                $locationgeneral->location_name = $request->location_name;
            }
            if($request ->has('area')){
                $locationgeneral->area = $request->area;
            }
            if($request ->has('contact_number')){
                $locationgeneral->contact_number = $request->contact_number;
            }
            if($request ->has('contact_number')){
                $locationgeneral->contact_number = $request->contact_number;
            }
            if($request ->has('email')){
                $locationgeneral->email = $request->email;
            }
            if($request ->has('seating_capacity')){
                $locationgeneral->seating_capacity = $request->seating_capacity;
            }
            if($request ->has('business_hours_s')){
                $locationgeneral->business_hours_s = $request->business_hours_s;
            }
            if($request ->has('business_hours_e')){
                $locationgeneral->business_hours_e = $request->business_hours_e;
            }
            $locationgeneral->update();

            //Location Bank

            $locationbank = LocationBank::where('location_general_id',$locationgeneral->id)->first();

            $locationbank->location_general_id = $locationgeneral->id;
            
            if($request ->has('bank_name')){
                $locationbank->bank_name = $request->bank_name;
            }
            if($request ->has('account_number')){
                $locationbank->account_number = $request->account_number;
            }
            if($request ->has('benificiary_name')){
                $locationbank->benificiary_name = $request->benificiary_name;
            }
            if($request ->has('ifsc')){
                $locationbank->ifsc = $request->ifsc;
            }
            if($request ->has('branch')){
                $locationbank->branch = $request->branch;
            }
            $locationbank->update();

            //Location LocationBilling
            $locationbilling = LocationBilling::where('location_general_id',$locationgeneral->id)->first();
            $locationbilling->location_general_id = $locationgeneral->id;
            if($request ->has('legal_business_name')){
                $locationbilling->legal_business_name = $request->legal_business_name;
            }
            if($request ->has('address')){
                $locationbilling->address = $request->address;
            }
            if($request ->has('notes_top')){
                $locationbilling->notes_top = $request->notes_top;
            }
            if($request ->has('notes_bottom')){
                $locationbilling->notes_bottom = $request->notes_bottom;
            }
            if($request ->has('gstn')){
                $locationbilling->gstn = $request->gstn;
            }
            if($request ->has('state')){
                $locationbilling->state = $request->state;
            }
            if($request ->has('city')){
                $locationbilling->city = $request->city;
            }
            $locationbilling->update();
            
            return redirect('managelocations')->with('success', 'Updated successfully!');
            }catch(Exception $e){
                if ($e->getCode() == 23000) {
                    return redirect()->back()->with('error', 'The email provided is already taken. Please choose a different email.')->withInput();
                }
                Log::error($e->getMessage());
                return redirect()->back()->with('error', 'An error occurred while creating the user. Please try again later.');
            } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $locationgeneral=LocationGeneral::find($id);
        $locationgeneral->delete();
        return redirect('managelocations')->with('success','deleted successfully');
    }
}