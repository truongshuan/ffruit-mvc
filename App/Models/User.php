<?php


namespace App\App\Models;


use App\App\Models\BaseModel;
use PDO;
use PDOException;

class User extends BaseModel
{
    private $table = "users";

    function __construct()
    {
        parent::__construct();
    }


    public function checkUserExists($table, $email)
    {
        $sql = "SELECT * FROM $table WHERE email=?";
        return $this->affRows($sql, $email);
    }
    public function verification($otp)
    {
        return  $this->readData($this->table, ['id', 'username', 'email', 'fullname', 'password', 'code', 'status'], ['code' => $otp]);
    }

    public function checkLogin($email)
    {
        return  $this->readData($this->table, ['id', 'username', 'email', 'fullname', 'password', 'code', 'status'], ['email' => $email]);
    }
    public function addUser($username, $email, $fullname, $password, $code, $status)
    {
        $data  = [
            'username' => $username,
            'email' => $email,
            'fullname' => $fullname,
            'password' => $password,
            'code' => $code,
            'status' => $status,
        ];

        return $this->createData($this->table, $data);
    }
    public function updateUser($code, $status, $email)
    {
        $data  = [
            'code' => $code,
            'status' => $status,
        ];
        $conditions = [
            'email' => $email
        ];
        return $this->updateData($this->table, $data, $conditions);
    }
    public function insertOTP($code, $email)
    {
        $data  = [
            'code' => $code,
        ];
        $conditions = [
            'email' => $email
        ];
        return $this->updateData($this->table, $data, $conditions);
    }
    public function insertNewPass($password, $email)
    {
        $data  = [
            'password' => $password,
        ];
        $conditions = [
            'email' => $email
        ];
        return $this->updateData($this->table, $data, $conditions);
    }
}
