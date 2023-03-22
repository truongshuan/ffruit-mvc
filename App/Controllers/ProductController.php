<?php
// namespace App\App\Controllers;

use App\App\Controllers\BaseController;
use App\App\Core\Session;



class ProductController extends BaseController
{
    function __construct()
    {
        Session::checkSession();
        parent::__construct();
    }

    public function list()
    {
        $model = $this->load->renderModel('ProductModel');

        $data['products'] = $model->getLists();

        $this->load->render('admin/include/header');
        $this->load->render('admin/product/lists', $data);
        $this->load->render('admin/include/footer');
    }

    public function add()
    {
        $model = $this->load->renderModel('ProductModel');
        $this->load->render('admin/include/header');
        $this->load->render('admin/product/add');
        $this->load->render('admin/include/footer');
    }
}
