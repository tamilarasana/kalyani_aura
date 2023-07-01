<?php

namespace App\Http\Controllers\Visitor;

use App\Models\User;
use App\Models\Check;
use App\Models\Visitor;
use App\Models\Userrole;
use App\Models\Reasonvisit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CheckinRequest;
use Carbon\Carbon;


class CheckinController extends Controller
{
    public function checkInpage(){ 

        $loggedUser = User::where('id','=', session('LoggedUser'))->first();
        $userrole = Userrole::where('id', $loggedUser['role_id'])->first();
        $reasonvisits = Reasonvisit::all();

        return view('Visitor.visitorcheckin',['reasonvisits' => $reasonvisits,'loggedUser' => $loggedUser, 'userrole' => $userrole]);
    }

public function checkOutpage(){

    $loggedUser = User::where('id','=', session('LoggedUser'))->first();
    $userrole = Userrole::where('id', $loggedUser['role_id'])->first();
    $checkout  = Check::where('time_check_out', NULL)->get();
    return view('Visitor.visitorcheckout',['checkout' =>$checkout,'loggedUser' => $loggedUser, 'userrole' => $userrole]);
}

public function checkInStore(CheckinRequest $request){
    $data = $request->all();
    $time = $request->time_check_in;
        $carbon = Carbon::createFromFormat('g:i:s A', $time);
        $timeWithoutAmPm = $carbon->format('g:i:s');
        $data['time_check_in'] =  $timeWithoutAmPm;
    $checkin  = Check::create($data);
    return redirect('checkin')->with('success', 'Created successfully!');
}   

public function checkOut($id){
    $checkout = Check::findOrFail($id);
    $reasonvisits = Reasonvisit::all();
    return response()->json(['status' => 200, 'data' => $checkout,'reasonvisits' => $reasonvisits]); 
}
public function updatecheckOut(Request $request, $id){
    $reasonvisits = Check::findOrFail($id);
    $timecheckout = $request->time_check_out;
    $carbon = Carbon::createFromFormat('g:i:s A', $timecheckout);
    $timeWithoutAmPm = $carbon->format('g:i:s');
    $reasonvisits->time_check_out = $timeWithoutAmPm;
    $reasonvisits->update();
    return redirect('checkin')->with('success', 'Created successfully!');

    // return response()->json(['status' => 200, 'data' => $reasonvisits, "redirect_url"=>redirect('checkin')]); 
}


public function visitorTimeline(){

    $loggedUser = User::where('id','=', session('LoggedUser'))->first();
    $userrole = Userrole::where('id', $loggedUser['role_id'])->first();
    $reasonvisits = Check::where('time_check_out', NULL)->get();
    return view('Visitor.visitortimeline',['loggedUser' => $loggedUser, 'userrole' => $userrole, 'reasonvisits' => $reasonvisits]);
}

public function reasonForvisits(){
    
    $loggedUser = User::where('id','=', session('LoggedUser'))->first();
    $userrole = Userrole::where('id', $loggedUser['role_id'])->first(); 
    $reasonvisit = Reasonvisit::all();
    return view('Visitor.reasonvisits', ['reasonvisit' => $reasonvisit, 'loggedUser' => $loggedUser, 'userrole' => $userrole]);
}


public function visitorReasonStore(Request $request){
    $rules = [
        'purpose' => 'required',
    ];
    $this->validate($request, $rules);
    $data = $request->all();
    $user = Reasonvisit::create($data);
    return redirect()->route('reasonvisits')->with('success', 'Created successfully!');
}

public function visitorDestroy($id)
    {
        $visitorreason = Reasonvisit::find($id);
        $visitorreason->delete();
        return redirect()->route('reasonvisits')->with('success', 'Deleted successfully!');
    }

}