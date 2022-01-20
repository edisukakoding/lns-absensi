<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\Position::factory(5)->has(\App\Models\Employee::factory(3)->has(\App\Models\User::factory()))->create();
        
        $this->call([
            AdminSeeder::class,
            CompanySeeder::class
        ]);
    }
}
