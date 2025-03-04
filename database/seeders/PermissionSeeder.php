<?php

namespace Database\Seeders;

use App\Enums\RolePermission;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach (RolePermission::cases() as $permission) {
            Permission::create(['name' => $permission->value]);
        }
    }
}
