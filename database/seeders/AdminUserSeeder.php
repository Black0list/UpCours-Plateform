<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Avoid duplicate admin creation
        if (!Admin::where('email', 'admin@admin.com')->exists()) {
            Admin::create([
                'firstname' => "ABDELKEBIR",
                'lastname' => "HADOUI",
                'phone' => "0608229760",
                'email' => "admin@admin.com",
                'photo' => 'icons/admin.png',
                'password' => HASH::make("admin_admin"),
                'isPending' => false,
                'role_id' => 1,
            ]);
        }
    }
}
