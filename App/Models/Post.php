<?php


namespace App\App\Models;


use App\App\Models\BaseModel;


class Post extends BaseModel
{

    private $table = "posts";
    private $table_topic = 'topics';
    private $table_author = 'author';

    function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        return $this->readData($this->table, ['id', 'title', 'thumbnail', 'content', 'created_at', 'updated_at', 'id_author', 'topic_id'], []);
    }

    public function getById($id)
    {
        return $this->selectOne($this->table, ['id', 'title', 'thumbnail', 'content', 'created_at', 'updated_at', 'id_author', 'topic_id'], ['id' => $id]);
    }

    public function addPost($title, $thumbnail, $content, $id_author, $topic_id)
    {
        $data = [
            'title' => $title,
            'thumbnail' => $thumbnail,
            'content' => $content,
            'id_author' => $id_author,
            'topic_id' => $topic_id
        ];
        return $this->createData($this->table, $data);
    }

    public function updatePost($id, $title, $thumbnail, $content, $id_author, $topic_id)
    {
        $data = [
            'title' => $title,
            'thumbnail' => $thumbnail,
            'content' => $content,
            'id_author' => $id_author,
            'topic_id' => $topic_id
        ];

        $conditions = [
            'id' => $id,
        ];

        return $this->updateData($this->table, $data, $conditions);
    }

    public function deletePost($id)
    {
        $conditions = "id=$id";
        return $this->deleteData($this->table, $conditions);
    }

    //    Client
    public function  getListTopics(){
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
            'topics.id as id_topic',
            'topics.name',
        ];
        $conditions = [];
        $conditionsRelation = [];
        return $this->selectWithRelation($this->table, $fields, $conditions, $this->table_topic, $fieldsRelation, $conditionsRelation, 'posts.topic_id', 'id', 1000, "ORDER BY posts.id ASC");
    }
    public  function getPostByTopic($idTopic){
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
            'topics.id as id_topic',
            'topics.name',
        ];
        $conditions = [];
        $conditionsRelation = [];
        return $this->selectWithRelation($this->table, $fields, $conditions, $this->table_topic, $fieldsRelation, $conditionsRelation, 'posts.topic_id', 'id', 1000, "WHERE topics.id =$idTopic ORDER BY posts.id ASC");
    }
    public function getDetail($id): bool|array
    {
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
            'topics.id',
            'topics.name',
        ];
        $conditions = [];
        $conditionsRelation = [];
        return $this->selectWithRelation($this->table, $fields, $conditions, $this->table_topic, $fieldsRelation, $conditionsRelation, 'posts.topic_id', 'id', 1, "WHERE posts.id=$id");
    }
    public function  getSamePost($id, $id_post): bool|array
    {
        $fields = [
            'posts.id as relate_id',
            'posts.title',
            'id_author',
            'topic_id'
        ];
        $fieldsRelation = [
            'topics.id',
            'topics.name',
        ];
        $conditions = [];
        $conditionsRelation = [];
        return $this->selectWithRelation($this->table, $fields, $conditions, $this->table_topic, $fieldsRelation, $conditionsRelation, 'posts.topic_id', 'id', 1000, "AND topics.id=$id AND posts.id NOT IN ($id_post)");
    }
    public  function  getTopics(): bool|array
    {
        return $this->readData($this->table_topic, ['id', 'name', 'body'], []);
    }

}
