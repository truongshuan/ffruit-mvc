<?php
if(!empty($data['posts'])){
?>
    <!-- breadcrumb-section -->
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <p>Tin Tức</p>
                        <h1>Bảng tin</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end breadcrumb section -->

    <!-- latest news -->
    <div class="latest-news mt-150 mb-150">
        <div class="container">
            <div class="row">
                <?php
                foreach($data['posts'] as $item):
                ?>
                <div class="col-lg-4 col-md-6">
                    <div class="single-latest-news">
                        <a href="<?= ROOT_URL . 'ClientPostController/detail/'. $item['id'] ?>">
                            <div class="latest-news-bg news-bg-1" style="background-image: url(<?= ROOT_URL . $item['thumbnail'] ?>);"></div>
                        </a>
                        <div class="news-text-box">
                            <h3><a href="<?= ROOT_URL . 'ClientPostController/detail/'. $item['id'] ?>"><?= $item['title'] ?></a></h3>
                            <p class="blog-meta">
                                <span class="author"><i class="fas fa-user"></i><?= ($data['author']['id'] == $item['id_author']) ? $data['author']['fullname']  : 'Admin' ?></span>
                                <span class="date"><i class="fas fa-calendar"></i><?php echo date('d-m-Y', strtotime($item['created_at'])) ?></span>
                            </p>
                            <p class="excerpt">
                            <div class="cut">
                                <?= $item['content'] ?>
                            </div>
                            </p>
                            <a href="<?= ROOT_URL . 'ClientPostController/detail/'. $item['id'] ?>" class="read-more-btn">read more <i
                                        class="fas fa-angle-right"></i></a>
                        </div>
                    </div>
                </div>
                    <?php
                endforeach;
                    ?>
            </div>
            <div class="row">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <div class="pagination-wrap">
                                <ul>
                                    <li><a href="#">Prev</a></li>
                                    <li><a href="#">1</a></li>
                                    <li><a class="active" href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">Next</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end latest news -->
<?php
}else {
    ?>
    <div class="full-height-section error-section">
        <div class="full-height-tablecell">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 text-center">
                        <div class="error-text">
                            <i class="far fa-sad-cry"></i>
                            <h1>Rất tiếc! Không tìm thấy.</h1>
                            <p>Không có bài viết nào tồn tại</p>
                            <a href="<?= ROOT_URL ?>" class="boxed-btn">Trang chủ</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php
}
?>
