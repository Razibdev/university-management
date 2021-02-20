<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AdminsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("admins")->delete();
        $adminRecords = [
          [
              'id' => 1, 'name' => 'admin', 'type' => 'admin', 'mobile' => '01848178478', 'email' => 'razibhossen8566@gmail.com', 'password' => '$2y$10$8oU0jznkoIDiN0hBCNMOA.wd0ez6FzIIjhL27IFTV1Sdd4jiMlNJG', 'image' => '', 'status' => 1
          ],
            [
                'id' => 2, 'name' => 'teacher', 'type' => 'teacher', 'mobile' => '0195805817', 'email' => 'teacher@gmail.com', 'password' => '$2y$10$8oU0jznkoIDiN0hBCNMOA.wd0ez6FzIIjhL27IFTV1Sdd4jiMlNJG', 'image' => '', 'status' => 1
            ]
        ];
//        Admin::insert($adminRecords);
        foreach ($adminRecords as $key => $record){
            Admin::insert($record);
        }
    }
}
