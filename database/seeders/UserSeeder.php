<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //region Roles

        $permissions = Permission::all();
        $adminRole = Role::create(['name' => 'Administrator']);
        $adminRole->syncPermissions($permissions); // This line can be adjusted based on your needs

        $superAdmin = Role::create(['name' => 'Super-Admin']);
        $superAdmin->syncPermissions($permissions); // This line can be adjusted based on your needs

        $hrRole = Role::create(['name' => 'HR']);
        $hrRole->syncPermissions(['add archive', 'edit archive', 'delete archive', 'show archives']);

        // Special permission
        // Permission::create(['name' => 'hisSectionOnly']); // This line has been removed

        //endregion

        //region Users

        $admin = User::create([
            'name' => 'admin',
            'user_name' => 'admin',
            'password' => Hash::make('password'),
            'email' => 'admin@admin.com',
        ]);

        $admin->sections()->attach(
            2,
            ['is_main' => true]
        );

        $admin->assignRole($adminRole);

        $user = User::create([
            'name' => 'Department',
            'user_name' => 'Department',
            'password' => Hash::make('password'),
            'email' => 'department@admin.com',
            'active' => 0,
        ]);
        $user->sections()->attach(
            1,
            ['is_main' => true]
        );

        // $user1 = User::create([
        //     "name" => "user1",
        //     "password" => Hash::make("user1"),
        //     "email" => "user1@admin.com",
        // ]);
        // $user1->sections()->attach(
        //     4,
        //     ["is_main" => false]
        // );

        // $hr1 = User::create([
        //     "name" => "hr1",
        //     "password" => Hash::make("hr1"),
        //     "email" => "hr1@ihec.com",
        // ]);
        // $hr1->sections()->attach(
        //     3,
        //     ["is_main" => false]
        // );

        // $hr1->assignRole($hrRole);

        //region Users

        //endregion
        // DB::statement('TRUNCATE TABLE users;');
        // DB::statement('TRUNCATE TABLE employees;');
    }
}
