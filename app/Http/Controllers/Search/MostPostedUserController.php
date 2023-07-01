<?php

namespace App\Http\Controllers\Search;

use App\Models\User;
use App\Models\PostStream;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MostPostedUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::withCount('streams')->orderBy('streams_count', 'DESC')->take(5)->get();
        return response()->json([ 'status' => 200, 'data' => $users]);
    }
    
    
    public function spam()
    {
       $stream = PostStream::withCount('comments','likes','spams')
       ->with('owner', 'likes:id,name')
       ->where('delete_status',0)
       ->orderBy('spams_count', 'DESC')
       ->get();
      return response()->json([ 'status' => 200, 'data' => $stream]);
    }
    
    public function mostLikedPost()
    {
       $stream = PostStream::withCount('comments','likes','spams')
       ->with('owner', 'likes:id,name')
       ->where('delete_status',0)
       ->orderBy('likes_count', 'DESC')
       ->get();
      return response()->json([ 'status' => 200, 'data' => $stream]);

    }
    
    public function mostCommentedPost()
    {
       $stream = PostStream::withCount('comments','likes','spams')
       ->with('owner', 'likes:id,name')
       ->where('delete_status',0)
       ->orderBy('comments_count', 'DESC')
       ->get();
      return response()->json([ 'status' => 200, 'data' => $stream]);

    }

    public function hiddenPost()
    {
       $stream = PostStream::withCount('comments','likes','spams')
       ->with('owner', 'likes:id,name')
       ->where('post_status', 1)
       ->orderBy('created_at', 'DESC')
       ->get();
      return response()->json([ 'status' => 200, 'data' => $stream]);
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
    public function update(Request $request, $id)
    {
        //
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
