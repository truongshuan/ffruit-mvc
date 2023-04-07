<?php

//namespace App\App\Controllers;

use App\App\Controllers\BaseController;
use App\App\Core\RenderBase;
use App\App\Core\Session;
use App\App\Models\Product;
use App\App\Models\Category;

class ClientProductController extends BaseController
{
    private  $_renderBase;
    private $_product;
    private $_category;

    public function __construct()
    {
        parent::__construct();
        $data = [];
        $this->_product = new Product();
        $this->_category = new Category();
        $this->_renderBase = new RenderBase();
    }

    /**
     * @throws Exception
     */
    public function products(){
        $data = [
            'products' => $this->_product->getProducts(),
            'categories'  => $this->_category->getAll()
        ];
        $this->_renderBase->renderHeader();
        $this->load->render('client/products',$data);
        $this->_renderBase->renderFooter();
    }
    public function detail($id){
        $temp = $this->_product->getDetail($id);
        if(!empty($temp)){
            $data = [
                'product' => $this->_product->getDetail($id),
                'productSame' => $this->_product->getSameProduct($this->_product->getDetail($id)[0]['id_category'],$id)
            ];
        }else{
            $data = [];
        }
        $this->_renderBase->renderHeader();
        $this->load->render('components/client/product-item',$data);
        $this->_renderBase->renderFooter();
    }
}