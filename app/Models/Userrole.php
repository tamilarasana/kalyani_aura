<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userrole extends Model
{
    use HasFactory;

    protected $fillable = [
        'role_name',
        'status',
        'open_dashboard',
        'open_visitor_log',
        'add_visitor',
        'view_visitor',
        'edit_visitor',
        'delete_visitor',
        'open_visitor_timeline',
        'open_reason_for_visit',
        'add_reason',
        'delete_reason',
        'import_reason',
        'export_reason',
        'open_visitor_kiosk',
        'open_user_page',
        'add_user',
        'edit_user',
        'delete_user',
        'open_user_role',
        'add_role',
        'edit_role',
        'set_permission',
        'delete_role',
        'open_setting',
        'update_setting',
    ];

}
