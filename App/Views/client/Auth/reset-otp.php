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
    <title>FFruit - Mã xác nhận</title>
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
                            <?php if (isset($_SESSION['success']['sendMail'])) {  ?>
                                <div class="alert alert-success text-center">
                                    <?= Session::getSuccess('sendMail') ?>
                                </div>
                            <?php } ?>
                            <?php if (isset($_SESSION['error']['veriOTP'])) :  ?>
                                <div class="alert alert-danger text-center">
                                    <?= Session::getError('veriOTP') ?>
                                </div>
                            <?php endif; ?>
                            <h1 class="fs-4 card-title fw-bold mb-4 text-center">OTP - Quên mật khẩu</h1>
                            <form action="<?= ROOT_URL ?>ForgotController/veriResetOTP" method="POST" class="needs-validation">
                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for="otp">OTP</label>
                                    <input id="otp" type="number" class="form-control" name="otp">
                                    <small class="text-danger">
                                        <?= Session::getError('otp') ?>
                                    </small>
                                </div>
                                <div class="d-flex align-items-center justify-content-center">
                                    <button type="submit" name="checkOTP" class="btn btn-primary mt-3">
                                        Xác nhận
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer py-3 border-0">
                            <div class="text-center">
                                Bạn đã nhớ ra? <a href="<?= ROOT_URL ?>UserController/login" class="text-primary text-decoration-none">Đăng
                                    nhập</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="js/login.js"></script>
</body>

</html>
<?php
if (isset($_SESSION['sendMail'])) {
    unset($_SESSION['sendMail']);
}
if (isset($_SESSION['msg_forgot'])) {
    unset($_SESSION['msg_forgot']);
}
?>