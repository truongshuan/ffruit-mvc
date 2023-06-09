<?php


use App\App\Controllers\BaseController;
use App\App\Core\Session;
use App\App\Models\Admin;
use App\App\Core\Validation;


class AdminController extends BaseController
{
    private $_admin;
    private $errors = array();
    public function __construct()
    {
        // Ghi đề phương thức kết nối CSDL
        parent::__construct();

        // Khởi tạo đối tượng Category Model
        $this->_admin = new Admin();
    }

    public function index()
    {
        $this->Login();
    }

    public function Login()
    {
        if (Session::get('login') == true) {
//            header("Location:" . ROOT_URL . "admin/index");
            $this->redirect(ROOT_URL . "admin/index");
        } else {
            $this->load->render('admin/signin');
        }
    }

    public function Page()
    {
        Session::checkSession();
        $this->load->render('layouts/admin/header');
        $this->load->render('admin/index');
        $this->load->render('layouts/admin/footer');
    }

    public function AuthLogin()
    {
        if (isset($_POST['login'])) {
            $validate = new Validation($_POST);
            $errors = $validate->validateLogin();
            if ($errors === null) {
                $email = $_POST['email'];
                $password = $_POST['password'];
                $check_Auth = $this->_admin->checkLogin("admin", $email);
                if ($check_Auth > 0) {
                    $data_Auth  = $this->_admin->getLogin("admin", $email);
                    extract($data_Auth);
                    // check password
                    if (password_verify($password, $data_Auth[0]['password'])) {
                        // Luu du lieu vao Session
                        Session::set('login', true);
                        Session::set('username_admin', $data_Auth[0]['username']);
                        Session::set('fullname_admin', $data_Auth[0]['fullname']);
                        Session::set('id_admin', $data_Auth[0]['id']);
                        // Check ghi nhớ mật khẩu
                        if (isset($_POST['remember'])) {
                            setcookie('emailAdmin', $email, time() + 20);
                            setcookie('passwordAdmin', $password, time() + 20);
                        }
//                        header("Location:" . ROOT_URL . "AdminController/Page");
                        $this->redirect(ROOT_URL . 'AdminController/Page');

                    } else {
                        Session::setError('massege', 'Mật khẩu không đúng');
//                        header("Location:" . ROOT_URL . "AdminController/Login");
                        $this->redirect(ROOT_URL . 'AdminController/Login');

                    }
                } else {
                    Session::setError('massege', 'Email hoặc mật khẩu không đúng');
//                    header("Location:" . ROOT_URL . "AdminController/Login");
                    $this->redirect(ROOT_URL . 'AdminController/Login');

                }

            } else {
                Session::setError('email', $errors['email']);
                Session::setError('password', $errors['password']);
//                header("Location:" . ROOT_URL . "AdminController/Login");
                $this->redirect(ROOT_URL . 'AdminController/Login');
            }
        }
    }
    public function logout()
    {
        unset($_SESSION['login']);
        unset($_SESSION['username_admin']);
        unset($_SESSION['fullname_admin']);
        unset($_SESSION['id_admin']);
//        header("Location:" . ROOT_URL . "AdminController/Login");
        $this->redirect(ROOT_URL . 'AdminController/Login');
    }

    // public function addAdmin()
    // {
    //     return $this->_admin->addAuth('shuan@nitez', 'Pham Truong Xuan', 'admin@gmail.com', password_hash('admin', PASSWORD_BCRYPT), 0, 1);
    // }
}
