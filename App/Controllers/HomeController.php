<?php

// namespace App\App\Controllers;

use App\App\Controllers\BaseController;
use App\App\Core\RenderBase;
use App\App\Core\Session;
use App\App\Models\Home;

class HomeController extends BaseController
{
    private $_model;
    private $_renderBase;
    function __construct()
    {
        $data = [];
        parent::__construct();

        $this->_model = new Home();
        $this->_renderBase = new RenderBase();
    }
    function HomeController()
    {
        $this->homePage();
    }

    /**
     * @throws Exception
     */
    function homePage()
    {
        $data = [
            'products' => $this->_model->getProducts(),
            'posts' => $this->_model->getPost(),
            'author' => $this->_model->getAuthor()
        ];
        $this->_renderBase->renderHeader();
        $this->load->render('layouts/client/slider');
        $this->load->render('client/index', $data);
        $this->_renderBase->renderFooter();
    }
    function about()
    {
        $data = [];
        $this->_renderBase->renderHeader();
        $this->load->render('client/about-us', $data);
        $this->_renderBase->renderFooter();
    }
    function contact()
    {
        $data = [];
        $this->_renderBase->renderHeader();
        $this->load->render('client/contact', $data);
        $this->_renderBase->renderFooter();
    }
    /**
     * @throws Exception
     */
    function Error()
    {
        $this->load->render('layouts/client/header');
        $this->load->render('client/404');
        $this->load->render('layouts/client/footer');
    }
}
