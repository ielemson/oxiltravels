<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Spatie\Permission\PermissionRegistrar;

class RolePermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         // Reset cached roles and permissions
         app()[PermissionRegistrar::class]->forgetCachedPermissions();

         // create permissions
         Permission::create(['name' => 'create users']);
         Permission::create(['name' => 'delete users']);
         Permission::create(['name' => 'edit users']);
         Permission::create(['name' => 'view users']);
 
         // create roles and assign existing permissions
         $role1 = Role::create(['name' => 'user']);
         $role1->givePermissionTo('view users');
        //  $role1->givePermissionTo('delete articles');
 
        //  $role2 = Role::create(['name' => 'admin']);
        //  $role2->givePermissionTo('create users');
        //  $role2->givePermissionTo('delete users');
 
         $role3 = Role::create(['name' => 'admin']);
         $role3->givePermissionTo(Permission::all());
         // gets all permissions via Gate::before rule; see AuthServiceProvider
 
         // create demo users
         $user = \App\Models\User::factory()->create([
             'name' => 'Example User',
             'email' => 'test@example.com',
         ]);
         $user->assignRole($role1);
 
        //  $user = \App\Models\User::factory()->create([
        //      'name' => 'Example Admin User',
        //      'email' => 'admin@example.com',
        //  ]);
        //  $user->assignRole($role2);
 
         $user = \App\Models\User::factory()->create([
             'name' => 'Example Super-Admin User',
             'email' => 'superadmin@example.com',
         ]);
         $user->assignRole($role3);
     }
    }

