<?php
    include "./inc/header.php";
    include "./inc/navigationbar.php";
?>

<?php
	$login_check = Session::get('customer_login');
	if($login_check) {
        exit();
	}
?>
    <!--=============== MAIN ===============-->
    <main class="main">
        <!--=============== BREADCRUMB ===============-->
        <section class="breadcrumb">
            <ul class="breadcrumb__list flex container">
                <li><a href="index.html" class="breadcrumb__link">Home</a></li>
                <li>
                    <span class="breadcrumb__link">></span>
                </li>
                <li>
                    <span class="breadcrumb__link">Login / Register</span>
                </li>
            </ul>
        </section>

        <!--=============== LOGIN-REGISTER ===============-->
        <section class="login-register section--lg">
            <div class="login-register__container container grid">
                <div class="login">
                    <h3 class="section__title">Đăng nhập</h3>

                    <form action="" class="form grid">
                        <input id="lo-email" type="email" placeholder="Nhập Email của bạn" class="form__input">

                        <input id="lo-password" type="password" placeholder="Nhập mật khẩu" class="form__input">

                        <div class="form__btn">
                            <input onclick="loginCheck()" type="button" value="Đăng nhập" class="btn">
                        </div>
                    </form>
                </div>

                <div class="register">
                    <h3 class="section__title">Bạn chưa có tài khoản? Đăng ký ngay</h3>

                    <form action="" class="form grid">
                        <div class="grid__2-cols">
                            <input id="re-lastname" type="text" placeholder="Họ" class="form__input">
                            <input id="re-firstname" type="text" placeholder="Tên" class="form__input">
                        </div>

                        <input id="re-email" type="email" placeholder="Email" class="form__input">

                        <input id="re-phone" type="tel" placeholder="Số điện thoại" class="form__input">

                        <input id="re-password" type="password" placeholder="Mật khẩu" class="form__input">

                        <input id="re-repassword" type="password" placeholder="Nhập lại mật khẩu" class="form__input">

                        <label class="confirm__rules" for="confirm-term"><input type="checkbox" name="" id="confirm-term" required> Tôi đồng ý với các điều khoản (<a target="_blank" href="http://google.com">Xem điều khoản</a>)</label>

                        <div class="form__btn">
                            <input onclick="registerCheck()" type="button" value="Đăng ký" class="btn">
                        </div>
                    </form>
                </div>
            </div>
        </section>
<?php
    include "./inc/footer.php";
?>