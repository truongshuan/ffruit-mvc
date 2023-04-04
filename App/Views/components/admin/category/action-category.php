<!-- Table Start -->
<?php

use App\App\Core\Session;

?>

<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Thêm mới</h6>
                <form action="<?= $data['action'] ?? '/' ?>" method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Tiêu đề</label>
                        <input type="text" name="title" value="<?= $data['current']['title'] ?? '' ?>" id="name" class="form-control" placeholder="Nhập mô tả...">
                        <small class="text-danger">
                            <?= Session::getError('title') ?>
                        </small>
                    </div>
                    <div class="mb-3">
                        <label for="desc" class="form-label">Mô tả</label>
                        <textarea name="desc" id="editor" cols="30" rows="5" placeholder="Nhập tiêu đề loại.." class="form-control"><?= $data['current']['description'] ?? '' ?></textarea>
                        <small class="text-danger">
                            <?= Session::getError('description') ?>
                        </small>
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="submit" class="btn btn-primary">Thêm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Table End -->