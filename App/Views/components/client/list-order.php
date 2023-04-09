
<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>FFruit</p>
                    <h1>Danh sách đơn hàng</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->
<!-- error section -->
<div class="full-height-section error-section">
    <div class="full-height-tablecell">
        <div class="container">
            <div class="row">
                <h3 class="mt-3 mb-3">Bảng chi tiết</h3>
                <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Email</th>
                        <th scope="col">Địa chỉ</th>
                        <th scope="col">Ngày đặt hàng</th>
                        <th scope="col">Phương thức thanh toán</th>
                        <th scope="col">Xem</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                    if(!empty($data)):
                    foreach ($data as $item):
                    ?>
                    <tr>
                        <th scope="row"><?= $item['id']  ?></th>
                        <td><?= $item['email']  ?></td>
                        <td><?= $item['address']  ?></td>
                        <td><?php echo date('d-m-Y', strtotime($item['created_at'])) ?></td>
                        <td><?= $item['payment_method']  ?></td>
                        <td>
                            <a href="" class="btn-warning btn">Chi tiết</a>
                        </td>
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
<!-- end error section -->
