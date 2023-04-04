<!-- Table Start -->
<?php

use App\App\Core\Session;

?>
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Thêm mới</h6>
                <form action="<?= ROOT_URL . $data['action'] ?>" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="name" class="form-label">Tên sản phẩm</label>
                        <input type="text" value="<?= $data['product']['name'] ?? '' ?>" name="name" id="name" class="form-control" placeholder="Tên...">
                        <small class="text-danger">
                            <?= Session::getError('name') ?>
                        </small>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Đơn giá</label>
                        <input type="number" value="<?= $data['product']['price'] ?? '' ?>" name="price" id="price" class="form-control" placeholder="Giá.">
                        <small class="text-danger">
                            <?= Session::getError('price') ?>
                        </small>
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Danh mục loại</label>
                        <select name="id_category" id="category" class="form-control">
                            <?php
                            if (isset($data['product'])) {
                            ?>
                                <?php foreach ($data['category'] as $item) : ?>
                                    <option <?= $item['id'] == $data['product']['id_category'] ? 'selected' : '' ?> value="<?= $item['id'] ?>"><?= $item['title'] ?></option>
                                <?php endforeach; ?>
                            <?php } else {
                            ?>
                                <option value="" selected disabled>--- Chọn loại của sản phẩm ---</option>
                                <?php foreach ($data['category'] as $item) : ?>
                                    <option value="<?= @$item['id'] ?>"><?= @$item['title'] ?></option>
                                <?php endforeach; ?>
                            <?php } ?>
                        </select>
                        <small class="text-danger">
                            <?= Session::getError('category') ?>
                        </small>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Hình ảnh</label>
                        <input type="file" name="image" id="image" class="form-control">
                        <small class="text-danger">
                            <?= Session::getError('size') ?>
                        </small>
                        <small class="text-danger">
                            <?= Session::getError('file') ?>
                        </small>
                        <small class="text-danger">
                            <?= Session::getError('extension') ?>
                        </small>
                    </div>
                    <div class="mb-3">
                        <label for="desc" class="form-label">Mô tả sản phẩm</label>
                        <textarea name="desc" id="editor" cols="30" rows="5" placeholder="Mô tả..." class="form-control"><?= $data['product']['description']  ?? '' ?></textarea>
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