<?php

namespace App\Http\Controllers\Social\Stream;

use App\Models\User;
use App\Models\Comment;
use App\Models\PostStream;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     
      public function getComment(Request $request, PostStream $stream, Comment $comment, $id)
    {
        $streams = Comment::with('user:id,name,profile_image')->where('post_stream_id', '=', $id)
        ->orderBy('created_at', 'DESC')
        ->get();
        
        return response()->json(['status' => 200, 'data' => $streams]);
    }


     
     
    public function index()
    {
        //
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
    public function store(Request $request, Comment $comment, User $user, PostStream $stream)
    {
        $rules = [
            'user_id',
            'post_stream_id',
            'comment_description',
        ];

        $this->validate($request, $rules);
        $data = $request->all();

        $data['user_id'] = $request->user->id;
        $data['post_stream_id'] = $request->stream->id;
        $data['comment_description'] = $request->comment_description;
                    
        $comment = Comment::create($data);
                    
        return response()->json(['status' => 200, 'data' => $comment]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Respons6e
     */
    // public function getComment(Request $request, PostStream $stream, Comment $comment, $id)
    // {
    //     $streams = PostStream::with('comments')->where('id', '=', $id)->orderBy('created_at', 'DESC')->get();
    //     return $streams;
    // }

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
