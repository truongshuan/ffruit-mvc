    <!-- Table Start -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Quản lý bài viết</h6>
                    <div class="mt-3 mb-3 text-end">
                        <a href="<?php echo ROOT_URL; ?>PostController/add" class="btn btn-primary">Thêm
                            mới</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Thumbnail</th>
                                    <th scope="col">Tiều đề</th>
                                    <th scope="col">Thời gian</th>
                                    <th scope="col">Tác giả</th>
                                    <th scope="col">Nội dung bài viết</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data['posts'] as $post) : ?>
                                <tr>
                                    <th scope="row"><?= @$post['id'] ?></th>
                                    <td>
                                        <img src="<?php echo ROOT_URL . 'public/upload/post/' . $post['thumbnail'] ?>"
                                            alt="image" width="150px">
                                    </td>
                                    <th scope="row"><?= @$post['title'] ?></th>
                                    <td><?= @$post['created_at'] ?></td>
                                    <td><?= @$data['author'] ?></td>
                                    <td><?= @$post['content'] ?></td>
                                    <td>
                                        <a href="<?= ROOT_URL . 'PostController/edit/' . @$post['id'] ?>"
                                            class="btn btn-primary"><i class="fa fa-edit"></i></a>
                                        <a href="<?= ROOT_URL . 'PostController/delete/' . @$post['id'] ?>"
                                            class="btn btn-danger"><i class="fa fa-trash"></i></a>
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