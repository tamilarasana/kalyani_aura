<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use App\Models\Visitor;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\Exportable;

class VisitorExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $results = DB::select('SELECT v.id,v.first_name,v.last_name,rv.purpose,v.visit_from,v.date,v.time_in,v.time_out
                          FROM visitors v
                          JOIN reasonvisits rv
                          ON rv.id = v.reason_for_visit');
        $visitors = Visitor::hydrate($results);                  
        return $visitors;

    }

    public function headings(): array
    {
        
        return ['Id','First_Name','Last_Name','Reason_For_Visit','Visit_From','date','Time_In', 'Time_out'];
    } 
}
