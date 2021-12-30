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
        \App\Models\User::create([
            'employee_id' => \App\Models\Employee::inRandomOrder()->first()->id,
            'username' => 'admin',
            'email' => 'admin@gmail.com',
            'role' => 'ADMIN',
            'email_verified_at' => now(),
            'password' => Hash::make('asdasdasd'),
            'remember_token' => Str::random(10),
        ]);
    }
}
