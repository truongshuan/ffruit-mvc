<?php


/**
 * Quy tắc đặt tên chuẩn : 
 * Tên file và tên Class phải là danh từ số ít (User,Category...) và viết hoa chữ cái đầu
 * Tên phương thức phải là dạng danh từ số nhiều hoặc số ít (Không viết hoa)
 * Các thuộc tính trong Model phải ở dạng snack_case
 */

namespace App\App\Models;

use App\App\Models\BaseModel;


class Category extends BaseModel
{
    protected $table = "categories";


    function __construct()
    {
        parent::__construct();
    }

    public function getAll()
    {
        return $this->readData($this->table,  ['id', 'title', 'description', 'created_at'], []);
    }
    public function getById($id)
    {
        return $this->getOne($this->table, ['id', 'title', 'description', 'created_at'], ['id' => $id]);
    }
    public function filterByTitle($name)
    {
        $check = true;
        $temp = $this->readData($this->table,  ['title'], ['title' => $name]);
        if (!empty($temp[0]['title'])) {
            if ($temp[0]['title'] == $name) {
                $check = false;
            }
        } else {
            $check = true;
        }
        return $check;
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
