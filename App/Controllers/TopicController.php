<?php


// namespace App\App\Controllers;


use App\App\Controllers\BaseController;
use App\App\Core\Session;
use App\App\Core\Validation;
use App\App\Models\Topic;


class TopicController extends BaseController
{

    private $_topic;
    public function __construct()
    {
        Session::checkSession();

        $data = [];

        parent::__construct();

        $this->_topic = new Topic;
    }

    public function list()
    {
        $data = $this->_topic->getAll();
        $this->load->render('layouts/admin/header');
        $this->load->render('components/admin/topic/table-topic', $data);
        $this->load->render('layouts/admin/footer');
    }

    public function add()
    {
        $action = ROOT_URL . 'TopicController/postTopic';
        $data = [
            'action' => $action
        ];
        $this->load->render('layouts/admin/header');
        $this->load->render('components/admin/topic/action-topic', $data);
        $this->load->render('layouts/admin/footer');
    }
    public function postTopic()
    {
        if (isset($_POST['submit'])) {
            $validate = new Validation($_POST);
            $errors = $validate->validateTopic();
            if ($errors === null) {
                $name = $_POST['name'];
                $body = $_POST['body'];
                $this->_topic->addTopic($name, $body);
                header('location:' . ROOT_URL . 'TopicController/list');
            } else {
                Session::setError('name', $errors['name']);
                Session::setError('body', $errors['body']);
                header('location:' . ROOT_URL . 'TopicController/add');
            }
        }
    }
    public function edit(int $id): void
    {
        $data = [
            'action' => ROOT_URL . "TopicController/edit/$id",
            'current' => $this->_topic->getById($id)
        ];
        // Render data và view
        $this->load->render('layouts/admin/header');
        $this->load->render('components/admin/topic/action-topic', $data);
        $this->load->render('layouts/admin/footer');
        // Cập nhật lại loại sản phẩm
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $body = $_POST['body'];
            // Gọi phương thức thực thi câu lệnh
            $this->_topic->editTopic($id, $name, $body);
            // Thông báo !
            echo '<script type="text/javascript">
                    beautyToast.success({
                        title: "Sửa thành công",
                        titleColor: "#D8D8D8",
                        icon: "fa-solid fa-circle-check",
                        backgroundColor: "#121212",
                        iconColor: "#fff",
                        iconWidth: 15,
                        iconHeight: 15,
                        progressBarColor: "#09BC0E",
                        topbarColor: "#121212",
                        onClose : function(){},
                    });
                    </script>';
        }
    }
    public function delete(int $id): void
    {
        $this->_topic->deleteTopic($id);
        header("Location:" . ROOT_URL . "TopicController/list");
    }
}
