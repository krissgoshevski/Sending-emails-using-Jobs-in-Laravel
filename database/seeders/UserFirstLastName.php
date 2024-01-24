<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserFirstLastName extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Овозможете seed-и без Model Events за подобро перформанси
         $this->disableModelEvents();

         // Се создаваат три корисници
         User::create([
             'firstname' => 'Goshevski',
             'lastname' => 'Kristijan',
             'email' => 'user1@example.com',
             'password' => Hash::make('password1'),
             'role_id' => 2
         ]);
 
         User::create([
             'firstname' => 'Goshevska',
             'lastname' => 'Stefanija',
             'email' => 'user2@example.com',
             'password' => Hash::make('password2'),
             'role_id' => 2
         ]);
 
         User::create([
             'firstname' => 'Goshevski',
             'lastname' => 'Trajce',
             'email' => 'user3@example.com',
             'password' => Hash::make('password3'),
             'role_id' => 2
         ]);

         User::create([
            'firstname' => 'Goshevska',
            'lastname' => 'Jasminka',
            'email' => 'user4@example.com',
            'password' => Hash::make('password4'),
            'role_id' => 2
        ]);
 
         // После семенската активност
        User::reguard(); // Овозможување на Eloquent events
        
    }

    /**
     * Disable Eloquent events during seeding.
     */
    protected function disableModelEvents(): void
    {
        User::flushEventListeners();
    }

   
}
