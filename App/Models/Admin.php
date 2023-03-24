<?php



namespace App\App\Models;

use App\App\Models\BaseModel;


class Admin extends BaseModel
{

    protected $table = "admin";

    function __construct()
    {
        parent::__construct();
    }

    function checkLogin($table, $email)
    {
        $sql = "SELECT * FROM $table WHERE email=?";
        return $this->affRows($sql, $email);
    }
    function getLogin($table, $email)
    {
        $sql = "SELECT * FROM $table WHERE email=?";
        return $this->getAuth($sql, $email);
    }
    // public function addAuth($username, $fullname, $email, $password, $code, $status)
    // {
    //     $data = [
    //         'username' => $username,
    //         'fullname' => $fullname,
    //         'email' => $email,
    //         'password' => $password,
    //         'code' => $code,
    //         'status' => 1
    //     ];

    //     return $this->createData($this->table, $data);
    // }
}
