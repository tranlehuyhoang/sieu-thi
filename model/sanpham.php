<?php
require_once 'pdo.php';

function sanpham_insert($name, $img, $price, $old_price, $describe1, $describe2, $bestseller, $hot, $new, $iddm)
{
    $sql = "INSERT INTO product(name, img, price, old_price, describe1, describe2, bestseller, hot, new, iddm) VALUES (?,?,?,?,?,?,?,?,?,?)";
    pdo_execute($sql, $name, $img, $price, $old_price, $describe1, $describe2, $bestseller, $hot, $new, $iddm);
}

function sanpham_update($name, $img, $price, $old_price, $describe1, $describe2, $bestseller, $hot, $new, $iddm, $id)
{
    if ($img != "") {
        $sql = "UPDATE product SET name=?, img=?, price=?, old_price=?, describe1=?, describe2=?, bestseller=?, hot=?, new=?, iddm=? WHERE id=?";
        pdo_execute($sql, $name, $img, $price, $old_price, $describe1, $describe2, $bestseller, $hot, $new, $iddm, $id);
    } else {
        $sql = "UPDATE product SET name=?, price=?, old_price=?, describe1=?, describe2=?, bestseller=?, hot=?, new=?, iddm=? WHERE id=?";
        pdo_execute($sql, $name, $price, $old_price, $describe1, $describe2, $bestseller, $hot, $new, $iddm, $id);
    }
}

function sanpham_delete($id)
{
    $sql = "DELETE FROM product WHERE  id=?";
    pdo_execute($sql, $id);
}

function get_iddm($id)
{
    $sql = "SELECT iddm FROM product WHERE id=?";
    return pdo_query_value($sql, $id);
}
function hien_thi_st($dssp, $sosp)
{
    $tongsp = count($dssp);
    $strang = ceil($tongsp / $sosp);
    $html_strang = "";

    for ($i = 1; $i <= $strang; $i++) {
        $html_strang .= '<li class="pagination__list">
                        <a href="index.php?pg=shop&page=' . $i . '" class="pagination__item pagination__item--current">' . $i . '</a>
                    </li>';
    }
    return $html_strang;
}

function get_dssp($kyw, $iddm, $pg, $sosp)
{
    $begin = ($pg - 1) * $sosp;
    $sql = "SELECT * FROM product WHERE 1";
    if ($iddm > 0) {
        $sql .= " AND iddm=" . $iddm;
    }
    if ($kyw != "") {
        $sql .= " AND name LIKE '%" . $kyw . "%'";
    }
    $sql .= " ORDER BY id ASC LIMIT " . $begin . "," . $sosp;
    return pdo_query($sql);
}

function product_all()
{
    $sql = "SELECT * FROM product ORDER BY id";
    return pdo_query($sql);
}

function get_sp_by_id($id)
{
    $sql = "SELECT * FROM product WHERE id=?";
    return pdo_query_one($sql, $id);
}

function get_dssp_lienquan($iddm, $id, $limi)
{
    $sql = "SELECT * FROM product WHERE $iddm=? AND id<>? ORDER BY view DESC limit  " . $limi;
    return pdo_query($sql, $iddm, $id);
}

function get_best($limi)
{
    $sql = " SELECT * FROM product WHERE bestseller=1 order by id limit " . $limi;
    return pdo_query($sql);
}
function get_new($limi)
{
    $sql = " SELECT * FROM product WHERE new=1 order by id limit " . $limi;
    return pdo_query($sql);
}
function get_hot($limi)
{
    $sql = " SELECT * FROM product WHERE hot=1 order by id limit " . $limi;
    return pdo_query($sql);
}

function showsp($dssp)
{
    $html_dssp = '';
    foreach ($dssp as $sp) {
        extract($sp);
        if ($price > 0) {
            $gia = '<span class="current__price">' . number_format($price, 0, ",", ".") . 'VNĐ</span>';
            $gia_cu = '<span class="old__price">' . number_format($old_price, 0, ",", ".") . 'VNĐ</span>';
        } else {
            $gia = '<span class="current__price">Đang cập nhật</span>';
            $gia_cu = '<span class="product__price"></span> <br>';
        }
        $link = "index.php?pg=product-detail&idpro=" . $id;
        $html_dssp .= '<div class="col mb-30">
                    <div class="product__items ">
                        <div class="product__items--thumbnail">
                            <a class="product__items--link" href="' . $link . '">
                                <img class="product__items--img product__primary--img" src="./uploads/' . $img . '" alt="product-img">
                            </a>
                            <div class="product__badge">
                                
                            </div>
                        </div>
                        <div class="product__items--content">
                            <h3 class="product__items--content__title h4"><a href="' . $link . '">' . $name . '</a></h3>
                            <div class="product__items--price">
                                <span class="current__price">' . $gia . '</span>
                                <span class="price__divided"></span>
                                <span class="old__price">' . $gia_cu . '</span>
                            </div>
                            <ul class="rating product__rating d-flex">
                                <li class="rating__list">
                                    <span class="rating__list--icon">
                                        <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                        <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                        </svg>
                                    </span>
                                </li>
                                <li class="rating__list">
                                    <span class="rating__list--icon">
                                        <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                        <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                        </svg>
                                    </span>
                                </li>
                                <li class="rating__list">
                                    <span class="rating__list--icon">
                                        <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                        <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                        </svg>
                                    </span>
                                </li>
                                <li class="rating__list">
                                    <span class="rating__list--icon">
                                        <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                        <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                        </svg>
                                    </span>
                                </li>
                                <li class="rating__list">
                                    <span class="rating__list--icon">
                                        <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                        <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                        </svg>
                                    </span>
                                </li>

                            </ul>
                            <ul class="product__items--action d-flex">
                                <li class="product__items--action__list">
                                    <form action="index.php?pg=addcart" method="post"> 
                                        
                                        <input type="hidden" name="id" value="' . $id . '">
                                        <input type="hidden" name="name" value="' . $name . '">
                                        <input type="hidden" name="img" value="' . $img . '">
                                        <input type="hidden" name="price" value="' . $price . '">
                                        <input type="hidden" name="amount" value="1">
                                        <button class="product__items--action__btn add__to--cart" type="submit" name="btnaddcart">
                                            <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443" viewBox="0 0 14.706 13.534">
                                                <g transform="translate(0 0)">
                                                <g>
                                                    <path data-name="Path 16787" d="M4.738,472.271h7.814a.434.434,0,0,0,.414-.328l1.723-6.316a.466.466,0,0,0-.071-.4.424.424,0,0,0-.344-.179H3.745L3.437,463.6a.435.435,0,0,0-.421-.353H.431a.451.451,0,0,0,0,.9h2.24c.054.257,1.474,6.946,1.555,7.33a1.36,1.36,0,0,0-.779,1.242,1.326,1.326,0,0,0,1.293,1.354h7.812a.452.452,0,0,0,0-.9H4.74a.451.451,0,0,1,0-.9Zm8.966-6.317-1.477,5.414H5.085l-1.149-5.414Z" transform="translate(0 -463.248)" fill="currentColor"></path>
                                                    <path data-name="Path 16788" d="M5.5,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,5.5,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,6.793,478.352Z" transform="translate(-1.191 -466.622)" fill="currentColor"></path>
                                                    <path data-name="Path 16789" d="M13.273,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,13.273,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,14.566,478.352Z" transform="translate(-2.875 -466.622)" fill="currentColor"></path>
                                                </g>
                                                </g>
                                            </svg>
                                            <span class="add__to--cart__text"> + Thêm vào giỏ hàng</span>
                                        </button>
                                    </form>
                                </li>
                                <li class="product__items--action__list">
                                    <a class="product__items--action__btn" data-open="modal1" href="product-details.html">
                                        <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg"  width="25.51" height="23.443" viewBox="0 0 512 512"><path d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="256" cy="256" r="80" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg>
                                        <span class="visually-hidden">Quick View</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>';
    }
    return $html_dssp;
}

function showsp_slide($dssp)
{
    $html_dssp = '';
    foreach ($dssp as $sp) {
        extract($sp);
        if ($price > 0) {
            $gia = '<span class="current__price">' . number_format($price, 0, ",", ".") . 'VNĐ</span>';
            $gia_cu = '<span class="old__price">' . number_format($old_price, 0, ",", ".") . 'VNĐ</span>';
        } else {
            $gia = '<span class="current__price">Đang cập nhật</span>';
            $gia_cu = '<span class="product__price"></span> <br>';
        }
        $link = "index.php?pg=product-detail&idpro=" . $id;
        $html_dssp .= '<div class="swiper-slide">
                    <div class="product__items ">
                        <div class="product__items--thumbnail">
                            <a class="product__items--link" href="' . $link . '">
                                <img class="product__items--img product__primary--img" src="./uploads/' . $img . '" alt="product-img">
                            </a>
                            <div class="product__badge">
                                
                            </div>
                        </div>
                        <div class="product__items--content">
                            <h3 class="product__items--content__title h4"><a href="' . $link . '">' . $name . '</a></h3>
                            <div class="product__items--price">
                                <span class="current__price">' . $gia . '</span>
                                <span class="price__divided"></span>
                                <span class="old__price">' . $gia_cu . '</span>
                            </div>
                            <ul class="rating product__rating d-flex">
                                <li class="rating__list">
                                    <span class="rating__list--icon">
                                        <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                        <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                        </svg>
                                    </span>
                                </li>
                                <li class="rating__list">
                                    <span class="rating__list--icon">
                                        <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                        <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                        </svg>
                                    </span>
                                </li>
                                <li class="rating__list">
                                    <span class="rating__list--icon">
                                        <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                        <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                        </svg>
                                    </span>
                                </li>
                                <li class="rating__list">
                                    <span class="rating__list--icon">
                                        <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                        <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                        </svg>
                                    </span>
                                </li>
                                <li class="rating__list">
                                    <span class="rating__list--icon">
                                        <svg class="rating__list--icon__svg" xmlns="http://www.w3.org/2000/svg" width="14.105" height="14.732" viewBox="0 0 10.105 9.732">
                                        <path data-name="star - Copy" d="M9.837,3.5,6.73,3.039,5.338.179a.335.335,0,0,0-.571,0L3.375,3.039.268,3.5a.3.3,0,0,0-.178.514L2.347,6.242,1.813,9.4a.314.314,0,0,0,.464.316L5.052,8.232,7.827,9.712A.314.314,0,0,0,8.292,9.4L7.758,6.242l2.257-2.231A.3.3,0,0,0,9.837,3.5Z" transform="translate(0 -0.018)" fill="currentColor"></path>
                                        </svg>
                                    </span>
                                </li>

                            </ul>
                            <ul class="product__items--action d-flex">
                                <li class="product__items--action__list">
                                    <form action="index.php?pg=addcart" method="post"> 
                                        
                                        <input type="hidden" name="id" value="' . $id . '">
                                        <input type="hidden" name="name" value="' . $name . '">
                                        <input type="hidden" name="img" value="' . $img . '">
                                        <input type="hidden" name="price" value="' . $price . '">
                                        <input type="hidden" name="amount" value="1">
                                        <button class="product__items--action__btn add__to--cart" type="submit" name="btnaddcart">
                                            <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443" viewBox="0 0 14.706 13.534">
                                                <g transform="translate(0 0)">
                                                <g>
                                                    <path data-name="Path 16787" d="M4.738,472.271h7.814a.434.434,0,0,0,.414-.328l1.723-6.316a.466.466,0,0,0-.071-.4.424.424,0,0,0-.344-.179H3.745L3.437,463.6a.435.435,0,0,0-.421-.353H.431a.451.451,0,0,0,0,.9h2.24c.054.257,1.474,6.946,1.555,7.33a1.36,1.36,0,0,0-.779,1.242,1.326,1.326,0,0,0,1.293,1.354h7.812a.452.452,0,0,0,0-.9H4.74a.451.451,0,0,1,0-.9Zm8.966-6.317-1.477,5.414H5.085l-1.149-5.414Z" transform="translate(0 -463.248)" fill="currentColor"></path>
                                                    <path data-name="Path 16788" d="M5.5,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,5.5,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,6.793,478.352Z" transform="translate(-1.191 -466.622)" fill="currentColor"></path>
                                                    <path data-name="Path 16789" d="M13.273,478.8a1.294,1.294,0,1,0,1.293-1.353A1.325,1.325,0,0,0,13.273,478.8Zm1.293-.451a.452.452,0,1,1-.431.451A.442.442,0,0,1,14.566,478.352Z" transform="translate(-2.875 -466.622)" fill="currentColor"></path>
                                                </g>
                                                </g>
                                            </svg>
                                            <span class="add__to--cart__text"> + Thêm vào giỏ hàng</span>
                                        </button>
                                    </form>
                                </li>
                                <li class="product__items--action__list">
                                    <a class="product__items--action__btn" data-open="modal1" href="product-details.html">
                                        <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg"  width="25.51" height="23.443" viewBox="0 0 512 512"><path d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="256" cy="256" r="80" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg>
                                        <span class="visually-hidden">Quick View</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>';
    }
    return $html_dssp;
}

//ADMIN

function showsp_admin($dssp)
{
    $html_dssp = '';
    $i = 1;
    foreach ($dssp as $sp) {
        extract($sp);
        if ($price > 0) {
            $gia = '<span>' . number_format($price, 0, ",", ".") . '</span>';
            $gia_cu = '<span>' . number_format($old_price, 0, ",", ".") . '</span>';
        } else {
            $gia = '<span>0</span>';
            $gia_cu = '<span>0</span> <br>';
        }
        if ($bestseller == 1) {
            $bestcheck = 'checked';
        } else {
            $bestcheck = '';
        }
        if ($hot == 1) {
            $hotcheck = 'checked';
        } else {
            $hotcheck = '';
        }
        if ($new == 1) {
            $newcheck = 'checked';
        } else {
            $newcheck = '';
        }
        $html_dssp .= '<article class="itemlist">
                    <div class="row align-items-center">
                        <div class="col-lg-1 col-quantity"> 
                            <span>' . $id . '</span> 
                        </div>
                        <div class="col-lg-2 col-sm-4 col-8 flex-grow-1 col-name">
                            <a class="itemside" href="#">
                                <div class="left">
                                    <img src="' . IMG_PATH_ADMIN . $img . '" class="img-sm img-thumbnail" alt="Item">
                                </div>
                                <div class="info">
                                    <h6 class="mb-0">' . $name . '</h6>
                                </div>
                            </a>
                        </div>
                        <div class="col-lg-1 col-sm-2 col-4 col-price"> 
                            <span>' . $gia . '</span> 
                        </div>
                        <div class="col-lg-1 col-sm-2 col-4 col-old_price">
                            <span><del>' . $gia_cu . '</del></span> 
                        </div>
                        <div class="col-lg-5 col-sm-2 col-4 col-describe">
                            <p>' . $describe1 . '</p>
                        </div>
                        <div class="col-lg-1 col-sm-2 col-4 col-action text-end">
                            <a href="index.php?pg=page-update-product&id=' . $id . '" class="btn btn-sm font-sm rounded btn-brand">
                                <i class="material-icons md-edit"></i>Sửa</a>
                            <a href="index.php?pg=delproduct&id=' . $id . '" class="btn btn-sm font-sm btn-light rounded">
                                <i class="material-icons md-delete_forever"></i>Xóa
                            </a>
                        </div>
                        <input hidden type="checkbox" name="best" ' . $bestcheck . ' class="form-control1">
                        <input hidden type="checkbox" name="new" ' . $newcheck . ' class="form-control1">
                        <input hidden type="checkbox" name="hot" ' . $hotcheck . ' class="form-control1">
                    </div>
                </article>';
        $i++;
    }
    return $html_dssp;
}

function hien_thi_so_trang($productlist, $soluongsp)
{
    $tong_sp = count($productlist);
    $sotrang = ceil($tong_sp / $soluongsp);
    $html_sotrang = "";

    for ($i = 1; $i <= $sotrang; $i++) {
        $html_sotrang .= '<li class="page-item active">
                        <a class="page-link" href="index.php?pg=products-list&page=' . $i . '">' . $i . '</a>
                        </li>';
    }
    return $html_sotrang;
}

function get_dssp_admin($kyw, $iddm, $page, $soluongsp)
{
    $batdau = ($page - 1) * $soluongsp;
    $sql = "SELECT * FROM product WHERE 1";

    if ($iddm > 0) {
        $sql .= " AND iddm=" . $iddm;
    }
    if ($kyw != "") {
        $sql .= " AND name LIKE '%" . $kyw . "%'";
    }

    $sql .= " ORDER BY id ASC LIMIT " . $batdau . "," . $soluongsp;
    return pdo_query($sql);
}
function get_dssp_admins($kyw, $iddm)
{

    $sql = "SELECT * FROM product";

    if ($iddm > 0) {
        $sql .= " WHERE iddm=" . $iddm;
    }
    if ($kyw != "") {
        if ($iddm > 0) {
            $sql .= " AND";
        } else {
            $sql .= " WHERE";
        }
        $sql .= " name LIKE '%" . $kyw . "%'";
    }

    $sql .= " ORDER BY id ASC";

    return pdo_query($sql);
}
function get_dssp_all()
{
    $sql = " SELECT * FROM product ORDER BY id ASC ";
    return pdo_query($sql);
}

function get_img($id)
{
    $sql = "SELECT img FROM product WHERE id=?";
    $getimg = pdo_query_one($sql, $id);

    // Kiểm tra xem có dữ liệu trả về hay không
    if ($getimg !== false && is_array($getimg)) {
        return $getimg['img'];
    } else {
        // Xử lý trường hợp không có dữ liệu
        return 'Ảnh không tồn tại'; // Hoặc giá trị mặc định khác tùy vào yêu cầu của bạn
    }
}
