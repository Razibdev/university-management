<?php

namespace Database\Seeders;

use App\Models\Batch;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BatchTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("batches")->delete();
        $batchRecords = [
            [
                'id' => 1, 'department_id' => 1, 'name' => '23rd'
            ],
            [
                'id' => 2, 'department_id' => 1, 'name' => '24th'
            ],
            [
                'id' => 3, 'department_id' => 1, 'name' => '25th'
            ],

        ];
//        Admin::insert($adminRecords);
        foreach ($batchRecords as $key => $record){
            Batch::insert($record);
        }
    }
}
