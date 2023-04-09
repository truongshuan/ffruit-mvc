<!-- breadcrumb-section -->
<?php

use App\App\Core\Session;
?>
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>FFruit</p>
                    <h1>Đặt hàng</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

<!-- check out section -->
<div class="checkout-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
                <div class="checkout-accordion-wrap">
                    <div class="accordion" id="accordionExample">
                        <div class="card single-accordion">
                            <div class="card-header" id="headingOne">
                                <h5 class="mb-0">
                                    <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                        Thông tin đặt hàng
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                <div class="card-body">
                                    <div class="billing-address-form">
                                        <form action="<?= ROOT_URL . 'CheckoutController/checkoutAction' ?>" method="post">
<!--                                            <p><input type="text" placeholder="Name"></p>-->
                                            <p><input type="email" required name="email" placeholder="Email"></p>
                                            <p><input type="text"  required name="address" placeholder="Address"></p>
                                            <p><input type="tel"  required name="phone" placeholder="Phone"></p>
                                            <p><textarea name="note" required id="bill" cols="30" rows="10" placeholder="Say Something"></textarea></p>
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="cod" checked>
                                                <label class="form-check-label" for="exampleRadios1">
                                                    Ship COD
                                                </label>
                                            </div>
                                            <div class="form-check mt-2 mb-3">
                                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="paypal">
                                                <label class="form-check-label" for="exampleRadios2">
                                                    <img src="https://upload.wikimedia.org/wikipedia/commons/3/39/PayPal_logo.svg" alt="paypal" width="80px">
                                                </label>
                                            </div>
                                            <div class="form-check mt-2 mb-2">
                                                <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="vnpay">
                                                <label class="form-check-label" for="exampleRadios3">
                                                    <img src="https://cdn.haitrieu.com/wp-content/uploads/2022/10/Logo-VNPAY-QR-1.png" alt="vnpay" width="80px">
                                                </label>
                                            </div>
                                            <button class="btn btn-warning" name="checkout">Đặt hàng</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
<!--                        <div class="card single-accordion">-->
<!--                            <div class="card-header" id="headingTwo">-->
<!--                                <h5 class="mb-0">-->
<!--                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">-->
<!--                                        Thông tin địa chỉ-->
<!--                                    </button>-->
<!--                                </h5>-->
<!--                            </div>-->
<!--                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">-->
<!--                                <div class="card-body">-->
<!--                                    <div class="shipping-address-form">-->
<!--                                        <p>Your shipping address form is here.</p>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="card single-accordion">-->
<!--                            <div class="card-header" id="headingThree">-->
<!--                                <h5 class="mb-0">-->
<!--                                    <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">-->
<!--                                        Card Details-->
<!--                                    </button>-->
<!--                                </h5>-->
<!--                            </div>-->
<!--                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">-->
<!--                                <div class="card-body">-->
<!--                                    <div class="card-details">-->
<!--                                        <p>Chi tiết đơn hàng</p>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                            </div>-->
<!--                        </div>-->
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="order-details-wrap">
                    <table class="order-details">
                        <thead>
                            <tr>
                                <th>Chi tiết đơn hàng của bạn</th>
                                <th>Giá</th>
                            </tr>
                        </thead>
                        <tbody class="order-details-body">
                            <tr>
                                <td>Product</td>
                                <td>Total</td>
                            </tr>
                            <?php
                            foreach ($data as $item):
                            ?>
                            <tr>
                                <td><?= $item['name'] ?></td>
                                <td><?= number_format($item['quality'] * $item['price']) ?></td>
                            </tr>
                            <?php
                            endforeach;
                            ?>
                        </tbody>
                        <tbody class="checkout-details">
                            <tr>
                                <td>Subtotal</td>
                                <td><?= number_format(Session::totalCart($data)) ?></td>
                            </tr>
                            <tr>
                                <td>Total</td>
                                <td><?= number_format(Session::totalCart($data)) ?></td>
                            </tr>
                        </tbody>
                    </table>
<!--                    <a href="#" class="boxed-btn">Đặt hàng</a>-->
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end check out section -->