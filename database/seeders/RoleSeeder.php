<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create roles
        $superAdminRole = Role::firstOrCreate(['name' => 'Super Admin']);
        $adminRole = Role::firstOrCreate(['name' => 'Admin']);
        $editorRole = Role::firstOrCreate(['name' => 'Editor']);

        // Since it's just Roles for now and no specific granular permissions have been defined
        // in the prompt (only that Super Admin gets everything), we can just assign the Super Admin
        // role to the first user created, or to Sayani Das.

        // If Sayani Das exists, make them super admin
        $user = User::where('email', 'dassayani1756@gmail.com')->first();
        if ($user && !$user->hasRole('Super Admin')) {
            $user->assignRole($superAdminRole);
        }
    }
}
