<?php require 'header.php'; ?>

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
                        <li class="active" data-filter="*">All</li>
                        <li data-filter=".strawberry">Strawberry</li>
                        <li data-filter=".berry">Berry</li>
                        <li data-filter=".lemon">Lemon</li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="row product-lists">
            <div class="col-lg-4 col-md-6 text-center strawberry">
                <div class="single-product-item">
                    <div class="product-image">
                        <a href="single-product.html"><img src="assets/img/products/product-img-1.jpg" alt=""></a>
                    </div>
                    <h3>Strawberry</h3>
                    <p class="product-price"><span>Per Kg</span> 85$ </p>
                    <div class="d-flex justify-content-center align-items-center">
                        <a href="single-product.php" class="boxed-btn me-5 mr-3"><i class="fas fa-shopping-cart"></i>
                            Thêm</a>
                        <a href="single-product.php" class="boxed-btn "><i class=" fas fa-eye"></i> Chi
                            tiết</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 text-center berry">
                <div class="single-product-item">
                    <div class="product-image">
                        <a href="single-product.html"><img src="assets/img/products/product-img-2.jpg" alt=""></a>
                    </div>
                    <h3>Berry</h3>
                    <p class="product-price"><span>Per Kg</span> 70$ </p>
                    <div class="d-flex justify-content-center align-items-center">
                        <a href="single-product.php" class="boxed-btn me-5 mr-3"><i class="fas fa-shopping-cart"></i>
                            Thêm</a>
                        <a href="single-product.php" class="boxed-btn "><i class=" fas fa-eye"></i> Chi
                            tiết</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 text-center lemon">
                <div class="single-product-item">
                    <div class="product-image">
                        <a href="single-product.html"><img src="assets/img/products/product-img-3.jpg" alt=""></a>
                    </div>
                    <h3>Lemon</h3>
                    <p class="product-price"><span>Per Kg</span> 35$ </p>
                    <div class="d-flex justify-content-center align-items-center">
                        <a href="single-product.php" class="boxed-btn me-5 mr-3"><i class="fas fa-shopping-cart"></i>
                            Thêm</a>
                        <a href="single-product.php" class="boxed-btn "><i class=" fas fa-eye"></i> Chi
                            tiết</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 text-center">
                <div class="single-product-item">
                    <div class="product-image">
                        <a href="single-product.html"><img src="assets/img/products/product-img-4.jpg" alt=""></a>
                    </div>
                    <h3>Avocado</h3>
                    <p class="product-price"><span>Per Kg</span> 50$ </p>
                    <div class="d-flex justify-content-center align-items-center">
                        <a href="single-product.php" class="boxed-btn me-5 mr-3"><i class="fas fa-shopping-cart"></i>
                            Thêm</a>
                        <a href="single-product.php" class="boxed-btn "><i class=" fas fa-eye"></i> Chi
                            tiết</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 text-center">
                <div class="single-product-item">
                    <div class="product-image">
                        <a href="single-product.html"><img src="assets/img/products/product-img-5.jpg" alt=""></a>
                    </div>
                    <h3>Green Apple</h3>
                    <p class="product-price"><span>Per Kg</span> 45$ </p>
                    <div class="d-flex justify-content-center align-items-center">
                        <a href="single-product.php" class="boxed-btn me-5 mr-3"><i class="fas fa-shopping-cart"></i>
                            Thêm</a>
                        <a href="single-product.php" class="boxed-btn "><i class=" fas fa-eye"></i> Chi
                            tiết</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 text-center strawberry">
                <div class="single-product-item">
                    <div class="product-image">
                        <a href="single-product.html"><img src="assets/img/products/product-img-6.jpg" alt=""></a>
                    </div>
                    <h3>Strawberry</h3>
                    <p class="product-price"><span>Per Kg</span> 80$ </p>
                    <div class="d-flex justify-content-center align-items-center">
                        <a href="single-product.php" class="boxed-btn me-5 mr-3"><i class="fas fa-shopping-cart"></i>
                            Thêm</a>
                        <a href="single-product.php" class="boxed-btn "><i class=" fas fa-eye"></i> Chi
                            tiết</a>
                    </div>
                </div>
            </div>
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

<?php require 'footer.php'; ?>