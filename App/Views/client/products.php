<!-- breadcrumb-section -->
<div class="breadcrumb-section breadcrumb-bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="breadcrumb-text">
                    <p>FFruit</p>
                    <h1>Shop</h1>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end breadcrumb section -->

<!-- products -->
<div class="product-section mt-150 mb-150">
    <div class="container">

        <div class="row">
            <div class="col-md-12">
                <div class="product-filters">
                    <ul>
                        <?php
                        if(!empty($data['categories'])):
                            ?>
                            <li class="active" data-filter="*">All</li>
                        <?php
                        foreach($data['categories'] as $category):
                        ?>
                        <li  data-filter=".<?= $category['id'] ?>"><?= $category['title'] ?></li>
                        <?php
                            endforeach;
                            endif;
                        ?>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row product-lists">
            <?php
            if(!empty($data['products'])):
                foreach ($data['products'] as $product) :
            ?>
            <div class="col-lg-4 col-md-6 text-center <?= $product['id_cate'] ?>">
                <div class="single-product-item">
                    <div class="product-image">
                        <a href="<?= ROOT_URL . 'ClientProductController/detail/' . $product['id'] ?>"><img src="<?= ROOT_URL . $product['path_image'] ?>" alt="<?= $product['name'] ?>"></a>
                    </div>
                    <h3>Strawberry</h3>
                    <p class="product-price"><span><?= $product['title'] ?></span><?= number_format($product['price']) ?></p>
                    <div class="d-flex justify-content-center align-items-center">
                        <a href="<?= ROOT_URL . 'CartController/addToCart/' . $product['id'] ?>" class="boxed-btn me-5 mr-3"><i class="fas fa-shopping-cart"></i>
                            Thêm</a>
                        <a href="<?= ROOT_URL . 'ClientProductController/detail/' . $product['id'] ?>" class="boxed-btn "><i class=" fas fa-eye"></i> Chi
                            tiết</a>
                    </div>
                </div>
            </div>
            <?php
            endforeach;
            endif;
            ?>
<!--            <div class="col-lg-4 col-md-6 text-center berry">-->
<!--                <div class="single-product-item">-->
<!--                    <div class="product-image">-->
<!--                        <a href="single-product.html"><img src="--><?php //= ROOT_URL ?><!--public/assets/client/img/products/product-img-2.jpg" alt=""></a>-->
<!--                    </div>-->
<!--                    <h3>Berry</h3>-->
<!--                    <p class="product-price"><span>Per Kg</span> 70$ </p>-->
<!--                    <div class="d-flex justify-content-center align-items-center">-->
<!--                        <a href="single-product.php" class="boxed-btn me-5 mr-3"><i class="fas fa-shopping-cart"></i>-->
<!--                            Thêm</a>-->
<!--                        <a href="single-product.php" class="boxed-btn "><i class=" fas fa-eye"></i> Chi-->
<!--                            tiết</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-lg-4 col-md-6 text-center lemon">-->
<!--                <div class="single-product-item">-->
<!--                    <div class="product-image">-->
<!--                        <a href="single-product.html"><img src="--><?php //= ROOT_URL ?><!--public/assets/client/img/products/product-img-3.jpg" alt=""></a>-->
<!--                    </div>-->
<!--                    <h3>Lemon</h3>-->
<!--                    <p class="product-price"><span>Per Kg</span> 35$ </p>-->
<!--                    <div class="d-flex justify-content-center align-items-center">-->
<!--                        <a href="single-product.php" class="boxed-btn me-5 mr-3"><i class="fas fa-shopping-cart"></i>-->
<!--                            Thêm</a>-->
<!--                        <a href="single-product.php" class="boxed-btn "><i class=" fas fa-eye"></i> Chi-->
<!--                            tiết</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-lg-4 col-md-6 text-center">-->
<!--                <div class="single-product-item">-->
<!--                    <div class="product-image">-->
<!--                        <a href="single-product.html"><img src="--><?php //= ROOT_URL ?><!--public/assets/client/img/products/product-img-4.jpg" alt=""></a>-->
<!--                    </div>-->
<!--                    <h3>Avocado</h3>-->
<!--                    <p class="product-price"><span>Per Kg</span> 50$ </p>-->
<!--                    <div class="d-flex justify-content-center align-items-center">-->
<!--                        <a href="single-product.php" class="boxed-btn me-5 mr-3"><i class="fas fa-shopping-cart"></i>-->
<!--                            Thêm</a>-->
<!--                        <a href="single-product.php" class="boxed-btn "><i class=" fas fa-eye"></i> Chi-->
<!--                            tiết</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-lg-4 col-md-6 text-center">-->
<!--                <div class="single-product-item">-->
<!--                    <div class="product-image">-->
<!--                        <a href="single-product.html"><img src="--><?php //= ROOT_URL ?><!--public/assets/client/img/products/product-img-5.jpg" alt=""></a>-->
<!--                    </div>-->
<!--                    <h3>Green Apple</h3>-->
<!--                    <p class="product-price"><span>Per Kg</span> 45$ </p>-->
<!--                    <div class="d-flex justify-content-center align-items-center">-->
<!--                        <a href="single-product.php" class="boxed-btn me-5 mr-3"><i class="fas fa-shopping-cart"></i>-->
<!--                            Thêm</a>-->
<!--                        <a href="single-product.php" class="boxed-btn "><i class=" fas fa-eye"></i> Chi-->
<!--                            tiết</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-lg-4 col-md-6 text-center strawberry">-->
<!--                <div class="single-product-item">-->
<!--                    <div class="product-image">-->
<!--                        <a href="single-product.html"><img src="--><?php //= ROOT_URL ?><!--public/assets/client/img/products/product-img-6.jpg" alt=""></a>-->
<!--                    </div>-->
<!--                    <h3>Strawberry</h3>-->
<!--                    <p class="product-price"><span>Per Kg</span> 80$ </p>-->
<!--                    <div class="d-flex justify-content-center align-items-center">-->
<!--                        <a href="single-product.php" class="boxed-btn me-5 mr-3"><i class="fas fa-shopping-cart"></i>-->
<!--                            Thêm</a>-->
<!--                        <a href="single-product.php" class="boxed-btn "><i class=" fas fa-eye"></i> Chi-->
<!--                            tiết</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
        </div>

        <div class="row">
            <div class="col-lg-12 text-center">
                <div class="pagination-wrap">
                    <ul>
                        <li><a href="#">Prev</a></li>
                        <li><a href="#">1</a></li>
                        <li><a class="active" href="#">2</a></li>
                        <li><a href="#">3</a></li>
                        <li><a href="#">Next</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end products -->