<?php

namespace App\App\Core;

use App\App\Controllers\BaseController;
use App\App\Models\Post;
use App\App\Models\Category;

class RenderBase extends BaseController
{
    private Post $_topic;
    private Category $_category;
    public function __construct()
    {
        $data = [];
        parent::__construct();
        $this->_topic = new Post();
        $this->_category = new Category();
    }

    /**
     * @throws Exception
     */
    public function renderHeader(){
        $data = [
            'topics' => $this->_topic->getTopics(),
            'categories' => $this->_category->getAll()
        ];
        $this->load->render('layouts/client/header', $data);
    }

    /**
     * @throws Exception
     */
    public function renderFooter(){
        $this->load->render('layouts/client/footer');
    }
}