<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::create([
            'employee_id' => fake()->randomNumber($nbDigits = NULL, $strict = false),
            'email' => 'superadmin@rotas.com',
            'username' => 'superadmin',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'role' => 'admin',
            'remember_token' => Str::random(10),
        ]);

        Admin::create([
            'user_id' => $admin->id,
        ]);
    }
}
