<!-- Table Start -->
<?php

use App\App\Core\Session;
?>
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Thêm - Sửa Bài viết</h6>
                <form action="<?= ROOT_URL . $data['action'] ?>" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="name" class="form-label">Tiêu đề</label>
                        <input type="text" value="<?= $data['item']['title'] ?? '' ?>" name="title" id="name" class="form-control" placeholder="Tiêu đề...">
                        <div class="small text-danger">
                            <?= Session::getError('title') ?>
                        </div>
                    </div>
                    <div class="mb-2">
                        <label for="desc" class="form-label">Chủ đề </label>
                        <select class="form-select" name="topic_id">
                            <?php
                            if (isset($data['item'])) {
                            ?>
                                <?php foreach ($data['topic'] as $item) : ?>
                                    <option <?= $item['id'] == $data['item']['topic_id'] ? 'selected' : '' ?> value="<?= $item['id'] ?>"><?= $item['name'] ?></option>
                                <?php endforeach; ?>
                            <?php } else {
                            ?>
                                <option selected disabled>--- Chọn chủ đề bài viết ---</option>
                                <?php foreach ($data['topic'] as $item) : ?>
                                    <option value="<?= @$item['id'] ?>"><?= @$item['name'] ?></option>
                                <?php endforeach; ?>
                            <?php } ?>
                        </select>
                        <div class="small text-danger">
                            <?= Session::getError('topic') ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="desc" class="form-label">Nội dung </label>
                        <textarea name="content" id="editor" cols="30" rows="7" placeholder="Nội dung bài viết" class="form-control"><?= $data['item']['content'] ?? '' ?></textarea>
                        <div class="small text-danger">
                            <?= Session::getError('content') ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Thumbnail </label>
                        <input type="file" name="thumbnail" id="name" class="form-control">
                        <div class="small text-danger">
                            <?= Session::getError('size') ?>
                        </div>
                        <div class="small text-danger">
                            <?= Session::getError('extension') ?>
                        </div>
                        <div class="small text-danger">
                            <?= Session::getError('thumbnail') ?>
                        </div>
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