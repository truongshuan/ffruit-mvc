<?php

namespace App\App\Controllers;

use App\App\Core\Render;


class BaseController
{
    protected $load = array();
    function __construct()
    {
        $this->load = new Render();
    }
}
