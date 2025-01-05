<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear un usuario de ejemplo
        User::create([
            'name' => 'John Doe',
            'email' => 'john.doe@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'), // Puedes usar cualquier contraseña que desees
            'current_team_id' => null,
            'profile_photo_path' => null,
        ]);

        // Crear más usuarios de ejemplo si lo necesitas
        User::create([
            'name' => 'Jane doe',
            'email' => 'jane.doe@example.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password123'),
            'current_team_id' => null,
            'profile_photo_path' => "profile-photos/mQvI2GJ77yxXE98zVvHU1fCJVGyDdmQhoUoAYJ7O.jpg",
        ]);
    }
}
