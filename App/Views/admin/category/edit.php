<!-- Table Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Sửa</h6>
                <?php
                foreach ($data['category_id'] as $item) :
                // echo $item['id'];
                endforeach;
                ?>
                <form action="<?php echo ROOT_URL . 'CategoryController/update/' . $item['id'] ?>" method="POST">
                    <div class="mb-3">
                        <label for="name" class="form-label">Tiêu đề</label>
                        <input type=" text" value="<?= $item['title'] ?>" name="title" id="name" class="form-control" placeholder="Nhập mô tả..." required>
                    </div>
                    <div class="mb-3">
                        <label for="desc" class="form-label">Mô tả</label>
                        <textarea name="desc" id="desc" cols="30" rows="5" placeholder="Nhập tiêu đề loại.." class="form-control"><?= $item['description'] ?></textarea>
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="edit_category" class="btn btn-primary">Thêm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Table End -->