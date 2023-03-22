<?php

use App\App\Controllers\BaseController;
use App\App\Core\Session;



class Admin extends BaseController
{
    public function __construct()
    {
        $data = [];
        parent::__construct();
    }

    public function action()
    {
        $this->Login();
    }

    public function Login()
    {
        Session::init();
        if (Session::get('login') == true) {
            header("Location:" . ROOT_URL . "admin/index");
        } else {
            $this->load->render('admin/signin');
        }
    }

    public function Page()
    {
        Session::checkSession();
        $this->load->render('admin/index');
    }

    public function AuthLogin()
    {
        $model =  $this->load->renderModel('LoginModel');

        // $username = "shuan";
        // $fullname = "Pham Truong Xuan";
        // $email = "truongshuan0310@gmail.com";
        // $password = password_hash("concaclo", PASSWORD_BCRYPT);
        // $code = 32345;
        // $status = 1;

        // $model->addAuth($username, $fullname, $email, $password, $code, $status);
        if (isset($_POST['login'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];

            $check_Auth = $model->checkLogin("admin", $email);
            if ($check_Auth > 0) {
                $data_Auth  = $model->getLogin("admin", $email);
                extract($data_Auth);
                if (password_verify($password, $data_Auth[0]['password'])) {
                    // Set session lưu dữ liệu
                    Session::init();
                    Session::set('login', true);
                    Session::set('username', $data_Auth[0]['username']);
                    Session::set('id_admin', $data_Auth[0]['id']);
                    setcookie('username', 'concac', time() + 86400 * 30, '/');
                    header("Location:" . ROOT_URL . "Admin/Page");
                } else {
                    // TODO : check OTP code
                }
            } else {
                echo '
                <script type="text/javascript">
                    alert("sai");
                </script>';
                header("Location:" . ROOT_URL . "Admin/Login");
            }
        }
    }
    public function logout()
    {
        Session::init();
        Session::detroy();
        header("Location:" . ROOT_URL . "Admin/Login");
    }
}
