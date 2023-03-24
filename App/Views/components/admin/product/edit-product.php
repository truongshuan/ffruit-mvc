<!-- Table Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Sửa</h6>
                <form action="<?php echo ROOT_URL; ?>ProductController/edit/<?= $data['product'][0]['id'] ?>"
                    method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="name" class="form-label">Tên sản phẩm</label>
                        <input type="text" name="name" value="<?= $data['product'][0]['name'] ?>" id="name"
                            class="form-control" placeholder="Tên...">
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Đơn giá</label>
                        <input type="number" value="<?= $data['product'][0]['price'] ?>" name="price" id="price"
                            class="form-control" placeholder="Giá...">
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Danh mục loại</label>
                        <select name="id_category" id="category" class="form-control">
                            <?php foreach ($data['category'] as $item) : ?>
                            <option <?= $item['id'] == $data['product'][0]['id_category'] ? 'selected' : '' ?>
                                value="<?= $item['id'] ?>"><?= $item['title'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Hình ảnh</label>
                        <input type="file" value="" name="image" id="image" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="desc" class="form-label">Mô tả sản phẩm</label>
                        <textarea name="desc" id="desc" cols="30" rows="5" placeholder="Mô tả..."
                            class="form-control"><?= $data['product'][0]['description'] ?></textarea>
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="edit_product" class="btn btn-primary">Sửa</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Table End -->