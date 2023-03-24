<?php

use App\App\Core\Session;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- title -->
    <title>FFruit</title>
    <!-- favicon -->
    <link rel="shortcut icon" type="image/png" href="<?= ROOT_URL ?>/public/assets/client/img/favicon-v.png">
    <!-- google font -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <!-- fontawesome -->
    <link rel="stylesheet" href="<?= ROOT_URL ?>/public/assets/client/css/all.min.css">
    <!-- bootstrap -->
    <link rel="stylesheet" href="<?= ROOT_URL ?>/public/assets/client/bootstrap/css/bootstrap.min.css">
    <!-- owl carousel -->
    <link rel="stylesheet" href="<?= ROOT_URL ?>/public/assets/client/css/owl.carousel.css">
    <!-- magnific popup -->
    <link rel="stylesheet" href="<?= ROOT_URL ?>/public/assets/client/css/magnific-popup.css">
    <!-- animate css -->
    <link rel="stylesheet" href="<?= ROOT_URL ?>/public/assets/client/css/animate.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
    <!-- mean menu css -->
    <link rel="stylesheet" href="<?= ROOT_URL ?>/public/assets/client/css/meanmenu.min.css">
    <!-- main style -->
    <link rel="stylesheet" href="<?= ROOT_URL ?>/public/assets/client/css/main.css">
    <!-- responsive -->
    <link rel="stylesheet" href="<?= ROOT_URL ?>/public/assets/client/css/responsive.css">

</head>

<body>

    <!--PreLoader-->
    <div class="loader">
        <div class="loader-inner">
            <div class="circle"></div>
        </div>
    </div>
    <!--PreLoader Ends-->

    <!-- header -->
    <div class="top-header-area" id="sticker">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-sm-12 text-center">
                    <div class="main-menu-wrap">
                        <!-- logo -->
                        <div class="site-logo">
                            <a href="<?= ROOT_URL ?>">
                                <h3 class="orange-text">FFruit</h3>
                            </a>
                        </div>
                        <!-- logo -->
                        <!-- menu start -->
                        <nav class="main-menu">
                            <ul>
                                <li class="current-list-item"><a href="<?= ROOT_URL ?>">Trang Chủ</a>
                                    <!-- <ul class="sub-menu">
                                        <li><a href="index.php">Static Home</a></li>
                                        <li><a href="index_2.php">Slider Home</a></li>
                                    </ul> -->
                                </li>
                                <li><a href="about.php">Chúng tôi</a></li>
                                <li><a href="#">Pages</a>
                                    <ul class="sub-menu">
                                        <li><a href="404.php">404 page</a></li>
                                        <li><a href="about.php">About</a></li>
                                        <li><a href="cart.php">Cart</a></li>
                                        <li><a href="checkout.php">Check Out</a></li>
                                        <li><a href="contact.php">Contact</a></li>
                                        <li><a href="news.php">News</a></li>
                                        <li><a href="shop.php">Shop</a></li>
                                    </ul>
                                </li>
                                <li><a href="news.php">Tin tức</a>
                                    <ul class="sub-menu">
                                        <li><a href="news.php">News</a></li>
                                        <li><a href="single-news.php">Single News</a></li>
                                    </ul>
                                </li>
                                <li><a href="contact.php">Liên hệ</a></li>
                                <li><a href="shop.php">Sản phẩm</a>
                                    <ul class="sub-menu">
                                        <li><a href="shop.php">Sản phẩm</a></li>
                                        <li><a href="checkout.php">Check Out</a></li>
                                        <li><a href="single-product.php">Single Product</a></li>
                                        <li><a href="cart.php">Cart</a></li>
                                    </ul>
                                </li>
                                <?php if (isset($_SESSION['username_user'])) { ?>
                                    <li><a href="shop.php"><?php echo $_SESSION['username_user']; ?></a>
                                        <ul class="sub-menu">
                                            <li><a href="<?= ROOT_URL ?>UserController/logout">Đăng xuất</a></li>
                                        </ul>
                                    </li>
                                <?php } else {
                                ?>
                                    <li><a href="shop.php">Tài khoản</a>
                                        <ul class="sub-menu">
                                            <li><a href="<?= ROOT_URL ?>UserController/login">Đăng nhập</a></li>
                                            <li><a href="<?= ROOT_URL ?>RegisterController/register">Đăng ký</a></li>
                                        </ul>
                                    </li>
                                <?php } ?>
                                <li>
                                    <div class="header-icons">
                                        <a class="shopping-cart" href="cart.php"><i class="fas fa-shopping-cart"></i></a>
                                        <a class="mobile-hide search-bar-icon" href="#"><i class="fas fa-search"></i></a>
                                    </div>
                                </li>
                            </ul>
                        </nav>
                        <a class="mobile-show search-bar-icon" href="#"><i class="fas fa-search"></i></a>
                        <div class="mobile-menu"></div>
                        <!-- menu end -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end header -->

    <!-- search area -->
    <div class="search-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <span class="close-btn"><i class="fas fa-window-close"></i></span>
                    <div class="search-bar">
                        <div class="search-bar-tablecell">
                            <h3>Tìm kiếm:</h3>
                            <input type="text" placeholder="Keywords">
                            <button type="submit">Tìm kiếm <i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end search area -->