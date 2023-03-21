<?php

use App\App\Controllers\BaseController;


class PostController extends BaseController
{

    function __construct()
    {
        parent::__construct();
        echo '<br>';
        echo 'Day la class post';
    }
    function postDetail()
    {
        echo '<br>';
        echo 'chi tiet bai viet';
    }
}
