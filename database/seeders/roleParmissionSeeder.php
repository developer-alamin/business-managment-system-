<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class roleParmissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = Role::create(['name' => 'admin']);
        $parmissions = [
            ['name' => 'users list'],
            ['name' => 'users create'],
            ['name' => 'users edit'],
            ['name' => 'users delete'],
            ['name' => 'role list'],
            ['name' => 'role create'],
            ['name' => 'role edit'],
            ['name' => 'role delete'],
            ['name' => 'permission create']
        ];

        foreach($parmissions as $item){
            Permission::create($item);
        }

        $role->syncPermissions(Permission::all());
        $user = User::first();
        $user->assignRole($role);
    }

}
