<?php



namespace App\App\Models;

use App\App\Models\BaseModel;

class Product extends BaseModel
{
    private $table = "products";

    function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        return $this->readData($this->table, ['id', 'name', 'price', 'description', 'path_image', 'created_at', 'updated_at', 'id_category'], []);
    }

    public function getById($id)
    {
        return $this->selectOne($this->table, ['id', 'name', 'price', 'description', 'path_image', 'created_at', 'updated_at', 'id_category'], ['id' => $id]);
    }

    public function addProduct($name, $price, $desc, $path_image, $id_category)
    {
        $data = [
            'name' => $name,
            'price' => $price,
            'description' => $desc,
            'path_image' => $path_image,
            'id_category' => $id_category,
        ];
        return $this->createData($this->table, $data);
    }

    public function updateProduct($id, $name, $price, $desc, $path_image, $id_category)
    {
        $data = [
            'name' => $name,
            'price' => $price,
            'description' => $desc,
            'path_image' => $path_image,
            'id_category' => $id_category,
        ];

        $conditions = [
            'id' => $id,
        ];

        return $this->updateData($this->table, $data, $conditions);
    }

    public function deleteProduct($id)
    {
        $conditions = "id=$id";
        return $this->deleteData($this->table, $conditions);
    }
}
