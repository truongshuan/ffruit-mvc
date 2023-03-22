<?php

// namespace App\App\Controllers;

use App\App\Controllers\BaseController;
use App\App\Core\Session;


class CategoryController extends BaseController
{


    function __construct()
    {
        Session::checkSession();
        $data = array();
        parent::__construct();
    }

    function list()
    {
        $model = $this->load->renderModel('Category');

        $data['category'] = $model->getLists();

        $this->load->render('admin/include/header');
        $this->load->render('admin/category/lists', $data);
        $this->load->render('admin/include/footer');
    }

    public function add()
    {
        $model = $this->load->renderModel('Category');
        $this->load->render('admin/include/header');
        $this->load->render('admin/category/add');
        $this->load->render('admin/include/footer');


        if (isset($_POST['add_category'])) {
            $title = $_POST['title'];
            $desc = $_POST['desc'];
            // Lọc những loại sản phẩm cùng tên
            $filter = $model->filterTitle($title);
            if (isset($filter[0]['title'])) {
                if ($filter[0]['title'] === $title) {
                    echo '<script type="text/javascript">
                    Swal.fire({
                        icon: "error",
                        text: "Loại sản phẩm đã tồn tại",
                    });
                    </script>';
                }
            } else {
                $model->addCategory($title, $desc);
                echo '<script type="text/javascript">
                        Swal.fire({
                            icon: "success",
                            text: "Thêm thành công",
                        });
                        </script>';
            }
        }
    }

    public function update($id)
    {
        // RenderModel

        $model = $this->load->renderModel('Category');

        // Get Data by ID

        $data['category_id'] = $model->getById($id);

        // Render UI

        $this->load->render('admin/include/header');
        $this->load->render('admin/category/edit', $data);
        $this->load->render('admin/include/footer');

        // Cập nhật lại loại sản phẩm
        if (isset($_POST['edit_category'])) {
            $title = $_POST['title'];
            $desc  = $_POST['desc'];
            $model->updateCategory($id, $title, $desc);
            echo '<script type="text/javascript">
            Swal.fire({
                icon: "success",
                text: "Cập nhật thành công",
            });
            </script>';
        }
    }

    public function del($id)
    {
        $model = $this->load->renderModel('Category');
        $model->deleteCategory($id);
        header("Location:" . ROOT_URL . "CategoryController/list");
    }
}
