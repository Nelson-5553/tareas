<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = \App\Models\User::first();

        if ($user) {
            $categories = [
                ['name' => 'Hogar', 'color' => '#CC0000'],
                ['name' => 'Trabajo', 'color' => '#00CC00'],
                ['name' => 'Personal', 'color' => '#0000CC'],
            ];

            foreach ($categories as $category) {
                Category::create(array_merge($category, ['user_id' => $user->id]));
            }
        } else {
            \Log::warning('No users found. Please seed users before seeding categories.');
        }
    }

}
