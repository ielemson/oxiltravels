<?php

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CreateUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //create dummy user
        $user = User::create([
        	'name' => 'John Doe', 
        	'email' => 'john@gmail.com',
        	'phone' => '08067405876',
        	'password' => bcrypt('user')
        ]);
  
        // Reset cached roles and permissions
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create roles and assign created permissions
       // by chaining
       $role = Role::create(['name' => 'user'])->syncPermissions(['edit profile']);
       $user->assignRole([$role->id]);
    }
}