<?php



use App\App\Controllers\BaseController;
use App\App\Core\Session;
use App\App\Models\Order;


class OrderController extends BaseController
{

    private $_order;
    function __construct()
    { // Kiểm tra admin đăng nhập !
        Session::checkSession();

        // Giá trị mặc định cho data
        $data = array();

        // Ghi đề phương thức kết nối CSDL
        parent::__construct();

        // Khởi tạo đối tượng Order Model
        $this->_order = new Order();
    }

    public function list()
    {
        // Lấy dữ liệu
        $data = [];

        // Render data và view
        $this->load->render('layouts/admin/header');
        $this->load->render('components/admin/order/table-order', $data);
        $this->load->render('layouts/admin/footer');
    }
}
