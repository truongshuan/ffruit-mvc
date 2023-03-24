<?php


use App\App\Controllers\BaseController;
use App\App\Core\Session;
use App\App\Models\User;
use App\App\Models\Admin;

class UserController extends BaseController
{

    private $_user;

    function __construct()
    {
        $data = [];

        parent::__construct();

        $this->_user = new User();
    }

    public function index()
    {
        $this->Login();
    }
    public function login()
    {
        Session::init();
        $this->load->render('client/Auth/login');
    }

    public function action()
    {
        if (isset($_POST['login'])) {

            $email = $_POST['email'];
            $password = $_POST['password'];

            $check = $this->_user->checkLogin($email);

            if (isset($check[0]['email']) == $email) {
                if (password_verify($password, $check[0]['password'])) {
                    if ($check[0]['status'] == 'verified') {
                        Session::init();
                        Session::set('id_user', $check[0]['id']);
                        Session::set('username_user', $check[0]['username']);
                        Session::set('email_user', $check[0]['email']);
                        Session::set('password_user', $check[0]['password']);
                        header("Location:" . ROOT_URL);
                    } else {
                        Session::init();
                        Session::set('msg_otp', "Vui lòng xác minh email");
                        header("Location:" . ROOT_URL . 'UserController/otp');
                    }
                } else {
                    Session::init();
                    Session::set('msg_login', 'Email hoặc mật khẩu không hợp lệ');
                    header("Location:" . ROOT_URL . "UserController/login");
                }
            } else {
                Session::init();
                Session::set('msg_login', 'Email chưa là thành viên của FFruit - Hãy Đăng ký ngay');
                header("Location:" . ROOT_URL . "UserController/login");
            }
        }
    }

    public function otp()
    {
        Session::init();
        $this->load->render('client/Auth/otp');
    }
    public function veriOTP()
    {
        if (isset($_POST['checkOTP'])) {
            $otp = $_POST['otp'];
            $check = $this->_user->verification($otp);
            if (isset($check[0]['code']) == $otp) {
                $email = $check[0]['email'];
                $code = 0;
                $status = 'verified';
                $this->_user->updateUser($code, $status, $email);
                Session::init();
                Session::set('id_user', $check[0]['id']);
                Session::set('username_user', $check[0]['username']);
                Session::set('email_user', $check[0]['email']);
                Session::set('password_user', $check[0]['password']);
                header("Location:" . ROOT_URL);
            } else {
                Session::init();
                Session::set('msg_otp', "Không thể xác nhận - Vui lòng nhập lại");
                header("Location:" . ROOT_URL . 'UserController/otp');
            }
        }
    }
    public function logout()
    {
        Session::init();
        unset($_SESSION['id_user']);
        unset($_SESSION['username_user']);
        unset($_SESSION['email_user']);
        unset($_SESSION['password_user']);

        if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')
            $url = "https://";
        else
            $url = "http://";
        // Append the host(domain name, ip) to the URL.   
        $url .= $_SERVER['HTTP_HOST'];

        header("Location:" . $url);
    }
}
