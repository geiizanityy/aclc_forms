<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Traits\Uuid as UUID;
use Illuminate\Support\Str;

class UserTypeSeeder extends Seeder
{
    use Uuid;
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        DB::table('user_type')->insert([
            'usertype_id' => substr(Str::uuid()->toString(),0,8),
            'user_type' => 'super_admin',
            'access_level' => 0,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('user_type')->insert([
            'usertype_id' => substr(Str::uuid()->toString(),0,8),
            'user_type' => 'admin',
            'access_level' => 1,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('user_type')->insert([
            'usertype_id' => substr(Str::uuid()->toString(),0,8),
            'user_type' => 'teacher',
            'access_level' => 2,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('user_type')->insert([
            'usertype_id' => substr(Str::uuid()->toString(),0,8),
            'user_type' => 'student',
            'access_level' => 3,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
