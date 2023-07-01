<?php

namespace App\Http\Controllers\Visitor;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Exports\VisitorExport;
use DB;
use Maatwebsite\Excel\Facades\Excel;

class ExportVisitorController extends Controller
{
    public function exportVisitor(Request $request){
        return Excel::download(new VisitorExport, 'Visitor.xlsx');
    }
}
