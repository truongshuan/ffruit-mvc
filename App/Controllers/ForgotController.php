<?php


use App\App\Controllers\BaseController;
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
        Session::init();
        $this->load->render('client/Auth/forgot');
    }

    public function action()
    {
        if (isset($_POST['forgot'])) {
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
                Session::init();
                Session::set('msg_forgot', 'Email không tồn tại');
                header("Location:" . ROOT_URL . 'ForgotController/forgot');
            }
        }
    }

    public function resetOTP()
    {
        Session::init();
        $this->load->render('client/Auth/reset-otp');
    }

    public function veriResetOTP()
    {
        if (isset($_POST['checkOTP'])) {
            $otp = $_POST['otp'];
            $check = $this->_forgot->verification($otp);
            if (isset($check[0]['code']) == $otp) {
                $email = $check[0]['email'];
                $code = 0;
                $this->_forgot->insertOTP($code, $email);
                Session::init();
                Session::set('emailReset', $email);
                header("Location:" . ROOT_URL . 'ForgotController/changePass');
            } else {
                Session::init();
                Session::set('msg_forgot', "Không thể xác nhận - Vui lòng nhập lại");
                header("Location:" . ROOT_URL . 'ForgotController/resetOTP');
            }
        }
    }

    public function changePass()
    {
        Session::init();
        $this->load->render('client/Auth/reset');
    }
    public function actionChangePass()
    {
        if (isset($_POST['reset'])) {
            $password = $_POST['password'];
            $password_confirm = $_POST['password_confirm'];
            $email = $_POST['email'];
            if ($password === $password_confirm) {
                $encpass = password_hash($password, PASSWORD_BCRYPT);
                $this->_forgot->insertNewPass($encpass, $email);
                header("Location:" . ROOT_URL . "UserController/login");
            } else {
                Session::init();
                Session::set('msg_change', 'Mật khẩu không trùng khớp');
                header("Location:" . ROOT_URL . "ForgotController/changePass");
            }
        }
    }
}
