<?php

namespace Database\Seeders;

use App\Models\Department;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("departments")->delete();
        $departmentRecords = [
            [
                'id' => 1, 'name' => 'CSE'
            ],
            [
                'id' => 2, 'name' => 'ENGLISH'
            ],
            [
                'id' => 3,  'name' => 'PHARMACY'
            ]
        ];
//        Admin::insert($adminRecords);
        foreach ($departmentRecords as $key => $record){
            Department::insert($record);
        }
    }
}
