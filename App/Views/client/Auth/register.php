<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="author" content="Muhamad Nauval Azhar">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <meta name="description" content="This is a login page template based on Bootstrap 5">
    <title>FFruit - Đăng ký</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
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
                        <div class="card-body p-3">
                            <h1 class="fs-4 card-title fw-bold mb-4 text-center">Đăng ký</h1>
                            <?php if (isset($_SESSION['error'])) :  ?>
                            <div class="alert alert-danger text-center">
                                <?php
                                    echo $_SESSION['error'];
                                    ?>
                            </div>
                            <?php endif; ?>
                            <form action="<?= ROOT_URL ?>RegisterController/actionRegister" method="POST"
                                class="needs-validation">
                                <div class="mb-1">
                                    <label class="mb-2 text-muted" for="email">E-Mail</label>
                                    <input id="email" name="email" type="email" class="form-control" value="" required>
                                </div>
                                <div class="mb-1">
                                    <label class="mb-2 text-muted" for="username">Username</label>
                                    <input id="username" name="username" type="text" class="form-control" value=""
                                        required>
                                </div>
                                <div class="mb-1">
                                    <label class="mb-2 text-muted" for="fullname">Họ tên</label>
                                    <input id="fullname" name="fullname" type="text" class="form-control" value=""
                                        required>
                                </div>
                                <div class="mb-1">
                                    <div class="w-100">
                                        <label class="text-muted" for="password">Mật khẩu</label>
                                    </div>
                                    <input id="password" type="password" class="form-control" name="password" required>
                                </div>
                                <div class="mb-1">
                                    <div class="w-100">
                                        <label class="text-muted" for="password">Xác nhận mật khẩu</label>
                                    </div>
                                    <input id="password" type="password" class="form-control" name="password_confirm"
                                        required>
                                </div>
                                <div class="text-center mt-3">
                                    <button type="submit" name="register" class="btn btn-primary">
                                        Đăng ký
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="card-footer py-2 border-0">
                            <div class="text-center">
                                Bạn đã có tài khoản <a href="<?= ROOT_URL ?>UserController/login"
                                    class="text-primary a">Đăng nhập</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- <script src="<?= ROOT_URL ?>public/assets/client/js/login.js"></script> -->
</body>

</html>
<?php
if (isset($_SESSION['error'])) {
    unset($_SESSION['error']);
}
?>