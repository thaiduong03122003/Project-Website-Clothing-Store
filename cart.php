<?php
    include "./inc/header.php";
    include "./inc/navigationbar.php";
?>

    <!--=============== MAIN ===============-->
    <main class="main">
        <!--=============== BREADCRUMB ===============-->
        <section class="breadcrumb">
            <ul class="breadcrumb__list flex container">
                <li><a href="index.php" class="breadcrumb__link">Trang chủ</a></li>
                <li>
                    <span class="breadcrumb__link">></span>
                </li>
                <li><a href="shop.php" class="breadcrumb__link">Sản phẩm</a></li>
                <li>
                    <span class="breadcrumb__link">></span>
                </li>
                <li>
                    <span class="breadcrumb__link">Giỏ hàng</span>
                </li>
            </ul>
        </section>

        <!--=============== CART ===============-->
        <section class="cart section--lg container">
            <div class="table__container">
                <table class="table">
                    <tr>
                        <th>Ảnh</th>
                        <th>Tên</th>
                        <th>Giá</th>
                        <th>Số lượng</th>
                        <th>Tổng giá</th>
                        <th>Xóa</th>
                    </tr>

                    <tbody id="cart__info">
                        
                    </tbody>

                </table>
            </div>

            <div class="cart__actions">
                <a onclick="updateCart()" class="btn flex btn--md">
                    <i class="fi fi-rs-refresh"></i> Cập nhật giỏ hàng
                </a>

                <a href="shop.php" class="btn flex btn--md">
                    <i class="fi-rs-shopping-bag"></i> Tiếp tục mua sắm
                </a>
            </div>

            <div class="divider">
                <i class="fi fi-rs-fingerprint"></i>
            </div>

            <div class="cart__group grid">
                <div>
                    <div class="cart__shipping">
                        <h3 class="selection__title">Tính phí vận chuyển</h3>

                        <form action="" class="form grid">
                            <input type="text" placeholder="City / Province" class="form__input">

                            <div class="form__group grid">
                                <input type="text" placeholder="District" class="form__input">

                                <input type="text" placeholder="Postcode / Zipcode" class="form__input">
                            </div>

                            <div class="form__btn">
                                <button class="btn flex btn--sm">
                                  <i class="fi fi-rs-check"></i> Xác nhận
                              </button>
                            </div>
                        </form>
                    </div>

                    <div class="cart__coupon">
                        <h3 class="section__title">Áp dụng mã giảm giá</h3>

                        <form action="" class="coupon__form form grid">
                            <div class="form__group grid">
                                <input id="coupon-code" type="text" name="" class="form__input" placeholder="Nhập mã giảm giá" />

                                <div class="form__btn">
                                    <button onclick="applyCoupon(event)" class="btn flex btn--sm">
                                    <i class="fi-rs-label"></i> Áp dụng
                                  </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="cart__total">
                    <h3 class="section__title">Tổng giá trong giỏ hàng</h3>

                    <table class="cart__total-table">
                        <tr>
                            <td><span class="cart__total-title">Giá tiền</span></td>
                            <td><span id="cart-subtotal" class="cart__total-price">0 VNĐ</span></td>
                        </tr>

                        <tr>
                            <td><span class="cart__total-title">Giảm giá</span></td>
                            <td><span id="cart-discount" class="cart__total-price">0 VNĐ</span></td>
                        </tr>

                        <tr>
                            <td><span class="cart__total-title">Thành tiền</span></td>
                            <td><span id="cart-total" class="cart__total-price">0 VNĐ</span></td>
                        </tr>
                    </table>

                    <p onclick="goToCheckOut()" class="btn flex btn--md">
                        <i class="fi fi-rs-box-alt"></i> Đi đến thanh toán
                    </p>
                </div>
            </div>
        </section>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                showCartInfo();
            });
        </script>

<?php
    include "./inc/footer.php";
?>