<?php

namespace App\Exports;

use App\Models\Supportticket;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;



class TicketExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */

    
    public function collection()
    {

        // $results = Supportticket::with('subcategory', 'location', 'user', 'assignedPerson')->get();
        // dd($results);
        $results =  DB::select('SELECT st.id,st.ticket_description, st.status,sc.sub_category,l.location_name,u.name
                                FROM supporttickets st
                                JOIN supportsubcategories sc 
                                ON   st.id = sc.supportcategory_id
                                JOIN users u
                                ON u.id = sc.supportcategory_id
                                JOIN location_generals l
                                ON   l.id = sc.supportcategory_id
                                ');
        $ticket = Supportticket::hydrate($results);  
        return $ticket;

    }

    public function headings(): array
    {
        
        return ['Id','Ticket Descripation','Status','Category','Asset_location','User Name'];
    } 
}
