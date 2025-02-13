<?php

namespace Database\Seeders;

use App\Enum\RolesAndPermissions;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = RolesAndPermissions::roles();
        $this->processData($data);
    }

    /**
     * Process the seeder data
     *
     * @param array $data
     * @return void
     */
    protected function processData(array $data): void
    {
        foreach ($data as $roleName => $permissions) {
            // Create Permissions
            foreach ($permissions as $permission) {
                Permission::query()->firstOrCreate(['name' => $permission]);
            }

            // Create role
            $role = Role::query()->firstOrCreate(['name' => $roleName]);

            // Assign permissions to role
            $role->syncPermissions($permissions);
        }
    }
}
