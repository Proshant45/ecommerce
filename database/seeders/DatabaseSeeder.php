<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $adminRole = Role::create(['name' => 'admin']);
        $userRole = Role::create(['name' => 'user']);


        $adminUser= User::factory()->create(
                [
                'name' => 'Admin',
                'email' => 'admin@test'
                ]
        );
        $adminUser->roles()->attach($adminRole);

        $user = User::factory()->create(
                [
                'name' => 'User',
                'email' => 'user@test'
                ]
        );
        $user->roles()->attach($userRole);

        $categories = Category::factory(3)->create();
        Product::factory(100)->hasAttached($categories)->create();

    }
}
