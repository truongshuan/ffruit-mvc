<?php

use App\App\Core\Session;

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Muhamad Nauval Azhar">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="This is a login page template based on Bootstrap 5">
    <title>FFruit - Đặt lại mật khẩu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
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
                            <h1 class="fs-4 card-title fw-bold mb-4 text-center">Đặt mật khẩu mới</h1>
                            <form method="POST" action="<?= ROOT_URL ?>ForgotController/actionChangePass" class="needs-validation">
                                <input type="hidden" name="email" value="<?= isset($_SESSION['emailReset']) ? $_SESSION['emailReset'] : '' ?>">
                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for="password">Mật khẩu mới</label>
                                    <input id="password" type="password" class="form-control" name="password">
                                    <smaill class="text-danger">
                                        <?= Session::getError('password') ?>
                                    </smaill>
                                </div>
                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for="password-confirm">Xác nhận mật khẩu</label>
                                    <input id="password-confirm" type="password" class="form-control" name="confirm">
                                    <smaill class="text-danger">
                                        <?= Session::getError('confirm') ?>
                                    </smaill>
                                </div>
                                <div class="d-flex align-items-center justify-content-center">
                                    <button type="submit" name="reset" class="btn btn-primary">
                                        Đổi mật khẩu
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="js/login.js"></script>
</body>

</html>