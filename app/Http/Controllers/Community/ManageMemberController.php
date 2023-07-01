<?php

namespace App\Http\Controllers\Community;

use Exception;
use App\Models\User;
use App\Models\Member;
use App\Models\Userrole;
use App\Mail\MemberCreated;
use Illuminate\Http\Request;
use App\Models\CompanyGeneral;
use App\Models\LocationGeneral;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\ApiController;
use Illuminate\Database\QueryException;
use App\Http\Requests\ManageMemberRequest;

class ManageMemberController extends ApiController
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
        // $member = User::where('status', 0)->get();
        $member = User::all();
        return view('Community.managemember.index',['member' => $member,'loggedUser' =>$loggedUser,'userrole' => $userrole]);
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
        $general = CompanyGeneral::where('status', 0)->get();
        return view('Community.managemember.create',['location' => $location,'general' => $general,'loggedUser' =>$loggedUser,'userrole' => $userrole]);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ManageMemberRequest $request)
    {
        // try{
            $data = $request->all();
            
            $data['password'] = bcrypt($request->password);
            $data['work_station'] = $request->work_station;
            $data['working_company'] = $request->working_company;
            $data['gender'] = $request->gender;
            $member = User::create($data);

        // }catch(Exception $e){
        //     if ($e->getCode() == 23000) {
        //     return redirect()->back()->with('error', 'The email provided is already taken. Please choose a different email.')->withInput();
        // }
        //     Log::error($e->getMessage());
        //     return redirect()->back()->with('error', 'An error occurred while creating the user. Please try again later.');
        // } 
            return redirect('managemember')->with('success', 'Created successfully!');
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

        $member = User::find($id);
        $location = LocationGeneral::where('status', 0)->get();
        $general = CompanyGeneral::where('status', 0)->get();
        return view('Community.managemember.show',['member' => $member,'location' => $location,'general' => $general,'loggedUser' =>$loggedUser,'userrole' => $userrole]);
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

        $member = User::find($id);
        $location = LocationGeneral::where('status', 0)->get();
        $general = CompanyGeneral::where('status', 0)->get();
        return view('Community.managemember.edit',['member' => $member,'location' => $location,'general' => $general,'loggedUser' =>$loggedUser,'userrole' => $userrole]);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ManageMemberRequest $request, $id)
    {
 
        $member = User::find($id);

        if($request->has('first_name'))
         {
            $member->first_name = $request->first_name;
        }
        
        if($request->has('last_name'))
         {
            $member->last_name = $request->last_name;
        }
         if($request->has('email'))
         {
            $member->email = $request->email;
        }
         
         if($request->has('name'))
         {
            $member->name = $request->name;
        }
        if($request->has('work_station'))
         {
            $member->work_station = $request->work_station;
        }
          if($request->has('profile_image'))
         {
              $member->profile_image = $request->profile_image->storeAs('public');
            //   $imageName = time().'.'.$request->categorytype_img->extension(); 
            //   $member->profile_image  =   $request->profile_image->storeAs('profile_image',$imageName,'public');
        }
           // if ($request->file('categorytype_img')) {
        //     $imageName = time().'.'.$request->categorytype_img->extension(); 
        //     $path=   $request->categorytype_img->storeAs('categorytype',$imageName,'public');
        // }  
        if($request->has('working_company'))
         {
            $member->working_company = $request->working_company;
        }
         
         if($request->has('mobile'))
         {
            $member->mobile = $request->mobile;
        }
     
        if($request->has('designation'))
         {
            $member->designation = $request->designation;
        }
        
     if($request->has('location'))
         {
            $member->location = $request->location;
        }
        
        if($request->has('company'))
         {
            $member->company = $request->company;
        }
        
        if($request->has('spoc'))
         {
            $member->spoc = $request->spoc;
        }
        
        $member->save();
        return redirect('managemember')->with('success', 'Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
       $member = User::find($id);
       $member->status = '1';
       $member->save();
       return redirect('managemember')->with('success', 'Deleted successfully!');
    }
}
