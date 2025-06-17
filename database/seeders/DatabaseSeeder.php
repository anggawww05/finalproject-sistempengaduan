<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
use App\Models\Category;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Role::create([
            'role_name' => 'User',
        ]);

        Role::create([
            'role_name' => 'Operator_Akademik',
        ]);

        Role::create([
            'role_name' => 'Operator_Kemahasiswaan',
        ]);

        Role::create([
            'role_name' => 'Operator_Fasilitas',
        ]);

        Role::create([
            'role_name' => 'Operator_Pelecehan',
        ]);

        Role::create([
            'role_name' => 'Admin',
        ]);

        // Category::create([
        //     'category_name' => 'Pilih kategori pengaduan',
        // ]);

        Category::create([
            'category_name' => 'Akademik',
        ]);

        Category::create([
            'category_name' => 'Kemahasiswaan',
        ]);

        Category::create([
            'category_name' => 'Fasilitas',
        ]);

        Category::create([
            'category_name' => 'Pelecehan',
        ]);

    }
}
