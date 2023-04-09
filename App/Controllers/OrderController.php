<?php



use App\App\Controllers\BaseController;
use App\App\Core\Session;
use App\App\Models\Order;
use App\App\Helpers\Email;


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

    /**
     * @throws Exception
     */
    public function list()
    {
        // Lấy dữ liệu
        $data = $this->_order->getAll();
        // Render data và view
        $this->load->render('layouts/admin/header');
        $this->load->render('components/admin/order/table-order', $data);
        $this->load->render('layouts/admin/footer');
    }
    public function edit($id){
        $data  = $this->_order->getById($id);
        // Render data và view
        $this->load->render('layouts/admin/header');
        $this->load->render('components/admin/order/edit-order', $data);
        $this->load->render('layouts/admin/footer');

        if(isset($_POST['submit'])){
            $status = $_POST['status'];
            if($status == 1){
                $this->_order->updateOrder($id, $status);
                $sendMail = new Email();
                $sendMail->MailCheckout($data['email'], 'Đơn hàng của bạn đã được duyệt vui lòng kiểm tra !', '');
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
            }else if($status == 2) {
                $this->_order->updateOrder($id, $status);
                $sendMail = new Email();
                $sendMail->MailCheckout($data['email'], 'Đơn hàng của bạn đã bị hủy!', '');
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
            }else {
            }
                }
    }
}
