<?php

namespace App\Http\Controllers\Social\Stream;

use App\Models\User;
use App\Models\PostStream;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Image;
use App\Http\Controllers\Controller;
use App\Http\Controllers\ApiController;

class StreamController extends ApiController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
   
         // $streams = PostStream::withCount('user')->with('users:id,name')->orderBy('created_at', 'DESC')->get();
        // $streams = PostStream::withCount('comments')->withCount('user')->withCount('spams')->with('owner:id,name,email,first_name,last_name,location,company,profile_image','spams')->orderBy('created_at', 'DESC')->get();
       //   return response()->json($streams);
      $streams = PostStream::withCount('comments','likes')->with('owner', 'likes:id,name')
                                    ->where('delete_status',0)
                                    ->orderBy('created_at', 'DESC')
                                    ->withCount('spams')
                                    ->get();
                                    return response()->json(['status' => 200, 'data' => $streams]);

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
    public function store(Request $request, User $user)
    {
        
        $rules = [ 
            'user_id'     => 'required',
            'description' => 'min:3',
                  ];

        $this->validate($request, $rules);
              $data          = $request->all();
        $data['user_id']     = $request->user_id;
        $data['description'] = $request->description;
           
         if($request->has('image'))
         { 
            $data['image'] = $request->image->store('public');
         }

        $stream = PostStream::create($data);

                    
    
         return response()->json(['status' => 200, 'data' => $stream]);
                    
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
      $stream = PostStream::findOrFail($id);
    

        if($request->has('post_status'))
         {
            $stream->post_status = $request->post_status;
        
         }
        $stream->save();
       return response()->json([ 'status' => 200, 'streams' => $stream]);
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
