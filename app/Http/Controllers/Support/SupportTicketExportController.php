<?php

namespace App\Http\Controllers\Support;

use Illuminate\Http\Request;
use App\Exports\TicketExport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class SupportTicketExportController extends Controller
{
    public function exportSupportTicket ()
    {
        return Excel::download(new TicketExport, 'SupportTicket.xlsx');

    }
}
