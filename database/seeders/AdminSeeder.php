<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create an admin user
        // User::create([
        //     'firstname' => 'admin',
        //     'lastname' => 'admin',
        //     'email' => 'admin@admin.com',
        //     'password' => Hash::make('admin123'), 
        //     'role_id' => 1
        // ]);

        User::create([
            'firstname' => 'Kriss',
            'lastname' => 'Goshevski',
            'email' => 'krissgoshevski@yahoo.com',
            'password' => Hash::make('admin12345'), 
            'role_id' => 1
        ]);

        // You can add more admin users if necessary
    }
}
