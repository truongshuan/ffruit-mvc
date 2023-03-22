<?php

// namespace App\App\Controllers;

use App\App\Controllers\BaseController;


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
    function homePage()
    {
        $this->load->render('home');
    }
    function Error()
    {
        $this->load->render('404');
    }
}
