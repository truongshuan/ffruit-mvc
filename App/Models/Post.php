<?php


namespace App\App\Models;


use App\App\Models\BaseModel;


class Post extends BaseModel
{

    private $table = "posts";


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
}
