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
                <li><a href="shop.html" class="breadcrumb__link">Shop</a></li>
                <li>
                    <span class="breadcrumb__link">></span>
                </li>
                <li>
                    <span class="breadcrumb__link">Cart</span>
                </li>
            </ul>
        </section>

        <!--=============== CART ===============-->
        <section class="cart section--lg container">
            <div class="table__container">
                <table class="table">
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Subtotal</th>
                        <th>Remove</th>
                    </tr>

                    <tbody id="cart__info">
                        
                    </tbody>

                </table>
            </div>

            <div class="cart__actions">
                <a onclick="updateCart()" class="btn flex btn--md">
                    <i class="fi fi-rs-refresh"></i> Update Cart
                </a>

                <a href="" class="btn flex btn--md">
                    <i class="fi-rs-shopping-bag"></i> Continue Shopping
                </a>
            </div>

            <div class="divider">
                <i class="fi fi-rs-fingerprint"></i>
            </div>

            <div class="cart__group grid">
                <div>
                    <div class="cart__shipping">
                        <h3 class="selection__title">Calculate Shipping</h3>

                        <form action="" class="form grid">
                            <input type="text" placeholder="City / Province" class="form__input">

                            <div class="form__group grid">
                                <input type="text" placeholder="District" class="form__input">

                                <input type="text" placeholder="Postcode / Zipcode" class="form__input">
                            </div>

                            <div class="form__btn">
                                <button class="btn flex btn--sm">
                                  <i class="fi fi-rs-check"></i> Confirm
                              </button>
                            </div>
                        </form>
                    </div>

                    <div class="cart__coupon">
                        <h3 class="section__title">Apply Coupon</h3>

                        <form action="" class="coupon__form form grid">
                            <div class="form__group grid">
                                <input id="coupon-code" type="text" name="" class="form__input" placeholder="Enter Your Coupon" />

                                <div class="form__btn">
                                    <button onclick="applyCoupon(event)" class="btn flex btn--sm">
                                    <i class="fi-rs-label"></i> Apply
                                  </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="cart__total">
                    <h3 class="section__title">Cart Totals</h3>

                    <table class="cart__total-table">
                        <tr>
                            <td><span class="cart__total-title">Cart Subtotal</span></td>
                            <td><span id="cart-subtotal" class="cart__total-price">0 VNĐ</span></td>
                        </tr>

                        <tr>
                            <td><span class="cart__total-title">Discount</span></td>
                            <td><span id="cart-discount" class="cart__total-price">0 VNĐ</span></td>
                        </tr>

                        <tr>
                            <td><span class="cart__total-title">Total</span></td>
                            <td><span id="cart-total" class="cart__total-price">0 VNĐ</span></td>
                        </tr>
                    </table>

                    <p onclick="goToCheckOut()" class="btn flex btn--md">
                        <i class="fi fi-rs-box-alt"></i> Proceed To Checkout
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