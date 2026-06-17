<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create an admin user if not exists (credentials provided by user)
        $adminEmail = 'romanamogus@gmail.com';

        $admin = User::where('email', $adminEmail)->first();

        if (! $admin) {
            User::factory()->create([
                'name' => 'Admin User',
                'email' => $adminEmail,
                'password' => bcrypt('12345678'), // per request; change after seeding
                'role' => 'admin',
                'email_verified_at' => now(),
                'remember_token' => Str::random(10),
            ]);
        }
    }
}
