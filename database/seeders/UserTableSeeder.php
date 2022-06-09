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
            'id' => substr(Str::uuid()->toString(),0,12),
            'username' => 'admin',
            'email'         => 'admin@gmail.com',
            'usertype_id'     => 1,
            'password'      => Hash::make('123'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'id' => substr(Str::uuid()->toString(),0,12),
            'username' => 'student',
            'email'         => 'student@gmail.com',
            'usertype_id'     => 2,
            'password'      => Hash::make('123'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('users')->insert([
            'id' => substr(Str::uuid()->toString(),0,12),
            'username' => 'teacher',
            'email'         => 'teacher@gmail.com',
            'usertype_id'     => 3,
            'password'      => Hash::make('123'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
