<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\UserRole;


class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = UserRole::where('role_name', 'Manager')->first();


        User::create([
            'name' => 'Manager',
            'email' => 'manager@gmail.com',
            'password' => Hash::make('demo@123'),
            'role_id' => $role['id']
        ]);
    }
}
