<?php

use App\App\Controllers\BaseController;


class HomeController extends BaseController
{


    function __construct()
    {
        parent::__construct();
    }
    function homePage()
    {
        $this->load->render('index');
    }
}
