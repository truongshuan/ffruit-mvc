<!-- Table Start -->
<div class="container-fluid pt-4 px-4">
    <div class="row g-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h6 class="mb-4">Sửa bài viết</h6>
                <form action="<?php echo ROOT_URL; ?>PostController/edit/<?= $data['post'][0]['id'] ?>" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="name" class="form-label">Tiêu đề</label>
                        <input type="text" name="title" value="<?= $data['post'][0]['title'] ?>" id="name" class="form-control" placeholder="Tiêu đề...">
                    </div>
                    <div class="mb-3">
                        <label for="name" class="form-label">Banner</label>
                        <input type="file" name="thumbnail" id="name" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="desc" class="form-label">Nội dung </label>
                        <textarea name="content" id="desc" cols="30" rows="7" placeholder="Nội dung bài viết" class="form-control"><?= $data['post'][0]['content'] ?></textarea>
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="edit_post" class="btn btn-primary">Thêm</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Table End -->