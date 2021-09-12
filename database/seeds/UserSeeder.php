<?php

use App\Model\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        $data = array(
            'nama' => 'Super Admin',
            'username' => 'request_uname',
            'password' => Hash::make('request_pass'),
            'role' => 'super_admin',
        );
        $admin = User::create($data);
        $admin->assignRole('super_admin');
        $data2 = array(
            'nama' => 'Admin',
            'username' => 'request_admin',
            'password' => Hash::make('request_pass'),
            'role' => 'admin',
        );
        $admin = User::create($data2);
        $admin->assignRole('admin');
    }
}
