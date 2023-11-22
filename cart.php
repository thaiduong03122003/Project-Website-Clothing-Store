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

                    <tr>
                        <td><img src="./assets/img/product-1-2.jpg" class="table__img" alt=""></td>

                        <td>
                            <h3 class="table__title">
                                J.Crew Mercantile Women's Short-Sleeve
                            </h3>
                            <p class="table__description">Color: Red</p>
                            <p class="table__description">Size: M</p>
                        </td>

                        <td>
                            <span class="table__price">$110</span>
                        </td>

                        <td><input type="number" value="3" class="quantity"></td>

                        <td><span class="table__subtotal">$330</span></td>

                        <td><i class="fi fi-rs-trash table__trash"></i></td>

                    </tr>

                    <tr>
                        <td><img src="./assets/img/product-7-1.jpg" class="table__img" alt=""></td>

                        <td>
                            <h3 class="table__title">
                                J.Crew Mercantile Women's Short-Sleeve
                            </h3>
                            <p class="table__description">Color: Red</p>
                            <p class="table__description">Size: M</p>
                        </td>

                        <td>
                            <span class="table__price">$110</span>
                        </td>

                        <td><input type="number" value="3" class="quantity"></td>

                        <td><span class="table__subtotal">$330</span></td>

                        <td><i class="fi fi-rs-trash table__trash"></i></td>

                    </tr>

                    <tr>
                        <td><img src="./assets/img/product-2-1.jpg" class="table__img" alt=""></td>

                        <td>
                            <h3 class="table__title">
                                Amazon Brand - Daily Ritual Women's Jersey
                            </h3>
                            <p class="table__description">Color: Red</p>
                            <p class="table__description">Size: M</p>
                        </td>

                        <td>
                            <span class="table__price">$110</span>
                        </td>

                        <td><input type="number" value="3" class="quantity"></td>

                        <td><span class="table__subtotal">$330</span></td>

                        <td><i class="fi fi-rs-trash table__trash"></i></td>

                    </tr>
                </table>
            </div>

            <div class="cart__actions">
                <a href="" class="btn flex btn--md">
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
                                <input type="text" name="" class="form__input" placeholder="Enter Your Coupon" />

                                <div class="form__btn">
                                    <button class="btn flex btn--sm">
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
                            <td><span class="cart__total-price">$330</span></td>
                        </tr>

                        <tr>
                            <td><span class="cart__total-title">VAT (10%)</span></td>
                            <td><span class="cart__total-price">$33</span></td>
                        </tr>

                        <tr>
                            <td><span class="cart__total-title">Total</span></td>
                            <td><span class="cart__total-price">$363</span></td>
                        </tr>
                    </table>

                    <a href="checkout.html" class="btn flex btn--md">
                        <i class="fi fi-rs-box-alt"></i> Proceed To Checkout
                    </a>
                </div>
            </div>
        </section>

<?php
    include "./inc/footer.php";
?>