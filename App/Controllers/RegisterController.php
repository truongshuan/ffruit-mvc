<?php


use App\App\Controllers\BaseController;
use App\App\Core\Session;
use App\App\Helpers\Email;
use App\App\Models\User;



class RegisterController extends BaseController
{
    private $_register;
    function __construct()
    {

        $data = [];


        parent::__construct();

        $this->_register = new User();
    }

    public function index()
    {
        $this->register();
    }
    public function register()
    {

        $this->load->render('client/Auth/register');
    }
    public function actionRegister()
    {
        if (isset($_POST['register'])) {

            $username = $_POST['username'];
            $email = $_POST['email'];
            $fullname = $_POST['fullname'];
            $password = $_POST['password'];
            $password_confirm = $_POST['password_confirm'];

            if ($this->_register->checkUserExists("users", $email) > 0) {
                Session::init();
                Session::set('error', 'Email hoặc Username đã tồn tại!');
                header("Location:" . ROOT_URL . "RegisterController/register");
            } else {
                if ($password !== $password_confirm) {
                    Session::init();
                    Session::set('error', 'Mật khẩu không trùng khớp!');
                    header("Location:" . ROOT_URL . "RegisterController/register");
                } else {
                    $code = rand(99999, 11111);
                    $status = "notverified";
                    $encpass = password_hash($password, PASSWORD_BCRYPT);
                    $this->_register->addUser($username, $email, $fullname, $encpass, $code, $status);
                    $content = "Admin FFruit đã gửi mã xác thực email đến " . $email;
                    $url = "register";
                    $sendOTP  = new Email($email, $code, $content, $url);
                    header("Location:" . ROOT_URL . "UserController/otp");
                }
            }
        }
    }
}
