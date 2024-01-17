<?php

namespace Database\Seeders;

use App\Enums\RoleEnum;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RoleSeeder extends Seeder
{
    /**
     * Create the initial roles and permissions.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions
        app()[PermissionRegistrar::class]->forgetCachedPermissions();

        // create roles and assign existing permissions
        $adminRole = Role::create(['name' => RoleEnum::ADMIN->value]);
        $agencyRole = Role::create(['name' => RoleEnum::AGENCY->value]);
        $userRole = Role::create(['name' => RoleEnum::USER->value]);
        // gets all permissions via Gate::before rule; see AuthServiceProvider

        // create demo users
        $user = \App\Models\User::factory()->create([
            'name' => 'Example Admin',
        ]);
        $user->assignRole($adminRole);

        $user = \App\Models\User::factory()->create([
            'name' => 'Example Agency',
        ]);
        $user->assignRole($agencyRole);

        $user = \App\Models\User::factory()->create([
            'name' => 'Example User',
        ]);
        $user->assignRole($userRole);
    }
}
