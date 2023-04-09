<?php

use App\App\Core\Session;
?>

<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>FFruit</p>
                    <h1>Giỏ hàng</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

<!-- cart -->
<div class="cart-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <?php
            if(!empty($data)):
                ?>
                <div class="col-lg-8 col-md-12">
                    <div class="cart-table-wrap">
                        <table class="cart-table">
                            <thead class="cart-table-head">
                            <tr class="table-head-row">
                                <th class="product-remove"></th>
                                <th class="product-image">Product Image</th>
                                <th class="product-name">Name</th>
                                <th class="product-price">Price</th>
                                <th class="product-quantity">Quantity</th>
                                <th class="product-total">Total</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                                foreach ($data as $item):
                                    ?>
                                    <tr class="table-body-row">
                                        <td class="product-remove"><a href="<?= ROOT_URL . 'CartController/deleteCart/'.$item['id'] ?>"><i class="far fa-window-close"></i></a></td>
                                        <td class="product-image"><img src="<?= ROOT_URL . $item['path_image'] ?>" alt="<?= $item['name'] ?>">
                                        </td>
                                        <td class="product-name"><?= $item['name'] ?></td>
                                        <td class="product-price"><?= number_format($item['price']) ?> VND</td>
                                        <td class="product-quantity d-flex justify-content-center align-items-center">
                                            <form action="<?= ROOT_URL . 'CartController/updateCart/'.$item['id'] ?>" method="post">
                                                <input type="number" name="quality" value="<?= $item['quality'] ?>" placeholder="0">
                                            </form>
                                        </td>
                                        <td class="product-total"><?= number_format($item['quality'] * $item['price']) ?> VND</td>
                                    </tr>
                                <?php
                                endforeach;
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="total-section">
                        <table class="total-table">
                            <thead class="total-table-head">
                            <tr class="table-total-row">
                                <th>Tổng tiền</th>
                                <th>Giá</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr class="total-data">
                                <td><strong>Subtotal: </strong></td>
                                <td><?= number_format(Session::totalCart($data)) ?></td>
                            </tr>
                            <tr class="total-data">
                                <td><strong>Total: </strong></td>
                                <td><?= number_format(Session::totalCart($data)) ?></td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="cart-buttons">
                            <a href="<?= ROOT_URL . "CheckoutController/checkOut" ?>" class="boxed-btn black">Đặt hàng</a>
                        </div>
                    </div>

                    <div class="coupon-section">
                        <h3>Áp dụng mã khuyến mãi</h3>
                        <div class="coupon-form-wrap">
                            <form action="index.php">
                                <p><input type="text" placeholder="Coupon"></p>
                                <p><input type="submit" value="Áp dụng"></p>
                            </form>
                        </div>
                    </div>
                </div>
            <?php
            else :
                ?>
                <h1 class="text-center">Giỏ hàng trống !</h1>
            <?php
            endif;
            ?>
        </div>
    </div>
</div>
<!-- end cart -->