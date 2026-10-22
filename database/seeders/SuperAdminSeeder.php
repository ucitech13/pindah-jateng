<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1. Pastikan role super-admin sudah ada
        $role = Role::firstOrCreate(['name' => 'super-admin', 'guard_name' => 'web']);

        // 2. Buat atau perbarui User Super Admin
        $admin = User::firstOrCreate(
            ['email' => 'admin@admin.com'],
            [
                'name'     => 'Super Admin System',
                'password' => Hash::make('password123'), // Ganti dengan password yang lebih aman jika perlu
            ]
        );

        // 3. Assign Role ke User
        if (! $admin->hasRole('super-admin')) {
            $admin->assignRole($role);
        }
    }
}
