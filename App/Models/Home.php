<?php


namespace App\App\Models;

use App\App\Models\BaseModel;


class Home extends BaseModel
{
    private $table_category = 'categories';
    private  $table_product = 'products';
    private $table_post = 'posts';
    private $table_topic = 'topics';
    function __construct()
    {
        parent::__construct();
    }

    public function getProducts(){
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
        return $this->selectWithRelation($this->table_product, $fields, $conditions, $this->table_category, $fieldsRelation, $conditionsRelation, 'products.id_category', 'id', 3, 'ORDER BY products.id ASC');
    }

    public function getAuthor(){
        return $this->selectOne('admin', ['id','username', 'fullname'], []);
    }
    public function getPost(){
        $fields = [
            'posts.id',
            'posts.title',
            'posts.content',
            'posts.thumbnail',
            'posts.created_at',
            'id_author',
            'topic_id'
        ];
        $fieldsRelation = [
            'topics.name',
        ];
        $conditions = [];
        $conditionsRelation = [];
        return $this->selectWithRelation($this->table_post, $fields, $conditions, $this->table_topic, $fieldsRelation, $conditionsRelation, 'posts.topic_id', 'id', 3, 'ORDER BY posts.id ASC');
    }
}
