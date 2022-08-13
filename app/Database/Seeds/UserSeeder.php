<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use App\Models\User;
class UserSeeder extends Seeder
{
    public function run()
    {
        $user_object = new User();

		$user_object->insertBatch([
			[
				"name" => "Elemson Ifeanyi",
				"email" => "ielemson@gmail.com",
				"role" => "admin",
				"password" => password_hash("Abc12345", PASSWORD_DEFAULT)
			],
			[
				"name" => "Damola Abiola",
				"email" => "admin@oxlyglobal.com",
				"role" => "admin",
				"password" => password_hash("Damo1234", PASSWORD_DEFAULT)
			],
			[
				"name" => "George Ford",
				"email" => "editor@gmail.com",
				// "phone_no" => "8888888888",
				"role" => "editor",
				"password" => password_hash("12345678", PASSWORD_DEFAULT)
			]
		]);
    }
}
