<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
         //
         DB::table('students')->insert([
            'id' => substr(Str::uuid()->toString(),0,8),
            'student_id' => IdGenerator::generate(['table' => 'students', 'length' => 15, 'prefix' => 'STDN-'.date('y')]),
            'student_fname'         => 'John',
            'student_mname'     => 'CCC',
            'student_lname'      => 'Doe',
            'student_suffix'      => '',
            'student_contact'   => '09512466565',
            'date_registered' => Carbon::now()->format('Y-m-d'),
            'user_id' => '4db6ccbc',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
