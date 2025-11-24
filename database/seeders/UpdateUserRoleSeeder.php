<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UpdateUserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Update user dengan email admin@example.com menjadi admin
        User::where('email', 'admin@example.com')->update(['role' => 'admin']);
        
        // Update user dengan email demo@example.com menjadi user
        User::where('email', 'demo@example.com')->update(['role' => 'user']);
    }
}
