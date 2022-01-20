<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $position = \App\Models\Position::create([
            'name'              => 'Administrator System',
            'active'            => true
        ]);
        
        $employee = \App\Models\Employee::create([
            'position_id'       => $position->id,
            'nik'               => '1234567890123456',
            'name'              => 'Administrator',
            'address'           => 'Unamed Road',
            'gender'            => 'Pria',
            'image'             => 'public/images/profile/default.jpg',
            'active'            => true
        ]);

        \App\Models\User::create([
            'employee_id'       => $employee->id,
            'username'          => 'admin',
            'email'             => 'admin@gmail.com',
            'role'              => 'ADMIN',
            'email_verified_at' => now(),
            'password'          => Hash::make('asdasdasd'),
            'remember_token'    => Str::random(10),
        ]);
    }
}
