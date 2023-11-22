<?php
    include "./inc/header.php";
    include "./inc/navigationbar.php";
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
                    <h3 class="section__title">Login</h3>

                    <form action="" class="form grid">
                        <input type="email" placeholder="Your Email" class="form__input" required>

                        <input type="password" placeholder="Your Password" class="form__input" required>

                        <div class="form__btn">
                            <input type="submit" value="Login" class="btn">
                        </div>
                    </form>
                </div>

                <div class="register">
                    <h3 class="section__title">Create an Account</h3>

                    <form action="" class="form grid">
                        <input type="text" placeholder="Username" class="form__input" required>

                        <input type="email" placeholder="Your Email" class="form__input" required>

                        <input type="password" placeholder="Your Password" class="form__input" required>

                        <input type="password" placeholder="Confirm Password" class="form__input" required>

                        <div class="form__btn">
                            <input type="submit" value="Submit & Register" class="btn">
                        </div>
                    </form>
                </div>
            </div>
        </section>

<?php
    include "./inc/footer.php";
?>