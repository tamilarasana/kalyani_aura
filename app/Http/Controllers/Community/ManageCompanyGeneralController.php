<?php

namespace App\Http\Controllers\Community;

use Str;
use Storage;
use Exception;
use App\Models\User;
use App\Models\Userrole;
use App\Models\CompanyKyc;
use App\Models\CompanySpoc;
use Illuminate\Http\Request;
use App\Models\CompanyBilling;
use App\Models\CompanyGeneral;
use App\Models\LocationGeneral;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\ApiController;
use Illuminate\Database\QueryException;
use App\Http\Requests\ManageCompanyRequest;

class ManageCompanyGeneralController extends ApiController
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

        $company = CompanyGeneral::with('billings','spoc','kyc','locations')->where('status', 0)->get();
        return view('Community.managecompany.index', ['company' => $company,'loggedUser' =>$loggedUser,'userrole' => $userrole]);
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

        $location = LocationGeneral::where('status', 0)->get();
        return view('Community.managecompany.create',['location' => $location,'loggedUser' =>$loggedUser,'userrole' => $userrole]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ManageCompanyRequest $request)
    {   
        // try { 
           
            $data = $request->all();
            $general = CompanyGeneral::create($data);

            if($request->has('cin'))
            {
                $data1['cin'] = $request->cin;
                $data1['pan'] = $request->pan;
                $data1['gstn'] = $request->gstn;
                $data1['tan'] = $request->tan;
                $data1['billing_address'] = $request->billing_address;
                $data1['company_general_id'] = $general->id;
                $billing = CompanyBilling::create($data1);
            }
             if($request->has('first_name'))
            {
                $data2['first_name'] = $request->first_name;
                $data2['last_name'] = $request->last_name;
                $data2['user_name'] = $request->user_name;
                $data2['email'] = $request->email;
                $data2['company_general_id'] = $general->id;
                $spoc = CompanySpoc::create($data2);
             }

             if($request->has('kyc_document_name')){
                $kycdata['kyc_document_name'] =  $request->kyc_document_name;
             }
             if ($request->file('file')) {
                    $imageName = time().'.'.$request->file->extension(); 
                    $path=   $request->file->storeAs('file',$imageName,'public');
                }  
                $kycdata['file'] = $path;
                $kycdata['company_general_id'] = $general->id;
                $companykyc = CompanyKyc::create($kycdata);
                return redirect('managecompany')->with('success', 'Created successfully!');
            //  }catch(Exception $e){
            // if ($e->getCode() == 23000) {
            //     return redirect()->back()->with('error', 'The email provided is already taken. Please choose a different email.')->withInput();
            // }
            //     Log::error($e->getMessage());
            //     return back()->withError($e->getMessage())->withInput();

                // return redirect()->back()->with('error', 'An error occurred while creating the user. Please try again later.');
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

        $general = CompanyGeneral::findOrFail($id);
        $generalId = $general->id;
        $companybilling = CompanyBilling::where('company_general_id', $generalId )->first();
        // $spoc = CompanySpoc::where('company_general_id', $id)->get();
         $spoc = CompanySpoc::where('company_general_id', $general->id)->first();
         $kyc = CompanyKyc::where('company_general_id', $general->id)->first();
        $location = LocationGeneral::where('status', 0)->get();
        return view('Community.managecompany.show',['location' => $location, 'general' =>  $general, 'companybilling' => $companybilling,'spoc' => $spoc, 'kyc' => $kyc,'loggedUser' =>$loggedUser,'userrole' => $userrole]); 
    }
    
    
     public function companies()
    {
        $general = CompanyGeneral::all();
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
        $loggedUser = User::where('id','=', session('LoggedUser'))->first();
        $userrole = Userrole::where('id', $loggedUser['role_id'])->first();
        
        $general = CompanyGeneral::findOrFail($id);
        $generalId = $general->id;
        $companybilling = CompanyBilling::where('company_general_id', $generalId )->first();
         $spoc = CompanySpoc::where('company_general_id', $general->id)->first();
         $kyc = CompanyKyc::where('company_general_id', $general->id)->first();
        $location = LocationGeneral::where('status', 0)->get();
        return view('Community.managecompany.edit',['location' => $location, 'general' =>  $general, 'companybilling' => $companybilling,'spoc' => $spoc, 'kyc' => $kyc,'loggedUser' =>$loggedUser,'userrole' => $userrole]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ManageCompanyRequest $request, CompanyGeneral $companyGeneral, $id)
    {

        $general = CompanyGeneral::find($id);
        $billing = CompanyBilling::where('company_general_id', $general->id)->first();
        $spoc = CompanySpoc::where('company_general_id', $general->id)->first();
        $companykyc = CompanyKyc::where('company_general_id', $general->id)->first();
        $kycdata = $companykyc ->file; 
        if($request->has('company_name'))
         {
            $general->company_name = $request->company_name;
        }
        
        if($request->has('company_email'))
         {
            $general->company_email = $request->company_email;
        }
         
         if($request->has('contact_number'))
         {
            $general->contact_number = $request->contact_number;
        }
     
        if($request->has('web_url'))
         {
            $general->web_url = $request->web_url;
        }
     
        if($request->has('reference'))
         {
            $general->reference = $request->reference;
        }

        if($request->has('location'))
         {
            $general->location = $request->location;
        }
     
           $general->update();
//---------------------------------general done ----------------------------//
           if($request->has('first_name'))
         {
            $spoc->first_name = $request->first_name;
        }
        
        if($request->has('last_name'))
         {
            $spoc->last_name = $request->last_name;
        }
         
         if($request->has('user_name'))
         {
            $spoc->user_name = $request->user_name;
        }
     
        if($request->has('email'))
         {
            $spoc->email = $request->email;
        }
     
      
           $spoc->update();
//---------------------------------Billing done ----------------------------//
        if($request->has('cin'))
        {
           $billing->cin = $request->cin;
        }

        if($request->has('pan'))
        {
           $billing->pan = $request->pan;
        }

        if($request->has('gstn'))
        {
           $billing->gstn = $request->gstn;
        }

        if($request->has('tan'))
        {
           $billing->tan = $request->tan;
        }

        if($request->has('billing_address'))
        {
           $billing->billing_address = $request->billing_address;
        }

          $billing->update();

//---------------------------------Kyc  done ----------------------------//

          if($request->has('kyc_document_name'))
          {
             $companykyc->kyc_document_name = $request->kyc_document_name;
          }

          if ($request->file('file')) {
            if($kycdata){
                Storage::delete('/public/'.$kycdata);
            }
            $imageName = time().'.'.$request->file->extension(); 
            $path=   $request->file->storeAs('file',$imageName,'public');
            $companykyc->file = $path;
        } 
        $companykyc->update();
     
    //---------------------------------spoc done ----------------------------//
        return redirect('managecompany')->with('success', 'Updated successfully!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       //  $general = CompanyGeneral::find($id);
        // $general->delete();
        // return response()->json($general);
        
       $company_general = CompanyGeneral::find($id);
       $company_general->status = '1';
       $company_general->save();
    //    $companykyc = CompanyKyc::where('company_general_id', $company_general->id)->first();
    //    Storage::delete('/public/'.$companykyc ->file);
       return redirect('managecompany')->with('success', 'Deleted successfully!');

    }
}
