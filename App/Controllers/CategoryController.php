<?php

// namespace App\App\Controllers;

/**
 * Quy tắc đặt tên đúng chuẩn Lavarel đối với Controller
 * Tên Controller bắt đầu bằng danh từ, số ít, hậu tố Controller, Class phải trùng với tên file
 */


use App\App\Controllers\BaseController;
use App\App\Core\Session;
use App\App\Models\Category;


class CategoryController extends BaseController
{

    private $_category;

    function __construct()
    {
        // Kiểm tra admin đăng nhập !
        Session::checkSession();

        // Giá trị mặc định cho data
        $data = array();

        // Ghi đề phương thức kết nối CSDL
        parent::__construct();

        // Khởi tạo đối tượng Category Model
        $this->_category = new Category();
    }

    /**
     * list là phương thức lấy toàn bộ loại sản phẩm
     * @param mixed
     * @return void
     */
    public function list()
    {
        // Lấy toàn bộ loại sản phẩm
        $data = $this->_category->getAll();

        // Render data và view 
        $this->load->render('layouts/admin/header');
        $this->load->render('components/admin/category/table-category', $data);
        $this->load->render('layouts/admin/footer');
    }

    /**
     * add là phương thức thêm loại sản phẩm
     * @param mixed
     * @return void
     */
    public function add()
    {
        // Render view
        $this->load->render('layouts/admin/header');
        $this->load->render('components/admin/category/add-category');
        $this->load->render('layouts/admin/footer');


        // Thực hiện sửa loại sản phẩm
        if (isset($_POST['add_category'])) {

            $title = $_POST['title'];
            $desc = $_POST['desc'];

            // Lọc những loại sản phẩm cùng tên
            $filter = $this->_category->filterByTitle($title);

            // Kiểm tra tên loại sản phẩm đã tồn tại 
            if ($filter == true) {

                // Thực hiện câu lệnh insert dữ liệu mới 
                $this->_category->addCategory($title, $desc);

                // Thông báo !
                echo '<script type="text/javascript">
                        Swal.fire({
                            icon: "success",
                            text: "Thêm thành công",
                        });
                        </script>';
            } else {
                // Thông báo !
                echo '<script type="text/javascript">
                    Swal.fire({
                        icon: "error",
                        title: "Không thành công",
                        text: "Tên này đã tồn tại",
                    });
                    </script>';
            }
        }
    }

    /**
     * edit là phương thức cập nhật loại sản phẩm
     *
     * @param  int $id
     * @return void
     */
    public function edit($id)
    {
        // Lấy dữ liệu từ id truyền vào
        $data['category_id'] = $this->_category->getById($id);

        // Render data và view
        $this->load->render('layouts/admin/header');
        $this->load->render('components/admin/category/edit-category', $data);
        $this->load->render('layouts/admin/footer');


        // Cập nhật lại loại sản phẩm
        if (isset($_POST['edit_category'])) {

            $title = $_POST['title'];
            $desc  = $_POST['desc'];

            // Kiểm tra tên loại sản phẩm đã tồn tại 
            // $filter = $this->_category->filterByTitle($title);

            // Gọi phương thức thực thi câu lệnh
            $this->_category->updateCategory($id, $title, $desc);
            // Thông báo !
            echo '<script type="text/javascript">
                Swal.fire({
                    icon: "success",
                    text: "Cập nhật thành công",
                });
                </script>';
        }
    }

    /**
     * del là phương thức xóa loại sản phẩm
     *
     * @param  int $id
     * @return void
     */
    public function delete($id)
    {
        // Gọi phương thức thực thi câu lệnh
        $this->_category->deleteCategory($id);

        header("Location:" . ROOT_URL . "CategoryController/list");
    }
}
