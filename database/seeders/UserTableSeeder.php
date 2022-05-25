<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Hash;

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
            'firstname'     => 'admin',
            'middlename'    => 'admin',
            'lastname'      => 'admin',
            'email'         => 'admin@gmail.com',
            'usertype_id'     => 1,
            'contact_no'      => '090909090909',
            'address'       => 'Butuan City',
            'password'      => Hash::make('123'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'firstname'     => 'student',
            'middlename'    => 'student',
            'lastname'      => 'student',
            'email'         => 'student@gmail.com',
            'usertype_id'     => 2,
            'contact_no'      => '090909090909',
            'address'       => 'Butuan City',
            'password'      => Hash::make('123'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'firstname'     => 'teacher',
            'middlename'    => 'teacher',
            'lastname'      => 'teacher',
            'email'         => 'teacher@gmail.com',
            'usertype_id'     => 3,
            'contact_no'      => '090909090909',
            'address'       => 'Butuan City',
            'password'      => Hash::make('123'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
