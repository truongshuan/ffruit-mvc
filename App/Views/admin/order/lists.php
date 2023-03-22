    <!-- Table Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Quản lý sản phẩm </h6>
                    <div class="mt-3 mb-3 text-end">
                        <a href="<?php echo ROOT_URL; ?>ProductController/add" class="btn btn-primary">Thêm
                            mới</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Tiều đề</th>
                                    <th scope="col">Mô tả</th>
                                    <th scope="col">Thời gian thêm</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data['category'] as $item) : ?>
                                    <tr>
                                        <th scope="row"><?= @$item['id'] ?></th>
                                        <td><?= @$item['title'] ?></td>
                                        <td><?= @$item['id'] ?></td>
                                        <td><?= @$item['created_at'] ?></td>
                                        <td>
                                            <a href="" class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                            <a href="" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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