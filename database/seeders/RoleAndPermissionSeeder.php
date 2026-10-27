<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RoleAndPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions (Sangat krusial agar tidak bentrok cache)
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // Daftar role sesuai kebutuhan
        $roles = [
            'super-admin',
            'brida-provinsi', // admin pindah jateng
            'brida-kabkota',
            'opd-provinsi',
            'opd-kabkota',
            'umum',
            'pelajar',
            'juri',
        ];

        foreach ($roles as $role) {
            Role::firstOrCreate(['name' => $role, 'guard_name' => 'web']);
        }
    }
}
