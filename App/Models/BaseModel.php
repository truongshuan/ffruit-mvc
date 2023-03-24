<?php

namespace App\App\Models;


use PDO;
use PDOException;
use App\App\Interfaces\Database;



class BaseModel
{
    private $_server = HOST;
    private $_dbname = DB_NAME;
    private $_user = DB_USER;
    private $_pass = DB_PASS;
    private $_connection;

    public $pdo;


    function __construct()
    {
        $this->connect();
    }
    public function connect()
    {
        $dbc = "mysql:host=$this->_server;dbname=$this->_dbname;charset=utf8mb4";
        $options   = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // báo lỗi khi có lỗi xảy ra
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // trả về dữ liệu dạng mảng kết hợp
        ];
        $this->pdo  = new PDO($dbc, $this->_user, $this->_pass, $options);

        return $this->pdo;
    }
    protected function disconnect()
    {
        $this->_connection = null;
    }
    protected function select($table, $fields, $conditions)
    {
        $pdo = $this->connect();

        $sql    = "SELECT " . implode(", ", $fields) . " FROM " . $table;
        $where  = [];
        $params = [];
        foreach ($conditions as $key => $value) {
            $where[]  = $key . " = ?";
            $params[] = $value;
        }
        if (!empty($where)) {
            $sql .= " WHERE " . implode(" AND ", $where);
        }

        $stmt = $pdo->prepare($sql);
        $stmt->execute($params);

        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $this->disconnect();

        return $result;
    }

    protected function insert($table, $data)
    {
        if (!empty($data) && is_array($data)) {
            // $columns = '';
            // $values  = '';
            // $i = 0;
            // if (!array_key_exists('created', $data)) {
            //     $data['created'] = date("Y-m-d H:i:s");
            // }
            // if (!array_key_exists('modified', $data)) {
            //     $data['modified'] = date("Y-m-d H:i:s");
            // }
            $columnString = implode(',', array_keys($data));
            $valueString = ":" . implode(',:', array_keys($data));
            $sql = "INSERT INTO " . $table . " (" . $columnString . ") VALUES (" . $valueString . ")";
            $query = $this->pdo->prepare($sql);
            foreach ($data as $key => $val) {
                $query->bindValue(':' . $key, $val);
            }
            // $insert = 
            return $query->execute();
        }
    }


    protected function update($table, $data, $conditions)
    {
        // tạo câu truy vấn
        $sql = "UPDATE $table SET ";
        foreach ($data as $key => $value) {
            $sql .= "$key = :$key, ";
        }
        $sql = rtrim($sql, ", ");
        $sql .= " WHERE ";
        foreach ($conditions as $key => $value) {
            $sql .= "$key = :$key AND ";
        }
        $sql = rtrim($sql, "AND ");

        // chuẩn bị câu truy vấn
        $stmt = $this->pdo->prepare($sql);

        // bind các giá trị
        foreach ($data as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }
        foreach ($conditions as $key => $value) {
            $stmt->bindValue(":$key", $value);
        }

        // thực hiện câu truy vấn
        return $stmt->execute();
    }

    protected function delete($table, $conditions)
    {
        // Kết nối đến database
        $this->connect();

        // Xây dựng câu truy vấn
        $sql = "DELETE FROM $table WHERE $conditions LIMIT 1";

        try {
            // Thực thi truy vấn và lấy số bản ghi bị ảnh hưởng
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute();
            $affected_rows = $stmt->rowCount();

            // Ngắt kết nối database và trả về số bản ghi bị ảnh hưởng
            $this->disconnect();
            return $affected_rows;
        } catch (PDOException $e) {
            echo "Lỗi xóa dữ liệu: " . $e->getMessage();
        }
    }
    public function affRows($sql, $email)
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($email));
        return $stmt->rowCount();
    }

    public function getAuth($sql, $email)
    {
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(array($email));
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function createData($table, $data)
    {
        return $this->insert($table, $data);
    }

    public function readData($table, $fields, $conditions)
    {
        return $this->select($table, $fields, $conditions);
    }

    public function updateData($table, $data, $conditions)
    {
        $this->update($table, $data, $conditions);
    }

    public function deleteData($table, $conditions)
    {
        $this->delete($table, $conditions);
    }
}
