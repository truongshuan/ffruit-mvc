<?php


use App\App\Controllers\BaseController;
use App\App\Core\Session;
use App\App\Core\Validation;
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
        // Session::init();
        $this->load->render('client/Auth/login');
    }

    public function action()
    {
        if (isset($_POST['login'])) {
            $validate = new Validation($_POST);
            $errors = $validate->validateLogin();
            if ($errors === null) {
                $email = $_POST['email'];
                $password = $_POST['password'];
                $check = $this->_user->checkLogin($email);
                if (isset($check['email']) == $email) {
                    if (password_verify($password, $check['password'])) {
                        if ($check['status'] == 'verified') {
                            Session::set('login_user', true);
                            Session::set('id_user', $check['id']);
                            Session::set('username_user', $check['username']);
                            Session::set('email_user', $check['email']);
                            Session::set('password_user', $check['password']);
                            if (isset($_POST['remember'])) {
                                setcookie('emailUser', $email, time() + 60 * 60);
                                setcookie('passwordUser', $password, time() + 60 * 60);
                            }
                            header("Location:" . ROOT_URL);
                        } else {
                            Session::setError('veriOTP', "Vui lòng xác minh email");
                            header("Location:" . ROOT_URL . 'UserController/otp');
                        }
                    } else {
                        Session::setError('error_login', 'Email hoặc mật khẩu không hợp lệ');
                        header("Location:" . ROOT_URL . "UserController/login");
                    }
                } else {
                    Session::setError('error_login', 'Email không tồn tại');
                    header("Location:" . ROOT_URL . "UserController/login");
                }
            } else {
                Session::setError('email', $errors['email']);
                Session::setError('password', $errors['password']);
                header("Location:" . ROOT_URL . "UserController/login");
            }
        }
    }

    public function otp()
    {
        $this->load->render('client/Auth/otp');
    }
    public function veriOTP()
    {
        if (isset($_POST['checkOTP'])) {
            $validate = new Validation($_POST);
            $errors = $validate->validateVeri();
            if ($errors === null) {
                $otp = $_POST['otp'];
                $check = $this->_user->verification($otp);
                if (isset($check[0]['code']) == $otp) {
                    $email = $check[0]['email'];
                    $code = 0;
                    $status = 'verified';
                    $this->_user->updateUser($code, $status, $email);
                    Session::set('login_user', true);
                    Session::set('id_user', $check[0]['id']);
                    Session::set('username_user', $check[0]['username']);
                    Session::set('email_user', $check[0]['email']);
                    Session::set('password_user', $check[0]['password']);
                    header("Location:" . ROOT_URL);
                } else {
                    Session::setError('veriOTP', 'Mã xác nhận không chính xác');
                    header("Location:" . ROOT_URL . 'UserController/otp');
                }
            } else {
                Session::setError('otp', $errors['otp']);
                header("Location:" . ROOT_URL . 'UserController/otp');
            }
        }
    }
    public function logout()
    {
        unset($_SESSION['login_user']);
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
