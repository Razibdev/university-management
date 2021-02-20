<?php

namespace Database\Seeders;

use App\Models\Semester;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SemesterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("semesters")->delete();
        $semesterRecords = [
            [
                'id' => 1, 'department_id' => '1', 'batch_id' => '1', 'name' => '1st'
            ],
            [
                'id' => 2, 'department_id' => '1', 'batch_id' => '1', 'name' => '2nd'
            ],
            [
                'id' => 3, 'department_id' => '1', 'batch_id' => '1', 'name' => '3rd'
            ]
            , [
                'id' => 4, 'department_id' => '1', 'batch_id' => '1', 'name' => '4th'
            ],
            [
                'id' => 5, 'department_id' => '1', 'batch_id' => '1', 'name' => '5th'
            ],
            [
                'id' => 6, 'department_id' => '1', 'batch_id' => '1', 'name' => '6th'
            ],
            [
                'id' => 7, 'department_id' => '1', 'batch_id' => '1', 'name' => '7th'
            ],
            [
                'id' => 8, 'department_id' => '1', 'batch_id' => '1', 'name' => '8th'
            ]
        ];
//        Admin::insert($adminRecords);
        foreach ($semesterRecords as $key => $record){
            Semester::insert($record);
        }
    }
}
