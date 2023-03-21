<?php
// namespace App\App\Controllers;

use App\App\Controllers\BaseController;



class ProductController extends BaseController
{
    function __construct()
    {
        parent::__construct();
    }
    public function productDetail($id, $slug)
    {
        echo '<br>';
        echo 'chi tiet san pham';
        echo $id;
        echo $slug;
    }
    public function showProduct()
    {
        echo 'show product';
    }
}
