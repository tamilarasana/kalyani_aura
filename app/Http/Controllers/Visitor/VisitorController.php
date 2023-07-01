<?php

namespace App\Http\Controllers\Visitor;

use DateTimeZone;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Visitor;
use App\Models\Userrole;
use App\Models\Reasonvisit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\VisitorlogRequest;



class VisitorController extends Controller
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
        
        $visitors = Visitor::with('reasonvisit')->get();
        return view('Visitor.index',['visitors' => $visitors, 'loggedUser' => $loggedUser, 'userrole' => $userrole]);
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
        $visitors = Reasonvisit::all();
        return view('Visitor.create',['visitors' => $visitors, 'loggedUser' => $loggedUser, 'userrole' => $userrole]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(VisitorlogRequest $request)
    {
        
        $data = $request->all();
        $user = Visitor::create($data);
        return redirect('visitor')->with('success', 'Created successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function filter(Request $request)
    {
    date_default_timezone_set('Asia/kolkata');

    $loggedUser = User::where('id','=', session('LoggedUser'))->first();
    $userrole = Userrole::where('id', $loggedUser['role_id'])->first();
        
     $startDate = $request->start_date;
     $endDate = $request->end_date;

     $from_ist = Carbon::createFromFormat('Y-m-d', $startDate);
     $from_utc = $from_ist->setTimeZone(new DateTimeZone('UTC'));
     
     $to_ist = Carbon::createFromFormat('Y-m-d', $endDate);
     $to_utc = $to_ist->setTimeZone(new DateTimeZone('UTC')); 
     $visitors = Visitor::where([['date', '>=', $startDate],['date', '<=',  $endDate]])->get();
    return view('Visitor.index',['visitors' => $visitors, 'loggedUser' => $loggedUser, 'userrole' => $userrole]);

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
        $visitor = Visitor::findOrFail($id);
        $reasonvisitors = Reasonvisit::all();
        return view('Visitor.edit',['visitor' => $visitor, 'reasonvisitors' => $reasonvisitors,'loggedUser' => $loggedUser, 'userrole' => $userrole]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(VisitorlogRequest $request, $id)
    {
       
        $visitor = Visitor::find($id);
        if($request->has('first_name')){
           $visitor->first_name = $request->first_name;
        }
        if($request->has('last_name')){
             $visitor->last_name = $request->last_name;
        }
        if($request->has('reason_for_visit')){
            $visitor->reason_for_visit = $request->reason_for_visit;
        }
        if($request->has('visit_from')){
            $visitor->visit_from = $request->visit_from;
        }
        if($request->has('date')){
            $visitor->date = $request->date;
        }
        if($request->has('time_in')){
            $visitor->time_in = $request->time_in;
        }
        if($request->has('time_out')){
            $visitor->time_out = $request->time_out;
        }
        $visitor->update();
        return redirect('visitor')->with('success', 'Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $visitor = Visitor::find($id);
        $visitor->delete();
        return redirect('visitor')->with('success', 'Deleted successfully!');
    }


    public function editPermission() {
        
        return view('User.Role.editpermission');
    } 
    
}