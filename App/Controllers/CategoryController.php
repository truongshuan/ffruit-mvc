<?php

// namespace App\App\Controllers;

/**
 * Quy tắc đặt tên đúng chuẩn Lavarel đối với Controller
 * Tên Controller bắt đầu bằng danh từ, số ít, hậu tố Controller, Class phải trùng với tên file
 */


use App\App\Controllers\BaseController;
use App\App\Core\Session;
use App\App\Models\Category;
use App\App\Core\Validation;


class CategoryController extends BaseController
{

    private $_category;

    function __construct()
    {
        // Kiểm tra admin đăng nhập !
        Session::checkSession();

        // Giá trị mặc định cho data
        $data = array();

        parent::__construct();
        // Khởi tạo đối tượng Category Model
        $this->_category = new Category();
    }

    /**
     * list là phương thức lấy toàn bộ loại sản phẩm
     * @param mixed
     * @return void
     * @throws Exception
     */
    public function list(): void
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
    public function add(): void
    {
        $data = [
            'action' => ROOT_URL . "CategoryController/postCategory"
        ];
        // Render view
        $this->load->render('layouts/admin/header');
        $this->load->render('components/admin/category/action-category', $data);
        $this->load->render('layouts/admin/footer');
    }

    public function postCategory()
    {
        // Thực hiện sửa loại sản phẩm
        if (isset($_POST['submit'])) {
            // validate 
            $validate = new Validation($_POST);
            $errors = $validate->validateCate();
            if ($errors === null) {
                $title = $_POST['title'];
                $desc = $_POST['desc'];
                // Lọc những loại sản phẩm cùng tên
                $filter = $this->_category->filterByTitle($title);
                // Kiểm tra tên loại sản phẩm đã tồn tại
                if ($filter == true) {
                    // Thực hiện câu lệnh insert dữ liệu mới
                    $this->_category->addCategory($title, $desc);
                    header("location: " . ROOT_URL . "CategoryController/list");
                    // Thông báo !
                    // echo '<script type="text/javascript">
                    //     beautyToast.success({
                    //     title: "Thêm loại sản phẩm thành công",
                    //     titleColor: "#D8D8D8",
                    //     icon: "fa-solid fa-circle-check",
                    //     backgroundColor: "#121212",
                    //     iconColor: "#fff",
                    //     iconWidth: 15,
                    //     iconHeight: 15,
                    //     progressBarColor: "#09BC0E",
                    //     topbarColor: "#121212",
                    //     onClose : function(){},
                    // });
                    // </script>';
                } else {
                    $data = [
                        'action' => ROOT_URL . "CategoryController/postCategory"
                    ];
                    // Render view
                    $this->load->render('layouts/admin/header');
                    $this->load->render('components/admin/category/action-category', $data);
                    $this->load->render('layouts/admin/footer');
                    // Thông báo !
                    echo '<script type="text/javascript">
                    beautyToast.error({
                    title: "Thất bại ! Tiêu đề này đã tồn tại",
                    titleColor: "#D8D8D8",
                    icon: "fa-solid fa-circle-exclamation",
                    backgroundColor: "#121212",
                    iconColor: "#E14E38",
                    iconWidth: 15,
                    iconHeight: 15,
                    progressBarColor: "#E14E38",
                    onClose : function(){},
                    });
                    </script>';
                }
            } else {
                Session::setError('title', $errors['title']);
                Session::setError('description', $errors['description']);
                header("location:" . ROOT_URL . "CategoryController/add");
            }
        }
    }

    /**
     * edit là phương thức cập nhật loại sản phẩm
     *
     * @param int $id
     * @return void
     * @throws Exception
     */
    public function edit(int $id): void
    {
        // Lấy dữ liệu từ id truyền vào
        // $data['category_id'] = $this->_category->getById($id);
        $data = [
            'action' => ROOT_URL . "CategoryController/edit/$id",
            'current' => $this->_category->getById($id)
        ];
        // Render data và view
        $this->load->render('layouts/admin/header');
        $this->load->render('components/admin/category/action-category', $data);
        $this->load->render('layouts/admin/footer');
        // Cập nhật lại loại sản phẩm
        if (isset($_POST['submit'])) {
            $title = $_POST['title'];
            $desc = $_POST['desc'];
            // Gọi phương thức thực thi câu lệnh
            $this->_category->updateCategory($id, $title, $desc);
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
    /**
     * del là phương thức xóa loại sản phẩm
     *
     * @param int $id
     * @return void
     */
    public function delete(int $id): void
    {
        // Gọi phương thức thực thi câu lệnh
        $this->_category->deleteCategory($id);
        header("Location:" . ROOT_URL . "CategoryController/list");
    }
}
