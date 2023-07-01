<?php

namespace App\Http\Controllers\Social;

use Str;
use Storage;
use App\Models\User;
use App\Models\Userrole;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Models\LocationGeneral;
use App\Http\Controllers\Controller;
use App\Http\Requests\AnnouncementRequest;


class AnnouncementController extends Controller
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
       $announcement = Announcement::orderBy('created_at', 'DESC')
      ->with('locations:id,location_name')
      ->withCount('interested')
      ->with('interested:id,name')
      ->get();
      return view('Social.annoncement.index',['announcement' => $announcement,'loggedUser' => $loggedUser, 'userrole' => $userrole]);
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
        return view ('Social.annoncement.create', ['location' => $location,'loggedUser' => $loggedUser, 'userrole' => $userrole]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AnnouncementRequest $request)
    {  
       
        $data = $request->all();
        $data['location'] = $request->location;
        
        // if($request->hasFile('image')){
        //     $file = $request->file('image');
        //   $filename = $file->getClientOriginalName();
        //  $data['image'] =   $file->store('public',$filename);
        // }

        // if($request->has('image'))
        // { 
        //     $images = $request->file('image');
        //     $banner_img = time().'.'. request()->image->getClientOriginalExtension();
        //     $path=   $request->image->storeAs('public',$banner_img);
        //     $data['image'] = $path;
        // }

        if($request->hasFile('image')){
            $data['image'] = $request->file('image')->store('public/Announcement');
        }

        $announcement = Announcement::create($data);

        return redirect('announcement')->with('success', 'Created successfully!');

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
        $loggedUser = User::where('id','=', session('LoggedUser'))->first();
        $userrole = Userrole::where('id', $loggedUser['role_id'])->first();

        $announcement = Announcement::findOrFail($id);
        $location = LocationGeneral::where('status', 0)->get();
        return view ('Social.annoncement.edit', ['location' => $location, 'announcement' => $announcement,'loggedUser' => $loggedUser, 'userrole' => $userrole]);;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AnnouncementRequest $request, $id)
    {   
  
        $announcement = Announcement::findOrFail($id);
        $oldImage = $announcement->image;

        if($request->has('title'))
         {
            $announcement->title = $request->title;
        }
        
        if($request->has('location'))
         {
            $announcement->location = $request->location;
        }
         
        if($request->has('image'))
         {
            if ($oldImage) {
                Storage::delete($oldImage);
            }
            $announcement->image = $request->file('image')->store('public/Announcement');

        }
         
         if($request->has('schedule_time'))
         {
            $announcement->schedule_time = $request->schedule_time;
        }

        if($request->has('schedule_date'))
         {
            $announcement->schedule_date = $request->schedule_date;
        }
        if($request->has('expiration_time'))
         {
            $announcement->expiration_time = $request->expiration_time;
        }
        if($request->has('expiration_date'))
         {
            $announcement->expiration_date = $request->expiration_date;
        }

       if($request->has('message'))
        {
           $announcement->message = $request->message;
       }
       if($request->has('stick_top'))
       {
          $announcement->stick_top = $request->stick_top;
      }
   
        $announcement->update();
        return redirect('announcement')->with('success', 'Updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        $announcement = Announcement::find($id);
            $oldImage = $announcement->image;
            Storage::delete($oldImage);
            $announcement->delete();
        return redirect('announcement')->with('success', 'Deleted successfully!');
    }
}
