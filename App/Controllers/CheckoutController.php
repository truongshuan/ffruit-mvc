<?php

//namespace App\App\Controllers;

use App\App\Controllers\BaseController;
use App\App\Core\Session;
use App\App\Core\Validation;
use App\App\Core\RenderBase;
use App\App\Models\Order;
use App\App\Helpers\Email;

class CheckoutController extends BaseController
{
    private $_model;
    private $_renderBase;
    public function __construct()
    {
        Session::checkLoginUser();
        parent::__construct();
        $this->_renderBase = new RenderBase();
        $this->_model = new Order();
    }
    public function checkOut(){
        $data = $_SESSION['cart'];
        $this->_renderBase->renderHeader();
        $this->load->render('components/client/checkout' , $data);
        $this->_renderBase->renderFooter();
    }
    public function  checkoutAction(){
        if(isset($_POST['checkout'])){
            $phone = $_POST['phone'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $note = $_POST['note'];
            $payment_method = $_POST['exampleRadios'];
            $customer_id = Session::get('id_user');
            $this->_model->insertOrder($phone, $email, $address,$note,$payment_method,$customer_id);
            unset($_SESSION['cart']);
            $sendMail = new Email();
            $sendMail->MailCheckout($email, "💵 Cảm mơn bạn rất nhiều vì đã đặt hàng ở FFruit \n Đơn hàng của bạn sẽ được xét duyệt trong thời gian sớm nhất !⌛ ", 'checkouted');
            header('location:' . ROOT_URL . 'CheckoutController/thank');
        }
    }
    public function listOrder($id){
        $data = $this->_model->getListOrder($id);
        $this->_renderBase->renderHeader();
        $this->load->render('components/client/list-order' , $data);
        $this->_renderBase->renderFooter();
    }
    public function thank(){
        $data = [];
        $this->_renderBase->renderHeader();
        $this->load->render('components/client/Thank' , $data);
        $this->_renderBase->renderFooter();
    }
}