<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermisisonSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'dashboard',
            'staff-store',
            'staff-show',
            'staff-update',
            'staff-destroy',
        ];

        foreach ($permissions as $permission) {
            Permission::create(['guard_name' => 'web', 'name' => $permission]);
        }
    }
}
