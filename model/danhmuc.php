<?php
require_once 'pdo.php';

// /**
//  * Thêm loại mới
//  * @param String $ten_danhmuc là tên loại
//  * @throws PDOException lỗi thêm mới
//  */
function danhmuc_insert($name,$img){
    $sql = "INSERT INTO category(name,img) VALUES(?,?)";
    pdo_execute($sql, $name, $img);
}
// function danhmuc_delete($id) {
//     // Thực hiện việc xóa danh mục từ bảng category
//     $sql = "DELETE FROM category WHERE id = ?".$id;
//     pdo_execute($sql, [$id]);
// }
// /**
//  * Cập nhật tên loại
//  * @param int $ma_danhmuc là mã loại cần cập nhật
//  * @param String $ten_danhmuc là tên loại mới
//  * @throws PDOException lỗi cập nhật
//  */
function danhmuc_update($name, $img, $id){
    if($img!=""){
        $sql = "UPDATE category SET name=?, img=? WHERE id=?";
        pdo_execute($sql, $name, $img, $id);
    } else{
        $sql = "UPDATE category SET name=? WHERE id=?";
        pdo_execute($sql, $name, $id);
    }
}
// /**
//  * Xóa một hoặc nhiều loại
//  * @param mix $ma_danhmuc là mã loại hoặc mảng mã loại
//  * @throws PDOException lỗi xóa
//  */
function danhmuc_delete($id){
    $sql = "DELETE FROM category WHERE id=?";
    pdo_execute($sql, $id);
}
/**
 * Truy vấn tất cả các loại
 * @return array mảng loại truy vấn được
 * @throws PDOException lỗi truy vấn
 */
function danhmuc_all(){
    $sql = "SELECT * FROM category ORDER BY id";
    return pdo_query($sql);
}

function get_name_dm($id) {
    $sql = "SELECT name FROM category WHERE id=".$id;
    $kq = pdo_query_one($sql);
    return $kq["name"];
}

function get_img_dm($id) {
    $sql = "SELECT img FROM category WHERE id=?";
    $getimg = pdo_query_one($sql, $id);

    // Kiểm tra xem có dữ liệu trả về hay không
    if ($getimg !== false && is_array($getimg)) {
        return $getimg['img'];
    } else {
        // Xử lý trường hợp không có dữ liệu
        return 'Ảnh không tồn tại'; // Hoặc giá trị mặc định khác tùy vào yêu cầu của bạn
    }
}

//ADMIN
function showdm_admin($dsdm, $iddm){
    $html_dm='';
    foreach ($dsdm as $dm) {
        extract($dm);
        if($id==$iddm){
            $se="selected";
        } else{
            $se="";
        } 
        $html_dm.='<option value="'.$id.'" '.$se.'> '.$name.' </option>';
    }
    return $html_dm;
}
