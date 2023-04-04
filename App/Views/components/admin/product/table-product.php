    <!-- Table Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Quản lý sản phẩm</h6>
                    <div class="mt-3 mb-3 text-end">
                        <a href="<?php echo ROOT_URL; ?>ProductController/add" class="btn btn-primary">Thêm
                            mới</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Ảnh</th>
                                    <th scope="col">Tên sản phẩm</th>
                                    <th scope="col">Đơn giá</th>
                                    <th scope="col">Mô tả</th>
                                    <th scope="col">Loại</th>
                                    <th scope="col">Thời gian thêm</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data['product'] as $item) : ?>
                                    <tr>
                                        <td><?= @$item['id'] ?></td>
                                        <td><img src="<?= ROOT_URL . $item['path_image'] ?>" alt="image" width="100px"></td>
                                        <td><?= @$item['name'] ?></td>
                                        <td><?= number_format($item['price']) . ' VND' ?></td>
                                        <td><?= $item['description'] ?></td>
                                        <td>
                                            <?php
                                            foreach ($data['category'] as $category) {
                                                if ($item['id_category'] == $category['id']) {
                                                    echo $category['title'];
                                                }
                                            }
                                            ?>
                                        </td>
                                        <td><?php echo date('d-m-Y', strtotime($item['created_at'])) ?></td>
                                        <td>
                                            <a href="<?= ROOT_URL . 'ProductController/edit/' . @$item['id'] ?>" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                            <a href=" <?= ROOT_URL . 'ProductController/delete/' . @$item['id'] ?>" class=" btn btn-danger"><i class="fa fa-trash"></i></a>
                                        </td>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Table End -->