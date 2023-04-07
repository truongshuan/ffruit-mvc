<?php
if(!empty($data)){
?>
    <!-- breadcrumb-section -->
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <p>Xem chi tiết</p>
                        <h1>Sản phẩm</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->

    <!-- single product -->
    <div class="single-product mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-md-5">
                    <div class="single-product-img">
                        <img src="<?= ROOT_URL . $data['product'][0]['path_image'] ?>" alt="">
                    </div>
                </div>
                <div class="col-md-7">
                    <div class="single-product-content">
                        <h3><?= $data['product'][0]['name'] ?></h3>
                        <p class="single-product-pricing"><span>KG</span><?= number_format($data['product'][0]['price']) ?>VND</p>
                        <p><?= $data['product'][0]['description'] ?></p>
                        <div class="single-product-form">
                            <form action="#">
                                <input type="number" name="quality" placeholder="0">
                            </form>
                            <a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                                <p><strong>Danh mục: </strong><?= $data['product'][0]['title'] ?></p>
                        </div>
                        <h4>Share:</h4>
                        <ul class="product-share">
                            <li><a href=""><i class="fab fa-facebook-f"></i></a></li>
                            <li><a href=""><i class="fab fa-twitter"></i></a></li>
                            <li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
                            <li><a href=""><i class="fab fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end single product -->

    <!-- more products -->
    <div class="more-products mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">Sản phẩm</span> có liên quan</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet
                            beatae optio.</p>
                    </div>
                </div>
            </div>
            <div class="row">
<!--                <div class="col-lg-4 col-md-6 text-center">-->
<!--                    <div class="single-product-item">-->
<!--                        <div class="product-image">-->
<!--                            <a href="single-product.html"><img src="assets/img/products/product-img-1.jpg" alt=""></a>-->
<!--                        </div>-->
<!--                        <h3>Strawberry</h3>-->
<!--                        <p class="product-price"><span>Per Kg</span> 85$ </p>-->
<!--                        <a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--                <div class="col-lg-4 col-md-6 text-center">-->
<!--                    <div class="single-product-item">-->
<!--                        <div class="product-image">-->
<!--                            <a href="single-product.html"><img src="assets/img/products/product-img-2.jpg" alt=""></a>-->
<!--                        </div>-->
<!--                        <h3>Berry</h3>-->
<!--                        <p class="product-price"><span>Per Kg</span> 70$ </p>-->
<!--                        <a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>-->
<!--                    </div>-->
<!--                </div>-->
                <?php
                if(!empty($data['productSame'])):
                    foreach ($data['productSame'] as $productSame):
                ?>
                <div class="col-lg-4 col-md-6 offset-lg-0 offset-md-3 text-center">
                    <div class="single-product-item">
                        <div class="product-image">
                            <a href="<?= ROOT_URL . 'ClientProductController/detail/' . $productSame['related_id'] ?>"><img src="<?= ROOT_URL . $productSame['path_image'] ?>" alt="<?= $productSame['name'] ?>"></a>
                        </div>
                        <h3><?= $productSame['name'] ?></h3>
                        <p class="product-price"><span><?= $productSame['title'] ?></span><?= number_format($productSame['price']) ?> </p>
                        <div class="d-flex justify-content-center align-items-center">
                            <a href="single-product.php" class="boxed-btn me-5 mr-3"><i class="fas fa-shopping-cart"></i>
                                Thêm</a>
                            <a href="<?= ROOT_URL . 'ClientProductController/detail/' . $productSame['related_id'] ?>" class="boxed-btn "><i class=" fas fa-eye"></i> Chi
                                tiết</a>
                        </div>
                    </div>
                </div>
                        <?php
                    endforeach;
                    endif;
                        ?>
            </div>
        </div>
    </div>
    <!-- end more products -->
<?php
}else {
?>
    <!-- breadcrumb-section -->
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <p>FFruit</p>
                        <h1>404 - Không tìm thấy</h1>
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
                    <div class="col-lg-8 offset-lg-2 text-center">
                        <div class="error-text">
                            <i class="far fa-sad-cry"></i>
                            <h1>Rất tiếc! Không tìm thấy.</h1>
                            <p>Không tìm thấy sản phẩm mà bạn yêu cầu.</p>
                            <a href="<?= ROOT_URL ?>" class="boxed-btn">Trang chủ</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end error section -->
<?php
}
?>
