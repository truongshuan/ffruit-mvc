<!-- Table Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Thêm mới</h6>
                <form action="<?php echo ROOT_URL; ?>ProductController/add" method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Tên sản phẩm</label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Tên..." required>
                    </div>
                    <div class="mb-3">
                        <label for="price" class="form-label">Đơn giá</label>
                        <input type="number" name="price" id="price" class="form-control" placeholder="Giá..." required>
                    </div>
                    <div class="mb-3">
                        <label for="category" class="form-label">Danh mục loại</label>
                        <select name="id_category" id="category" required class="form-control">
                            <option value="" selected disabled>--- Chọn loại của sản phẩm ---</option>
                            <option value="<?= 1 ?>">Nho tươi</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="image" class="form-label">Hình ảnh</label>
                        <input type="file" name="image" id="image" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="desc" class="form-label">Mô tả sản phẩm</label>
                        <textarea name="desc" id="desc" cols="30" rows="5" placeholder="Mô tả..." class="form-control"></textarea>
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="add_product" class="btn btn-primary">Thêm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Table End -->