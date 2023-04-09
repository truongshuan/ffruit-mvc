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
    <title>FFruit - Quên mật khẩu</title>
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
                    <div class="card shawdog-lg">
                        <div class="card-body p-5">
                            <h1 class="fs-4 card-title fw-bold mb-4 text-center">Quên mật khẩu</h1>
                            <form action="<?= ROOT_URL ?>ForgotController/action" method="post" class="needs-validation">
                                <div class="mb-3">
                                    <label class="mb-2 text-muted" for="method">Chọn phương thức khôi phục mật khẩu</label>
                                    <select class="form-select" name="method" aria-label="Default select example"required>
                                        <option value="null" disabled>Phương thức</option>
                                        <option value="mail">Send Mail</option>
                                        <option value="sms">Send SMS</option>
                                    </select>
                                    <div class="mt-3 w-full">
                                        <button class="btn btn-primary" type="submit" name="forgot">Xác nhận</button>
                                    </div>
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
<?php
if (isset($_SESSION['msg_forgot'])) {
    unset($_SESSION['msg_forgot']);
}
?>