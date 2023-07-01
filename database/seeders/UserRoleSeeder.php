<?php

namespace Database\Seeders;

use App\Models\Userrole;
use Illuminate\Database\Seeder;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Userrole::create([
            'role_name'             => 'Manager',
            'status'                => 'enabled',
            'open_dashboard'        => 'Yes',
            'open_visitor_log'      => 'Yes',
            'add_visitor'           => 'Yes',
            'view_visitor'          => 'Yes',
            'edit_visitor'          => 'Yes',
            'delete_visitor'        => 'Yes',
            'open_visitor_timeline' => 'Yes',
            'open_reason_for_visit' => 'Yes',
            'add_reason'            => 'Yes',
            'delete_reason'         => 'Yes',
            'import_reason'         => 'Yes',
            'export_reason'         => 'Yes',
            'open_visitor_kiosk'    => 'Yes',
            'open_user_page'        => 'Yes',
            'add_user'              => 'Yes',
            'edit_user'             => 'Yes',
            'delete_user'           => 'Yes',
            'open_user_role'        => 'Yes',
            'add_role'              => 'Yes',
            'edit_role'             => 'Yes',
            'set_permission'        => 'Yes',
            'delete_role'           => 'Yes',
            'open_setting'          => 'Yes',
            'update_setting'        => 'Yes'
        ]);
    }
}
