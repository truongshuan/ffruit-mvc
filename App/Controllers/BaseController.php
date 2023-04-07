<?php

namespace App\App\Controllers;

use App\App\Core\Render;


class BaseController
{
    protected Render|array $load = array();
    function __construct()
    {
        $this->load = new Render();
    }

    public function  redirect($url, $refresh = null): void
    {
        header('location:' . $url);
    }
}
