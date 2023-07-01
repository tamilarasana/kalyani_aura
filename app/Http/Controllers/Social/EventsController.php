<?php

namespace App\Http\Controllers\Social;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $event = Event::all();
        return response()->json($event);
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
        $rules = [ 
            'organiser'     => 'required',
                  ];

                  $this->validate($request, $rules);
                  $data = $request->all();
                  $data['location'] = $request->location;
          
                  $event = Event::create($data);
                  return response()->json($event);
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
        $event = Event::find($id);

        if($request->has('location'))
         {
            $event->location = $request->location;
        }
        if($request->has('organiser'))
         {
            $event->organiser = $request->organiser;
        }
        
        if($request->has('event_title'))
         {
            $event->event_title = $request->event_title;
        }
         
         if($request->has('event_date'))
         {
            $event->event_date = $request->event_date;
        }
     
        if($request->has('status'))
         {
            $event->status = $request->status;
        }
     
        if($request->has('description'))
         {
            $event->description = $request->description;
        }
       
       if($request->has('event_image'))
        {
           $event->event_image = $request->event_image;
       }
       if($request->has('source_link'))
       {
          $event->source_link = $request->source_link;
      }
      if($request->has('start_time'))
      {
         $event->start_time = $request->start_time;
     }
  
     if($request->has('end_time'))
     {
        $event->end_time = $request->end_time;
    }
 
   
    
        
        $event->save();
        return response()->json($event);   
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $event = Event::find($id);
        $event->delete();
        return response()->json($event);
    }
}
