<?php

use App\App\Controllers\BaseController;
use App\App\Core\Session;
use App\App\Models\Admin;
use App\App\Models\Post;

class PostController extends BaseController
{

    private $_author;
    private $_post;

    function __construct()
    {
        // Kiểm tra admin đăng nhập !
        Session::checkSession();

        // Giá trị mặc định cho data
        $data = array();

        // Ghi đề phương thức kết nối CSDL
        parent::__construct();

        // Khởi tạo đối tượng Product Model
        $this->_author = new Admin();
        $this->_post = new Post();
    }
    /**
     * list là phương thức lấy toàn bộ bài viết
     * @param mixed
     * @return void
     */
    public function list()
    {
        // Lấy toàn bộ loại bài viết
        // Session::init();
        $data['posts'] = $this->_post->getAll();
        $data['author']  = Session::get('fullname');

        // Render data và view 
        $this->load->render('layouts/admin/header');
        $this->load->render('components/admin/post/table-post', $data);
        $this->load->render('layouts/admin/footer');
    }

    public function add()
    {
        // Render view
        $this->load->render('layouts/admin/header');
        $this->load->render('components/admin/post/add-post');
        $this->load->render('layouts/admin/footer');



        // Thực hiện thêm sản phẩm
        if (isset($_POST['add_post'])) {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $id_author = Session::get('id_admin');

            $thumbnail = $_FILES['thumbnail']['name'];
            $tmp_thumbnail = $_FILES['thumbnail']['tmp_name'];

            $file = explode('.', $thumbnail);
            $file_thumbnail = strtolower(end($file));
            $unique_thumbnail = $file[0] . time() . '.' . $file_thumbnail;
            $path = 'public/upload/post/' . $thumbnail;
            move_uploaded_file($tmp_thumbnail, $path);


            $this->_post->addPost($title, $thumbnail, $content, $id_author);

            echo '<script type="text/javascript">
            Swal.fire({
                icon: "success",
                text: "Thêm thành công",
            });
            </script>';
        }
    }

    public function edit($id)
    {
        // Lấy dữ liệu
        $data['post'] = $this->_post->getById($id);

        // Render data và view
        $this->load->render('layouts/admin/header');
        $this->load->render('components/admin/post/edit-post', $data);
        $this->load->render('layouts/admin/footer');

        if (isset($_POST['edit_post'])) {

            $title = $_POST['title'];
            $content = $_POST['content'];
            $id_author = Session::get('id_admin');

            if ($_FILES['thumbnail']['name'] == '') {
                $thumbnail = $data['post'][0]['thumbnail'];
            } else {
                // Gỡ ảnh cũ sau khi thay đổi ảnh của bài viết
                $path_unlink = "public/upload/post/";
                unlink($path_unlink . $data['post'][0]['thumbnail']);

                // Cập nhật ảnh mới
                $thumbnail = $_FILES['thumbnail']['name'];
                $tmp_thumbnail = $_FILES['thumbnail']['tmp_name'];
                $file = explode('.', $thumbnail);
                $file_thumbnail = strtolower(end($file));
                $unique_thumbnail = $file[0] . time() . '.' . $file_thumbnail;
                $path = 'public/upload/post/' . $thumbnail;
                move_uploaded_file($tmp_thumbnail, $path);
            }
            $this->_post->updatePost($id, $title, $thumbnail, $content, $id_author);
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
        $this->_post->deletePost($id);

        header("Location:" . ROOT_URL . "PostController/list");
    }
}
