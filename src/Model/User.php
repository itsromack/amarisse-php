<?php

namespace Raw\Model;

use Raw\Model\BaseModel;
use \PASSWORD_DEFAULT;

class User extends BaseModel
{
    protected $id;
    protected $username;
    protected $password;
    protected $created_at;

    public function __construct($username, $password)
    {
        $this->username = $username;
        $this->password = $this->hashPassword($password);
        parent::__construct();
    }

    public function getUsername()
    {
        return $this->username;
    }

    public function getPassword()
    {
        return $this->password;
    }

    public function create()
    {
        $statement = $this->db->prepare('INSERT INTO users SET username=:username, password=:password');
        try {
            $result = $statement->execute([
                ':username' => $this->getUsername(),
                ':password' => $this->getPassword()
            ]);

            return $result;
        } catch (\PDOException $e) {
            return $e->getMessage();
        }

        
    }

    private function hashPassword($password)
    {
        $hash = password_hash($password, PASSWORD_DEFAULT);
        return $hash;
    }
}