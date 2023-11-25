<?php
    include 'lib/session.php';
    Session::init();
?>

<?php
  header("Cache-Control: no-cache, must-revalidate");
  header("Pragma: no-cache"); 
  header("Expires: Sat, 26 Jul 1997 05:00:00 GMT"); 
  header("Cache-Control: max-age=2592000");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!--=============== FLATICON ===============-->
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.0.0/uicons-regular-straight/css/uicons-regular-straight.css'>

    <!--=============== SWIPER CSS ===============-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />

    <!--=============== CSS ===============-->
    <link rel="stylesheet" href="./../assets/css/styles.css" />

    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <title>Ecommerce Website</title>
</head>

<body onload="loadCart()">
    <!--=============== HEADER ===============-->
    <header class="header">
        <div class="header__top">
            <div class="header__container container">
                <div class="header__contact">
                    <span>(+81) 329 075 354</span>

                    <span><a target="_blank" href="https://www.google.com/">Vị trí cửa hàng</a></span>
                </div>

                <p class="header__alert-news">
                    Ngập tràn ưu đãi - Tiết kiệm với nhiều mã giảm hấp dẫn!
                </p>

                <div class="header__top-action">

                <?php 
                    $login_check = Session::get('customer_login');
                    if(!$login_check) {
                        echo '<a href="./../login.php">Đăng ký/Đăng nhập</a>';
                    } else {
                        echo '<p>Người dùng: '.Session::get("customer_name").'</p>';
                    }
                ?>
                </div>
            </div>
        </div>
