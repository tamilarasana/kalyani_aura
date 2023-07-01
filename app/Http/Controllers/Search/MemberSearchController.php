<?php

namespace App\Http\Controllers\Search;

use App\Models\User;
use App\Models\PostStream;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MemberSearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($hashtag)
    {
//       $result = User::query()
//   ->whereLike('name', $hashtag)->orderBy('created_at', 'DESC')
//   ->get();
    $result = User::query()
                         ->whereLike('name', $hashtag)->orderBy('created_at', 'DESC')
                         ->where('status',0)
                         ->get();

    return response()->json(['status' => 200, 'data' => $result]);
   
   
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
