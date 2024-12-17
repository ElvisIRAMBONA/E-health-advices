<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class RoleSeeder extends Seeder
{
    public function run()
    {
        // Assign 'admin' role to a specific user by their email
        User::where('email', 'admin@example.com')->update(['role' => 'admin']);

        // Assign 'customer' role to all other users
        User::where('role', null)->update(['role' => 'customer']);
    }
}