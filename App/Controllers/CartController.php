<?php

//namespace App\App\Controllers;

use App\App\Core\Session;
use App\App\Controllers\BaseController;
use App\App\Core\RenderBase;
use App\App\Models\Product;

class CartController extends BaseController
{
    private $_model;
    private $_renderBase;

    public function __construct()
    {
        $data = [];
        parent::__construct();
        $this->_model = new Product();
        $this->_renderBase = new RenderBase();
    }

    public function cart(){
        if(Session::get('cart') === false){
            $data = [];
        }else{
            $data = Session::get('cart');
        }
        $this->_renderBase->renderHeader();
        $this->load->render('components/client/cart', $data);
        $this->_renderBase->renderFooter();
    }
    public function addToCart($id){
            if(isset($_POST['quality'])){
                $quality = $_POST['quality'];
            }else{
                $quality = 1;
            }
        $data = $this->_model->getById($id);
        $item = [
            'id' => $data['id'],
            'name' => $data['name'],
            'price' => $data['price'],
            'path_image' => $data['path_image'],
            'quality' => $quality
        ];
        if(isset($_SESSION['cart'][$id])){
            $_SESSION['cart'][$id]['quality'] += $quality;
        }else {
            Session::setCart("$id", $item);
        }
        $this->redirect(ROOT_URL . 'ClientProductController/products');
    }
    public function updateCart($id){
        $quality = $_POST['quality'];
        $_SESSION['cart'][$id]['quality'] = $quality;
        if($quality <= 0 ){
            unset($_SESSION['cart'][$id]);
        }
        $this->redirect(ROOT_URL . 'CartController/cart');
    }

    public function deleteCart($id){
        unset($_SESSION['cart'][$id]);
        $this->redirect(ROOT_URL . 'CartController/cart');
    }
}