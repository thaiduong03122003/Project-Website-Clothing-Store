<nav class="nav container">
            <a href="#" class="nav__logo">
                <img src="./assets/img/logo.svg" alt="" class="nav__logo-img">
            </a>

            <div class="nav__menu" id="nav-menu">
                <div class="nav__menu-top">
                    <a href="index.html" class="nav__menu-logo">
                        <img src="assets/img/logo.svg" alt="">
                    </a>

                    <div class="nav__close" id="nav-close">
                        <i class="fi fi-rs-cross-small"></i>
                    </div>
                </div>
                <ul class="nav__list">
                    <li class="nav__item">
                        <a href="./../index.php" class="nav__link active-link">Trang chủ</a>
                    </li>

                    <li class="nav__item">
                        <a href="./../shop.php" class="nav__link">Sản phẩm</a>
                    </li>

                    

                    <li class="nav__item">
                        <a href="./../cart.php" class="nav__link">Giỏ hàng</a>
                    </li>

                    <?php 
                        $login_check = Session::get('customer_login');
                        if($login_check) {
                    ?>
                        <li class="nav__item">
                            <a href="./../accounts.php" class="nav__link">Tài khoản của tôi</a>
                        </li>

                        <li class="nav__item">
                            <p id="customer-logout" onclick="logOut()" class="nav__link">Đăng xuất</p>
                        </li>
                    <?php
                        } 
                    ?>
                </ul>

                <div class="header__search">
                    <input type="text" placeholder="Tìm kiếm sản phẩm..." class="form__input" />

                    <button class="search__btn">
                      <img src="./assets/img/search.png" alt=""/>
                    </button>
                </div>
            </div>

            <!--====== Lớp mờ  ======-->
            <div class="nav__overlay" id="nav-overlay"></div>

            <div class="header__user-actions">
                <a href="./../wishlist.php" class="header__action-btn">
                    <img src="./assets/img/icon-heart.svg" alt="">
                    <span class="count">3</span>
                </a>

                <p class="header__action-btn" id="add-cart-icon">
                    <img src="./assets/img/icon-cart.svg">
                    <span id="count-cart" class="count">0</span>
                </p>

                <div class="header__action-btn nav__toggle" id="nav-toggle">
                    <img src="assets/img/menu-burger.svg" alt="">
                </div>
                <!--===== Menu giỏ hàng =====-->
                <div class="cart__menu">
                    <h2 class="cart__title-menu">Giỏ hàng của bạn</h2>
                    <!-- Thông tin menu giỏ hàng -->
                    <div class="cart__content-menu">
                        <!-- Nội dung của div nằm trong main.js -->
                    </div>

                    <!-- Tổng tiền -->
                    <div class="cart__totals">
                        <div class="cart__total-title">Tổng: </div>
                        <div class="cart__total-price">0 VNĐ</div>
                    </div>
                    <!-- Nút đến giỏ hàng -->
                    <a href="./../cart.php" class="btn cart__total-btn">Chi tiết giỏ hàng</a>
                    <!-- Đóng giỏ hảng -->
                    <i class="fi fi-rs-cross-small" id="cart__close-btn"></i>

                </div>
            </div>

            <a href="#" title="Quay lại đầu trang" id="returnTop" class="return__top">
                <i class="fi fi-rs-angle-up"></i>
            </a>
        </nav>
    </header>