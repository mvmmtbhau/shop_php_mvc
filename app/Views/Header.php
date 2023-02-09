</html>
<!DOCTYPE html>
<html lang="en-CA">

<head>
    <title><?php echo Session::get('title')?></title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta http-equiv="cleartype" content="on" />
    <link rel="icon" href="template/Default/img/favicon.ico" type="image/x-icon" />
    <meta name="Description" content="" />
    <meta name="Keywords" content="" />
    <!--rieng-->
    <meta property='og:title' name="title" content='' />
    <meta property='og:url' content='' />
    <meta property='og:image' content='' />
    <meta property='og:description' itemprop='description' name="description" content='' />
    <!--rieng-->
    <!--tkw-->
    <meta property="og:type" content="article" />
    <meta property="article:section" content="" />
    <meta property="og:site_name" content='' />
    <meta property="article:publisher" content="" />
    <meta property="article:author" content="" />
    <meta property="fb:app_id" content="1639622432921466" />
    <meta vary="User-Agent" />
    <meta name="geo.region" content="VN-SG" />
    <meta name="geo.placename" content="Ho Chi Minh City" />
    <meta name="geo.position" content="10.823099;106.629664" />
    <meta name="ICBM" content="10.823099, 106.629664" />
    <link rel="icon" type="image/png" href="template/Default/img/favicon.png">
    <!--tkw-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>/app/public/css/owl.carousel.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>/app/public/css/owl.theme.default.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>/app/public/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>/app/public/css/product.css">
    <link rel="stylesheet" type="text/css" href="<?php echo BASE_URL ?>/app/public/css/font-awesome.min.css">

</head>
<body>
    <header>
        <div class="header_top_menu">
            <div class="header_top_menu_all">
                <div class="header_top">
                    <div class="bg_in">
                        <div class="logo">
                            <a href="<?php echo BASE_URL ?>"><img src="<?php echo BASE_URL ?>app/public/images/logo.png" width="250" height="100" alt="logohere.jpeg" /></a>
                        </div>
                        <nav class="menu_top">
                            <form class="search_form" autocomplete="off" method="POST" action="<?php echo BASE_URL ?>index/search">
                                <input class="searchTerm" required name="search" placeholder="Nhập từ cần tìm..." />
                                <button class="searchButton" type="submit">
                                    <i class="fa fa-search" aria-hidden="true"></i>
                                </button>
                            </form>

                        </nav>
                        <div class="cart_wrapper">
                            <div class="cols_50">
                                <div class="hot_line_top">
                                    <span><b>YUMMY SHOP</b></span>
                                    <br />
                                    <span class="red">Kính chào quý khách</span>
                                </div>
                            </div>
                            <div class="cols_50">
                                <div class="hot_line_top">
                                    <span><b>Cảm ơn vì đã ghé thăm</b></span>
                                    <br />
                                    <span class="red"><?php
                                        if(Session::get('customer')){
                                            echo Session::get('customer_name');
                                        } else {
                                            echo 'Who are you?';
                                        }
                                    ?></span>
                                </div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
            </div>
            <div class="btn_menu_search">
                <div class="bg_in">
                    <div class="table_row_search">
                        <div class="menu_top_cate">
                            <div class="">
                                <div class="menu" id="menu_cate">
                                    <div class="menu_left">
                                        <i class="fa fa-bars" aria-hidden="true"></i> Danh mục sản phẩm
                                    </div>
                                    <div class="cate_pro">
                                        <div id='cssmenu_flyout' class="display_destop_menu">
                                            <ul>
                                                <?php
                                                foreach ($category as $key => $cate) {
                                                ?>
                                                    <li class="active has-sub">
                                                        <a href="<?php echo BASE_URL ?>Product/CategoryProduct/<?php echo $cate['category_id'] ?>">
                                                            <span><?php echo $cate['category_name'] ?></span></a>
                                                    </li>
                                                <?php
                                                }
                                                ?>

                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="search_top">
                            <div id='cssmenu'>
                                <ul>
                                    <li class='active'><a href="<?php echo BASE_URL ?>">Trang chủ</a></li>
                                    <li class=''><a href="<?php echo BASE_URL ?>index/info">Giới thiệu</a></li>

                                    <li class=''>
                                        <a href="<?php echo BASE_URL ?>Product/allProduct">Sản phẩm</a>
                                        <ul>
                                            <?php
                                            foreach ($category as $key => $cate) {
                                            ?>
                                                <li><a href="<?php echo BASE_URL ?>Product/CategoryProduct/<?php echo $cate['category_id'] ?>">
                                                        <span><?php echo $cate['category_name'] ?></span></a>
                                                </li>
                                            <?php
                                            }
                                            ?>
                                        </ul>
                                    </li>

                                    <li class=''>
                                        <a href="<?php echo BASE_URL ?>Post/allPost">Tin tức</a>
                                        <ul>
                                            <?php
                                            foreach ($category_post as $key => $cate) {
                                            ?>
                                                <li><a href="<?php echo BASE_URL ?>Post/CategoryPost/<?php echo $cate['category_post_id'] ?>">
                                                        <span><?php echo $cate['category_post_name'] ?></span></a>
                                                </li>
                                            <?php
                                            }
                                            ?>
                                        </ul>
                                    </li>
                                    <li class=''><a href="<?php echo BASE_URL ?>CartController/cart">Giỏ hàng</a></li>
                                    <?php
                                    if (Session::get('customer')) {
                                    ?>
                                        <li class=''><a href="<?php echo BASE_URL?>User/getInfo/<?php 
                                                if(Session::get('customer')) {
                                                    echo Session::get('customer_id');
                                                }
                                                ?>">Tài khoản</a>
                                            <ul>
                                                <li><a href="<?php echo BASE_URL ?>User/getInfo/<?php 
                                                if(Session::get('customer')) {
                                                    echo Session::get('customer_id');
                                                }
                                                ?>">Thông tin</a></li>
                                                <li><a href="<?php echo BASE_URL ?>User/changePassForm/<?php echo Session::get('customer_id')?>">Đổi mật khẩu</a></li>
                                                <li><a href="<?php echo BASE_URL ?>User/signOut">Đăng xuất</a></li>
                                            </ul>
                                        </li>
                                    <?php
                                    } else {
                                    ?>
                                        <li class=''><a href="<?php echo BASE_URL ?>User">Đăng nhập</a></li>
                                    <?php

                                    }
                                    ?>
                                </ul>
                            </div>
                        </div>
                        <div class="clear"></div>
                    </div>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </header>
    <div class="clear"></div>