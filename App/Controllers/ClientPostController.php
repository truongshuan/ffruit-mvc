<?php

//namespace App\App\Controllers;


use App\App\Controllers\BaseController;
use App\App\Core\RenderBase;
use App\App\Core\Session;
use App\App\Models\Post;
use App\App\Models\Home;


class ClientPostController extends  BaseController
{
    private $_post;
    private $_author;
    private $_renderBase;
    public function __construct()
    {
        $data = [];
        parent::__construct();
        $this->_post = new Post();
        $this->_author = new Home();
        $this->_renderBase = new RenderBase();
    }

    /**
     * @throws Exception
     */
    public function posts(){
        $data = [
            'posts' => $this->_post->getListTopics(),
            'author' => $this->_author->getAuthor(),
        ];

        $this->_renderBase->renderHeader();
        $this->load->render('client/posts', $data);
        $this->_renderBase->renderFooter();
    }

    public function topic($idTopic){
        $data = [
            'posts' => $this->_post->getPostByTopic($idTopic),
            'author' => $this->_author->getAuthor(),
        ];
        $this->_renderBase->renderHeader();
        $this->load->render('client/posts', $data);
        $this->_renderBase->renderFooter();
    }

    /**
     * @throws Exception
     */
    public function detail($id){
        $temp = $this->_post->getDetail($id);
        if(!empty($temp)){
            $data = [
            'post' => $this->_post->getDetail($id),
            'author' => $this->_author->getAuthor(),
            'topics' => $this->_post->getTopics(),
            'postSame' => $this->_post->getSamePost($this->_post->getDetail($id)[0]['topic_id'],$id)
            ];
        }else{
            $data = [];
        }
        $this->_renderBase->renderHeader();
        $this->load->render('components/client/post-item',$data);
        $this->_renderBase->renderFooter();
    }
}