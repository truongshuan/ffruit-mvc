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
                                    <th scope="col">#</th>
                                    <th scope="col">Khách hàng</th>
                                    <th scope="col">Tên sản phẩm</th>
                                    <th scope="col">Số lượng</th>
                                    <th scope="col">Tổng tiền</th>
                                    <th scope="col">Ngày đặt</th>
                                    <th scope="col">Địa chỉ</th>
                                    <th scope="col">Trạng thái</th>
                                    <th scope="col">Chỉnh sửa</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th>1</th>
                                    <th>Phạm Trường Xuân</th>
                                    <th>Nho</th>
                                    <th>2</th>
                                    <th><?= number_format(25000) . ' đ' ?></th>
                                    <th>24/3/2023</th>
                                    <th>125/2 Hòa Hưng</th>
                                    <th>Đang chờ</th>
                                    <th>
                                        <a href="<?= ROOT_URL . 'OrderController/edit/' . 1 ?>" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                    </th>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Table End -->