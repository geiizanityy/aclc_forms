<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
            'user_id' => substr(Str::uuid()->toString(),0,8),
            'username' => 'super_admin',
            'email'         => 'super_admin@gmail.com',
            'usertype_id'     => 1,
            'password'      => Hash::make('123'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('admin')->insert([
            'uuid'              => substr(Str::uuid()->toString(),0,8),
            'fname'             => 'Super Administrator',
            'name'              => 'John',
            'lname'             => 'Doe',
            'contact'           => '09090909000',
            'is_active'         => 1,
            'access_level'      => 0,
            'user_id'           =>  1,
            'date_registered'    =>  Carbon::now()->format('Y-m-d'),
            'created_at'        => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'        => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('users')->insert([
            'user_id' => substr(Str::uuid()->toString(),0,8),
            'username' => 'admin',
            'email'         => 'admin@gmail.com',
            'usertype_id'     => 2,
            'password'      => Hash::make('123'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('admin')->insert([
            'uuid'              => substr(Str::uuid()->toString(),0,8),
            'fname'             => 'Administrator',
            'name'              => 'John',
            'lname'             => 'Doe',
            'contact'           => '09090909000',
            'is_active'         => 1,
            'access_level'      => 0,
            'user_id'           =>  2,
            'date_registered'    =>  Carbon::now()->format('Y-m-d'),
            'created_at'        => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'        => Carbon::now()->format('Y-m-d H:i:s')
        ]);




        DB::table('users')->insert([
            'user_id' => substr(Str::uuid()->toString(),0,8),
            'username' => 'student',
            'email'         => 'student2@gmail.com',
            'usertype_id'     => 3,
            'password'      => Hash::make('123'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('students')->insert([
            'student_id'              => substr(Str::uuid()->toString(),0,8),
            'student_no'             => 100000000,
            'student_fname'              => 'Genesis John',
            'student_mname'             => 'Alonto',
            'student_lname'           => 'Abobo',
            'student_suffix'           => '',
            'student_contact'           => '09309378835',
            'is_active'         => 1,
            'user_id'           =>  3,
            'date_registered'    =>  Carbon::now()->format('Y-m-d'),
            'created_at'        => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'        => Carbon::now()->format('Y-m-d H:i:s')
        ]);




        DB::table('users')->insert([
            'user_id' => substr(Str::uuid()->toString(),0,8),
            'username' => 'teacher',
            'email'         => 'teacher21@gmail.com',
            'usertype_id'     => 2,
            'password'      => Hash::make('123'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        DB::table('teachers')->insert([
            'teacher_id'              => substr(Str::uuid()->toString(),0,8),
            'teacher_no'             => 200000000,
            'teacher_fname'              => 'Maria',
            'teacher_mname'             => 'Green',
            'teacher_lname'           => 'Delas Alas',
            'teacher_suffix'           => '',
            'teacher_contact'           => '09443566777',
            'position'              => 'Teacher',
            'access_level'          => 1,
            'is_active'         => 1,
            'user_id'           =>  4,
            'date_registered'    =>  Carbon::now()->format('Y-m-d'),
            'created_at'        => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'        => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
