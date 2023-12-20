<?php 
    $iddm="";
    $html_categorylist=showdm_admin($categorylist, $iddm);
?>

<section class="content-main">
    <form action="index.php?pg=addproduct" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-12">
                <div class="content-header">
                    <h2 class="content-title">Thêm sản phẩm mới</h2>
                    <div>
                        <button type="submit" name="addproduct" class="btn btn-md rounded font-sm hover-up">Thêm sản phẩm</button>
                    </div>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>Thông tin sản phẩm</h4>
                    </div>
                    <div class="card-body">
                        <div class="mb-4">
                            <label class="form-label">Tên Sản Phẩm</label>
                            <input type="text" name="name" placeholder="Type here" class="form-control" id="product_name" autocomplete="additional-name" required>
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-4">
                                    <label class="form-label">Giá Gốc</label>
                                    <div class="row gx-2">
                                        <input placeholder="VND" type="number" name="old_price" class="form-control form-input-number" required>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-4">
                                    <label class="form-label">Giá Đã Giảm</label>
                                    <input placeholder="VND" type="number" name="price" class="form-control form-input-number" required>
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="describe1">Mô tả 1</label>
                            <textarea name="describe1" id="describe1" cols="30" rows="10" class="form-control" required></textarea>
                        </div>
                        <div class="mb-4">
                            <label class="form-label" for="describe2">Mô tả 2</label>
                            <textarea name="describe2" id="describe2" cols="30" rows="10" class="form-control form-control1" required></textarea>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Bestseller</label>
                            <input type="checkbox" name="bestseller" class="form-control1" id="product_bestseller">

                            <label class="form-label">New</label>
                            <input type="checkbox" name="new" class="form-control1" id="product_new">

                            <label class="form-label">Hot</label>
                            <input type="checkbox" name="hot" class="form-control1" id="product_hot">
                        </div>
                    </div>
                </div>
                <!-- card end// -->
                <!-- card end// -->
            </div>
            <div class="col-lg-5">
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>Hình ảnh</h4>
                    </div>
                    <div class="card-body">
                        <div class="input-upload">
                            <img src="assets/imgs/theme/upload.svg" alt="">
                            <input class="form-control" type="file" name="img" required>
                        </div>
                    </div>
                </div>
                <!-- card end// -->
                <div class="card mb-4">
                    <div class="card-header">
                        <h4>Danh Mục</h4>
                    </div>
                    <div class="card-body">
                        <div class="row gx-2">
                            <div class="col-sm-6 mb-3">
                                <label class="form-label">Danh Mục</label>
                                <select class="form-select" name="iddm">
                                    <option value=""></option>
                                    <?=$html_categorylist;?>
                                </select>
                            </div>
                        </div>
                        <!-- row.// -->
                    </div>
                </div>
                <!-- card end// -->
            </div>
        </div>
    </form>
</section>
