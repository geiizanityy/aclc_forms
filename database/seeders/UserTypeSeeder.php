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
            'id' => substr(Str::uuid()->toString(),0,8),
            'user_type' => 'admin',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('user_type')->insert([
            'id' => substr(Str::uuid()->toString(),0,8),
            'user_type' => 'teacher',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
        DB::table('user_type')->insert([
            'id' => substr(Str::uuid()->toString(),0,8),
            'user_type' => 'student',
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
