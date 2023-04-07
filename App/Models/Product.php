<?php



namespace App\App\Models;

use App\App\Models\BaseModel;

class Product extends BaseModel
{
    private $table_product = "products";
    private $table_category = 'categories';

    function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        return $this->readData($this->table_product, ['id', 'name', 'price', 'description', 'path_image', 'created_at', 'updated_at', 'id_category'], []);
    }

    public function getById($id)
    {
        return $this->selectOne($this->table_product, ['id', 'name', 'price', 'description', 'path_image', 'created_at', 'updated_at', 'id_category'], ['id' => $id]);
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
        return $this->createData($this->table_product, $data);
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

        return $this->updateData($this->table_product, $data, $conditions);
    }

    public function deleteProduct($id)
    {
        $conditions = "id=$id";
        return $this->deleteData($this->table_product, $conditions);
    }

    public function getProducts(): bool|array
    {
        $fields = [
            'products.id',
            'products.name',
            'products.price',
            'products.description',
            'products.path_image',
            'products.created_at',
            'products.id_category'
        ];
        $fieldsRelation = [
            'categories.id as id_cate',
            'categories.title as title',
            'categories.description as desc_cate',
        ];
        $conditions = [];
        $conditionsRelation = [];
        return $this->selectWithRelation($this->table_product, $fields, $conditions, $this->table_category, $fieldsRelation, $conditionsRelation, 'products.id_category', 'id', 0, 'ORDER BY products.id ASC');
    }

    public function getDetail($id): bool|array
    {
        $fields = [
            'products.id',
            'products.name',
            'products.price',
            'products.description',
            'products.path_image',
            'products.created_at',
            'products.id_category'
        ];
        $fieldsRelation = [
            'categories.id as id_cate',
            'categories.title as title',
            'categories.description as desc_cate',
        ];
        $conditions = [];
        $conditionsRelation = [];
        return $this->selectWithRelation($this->table_product, $fields, $conditions, $this->table_category, $fieldsRelation, $conditionsRelation, 'products.id_category', 'id', 1, "WHERE products.id=$id");
    }

    public function  getSameProduct($id, $id_product): bool|array
    {
        $fields = [
            'products.id as related_id',
            'products.name',
            'products.price',
            'products.description',
            'products.path_image',
            'products.created_at',
            'products.id_category'
        ];
        $fieldsRelation = [
            'categories.id as id_cate',
            'categories.title as title',
            'categories.description as desc_cate',
        ];
        $conditions = [];
        $conditionsRelation = [];
        return $this->selectWithRelation($this->table_product, $fields, $conditions, $this->table_category, $fieldsRelation, $conditionsRelation, 'products.id_category', 'id', 1000, "AND categories.id=$id AND products.id NOT IN ($id_product)");
    }
}
