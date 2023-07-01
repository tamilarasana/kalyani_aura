<?php

namespace App\Http\Controllers\Support;

use Carbon\Carbon;
use App\Models\Assign;
use App\Models\Member;
use Illuminate\Http\Request;
use App\Models\Supportticket;
use App\Http\Controllers\Controller;

class AssignTicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
    
        $teams = Member::where('status', 0)->get();
        return response()->json(['status' => 200, 'data' => $teams]); 


        //  $startTime = Carbon::parse($this->start_time);
        // $finishTime = Carbon::parse($this->finish_time);

        // $totalDuration = $finishTime->diffForHumans($startTime);
        // dd($totalDuration);

        // $totalDuration = $finishTime->diffInSeconds($startTime);

        // gmdate('H:i:s', $totalDuration);
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
        //Task Date and Time Concatenation
        // $task_date =  $request->assigned_date;
        // $task_time =  $request->assign_time;
        // $task_date_time = $task_date." ".$task_time;
        
        //Close Date and Time Concatenation
        // $closed_date =  $request->closed_date;
        // $closed_time =  $request->closed_time;
        // $date_time = $closed_date." ".$closed_time;


       $ticketId = $request->support_ticket_id;
       $check = Assign::where('support_ticket_id',$ticketId)->get();
       
        if($check->isEmpty()) {
           $rules = [ 
        'support_ticket_id'     => 'required',
        'assigned_person_id'     => 'required',
              ];

             $this->validate($request, $rules);
             $data = $request->all();
             $data['support_ticket_id'] = $ticketId;
             $data['assigned_person_id'] = $request->assigned_person_id;
             $data['task_assigned_time'] = $request->task_assigned_time;
             $data['remarks'] = $request->priority;
             $data['assigned_to'] = $request->assigned_to;
             if($request->has('task_solved_time')){
                  $data['task_solved_time'] = $request->task_solved_time;
             }
             if($request->has('status')){
                $data['status'] = $request->status;
             }
             
      $stream = Assign::create($data);
        }
        if(!($check->isEmpty())){
            $id = $check->pluck('id');
            
                $timeUpdate = Assign::where('id', $id)->first();
             
             if($request->has('assigned_person_id')){
                 $timeUpdate->assigned_person_id = $request->assigned_person_id;
             }
             
             if($request->has('priority')){
                 $timeUpdate->remarks = $request->priority;
             }
             
             if($request->has('task_assigned_time')){
                 $timeUpdate->task_assigned_time = $request->task_assigned_time;
             }
             if($request->has('assigned_to')){
                 $timeUpdate->assigned_to = $request->assigned_to;
             }
             if($request->has('status')){
                 $timeUpdate->status = $request->status;
             }
             if($request->has('task_solved_time')){
                  $timeUpdate->task_solved_time = $request->task_solved_time;
             }
             
            $timeUpdate->save();
        }
       if($request->has('status')){
            $statusUpdate = Supportticket::find($ticketId);
            $statusUpdate->status = $request->status;
            $statusUpdate->save();
             
}
    return response()->json(['status'=>200, 'data'=>'success']);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function closeTicket(Request $request)
    {
       
        $closed_date =  $request->closed_date;
        $closed_time =  $request->closed_time;
        $date_time = $closed_date." ".$closed_time;
        $ticketId = $request->id;
        // if($request->has('status')){
            $statusUpdate = Supportticket::find($ticketId);
            $statusUpdate->status = $request->status;
            $statusUpdate->updated_at = $date_time;
            $statusUpdate->save();             
        // }
        return response()->json(['status'=>200, 'data'=>'success']);
    }

    
    public function assignmentTicket(Request $request){
        $task_date =  $request->assigned_date;
        $task_time =  $request->assign_time;
        $task_date_time = $task_date." ".$task_time;
        $ticketId = $request->support_ticket_id;

        $check = Assign::where('support_ticket_id',$ticketId)->get();
        if($check->isEmpty()) {
            $rules = [ 
                'support_ticket_id'     => 'required',
                'assigned_person_id'     => 'required',
                      ];
        
                     $this->validate($request, $rules);
                     $data = $request->all();
                     $data['support_ticket_id'] = $ticketId;
                     $data['assigned_person_id'] = $request->assigned_person_id;
                     $data['updated_at'] = $task_date_time;
                    $data['status'] = $request->status;
                    $data['user_id'] = '40';
              $stream = Assign::create($data);
              dd($stream);
        }
        


        // $assignTicket = Assign::find($ticketId);
        // $assignTicket->assigned_person_id = $request->assigned_person_id;
        // dd($assignTicket);
        // $statusUpdate->status = $request->status;
        // $assignTicket->updated_at = $datetask_date_time_time;
        // $assignTicket->save(); 
        return response()->json(['status'=>200, 'data'=>'success']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $ticketId = $request->support_ticket_id;

        //  if($request->has('status'))
        //   {
        //      $statusUpdate = Supportticket::find($ticketId);
        //      $statusUpdate->status = $request->status;

        //      $timeUpdate = Assign::find($id);
      
        //      $timeUpdate->task_solved_time = $request->task_solved_time;
             
        //      if($request->has('assigned_person_id')){
        //          $timeUpdate->assigned_person_id = $request->assigned_person_id;
        //      }
             
        //      if($request->has('priority')){
        //          $timeUpdate->remarks = $request->priority;
        //      }
             
        //      if($request->has('task_assigned_time')){
        //          $timeUpdate->task_assigned_time = $request->task_assigned_time;
        //      }
        //      if($request->has('assigned_to')){
        //          $timeUpdate->assigned_to = $request->assigned_to;
        //      }
             
        //      $statusUpdate->save();
        //      $timeUpdate->save();
        //  }             
        if($request->has('status'))
          {
             $statusUpdate = Supportticket::find($ticketId);
             $statusUpdate->status = $request->status;

            //  $timeUpdate = Assign::find($id);
      
             $timeUpdate['task_solved_time'] = $request->task_solved_time;
             
             if($request->has('assigned_person_id')){
                 $timeUpdate['assigned_person_id'] = $request->assigned_person_id;
             }
             
             if($request->has('priority')){
                 $timeUpdate['remarks'] = $request->priority;
             }
             
             if($request->has('task_assigned_time')){
                 $timeUpdate['task_assigned_time'] = $request->task_assigned_time;
             }
             if($request->has('assigned_to')){
                 $timeUpdate['assigned_to'] = $request->assigned_to;
             }
             
             $statusUpdate->save();
             $stream = Assign::updateOrCreate($timeUpdate);
             
         }             
     return response()->json(['status'=>200, 'data'=>'success']);
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
}