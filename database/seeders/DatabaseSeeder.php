<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
        DB::table('role')->insert([
            'nama_role' => 'pengunjung',
            'status' => 'active',
        ]);
        DB::table('role')->insert([
            'nama_role' => 'admin',
            'status' => 'active',
        ]);DB::table('role')->insert([
            'nama_role' => 'super_admin',
            'status' => 'active',
        ]);
    }
}
