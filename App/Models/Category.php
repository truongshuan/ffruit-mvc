<?php

use App\App\Models\BaseModel;



class Category extends BaseModel
{
    protected $table = "categories";


    function __construct()
    {
        parent::__construct();
    }

    public function getLists()
    {
        return $this->readData($this->table,  ['id', 'title', 'description', 'created_at'], []);
    }
    public function getById($id)
    {
        return $this->readData($this->table, ['id', 'title', 'description', 'created_at'], ['id' => $id]);
    }
    public function filterTitle($name)
    {
        return $this->readData($this->table,  ['title'], ['title' => $name]);
    }

    public function addCategory($title, $desc)
    {
        $data = [
            'title' => $title,
            'description' => $desc,
        ];
        return $this->createData($this->table, $data);
    }
    public function updateCategory($id, $title, $desc)
    {
        $data = [
            'title' => $title,
            'description' => $desc,
        ];

        $conditions = [
            'id' => $id,
        ];

        return $this->updateData($this->table, $data, $conditions);
    }

    public function deleteCategory($id)
    {
        $conditions = "id=$id";
        return $this->deleteData($this->table, $conditions);
    }
}
