<?php


namespace App\App\Core;


class Render
{

    function __construct()
    {
    }
    public function render($file)
    {
        require 'App/Views/' . $file . '.php';
    }
}
