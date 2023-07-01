<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\CompanyGeneral;
use Illuminate\Http\Request;
use App\Models\LocationGeneral;
use App\Models\PostStream;
use App\Models\User;
use App\Models\Member;
use App\Models\Supportticket;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $location = LocationGeneral::count();
        $active_location =  LocationGeneral::where('status', 0)->count();
        $inactive_location =  LocationGeneral::where('status', 1)->count();
        $location_final = [
            'total_location' => $location,
            'active_location' => $active_location, 
            'inactive_location' => $inactive_location, 
        ];

        $company = CompanyGeneral::count();
        $active_company =  CompanyGeneral::where('status', 0)->count();
        $inactive_company =  CompanyGeneral::where('status', 1)->count();
        $company_final = [
            'total_company' => $company,
            'active_company' => $active_company, 
            'inactive_company' => $inactive_company, 
        ];

        $member = User::count();
        $active_member =  User::where('status', 0)->count();
        $inactive_member =  User::where('status', 1)->count();
        $member_final = [
            'total_member' => $member,
            'active_member' => $active_member, 
            'inactive_member' => $inactive_member, 
        ];

        $team_member = Member::count();
        $active_team_member =  Member::where('status', 0)->count();
        $inactive_team_member =  Member::where('status', 1)->count();
        $team_member_final = [
            'total_team_member' => $team_member,
            'active_team_member' => $active_team_member, 
            'inactive_team_member' => $inactive_team_member, 
        ];

        $ticket = Supportticket::count();
        $active_ticket =  Supportticket::where('status', 0)->count();
        $inactive_ticket =  Supportticket::where('status', 1)->count();
        $ticket_final = [
            'total_ticket' => $ticket,
            'active_ticket' => $active_ticket, 
            'inactive_ticket' => $inactive_ticket, 
        ];

        $stream = PostStream::count();
        $active_stream =  PostStream::where('post_status', 0)->count();
        $inactive_stream =  PostStream::where('post_status', 1)->count();
        $stream_final = [
            'total_stream' => $stream,
            'active_stream' => $active_stream, 
            'inactive_stream' => $inactive_stream, 
        ];

        $announcement = Announcement::count();
        $final_result = [
                    'location' => $location_final,
                    'company'  => $company_final, 
                    'member' => $member_final,
                    'team'  => $team_member_final, 
                    'ticket' => $ticket_final,
                    'stream'  => $stream_final,
                    'announcement' => $announcement
        ];
        return response()->json(['status' => 200, 'data' => $final_result]);

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
