<?php

use App\App\Core\Session;

if (isset($_COOKIE['emailUser']) && isset($_COOKIE['passwordUser'])) {
    $emailVal = $_COOKIE['emailUser'];
    $passwordVal = $_COOKIE['passwordUser'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Muhamad Nauval Azhar">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="This is a login page template based on Bootstrap 5">
    <title>FFruit - Đăng nhập</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <style>
        .a {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <section class="h-100">
        <div class="container h-100">
            <div class="row justify-content-sm-center h-100">
                <div class="col-xxl-4 col-xl-5 col-lg-5 col-md-7 col-sm-9">
                    <div class="text-center my-5">
                        <img src="<?= ROOT_URL ?>public/assets/client/img/favicon-v.png" alt="logo" width="100">
                    </div>
                    <div class="card shadow-lg">
                        <div class="card-body p-5">
                            <h1 class="fs-4 card-title fw-bold  text-center">Đăng nhập</h1>
                            <?php if (isset($_SESSION['error']['error_login'])) :  ?>
                                <div class="alert alert-danger text-center">
                                    <?= Session::getError('error_login') ?>
                                </div>
                            <?php endif; ?>
                            <form action="<?= ROOT_URL ?>UserController/action" method="POST" class="needs-validation">
                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for="email">E-Mail</label>
                                    <input id="email" name="email" value="<?= isset($emailVal) ? $emailVal : '' ?>" type="text" class="form-control" name="email">
                                    <samll class="text-danger">
                                        <?= Session::getError('email') ?>
                                    </samll>
                                </div>
                                <div class="mb-3">
                                    <div class="mb-2 w-100">
                                        <label class="text-muted" for="password">Mật khẩu</label>
                                        <a href="<?= ROOT_URL ?>ForgotController/forgot" class="float-end a text-decoration-none">
                                            Quên mật khẩu?
                                        </a>
                                    </div>
                                    <input id="password" value="<?= isset($passwordVal) ? $passwordVal : '' ?>" type="password" class="form-control" name="password">
                                    <samll class="text-danger">
                                        <?= Session::getError('password') ?>
                                    </samll>
                                </div>
                                <div class="d-flex align-items-center">
                                    <div class="form-check">
                                        <input type="checkbox" name="remember" id="remember" class="form-check-input">
                                        <label for="remember" class="form-check-label">Ghi nhớ tôi</label>
                                    </div>
                                </div>
                                <div class="text-center mt-2">
                                    <button type="submit" name="login" class="btn btn-primary ">
                                        Đăng nhập
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer py-2 border-0">
                            <div class="text-center">
                                Bạn chưa có tài khoản? <a href="<?= ROOT_URL ?>RegisterController/register" class="text-primary a">Đăng ký</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="<?= ROOT_URL ?>public/assets/client/js/login.js"></script>
</body>

</html>