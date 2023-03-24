<?php
// namespace App\App\Controllers;

use App\App\Controllers\BaseController;
use App\App\Core\Session;
use App\App\Models\Product;
use App\App\Models\Category;



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
        $data['category'] = $this->_category->getAll();

        // Render view
        $this->load->render('layouts/admin/header');
        $this->load->render('components/admin/product/add-product', $data['category']);
        $this->load->render('layouts/admin/footer');



        // Thực hiện thêm sản phẩm
        if (isset($_POST['add_product'])) {
            $name = $_POST['name'];
            $price = $_POST['price'];
            $id_category = $_POST['id_category'];
            $desc = $_POST['desc'];

            $image = $_FILES['image']['name'];
            $tmp_image = $_FILES['image']['tmp_name'];

            $file = explode('.', $image);
            $file_image = strtolower(end($file));
            $unique_image = $file[0] . time() . '.' . $file_image;
            $path = 'public/upload/product/' . $image;
            move_uploaded_file($tmp_image, $path);


            $this->_product->addProduct($name, $price, $desc, $image, $id_category);

            echo '<script type="text/javascript">
            Swal.fire({
                icon: "success",
                text: "Thêm thành công",
            });
            </script>';
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
        $data['product'] = $this->_product->getById($id);
        $data['category'] = $this->_category->getAll();

        // Render data và view
        $this->load->render('layouts/admin/header');
        $this->load->render('components/admin/product/edit-product', $data);
        $this->load->render('layouts/admin/footer');

        if (isset($_POST['edit_product'])) {

            $name = $_POST['name'];
            $price = $_POST['price'];
            $id_category = $_POST['id_category'];
            $desc = $_POST['desc'];

            if ($_FILES['image']['name'] == '') {
                $image = $data['product'][0]['image'];
            } else {
                // Gỡ ảnh cũ sau khi thay đổi ảnh của sản phẩm
                $path_unlink = "public/upload/product/";
                unlink($path_unlink . $data['product'][0]['image']);

                // Cập nhật ảnh mới
                $image = $_FILES['image']['name'];
                $tmp_image = $_FILES['image']['tmp_name'];
                $file = explode('.', $image);
                $file_image = strtolower(end($file));
                $unique_image = $file[0] . time() . '.' . $file_image;
                $path = 'public/upload/product/' . $image;
                move_uploaded_file($tmp_image, $path);
            }
            $this->_product->updateProduct($id, $name, $price, $desc, $image, $id_category);
            echo '<script type="text/javascript">
            Swal.fire({
                icon: "success",
                text: "Sửa thành công",
            });
            </script>';
        }
    }

    public function delete($id)
    {
        $this->_product->deleteProduct($id);

        header("Location:" . ROOT_URL . "ProductController/list");
    }
}
