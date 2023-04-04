<?php

// namespace App\App\Controllers;

use App\App\Controllers\BaseController;
use App\App\Core\Session;

class HomeController extends BaseController
{
    function __construct()
    {
        $data = [];
        parent::__construct();
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
        $this->load->render('layouts/client/header');
        $this->load->render('layouts/client/slider');
        $this->load->render('client/index');
        $this->load->render('layouts/client/footer');
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
