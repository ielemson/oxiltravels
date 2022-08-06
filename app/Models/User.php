<?php

namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'users';
    protected $primaryKey       = 'id';
    protected $useAutoIncrement = true;
    protected $insertID         = 0;
    protected $returnType       = 'array';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['name','email','password','role'];

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
     	// we need different rules for registration, account update, etc
	protected $dynamicRules = [
		'registration' => [
			'name' 		=> 'required|alpha_space|min_length[2]',
			'email' 			=> 'required|valid_email|is_unique[users.email,id,{id}]',
			'password'			=> 'required|min_length[5]',
			'password_confirm'	=> 'matches[password]'
		],
	
	];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = ["hashPassword"];
    protected $afterInsert    = ["hashPassword"];
    protected $beforeUpdate   = ['hashPassword'];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];


    public function registerRule(string $rule)
	{
		return $this->dynamicRules[$rule];
	}

    protected function hashPassword(array $data)
	{
		if (! isset($data['data']['password'])) return $data;

		$data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
		// unset($data['data']['password']);
		unset($data['data']['password_confirm']);

		return $data;
	}
}
