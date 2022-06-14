<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Haruncpi\LaravelIdGenerator\IdGenerator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;
class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('teachers')->insert([
            'id' => substr(Str::uuid()->toString(),0,8),
            'teacher_id' => IdGenerator::generate(['table' => 'teachers', 'length' => 15, 'prefix' => 'TCHR-'.date('y')]),
            'teacher_fname'         => 'John',
            'teacher_mname'     => 'CCC',
            'teacher_lname'      => 'Doe',
            'teacher_suffix'      => '',
            'teacher_contact'   => '09512466565',
            'date_registered' => Carbon::now()->format('Y-m-d'),
            'user_id' => '5fea2212',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }


}
