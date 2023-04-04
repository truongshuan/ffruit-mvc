<?php


namespace App\App\Models;


use App\App\Models\BaseModel;


class Topic extends BaseModel
{
    private $table = "topics";
    public function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        $fields = [
            'id',
            'name',
            'body',
            'created_at',
        ];
        return $this->readData($this->table, $fields, $conditions = []);
    }

    public function getById($id)
    {
        $fields = [
            'id',
            'name',
            'body',
            'created_at',
        ];
        $conditions = [
            'id' => $id
        ];
        return $this->selectOne($this->table, $fields, $conditions);
    }

    public function addTopic($name, $body)
    {
        $data = [
            'name' => $name,
            'body' => $body
        ];
        return $this->createData($this->table, $data);
    }

    public function editTopic($id, $name, $body)
    {
        $data = [
            'name' => $name,
            'body' => $body
        ];
        $conditions = [
            'id' => $id
        ];
        return $this->updateData($this->table, $data, $conditions);
    }

    public function deleteTopic($id)
    {
        $conditions = "id=$id";
        return $this->deleteData($this->table, $conditions);
    }
}
