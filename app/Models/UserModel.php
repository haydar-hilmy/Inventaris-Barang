<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'user';
    protected $useTimestamps = true;
    protected $allowedFields = ['username', 'password', 'email', 'photo', 'roll'];

    public function getUser($id = false){
        if(!$id){
            return $this->findAll();
        }
        return $this->where('id', $id)->first();
    }

    public function auth($username = false, $password = false){
        if(!$username || $password){
            return false;
        }
    }


}