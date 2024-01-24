<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

use App\Models\User;

use Illuminate\Support\Facades\DB; // Correct namespace
use Illuminate\Support\Facades\Log;


class UpdateUserNames implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        try {
            // way 1
            // DB::table('users')->update([
            //     'firstname' => DB::raw('lastname'),
            //     'lastname' => DB::raw('firstname'),
            // ]);

            // way 2 DB::statement('UPDATE users SET firstname = lastname, lastname = firstname');

            
            // way 3 
            // $users = User::all();
            $users = User::select('id', 'firstname', 'lastname')->get(); // to solve N + 1

            foreach ($users as $user) {
                $tempFirstName = $user->firstname;
                $tempLastName = $user->lastname;

                Log::info("Before Update - User ID: $user->id, FirstName: $tempFirstName, LastName: $tempLastName");

                // Your logic to update the values...
                $user->firstname = $tempLastName;
                $user->lastname = $tempFirstName;
                $user->save();

                Log::info("After Update - User ID: $user->id, FirstName: $user->firstname, LastName: $user->lastname");
            }

        } catch (\Exception $e) {
            // Handle exceptions 
            Log::error('UpdateUserNames job failed: ' . $e->getMessage());
        }


    }
}
