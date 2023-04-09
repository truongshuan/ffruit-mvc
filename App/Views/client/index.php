<!-- features list section -->
<div class="list-section pt-80 pb-80">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                <div class="list-box d-flex align-items-center">
                    <div class="list-icon">
                        <i class="fas fa-shipping-fast"></i>
                    </div>
                    <div class="content">
                        <h3>Giao hàng miễn phí</h3>
                        <p>Đơn hàng từ 350k </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                <div class="list-box d-flex align-items-center">
                    <div class="list-icon">
                        <i class="fas fa-phone-volume"></i>
                    </div>
                    <div class="content">
                        <h3>Hỗ trợ 24/7</h3>
                        <p>Hỗ trợ khách hàng 24/7</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                <div class="list-box d-flex justify-content-start align-items-center">
                    <div class="list-icon">
                        <i class="fas fa-sync"></i>
                    </div>
                    <div class="content">
                        <h3>Hoàn trả</h3>
                        <p>Hoàn trả hàng trong 1 tuần!</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6">
                <div class="list-box d-flex justify-content-start align-items-center">
                    <div class="list-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <div class="content">
                        <h3>Bảo hành</h3>
                        <p>Bảo hành trong vòng 2 tháng</p>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
<!-- end features list section -->

<!-- product section -->
<div class="product-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-title">
                    <h3><span class="orange-text">Sản phẩm</span> của chúng tôi</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet
                        beatae optio.</p>
                </div>
            </div>
        </div>

        <div class="row">
<!--            <div class="col-lg-4 col-md-6 text-center">-->
<!--                <div class="single-product-item">-->
<!--                    <div class="product-image">-->
<!--                        <a href="single-product.php"><img src="public/assets/client/img/products/product-img-1.jpg" alt=""></a>-->
<!--                    </div>-->
<!--                    <h3>Strawberry</h3>-->
<!--                    <p class="product-price"><span>Per Kg</span> 85$ </p>-->
<!--                    <div class="d-flex justify-content-center align-items-center">-->
<!--                        <a href="contact.php" class="boxed-btn me-5 mr-3"><i class="fas fa-shopping-cart"></i>-->
<!--                            Thêm</a>-->
<!--                        <a href="contact.php" class="boxed-btn "><i class="fas fa-eye"></i> Chi-->
<!--                            tiết</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-lg-4 col-md-6 text-center">-->
<!--                <div class="single-product-item">-->
<!--                    <div class="product-image">-->
<!--                        <a href="single-product.php"><img src="public/assets/client/img/products/product-img-2.jpg" alt=""></a>-->
<!--                    </div>-->
<!--                    <h3>Berry</h3>-->
<!--                    <p class="product-price"><span>Per Kg</span> 70$ </p>-->
<!--                    <div class="d-flex justify-content-center align-items-center">-->
<!--                        <a href="contact.php" class="boxed-btn me-5 mr-3"><i class="fas fa-shopping-cart"></i>-->
<!--                            Thêm</a>-->
<!--                        <a href="contact.php" class="boxed-btn"><i class="fas fa-eye"></i> Chi-->
<!--                            tiết</a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
            <?php
            if(!empty($data)):
                foreach ($data['products'] as $product):
            ?>
            <div class="col-lg-4 col-md-6 offset-md-3 offset-lg-0 text-center">
                <div class="single-product-item">
                    <div class="product-image">
                        <a href="<?= ROOT_URL . 'ClientProductController/detail/' . $product['id'] ?>"><img src="<?= ROOT_URL . $product['path_image'] ?>" alt="<?= $product['name'] ?>"></a>
                    </div>
                    <h3><?= $product['name'] ?></h3>
                    <p class="product-price"><span><?= $product['title'] ?></span><?= number_format($product['price']) ?> VND </p>
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
        </div>
    </div>
</div>
<!-- end product section -->

<!-- cart banner section -->
<section class="cart-banner pt-100 pb-100">
    <div class="container">
        <div class="row clearfix">
            <!--Image Column-->
            <div class="image-column col-lg-6">
                <div class="image">
                    <!-- <div class="price-box">
							<div class="inner-price">
								<span class="price">
									<strong>30%</strong> <br> off per kg
								</span>
							</div>
						</div> -->
                    <img src="public/assets/client/img/hero-bg-2.jpg" alt="" class="rounded">
                </div>
            </div>
            <!--Content Column-->
            <div class="content-column col-lg-6">
                <h3><span class="orange-text">Deal</span> giá tốt</h3>
                <h4>Trái cây tự nhiên</h4>
                <div class="text">Quisquam minus maiores repudiandae nobis, minima saepe id, fugit ullam similique!
                    Beatae, minima quisquam molestias facere ea. Perspiciatis unde omnis iste natus error sit
                    voluptatem accusant</div>
                <!--Countdown Timer-->
                <!-- <div class="time-counter">
						<div class="time-countdown clearfix" data-countdown="2020/2/01">
							<div class="counter-column">
								<div class="inner"><span class="count">00</span>Days</div>
							</div>
							<div class="counter-column">
								<div class="inner"><span class="count">00</span>Hours</div>
							</div>
							<div class="counter-column">
								<div class="inner"><span class="count">00</span>Mins</div>
							</div>
							<div class="counter-column">
								<div class="inner"><span class="count">00</span>Secs</div>
							</div>
						</div>
					</div> -->
                <a href="about.php" class="cart-btn mt-3">Tìm hiểu</a>
            </div>
        </div>
    </div>
</section>
<!-- end cart banner section -->

<!-- testimonail-section -->
<div class="testimonail-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1 text-center">
                <div class="testimonial-sliders">
                    <div class="single-testimonial-slider">
                        <div class="client-avater">
                            <img src="public/assets/client/img/avaters/admin.jpg" alt="">
                        </div>
                        <div class="client-meta">
                            <h3>Trường Xuân <span>Buyer</span></h3>
                            <p class="testimonial-body">
                                " Thực phẩm tươi và giá rẻ"
                            </p>
                            <div class="last-icon">
                                <i class="fas fa-quote-right"></i>
                            </div>
                        </div>
                    </div>
                    <div class="single-testimonial-slider">
                        <div class="client-avater">
                            <img src="public/assets/client/img/avaters/admin.jpg" alt="">
                        </div>
                        <div class="client-meta">
                            <h3>Trường Xuân <span>Buyer</span></h3>
                            <p class="testimonial-body">
                                " Thực phẩm tươi và giá rẻ"
                            </p>
                            <div class="last-icon">
                                <i class="fas fa-quote-right"></i>
                            </div>
                        </div>
                    </div>
                    <div class="single-testimonial-slider">
                        <div class="client-avater">
                            <img src="public/assets/client/img/avaters/admin.jpg" alt="">
                        </div>
                        <div class="client-meta">
                            <h3>Trường Xuân <span>Buyer</span></h3>
                            <p class="testimonial-body">
                                " Thực phẩm tươi và giá rẻ"
                            </p>
                            <div class="last-icon">
                                <i class="fas fa-quote-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end testimonail-section -->

<!-- advertisement section -->
<div class="abt-section mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                <div class="abt-bg">
                    <a href="https://www.youtube.com/watch?v=Oa2apuOj5R4" class="video-play-btn popup-youtube"><i class="fas fa-play"></i></a>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="abt-text">
                    <p class="top-sub">Ra đời năm 2023</p>
                    <h2>Chúng tôi là <span class="orange-text">FFruit</span></h2>
                    <p>Là nhà phân phối thực phẩm tươi 100% hữu cơ, được viết bởi một sinh viên FPoly</p>
                    <a href="about.php" class="boxed-btn mt-4">Xem thêm</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end advertisement section -->

<!-- shop banner -->
<section class="shop-banner">
    <div class="container">
        <h3>Tháng 5 này! <br> với đợt khuyến mãi lớn <span class="orange-text">Giảm giá</span></h3>
        <div class="sale-percent"><span>Sale! <br> tới</span>50% <span>đơn hàng</span></div>
        <a href="shop.php" class="cart-btn btn-lg">Mua ngay</a>
    </div>
</section>
<!-- end shop banner -->

<!-- latest news -->
<div class="latest-news pt-150 pb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-title">
                    <h3><span class="orange-text">Tin tức</span></h3>
                    <p>Lorem ipsum dolor sit amet, consectetur
                        adipisicing elit. Aliquid, fuga quas itaque eveniet
                        beatae optio.</p>
                </div>
            </div>
        </div>

        <div class="row">
            <?php if(!empty($data)):
                foreach ($data['posts'] as $item):
                ?>
            <div class="col-lg-4 col-md-6">
                <div class="single-latest-news">
                    <a href="<?= ROOT_URL . 'ClientPostController/detail/'. @$item['id'] ?>">
                        <div class="latest-news-bg news-bg-1" style="background-image: url(<?= ROOT_URL . $item['thumbnail'] ?>)"></div>
                    </a>
                    <div class="news-text-box">
                        <h3><a href="<?= ROOT_URL . 'ClientPostController/detail/'. @$item['id'] ?>"><?= $item['title'] ?></a></h3>
                        <p class="blog-meta">
                            <span class="author"><i class="fas fa-user"></i><?= ($data['author']['id'] == $item['id_author']) ? $data['author']['fullname']  : 'Admin' ?></span>
                            <span class="date"><i class="fas fa-calendar"></i><?php echo date('d-m-Y', strtotime($item['created_at'])) ?></span>
                        </p>
                        <p class="excerpt">
                            <div class="cut">
                            <?= $item['content'] ?>
                            </div>
                        </p>
                        <a href="<?= ROOT_URL . 'ClientPostController/detail/'. @$item['id'] ?>" class="read-more-btn">read more <i class="fas fa-angle-right"></i></a>
                    </div>
                </div>
            </div>
            <?php endforeach; endif; ?>
<!--            <div class="col-lg-4 col-md-6">-->
<!--                <div class="single-latest-news">-->
<!--                    <a href="single-news.php">-->
<!--                        <div class="latest-news-bg news-bg-2"></div>-->
<!--                    </a>-->
<!--                    <div class="news-text-box">-->
<!--                        <h3><a href="single-news.php">A man's worth has its season, like tomato.</a></h3>-->
<!--                        <p class="blog-meta">-->
<!--                            <span class="author"><i class="fas fa-user"></i> Admin</span>-->
<!--                            <span class="date"><i class="fas fa-calendar"></i> 27 December, 2019</span>-->
<!--                        </p>-->
<!--                        <p class="excerpt">Vivamus lacus enim, pulvinar vel nulla sed, scelerisque rhoncus nisi.-->
<!--                            Praesent vitae mattis nunc, egestas viverra eros.</p>-->
<!--                        <a href="single-news.php" class="read-more-btn">read more <i class="fas fa-angle-right"></i></a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="col-lg-4 col-md-6 offset-md-3 offset-lg-0">-->
<!--                <div class="single-latest-news">-->
<!--                    <a href="single-news.php">-->
<!--                        <div class="latest-news-bg news-bg-3"></div>-->
<!--                    </a>-->
<!--                    <div class="news-text-box">-->
<!--                        <h3><a href="single-news.php">Good thoughts bear good fresh juicy fruit.</a></h3>-->
<!--                        <p class="blog-meta">-->
<!--                            <span class="author"><i class="fas fa-user"></i> Admin</span>-->
<!--                            <span class="date"><i class="fas fa-calendar"></i> 27 December, 2019</span>-->
<!--                        </p>-->
<!--                        <p class="excerpt">Vivamus lacus enim, pulvinar vel nulla sed, scelerisque rhoncus nisi.-->
<!--                            Praesent vitae mattis nunc, egestas viverra eros.</p>-->
<!--                        <a href="single-news.php" class="read-more-btn">read more <i class="fas fa-angle-right"></i></a>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <a href="news.php" class="boxed-btn">Đọc thêm</a>
            </div>
        </div>
    </div>
</div>
<!-- end latest news -->