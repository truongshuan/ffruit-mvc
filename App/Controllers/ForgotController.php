<?php


use App\App\Controllers\BaseController;
use App\App\Core\Validation;
use App\App\Helpers\Email;
use App\App\Core\Session;
use App\App\Models\User;



class ForgotController extends BaseController
{
    private $_forgot;
    function __construct()
    {

        $data = [];


        parent::__construct();

        $this->_forgot = new User();
    }

    public function index()
    {

        $this->forgot();
    }
    public function forgot()
    {

        $this->load->render('client/Auth/forgot');
    }

    public function action()
    {
        if (isset($_POST['forgot'])) {
            $validate = new Validation($_POST);
            $errors = $validate->validateForgot();
            if ($errors === null) {
                $email = $_POST['email'];
                $check = $this->_forgot->checkLogin($email);
                if (isset($check[0]['email']) == $email) {
                    $code = rand(99999, 11111);
                    $this->_forgot->insertOTP($code, $email);
                    $content = "Admin FFruit đã gửi mã xác thực quên mật khẩu đến " . $email;
                    $url = "forgot";
                    $sendOTP  = new Email($email, $code, $content, $url);
                    header("Location:" . ROOT_URL . "ForgotController/resetOTP");
                } else {
                    Session::setError('error_forgot', 'Email không tồn tại');
                    header("Location:" . ROOT_URL . 'ForgotController/forgot');
                }
            } else {
                Session::setError('email', $errors['email']);
                header("Location:" . ROOT_URL . 'ForgotController/forgot');
            }
        }
    }

    public function resetOTP()
    {
        $this->load->render('client/Auth/reset-otp');
    }

    public function veriResetOTP()
    {
        if (isset($_POST['checkOTP'])) {
            $validate = new Validation($_POST);
            $errors = $validate->validateVeri();
            if ($errors === null) {
                $otp = $_POST['otp'];
                $check = $this->_forgot->verification($otp);
                if (isset($check[0]['code']) == $otp) {
                    $email = $check[0]['email'];
                    $code = 0;
                    $this->_forgot->insertOTP($code, $email);
                    Session::set('emailReset', $email);
                    header("Location:" . ROOT_URL . 'ForgotController/changePass');
                } else {
                    Session::setError('veriOTP', "Mã xác nhận không chính xác");
                    header("Location:" . ROOT_URL . 'ForgotController/resetOTP');
                }
            } else {
                Session::setError('otp', $errors['otp']);
                header("Location:" . ROOT_URL . 'ForgotController/resetOTP');
            }
        }
    }

    public function changePass()
    {

        $this->load->render('client/Auth/reset');
    }
    public function actionChangePass()
    {
        if (isset($_POST['reset'])) {
            $validate = new Validation($_POST);
            $errors = $validate->validateChange();
            if ($errors === null) {
                $password = $_POST['password'];
                $password_confirm = $_POST['confirm'];
                $email = $_POST['email'];
                $encpass = password_hash($password, PASSWORD_BCRYPT);
                $this->_forgot->insertNewPass($encpass, $email);
                header("Location:" . ROOT_URL . "UserController/login");
            } else {
                Session::setError('password', $errors['password']);
                Session::setError('confirm', $errors['confirm']);
                header("location: " . ROOT_URL . "ForgotController/changePass");
            }
        }
    }
}
