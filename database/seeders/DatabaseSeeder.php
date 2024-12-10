<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Status;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

//        User::factory()->create([
//            'name' => 'Test User',
//            'email' => 'test@example.com',
//        ]);
        Role::create([
            'name' => 'admin'
        ]);
        Role::create([
            'name' => 'seller'
        ]);
        Role::create([
            'name' => 'user'
        ]);
        Status::create([
            'name' => 'В обработке'
        ]);
        Status::create([
            'name' => 'Выполнен'
        ]);
        Status::create([
            'name' => 'Отменен'
        ]);
    }
}
