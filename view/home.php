<?php
$revenue = 0;
$count_order = 0;
$total_products = 0;
$total_users = 0;
foreach ($orderlist as $order) {
    if ($order['status'] == 4) {
        $revenue += $order['total'];
    }
    if ($order['status'] == 1 || $order['status'] == 2) {
        $count_order++;
    }
}
$html_order = '';
foreach ($orderlimit as $item) {
    if ($item['status'] == 1) $tt = '<span class="badge rounded-pill alert-warning">Pending</span>';
    if ($item['status'] == 2) $tt = '<span class="badge rounded-pill alert-success">Confirm</span>';
    if ($item['status'] == 3) $tt = '<span class="badge rounded-pill alert-success">Delivering</span>';
    if ($item['status'] == 4) $tt = '<span class="badge rounded-pill alert-success">Complete</span>';
    if ($item['status'] == 5) $tt = '<span class="badge rounded-pill alert-warning">Delivery failed</span>';
    if ($item['status'] == 6) $tt = '<span class="badge rounded-pill alert-danger">Cancelled</span>';
    $html_order .= '<tr>
                        <td width="20%">#' . $item['mahd'] . '</td>
                        <td width="30%"><b>' . $item['nguoidat_ten'] . '</b></td>
                        <td width="20%">' . number_format($item['tongthanhtoan'], 0, ",", ".") . 'VNĐ</td>
                        <td>' . $tt . '</td>
                        <td class="text-end">' . $item['date'] . '</td>
                    </tr> ';
}

foreach ($count_product as $item) {
    $total_products += 1;
}

foreach ($count_user as $item) {
    $total_users += 1;
}

$html_userlist = '';
foreach ($userlist as $item) {
    extract($item);
    $html_userlist .= '<tr>
                            <td width="25%">
                                <a href="#" class="itemside">
                                    <div class="left">
                                        <img src="uploads/' . $img . '" class="img-sm img-avatar" alt="Userpic">
                                    </div>
                                    <div class="info pl-3">
                                        <h6 class="mb-0 title">' . $username . '</h6>
                                        <small class="text-muted">' . $name . '</small>
                                        <small class="text-muted">Seller ID: #' . $id . '</small>
                                    </div>
                                </a>
                            </td>
                            <td>
                                <a href="mailto:' . $email . '" class="__cf_email__">' . $email . '</a>
                            </td>
                            <td><span class="badge rounded-pill alert-success">' . $sdt . '</span></td>
                            <td width="30%">' . $address . '</td>
                        </tr>';
}
?>

<section class="content-main">
    <div class="content-header">
        <div>
            <h2 class="content-title card-title">Dashboard </h2>
            <p>Toàn bộ dữ liệu về doanh nghiệp của bạn ở đây</p>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-3">
            <div class="card card-body mb-4">
                <article class="icontext">
                    <span class="icon icon-sm rounded-circle bg-primary-light"><i class="text-primary material-icons md-monetization_on"></i></span>
                    <div class="text">
                        <h6 class="mb-1 card-title">Doanh Thu</h6>
                        <span><?= number_format($revenue, 0, ",", ".") ?> VNĐ</span>
                        <span class="text-sm">
                            Phí vận chuyển không được bao gồm
                        </span>
                    </div>
                </article>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card card-body mb-4">
                <article class="icontext">
                    <span class="icon icon-sm rounded-circle bg-success-light"><i class="text-success material-icons md-local_shipping"></i></span>
                    <div class="text">
                        <h6 class="mb-1 card-title">Đơn Hàng</h6> <span><?= $count_order ?></span>
                        <span class="text-sm">
                            Không bao gồm các đơn hàng đang vận chuyển
                        </span>
                    </div>
                </article>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card card-body mb-4">
                <article class="icontext">
                    <span class="icon icon-sm rounded-circle bg-warning-light"><i class="text-warning material-icons md-qr_code"></i></span>
                    <div class="text">
                        <h6 class="mb-1 card-title">Các sản phẩm</h6> <span><?= $total_products ?></span>
                        <span class="text-sm">
                            Trong 3 danh mục
                        </span>
                    </div>
                </article>
            </div>
        </div>
        <div class="col-lg-3">
            <div class="card card-body mb-4">
                <article class="icontext">
                    <span class="icon icon-sm rounded-circle bg-info-light"><i class="text-info material-icons md-person"></i></span>
                    <div class="text">
                        <h6 class="mb-1 card-title">Số người dùng</h6> <span><?= $total_users ?></span>
                    </div>
                </article>
            </div>
        </div>
    </div>
    <div class="card mb-4">
        <header class="card-header">
            <h4 class="card-title">Người dùng mới </h4>
        </header>
        <!-- card-header end// -->
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>Tài Khoản</th>
                            <th>Email</th>
                            <th>SDT</th>
                            <th>Địa Chỉ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?= $html_userlist; ?>
                    </tbody>
                </table>
                <!-- table-responsive.// -->
            </div>
        </div>
        <!-- card-body end// -->
    </div>
    <div class="card mb-4">
        <header class="card-header">
            <h4 class="card-title">Đơn hàng mới nhất</h4>
        </header>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên Khách Hàng</th>
                            <th>Tổng Tiền</th>
                            <th>Trạng Thái</th>
                            <th class="text-end">Ngày Đặt Hàng</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?= $html_order; ?>
                    </tbody>
                </table>
            </div>
            <!-- table-responsive //end -->
        </div>
    </div>
</section>