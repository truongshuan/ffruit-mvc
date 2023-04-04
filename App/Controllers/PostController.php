<?php



use App\App\Controllers\BaseController;
use App\App\Core\Session;
use App\App\Core\Validation;
use App\App\Models\Admin;
use App\App\Models\Post;
use App\App\Core\Upload;
use App\App\Models\Topic;


class PostController extends BaseController
{
    private $_author;
    private $_post;
    private $_topic;

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
        $this->_topic = new Topic();
    }
    /**
     * list là phương thức lấy toàn bộ bài viết
     * @param mixed
     * @return void
     */
    public function list(): void
    {
        $data = [
            'posts' => $this->_post->getAll(),
            'author' => Session::get('fullname_admin'),
            'topic' => $this->_topic->getAll()
        ];
        // Render data và view 
        $this->load->render('layouts/admin/header');
        $this->load->render('components/admin/post/table-post', $data);
        $this->load->render('layouts/admin/footer');
    }

    /**
     * @throws Exception
     */
    public function add()
    {
        $action = 'PostController/addPost';
        $data = [
            'action' => $action,
            'topic' => $this->_topic->getAll()
        ];
        // Render view
        $this->load->render('layouts/admin/header');
        $this->load->render('components/admin/post/add-post', $data);
        $this->load->render('layouts/admin/footer');
    }

    public function addPost()
    {
        if (isset($_POST['submit'])) {
            $validate = new Validation($_POST);
            $errors = $validate->validatePost();
            if ($errors === null) {
                $title = $_POST['title'];
                $content = $_POST['content'];
                $id_author = Session::get('id_admin');
                $topic_id = $_POST['topic_id'];
                // path thumbnail
                $uploader = new Upload($_FILES['thumbnail'], 'post', '');
                // Validate File
                if ($uploader->validateFile() != null) {
                    $file = $uploader->validateFile();
                    Session::setError('size', $file['size']);
                    Session::setError('extension', $file['extension']);
                    header("location:" . ROOT_URL . "PostController/add");
                } else {
                    $upload_success = $uploader->uploadFile();
                    $path_image = $uploader->getTargetFile();
                    // Insert data
                    $this->_post->addPost($title, $path_image, $content, $id_author, $topic_id);
                    // Redirect
                    header('location:' . ROOT_URL . 'PostController/list');
                }
            } else {
                Session::setError('title', $errors['title']);
                Session::setError('thumbnail', $errors['thumbnail']);
                Session::setError('content', $errors['content']);
                Session::setError('topic', $errors['topic']);
                header("location:" . ROOT_URL . "PostController/add");
            }
        }
    }

    /**
     * @param $id
     * @throws Exception
     */
    public function edit($id)
    {
        // Lấy dữ liệu
        $action = "PostController/edit/$id";
        $data = [
            'action' => $action,
            'item' => $this->_post->getById($id),
            'topic' => $this->_topic->getAll()
        ];
        // Render data và view
        $this->load->render('layouts/admin/header');
        $this->load->render('components/admin/post/add-post', $data);
        $this->load->render('layouts/admin/footer');
        if (isset($_POST['submit'])) {
            $title = $_POST['title'];
            $content = $_POST['content'];
            $id_author = Session::get('id_admin');
            $topic_id = $_POST['topic_id'];
            if ($_FILES['thumbnail']['name'] == '') {
                $path_image = $data['item']['thumbnail'];
                $this->_post->updatePost($id, $title, $path_image, $content, $id_author, $topic_id);
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
                $uploader = new Upload($_FILES['thumbnail'], 'post', '');
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
                    unlink($data['item']['thumbnail']);
                    $upload_success = $uploader->uploadFile();
                    $path_image = $uploader->getTargetFile();
                    $this->_post->updatePost($id, $title, $path_image, $content, $id_author, $topic_id);
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
        $item = $this->_post->getById($id);
        unlink($item['thumbnail']);
        $this->_post->deletePost($id);
        header("Location:" . ROOT_URL . "PostController/list");
    }
}
