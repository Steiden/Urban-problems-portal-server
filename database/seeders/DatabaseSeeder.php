<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Problem;
use App\Models\Role;
use App\Models\Status;
use App\Models\User;
use App\Models\UsersProblem;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Role::create([
        //     'name' => 'admin'
        // ]);
        // Role::create([
        //     'name' => 'user'
        // ]);
        // Role::create([
        //     'name' => 'guest'
        // ]);

        // User::create([
        //     'second_name' => 'Балдин',
        //     'first_name' => 'Даниил',
        //     'patronymic' => 'Александрович',
        //     'login' => 'admin',
        //     'email' => 'admin@localhost',
        //     'password' => Hash::make('admin'),
        //     'role_id' => 2
        // ]);

        // Status::create([
        //     'name' => 'Новый'
        // ]);
        // Status::create([
        //     'name' => 'Решен'
        // ]);
        // Status::create([
        //     'name' => 'Закрыт'
        // ]);

        // User::factory(25)->create();
        Problem::factory(50)->create();
    }
}