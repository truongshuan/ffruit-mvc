<!-- Table Start -->
<?php

use App\App\Core\Session;
?>
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Chỉnh sửa trạng thái đơn hàng</h6>
                <form action="#" method="POST" enctype="multipart/form-data">
                    <div class="mb-2">
                        <label for="desc" class="form-label">Trạng thái</label>
                        <select class="form-select" name="status">
                            <option value="0" <?= $data['status'] == 0 ? 'selected' : '' ?> >Đang chờ</option>
                            <option value="1" <?= $data['status'] == 1 ? 'selected' : '' ?> >Duyệt </option>
                            <option value="2" <?= $data['status'] == 2 ? 'selected' : '' ?> >Hủy</option>
                        </select>
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