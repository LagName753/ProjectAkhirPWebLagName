<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $role = Role::firstOrCreate(
            ['name' => 'Super Admin'],
            ['name' => 'Super Admin']
        );
        User::updateOrCreate(
            ['email' => 'faiez@gmail.com'],
            [
                'name' => 'Super Admin',
                'password' => Hash::make('Faiez123'),
                'role_id' => $role->id,
                'email_verified_at' => now(),
            ]
        );
    }
}