<?php
// cataloglist
$catalog_html = '';
foreach ($cataloglist as $item) {
    extract($item);
    $linkedit = '<a class="dropdown-item" href="index.php?pg=updatedmform&id=' . $id . '">Sửa Danh Mục</a>';
    $linkdel = '<a class="dropdown-item text-danger" href="index.php?pg=deletedm&id=' . $id . '">Xóa</a>';
    $catalog_html .= '<tr>
                            <td>' . $id . '</td>    
                            <td><img  src="uploads/' . $img . '" style="width: 50px; alt="" ></td>
                            <td><b>' . $name . '</b></td>
                            <td class="text-end">
                                <div class="dropdown">
                                    <a href="#" data-bs-toggle="dropdown" class="btn btn-light rounded btn-sm font-sm"> <i class="material-icons md-more_horiz"></i> </a>
                                    <div class="dropdown-menu">
                                        ' . $linkedit . '
                                        ' . $linkdel . '
                                    </div>
                                </div>
                                
                            </td>
                        </tr>';
}

if (is_array($dm) && (count($dm) > 0)) {
    extract($dm);
    $idupdate = $id;
    $imgpath = IMG_PATH_ADMIN . $img;
    if (is_file($imgpath)) {
        $img = $imgpath;
        $old_img = basename($imgpath);
    } else {
        $img = "";
    }
}

?>

<section class="content-main">
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">Danh mục </h2>
            <p>Thêm, chỉnh sửa hoặc xóa một danh mục</p>
        </div>
        <div>
            <input type="text" placeholder="Tìm kiếm danh mục" class="form-control bg-white">
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <div class="row">
                <div class="col-md-3">
                    <form action="index.php?pg=updatedm" method="POST" enctype="multipart/form-data">
                        <div class="mb-4">
                            <label for="product_slug" class="form-label">Tên Danh mục</label>
                            <input name="name" type="text" placeholder="Nhập tên danh mục" class="form-control" id="product_slug" value="<?= ($name != "") ? $name : ""; ?>" />
                        </div>
                        <div class="card mb-4">
                            <div class="card-header">
                                <h4>Hình ảnh</h4>
                            </div>
                            <div class="card-body">
                                <div class="input-upload">
                                    <img src="<?= $img ?>" alt="">
                                    <input name="img" class="form-control" type="file">
                                </div>
                            </div>
                        </div>
                        <div class="d-grid">
                            <input type="hidden" name="id" value="<?= $idupdate ?>">
                            <input type="hidden" name="old_img" value="<?= $old_img ?>">
                            <button type="submit" name="updatedm" class="btn btn-primary">Cập nhật</button>
                        </div>
                    </form>
                </div>
                <div class="col-md-9">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Mã</th>
                                    <th>Ảnh danh mục</th>
                                    <th>Tên Danh Mục</th>
                                    <th class="text-end">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?= $catalog_html ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- .col// -->
            </div>
            <!-- .row // -->
        </div>
        <!-- card body .// -->
    </div>
    <!-- card .// -->
</section>