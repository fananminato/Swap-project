<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // Role::create(['name' => 'admin']);
        // Role::create(['name' => 'researcher']);
        // Role::create(['name' => 'assistant']);


        $admin = new User();
        $admin->name = 'Researcher Assistant';
        $admin->email = 'assistant@gmail.com';
        $admin->password = Hash::make('password');
        $admin->save();

        $admin->assignRole('assistant');
    }
}
