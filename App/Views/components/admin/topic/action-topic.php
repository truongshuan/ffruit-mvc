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
                        <label for="name" class="form-label">Chủ đề</label>
                        <input type="text" name="name" value="<?= $data['current']['name'] ?? '' ?>" id="name" class="form-control" placeholder="Chủ đề...">
                        <small class="text-danger">
                            <?= Session::getError('name') ?>
                        </small>
                    </div>
                    <div class="mb-3">
                        <label for="desc" class="form-label">Nội dung</label>
                        <textarea name="body" id="editor" cols="30" rows="5" placeholder="Nội dung.." class="form-control"><?= $data['current']['body'] ?? '' ?></textarea>
                        <small class="text-danger">
                            <?= Session::getError('body') ?>
                        </small>
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="submit" class="btn btn-primary">Thực hiện</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Table End -->