<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RolePermissionSeeder extends Seeder
{
    public function run(): void
    {
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Create permissions
        $permissions = [
            'view dashboard',
            'manage services',
            'create services',
            'edit services',
            'delete services',
            'manage industries',
            'manage technologies',
            'manage team',
            'manage case studies',
            'manage testimonials',
            'manage FAQs',
            'manage articles',
            'publish articles',
            'manage categories',
            'manage tags',
            'manage jobs',
            'manage applications',
            'download resumes',
            'manage inquiries',
            'manage newsletter',
            'manage settings',
            'manage users',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Create roles and assign created permissions
        $editor = Role::firstOrCreate(['name' => 'Editor']);
        $editor->givePermissionTo([
            'view dashboard',
            'manage articles',
            'manage categories',
            'manage tags'
        ]);

        $admin = Role::firstOrCreate(['name' => 'Admin']);
        $admin->givePermissionTo(Permission::all()->filter(function($p) {
            return !in_array($p->name, ['manage users', 'manage settings']);
        }));

        $superAdmin = Role::firstOrCreate(['name' => 'Super Admin']);
        // Super Admin gets all permissions via Gate::before in AuthServiceProvider, but we can assign all here too
        $superAdmin->givePermissionTo(Permission::all());

        // Create default Super Admin user
        $user = User::firstOrCreate([
            'email' => 'admin@talishasoftware.tech',
        ], [
            'name' => 'Super Admin',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
        ]);
        $user->assignRole($superAdmin);
    }
}
