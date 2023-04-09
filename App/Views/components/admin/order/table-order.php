    <!-- Table Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Quản lý đơn hàng </h6>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Phone</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Địa chỉ</th>
                                    <th scope="col">Ghi chú</th>
                                    <th scope="col">Phương thức</th>
                                    <th scope="col">Thời gian</th>
                                    <th scope="col">Khách hàng</th>
                                    <th scope="col">Trạng thái</th>
                                    <th scope="col">Chỉnh sửa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                if (!empty($data)) :
                                    foreach ($data as $order) :
                                ?>
                                        <tr>
                                            <th><?= $order['id'] ?></th>
                                            <th><?= $order['phone'] ?></th>
                                            <th><?= $order['email'] ?></th>
                                            <th><?= $order['address'] ?></th>
                                            <th><?= $order['note'] ?></th>
                                            <th><?= $order['payment_method'] ?></th>
                                            <th><?php echo date('d-m-Y', strtotime($order['created_at'])) ?></th>
                                            <th><?= $order['fullname'] ?></th>
                                            <th>
                                                <?php
                                                if ($order['status'] == 0) {
                                                    echo 'Đang chờ';
                                                } else if ($order['status'] == 1) {
                                                    echo 'Đã duyệt';
                                                } else {
                                                    echo 'Đã hủy';
                                                }
                                                ?>
                                            </th>
                                            <th>
                                                <a href="<?= ROOT_URL . 'OrderController/edit/' . $order['id'] ?>" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                            </th>
                                        </tr>
                                <?php
                                    endforeach;
                                endif;
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Table End -->