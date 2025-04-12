<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Brendon Panlaqui',
            'email' => 'bpanlaqui23-0120@cca.edu.ph',
            'password' => Hash::make('password'),
            'role' => 'admin',
        ]);
    }
}
