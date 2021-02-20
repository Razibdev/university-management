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
        // User::factory(10)->create();
        $this->call(AdminsTableSeeder::class);
        $this->call(SemesterTableSeeder::class);
        $this->call(DepartmentTableSeeder::class);
        $this->call(BatchTableSeeder::class);

    }
}
