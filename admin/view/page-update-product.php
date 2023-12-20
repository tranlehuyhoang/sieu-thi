<?php 
    if(is_array($sp)&&(count($sp)>0)){
      extract($sp);
      $idupdate=$id;
      $imgpath=IMG_PATH_ADMIN.$img;
      if(is_file($imgpath)){
        $img=$imgpath;
        $old_img=basename($imgpath);
      }else{
        $img="";
      }
      if($bestseller==1){
        $bestcheck='checked'; 
      } else{
        $bestcheck='';
      } 
      if($hot==1){
        $hotcheck='checked'; 
      } else{
        $hotcheck='';
      } 
      if($new==1){
        $newcheck='checked'; 
      } else{
        $newcheck='';
      } 
    }
    $html_categorylist=showdm_admin($categorylist, $iddm);
?>

<section class="content-main">
    <form action="index.php?pg=updateproduct" method="post" enctype="multipart/form-data">
        <div class="row">
            <div class="col-12">
                <div class="content-header">
                    <h2 class="content-title">Cập nhật sản phẩm</h2>
                    <div>
                      <input type="hidden" name="id" value="<?=$idupdate?>">
                      <input type="hidden" name="old_img" value="<?=$old_img?>">
                      <button type="submit" name="updateproduct" class="btn btn-md rounded font-sm hover-up">Cập nhật </button>
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
                            <input type="text" name="name" placeholder="Type here" class="form-control" id="product_name" value="<?=($name!="")?$name:"";?>">
                        </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="mb-4">
                                    <label class="form-label">Giá Gốc</label>
                                    <div class="row gx-2">
                                        <input placeholder="VND" type="number" name="old_price" class="form-control form-input-number" value="<?=($old_price>0)?$old_price:0;?>">
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4">
                                <div class="mb-4">
                                    <label class="form-label">Giá Đã Giảm</label>
                                    <input placeholder="VND" type="number" name="price" class="form-control form-input-number" value="<?=($price>0)?$price:0;?>">
                                </div>
                            </div>
                        </div>
                        <div class="mb-4">
                          <label class="form-label" for="describe1">Mô tả 1</label>
                          <textarea name="describe1" id="describe1" cols="30" rows="10" class="form-control"></textarea>
                          <script>
                            var Describe1="<?=($describe1!="")?$describe1:"";?>"
                            document.getElementById('describe1').value = Describe1;
                          </script>
                        </div>
                        <div class="mb-4">
                          <label class="form-label" for="describe2">Mô tả 2</label>
                          <textarea name="describe2" id="describe2" cols="30" rows="10" class="form-control form-control1"></textarea>  
                          <script>
                            // Sử dụng JavaScript để set giá trị cho thẻ textarea
                            var Describe2="<?=($describe2!="")?$describe2:"";?>"
                            document.getElementById('describe2').value = Describe2;
                          </script>
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Besteller</label>
                            <input type="checkbox" name="bestseller" <?=$bestcheck?> class="form-control1" id="product_bestseller">

                            <label class="form-label">New</label>
                            <input type="checkbox" name="new" <?=$newcheck?> class="form-control1" id="product_new">

                            <label class="form-label">Hot</label>
                            <input type="checkbox" name="hot" <?=$hotcheck?> class="form-control1" id="product_hot">
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
                            <img src="<?=$img?>" alt="">
                            <input class="form-control" type="file" name="img">
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
