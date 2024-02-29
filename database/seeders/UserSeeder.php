<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'id' => 1,
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'email_verified_at' => Date('Y-m-d H:i:s'),
            'password' => Hash::make('123'),
        ]);

        if ($role = Role::where('name', 'Administrador')->first()) {
            $user->assignRole($role);
        } else {
            Log::error('The "Administrador" role does not exist.');
        }
    }
}
