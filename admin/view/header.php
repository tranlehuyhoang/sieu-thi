<?php
// session_start();
ob_start();

?>

<!DOCTYPE HTML>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <title>Suruchi Dashboard</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:title" content="">
    <meta property="og:type" content="">
    <meta property="og:url" content="">
    <meta property="og:image" content="">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="admin/view/assets/imgs/favicon.ico">
    <!-- Template CSS -->
    <link href="admin/view/assets/css/main.css" rel="stylesheet" type="text/css" />
</head>

<body>
    <div class="screen-overlay"></div>
    <aside class="navbar-aside" id="offcanvas_aside">
        <div class="aside-top">
            <a href="index.php" class="brand-wrap">
                <img src="admin/view/assets/imgs/theme/nav-log.png" class="logo" alt="Suruchi Dashboard">
            </a>
            <div>
                <button class="btn btn-icon btn-aside-minimize"> <i class="text-muted material-icons md-menu_open"></i>
                </button>
            </div>
        </div>
        <nav>
            <ul class="menu-aside">

                <li class="menu-item">
                    <a class="menu-link" href="index.php?pg=products-list"> <i
                            class="icon material-icons md-shopping_bag"></i>
                        <span class="text">Sản Phẩm</span>
                    </a>
                </li>
                <li class="menu-item">
                    <a class="menu-link" href="index.php?pg=categories"><i class="icon material-icons md-category"></i>
                        <span class="text">Danh Mục</span>
                    </a>
                </li>




            </ul>
            <br>
            <br>
        </nav>
    </aside>

    <main class="main-wrap">
        <header class="main-header navbar">
            <div class="col-search">
                <form class="searchform">
                    <div class="input-group">
                        <input list="search_terms" type="text" class="form-control" placeholder="Tìm kiếm">
                        <button class="btn btn-light bg btn-fix" type="button"> <i
                                class="material-icons md-search"></i></button>
                    </div>
                    <datalist id="search_terms">
                        <option value="Products">
                        <option value="New orders">
                    </datalist>
                </form>
            </div>
            <div class="col-nav">
                <button class="btn btn-icon btn-mobile me-auto" data-trigger="#offcanvas_aside"> <i
                        class="material-icons md-apps"></i> </button>
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link btn-icon" href="#">
                            <i class="material-icons md-notifications animation-shake"></i>
                            <span class="badge rounded-pill">0</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn-icon darkmode" href="#"> <i class="material-icons md-nights_stay"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="requestfullscreen nav-link btn-icon"><i
                                class="material-icons md-cast"></i></a>
                    </li>
                    <li class="dropdown nav-item">
                        <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#" id="dropdownLanguage"
                            aria-expanded="false"><i class="material-icons md-public"></i></a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownLanguage">
                            <a class="dropdown-item text-brand" href="#"><img
                                    src="admin/view/assets/imgs/theme/flag-us.png" alt="English">English</a>
                            <a class="dropdown-item" href="#"><img src="admin/view/assets/imgs/theme/flag-fr.png"
                                    alt="Français">Français</a>
                        </div>
                    </li>
                    <li class="dropdown nav-item">
                        <a class="dropdown-toggle" data-bs-toggle="dropdown" href="#" id="dropdownAccount"
                            aria-expanded="false"> <img class="img-xs rounded-circle"
                                src="admin/view/assets/imgs/people/quantri.jpg" alt="User"></a>
                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdownAccount">
                            <a class="dropdown-item" href="#"><i
                                    class="material-icons md-perm_identity"></i><?= $admin["username"]; ?></a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item text-danger" href="logout.php"><i
                                    class="material-icons md-exit_to_app"></i>Đăng xuất</a>
                        </div>
                    </li>
                </ul>
            </div>
        </header>