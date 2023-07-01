<?php

namespace App\Http\Controllers\Search;

use App\Models\PostStream;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Symfony\Component\Console\Input\Input;

class FeedFilterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    
       $data_inicio = $request->from_date;
        $data_fim = $request->to_date;

        $streams = PostStream::withCount('comments','likes','spams')->with('owner', 'likes:id,name')->whereBetween('created_at',[$data_inicio, $data_fim])
        ->where('delete_status',0)->orderBy('created_at', 'DESC')->get();
    
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
        $data_inicio = $request->from_date;
        $data_fim = $request->to_date;

        $streams = PostStream::withCount('comments')->with('owner', 'likes:id,name')->whereBetween('created_at',[$data_inicio, $data_fim])
        ->where('delete_status',0)->orderBy('created_at', 'DESC')->get();
    
        return response()->json(['status' => 200, 'data' => $streams]);
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
