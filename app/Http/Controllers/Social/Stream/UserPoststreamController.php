<?php

namespace App\Http\Controllers\Social\Stream;

use App\Models\User;
use App\Models\PostStream;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserPoststreamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(User $user)
    {
        $streams = PostStream::where('user_id', $user->id)
                                    ->withCount('comments','likes','spams')
                                    ->with('owner', 'likes:id,name')
                                    ->where('delete_status',0)
                                    ->orderBy('created_at', 'DESC')
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
    public function store(Request $request)
    {
        //
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
    public function update(Request $request, User $user, PostStream $poststream)
    {
         //attach,sync,syncWithoutDetaching

      $poststream->user()->syncWithoutDetaching([$user->id]);
      return response()->json('liked');
    //   if()
    //   $poststream->user()->detach($user->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user, PostStream $poststream)
    {
        $poststream->user()->detach($user->id);
        return response()->json('disliked');
    }

    // public function checkLikes(User $user, PostStream $postream)
    // {
    //     DB::table('post_stream_user')->
    // }
}
