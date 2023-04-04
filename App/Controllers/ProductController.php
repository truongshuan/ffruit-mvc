<?php
// namespace App\App\Controllers;

use App\App\Controllers\BaseController;
use App\App\Core\Session;
use App\App\Core\Validation;
use App\App\Models\Product;
use App\App\Models\Category;
use App\App\Core\Upload;



class ProductController extends BaseController
{
    private $_product;
    private $_category;

    function __construct()
    {
        // Kiểm tra admin đăng nhập !
        Session::checkSession();

        // Giá trị mặc định cho data
        $data = array();

        // Ghi đề phương thức kết nối CSDL
        parent::__construct();

        // Khởi tạo đối tượng Product Model
        $this->_product = new Product();
        $this->_category = new Category();
    }

    /**
     * list là phương thức lấy toàn bộ sản phẩm
     * @param mixed
     * @return void
     */
    public function list()
    {
        // Lấy toàn bộ loại sản phẩm
        $data['product'] = $this->_product->getAll();
        $data['category'] = $this->_category->getAll();
        // Render data và view 
        $this->load->render('layouts/admin/header');
        $this->load->render('components/admin/product/table-product', $data);
        $this->load->render('layouts/admin/footer');
    }

    /**
     * add là phương thức thêm sản phẩm
     * 
     * @param mixed 
     * @return void
     */
    public function add()
    {
        // Lấy dữ liệu loại sản phẩm
        $action = 'ProductController/postProduct';
        $data = [
            'category' => $this->_category->getAll(),
            'action' => $action
        ];
        // Render view
        $this->load->render('layouts/admin/header');
        $this->load->render('components/admin/product/add-product', $data);
        $this->load->render('layouts/admin/footer');
    }

    public function postProduct()
    {
        // Thực hiện thêm sản phẩm
        if (isset($_POST['submit'])) {
            $validate = new Validation($_POST);
            $errors = $validate->validateFormAdd();
            if ($errors === null) {
                $name = $_POST['name'];
                $price = $_POST['price'];
                $id_category = $_POST['id_category'];
                $desc = $_POST['desc'];
                // path thumbnail
                $uploader = new Upload($_FILES['image'], 'product', '');
                // Validate File
                if ($uploader->validateFile() != null) {
                    $file = $uploader->validateFile();
                    Session::setError('size', $file['size']);
                    Session::setError('extension', $file['extension']);
                    header("location:" . ROOT_URL . "ProductController/add");
                } else {
                    $upload_success = $uploader->uploadFile();
                    $path_image = $uploader->getTargetFile();
                    // Insert data
                    $this->_product->addProduct($name, $price, $desc, $path_image, $id_category);
                    // Redirect
                    header('location:' . ROOT_URL . 'ProductController/list');
                }
            } else {
                Session::setError('name', $errors['name']);
                Session::setError('price', $errors['price']);
                Session::setError('description', $errors['description']);
                Session::setError('category', $errors['category']);
                Session::setError('file', $errors['file']);
                header("location:" . ROOT_URL . "ProductController/add");
            }
        }
    }

    /**
     * update là phương thức chỉnh sửa sản phẩm
     *
     * @param  int $id
     * @return void
     */
    public function edit($id)
    {
        // Lấy dữ liệu
        $action = "ProductController/edit/$id";
        $data = [
            'product' => $this->_product->getById($id),
            'category' => $this->_category->getAll(),
            'action' => $action
        ];
        // Render data và view
        $this->load->render('layouts/admin/header');
        $this->load->render('components/admin/product/add-product', $data);
        $this->load->render('layouts/admin/footer');
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $price = $_POST['price'];
            $id_category = $_POST['id_category'];
            $desc = $_POST['desc'];
            if ($_FILES['image']['name'] == '') {
                $path_image = $data['product']['path_image'];
                $this->_product->updateProduct($id, $name, $price, $desc, $path_image, $id_category);
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
            } else {
                $uploader = new Upload($_FILES['image'], 'product', '');
                // Validate File
                if ($uploader->validateFile() != null) {
                    $file = $uploader->validateFile();
                    if (!empty($file['size'])) {
                        echo '<script type="text/javascript">
                        beautyToast.error({
                        title: "Thất bại! File < 10 MB",
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
                    if (!empty($file['extension'])) {
                        echo '<script type="text/javascript">
                        beautyToast.error({
                        title: "Thất bại! File: PNG,JPG,JPEG,GIF",
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
                    // unlink image cu~
                    unlink($data['product']['path_image']);
                    $upload_success = $uploader->uploadFile();
                    $path_image = $uploader->getTargetFile();
                    $this->_product->updateProduct($id, $name, $price, $desc, $path_image, $id_category);
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
        }
    }

    public function delete($id)
    {
        $item = $this->_product->getById($id);
        unlink($item['path_image']);
        $this->_product->deleteProduct($id);
        header("Location:" . ROOT_URL . "ProductController/list");
    }
}
