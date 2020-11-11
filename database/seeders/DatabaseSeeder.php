<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
//        DB::table('role')->insert([
//            'nama_role' => 'pengunjung',
//            'status' => 'active',
//        ]);
//        DB::table('role')->insert([
//            'nama_role' => 'admin',
//            'status' => 'active',
//        ]);
//        DB::table('role')->insert([
//            'nama_role' => 'super_admin',
//            'status' => 'active',
//        ]);
        DB::table('user')->insert([
            'nama_lengkap' => 'Admin',
            'username' => 'admin123',
            'email' => 'sandysihotang868@gmail.com',
            'password' => Hash::make('admin123'),
            'role_id' => 2
        ]);
    }
}
