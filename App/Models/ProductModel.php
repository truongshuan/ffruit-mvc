<?php

use App\App\Models\BaseModel;


class ProductModel extends BaseModel
{
    function __construct()
    {
        parent::__construct();
    }
    private $table = "products";

    public function getLists()
    {
        return $this->readData($this->table, ['id', 'name', 'price', 'description', 'image', 'created_at', 'updated_at', 'id_category'], []);
    }
}
