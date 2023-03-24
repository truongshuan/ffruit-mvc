<?php

use App\App\Models\BaseModel;


class HomeModel extends BaseModel
{
    function __construct()
    {
        parent::__construct();
    }

    public function category($table)
    {
        $result = $this->readData($table, ['id', 'title', 'created_at'], []);
        return $result;
    }
    public function categoryById($table, $id)
    {

        $result = $this->readData($table, ['id', 'title', 'created_at'], ['id' => $id]);
        return $result;
    }
}
