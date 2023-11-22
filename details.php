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
                    <span class="breadcrumb__link">Fashion</span>
                </li>
                <li>
                    <span class="breadcrumb__link">></span>
                </li>
                <li>
                    <span class="breadcrumb__link">Henley Shirt</span>
                </li>
            </ul>
        </section>

        <!--=============== DETAILS ===============-->
        <section class="details section--lg">
            <div class="details__container container grid">
                <div class="details__group">
                    <img src="./assets/img/product-8-1.jpg" alt="" class="details__img">

                    <div class="details__small-images grid">
                        <img src="./assets/img/product-8-2.jpg" alt="" class="details__small-img">

                        <img src="./assets/img/product-8-1.jpg" alt="" class="details__small-img">

                        <img src="./assets/img/product-8-2.jpg" alt="" class="details__small-img">
                    </div>
                </div>

                <div class="details__group">
                    <h3 class="details__title">Henley Shirt</h3>
                    <p class="details__brand">Brand: <span>adidas</span></p>

                    <div class="details__price flex">
                        <span class="new__price">$116</span>
                        <span class="old__price">$200.00</span>
                        <span class="save__price">25% Off</span>
                    </div>

                    <p class="short__description">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Rem repellat similique, quo repudiandae facere maiores eum illo impedit, totam porro accusantium quidem. Quae, suscipit ad hic facere com
                    </p>

                    <ul class="product__list">
                        <li class="list__item flex">
                            <i class="fi-rs-crown"></i> 1 Year AL Jeazeera Brand Warranly
                        </li>

                        <li class="list__item flex">
                            <i class="fi-rs-refresh"></i> 30 Day Return Policy
                        </li>

                        <li class="list__item flex">
                            <i class="fi-rs-credit-card"></i> Cash on Delivery available
                        </li>
                    </ul>

                    <div class="details__color flex">
                        <span class="details__color-title">Color</span>

                        <ul class="color__list">
                            <li>
                                <a href="#" class="color__link" style="background-color: hsl(253, 89%, 54%);"></a>
                            </li>

                            <li>
                                <a href="#" class="color__link" style="background-color: hsl(353, 100%, 67%);"></a>
                            </li>

                            <li>
                                <a href="#" class="color__link" style="background-color: hsl(49, 100%, 60%);"></a>
                            </li>

                            <li>
                                <a href="#" class="color__link" style="background-color: hsl(0, 0%, 0%);"></a>
                            </li>
                        </ul>
                    </div>

                    <div class="details__size flex">
                        <span class="details__size-title">Size</span>

                        <ul class="size__list">
                            <li>
                                <a href="#" class="size__link size-active">S</a>
                            </li>

                            <li>
                                <a href="#" class="size__link">M</a>
                            </li>

                            <li>
                                <a href="#" class="size__link">L</a>
                            </li>

                            <li>
                                <a href="#" class="size__link">XL</a>
                            </li>
                        </ul>
                    </div>

                    <div class="details__action">
                        <input type="number" name="" class="quantity" value="1" />

                        <a href="#" class="btn btn--sm">Add to Cart</a>

                        <a href="" class="details__action-btn">
                            <i class="fi fi-rs-heart"></i>
                        </a>
                    </div>

                    <ul class="details__meta">
                        <li class="meta__list flex"><span>SKU:</span> FWM15VKT</li>

                        <li class="meta__list flex"><span>Tags:</span> Cloth, Women, Dress</li>

                        <li class="meta__list flex"><span>Availablity:</span> 8 Items In Stock</li>

                    </ul>
                </div>
            </div>
        </section>

        <!--=============== DETAILS TAB ===============-->
        <section class="details__tab container">
            <div class="detail__tabs">
                <span class="detail__tab active-tab" data-target="#info">
                    Additional Info
                </span>
                <span class="detail__tab" data-target="#reviews">Reviews(3)</span>
            </div>

            <div class="details__tabs-content">
                <div class="details__tab-content active-tab" content id="info">
                    <table class="info__table">
                        <tr>
                            <th>Stand Up</th>
                            <td>35"L x 24"W x 37-45"H</td>
                        </tr>

                        <tr>
                            <th>Folderd</th>
                            <td>25"L x 23"W x 37-45"H</td>
                        </tr>

                        <tr>
                            <th>Door Pass Through</th>
                            <td>24</td>
                        </tr>

                        <tr>
                            <th>Frame</th>
                            <td>Aluminum</td>
                        </tr>

                        <tr>
                            <th>Weight</th>
                            <td>20 LBS</td>
                        </tr>

                        <tr>
                            <th>Width</th>
                            <td>24"</td>
                        </tr>

                        <tr>
                            <th>Handle height</th>
                            <td>37-45"</td>
                        </tr>

                        <tr>
                            <th>Wheels</th>
                            <td>12" air</td>
                        </tr>

                        <tr>
                            <th>Color</th>
                            <td>Black, Blue, Red</td>
                        </tr>

                        <tr>
                            <th>Size</th>
                            <td>M, S</td>
                        </tr>

                    </table>
                </div>

                <div class="details__tab-content" content id="reviews">
                    <div class="reviews__container grid">
                        <div class="review__single">
                            <div>
                                <img src="./assets/img/avatar-1.jpg" alt="" class="review__img">
                                <h4 class="review__title">Jacky Chan</h4>
                            </div>

                            <div class="review__data">
                                <div class="review__rating">
                                    <i class="fi fi-rs-star"></i>
                                    <i class="fi fi-rs-star"></i>
                                    <i class="fi fi-rs-star"></i>
                                    <i class="fi fi-rs-star"></i>
                                    <i class="fi fi-rs-star"></i>
                                </div>

                                <p class="review__description">
                                    Thank you very fast shipping from Poland only 3days.
                                </p>

                                <span class="review__date">November 14, 2023 at 23:11</span>
                            </div>
                        </div>

                        <div class="review__single">
                            <div>
                                <img src="./assets/img/avatar-2.jpg" alt="" class="review__img">
                                <h4 class="review__title">Jacky Chan</h4>
                            </div>

                            <div class="review__data">
                                <div class="review__rating">
                                    <i class="fi fi-rs-star"></i>
                                    <i class="fi fi-rs-star"></i>
                                    <i class="fi fi-rs-star"></i>
                                    <i class="fi fi-rs-star"></i>
                                    <i class="fi fi-rs-star"></i>
                                </div>

                                <p class="review__description">
                                    Great low price and works well.
                                </p>

                                <span class="review__date">November 14, 2023 at 23:11</span>
                            </div>
                        </div>

                        <div class="review__single">
                            <div>
                                <img src="./assets/img/avatar-3.jpg" alt="" class="review__img">
                                <h4 class="review__title">Jacky Chan</h4>
                            </div>

                            <div class="review__data">
                                <div class="review__rating">
                                    <i class="fi fi-rs-star"></i>
                                    <i class="fi fi-rs-star"></i>
                                    <i class="fi fi-rs-star"></i>
                                    <i class="fi fi-rs-star"></i>
                                    <i class="fi fi-rs-star"></i>
                                </div>

                                <p class="review__description">
                                    Thank you very much.
                                </p>

                                <span class="review__date">November 14, 2023 at 23:11</span>
                            </div>
                        </div>
                    </div>

                    <div class="review__form">
                        <h4 class="review__form-title">Add a review</h4>

                        <div class="rate__product">
                            <i class="fi fi-rs-star"></i>
                            <i class="fi fi-rs-star"></i>
                            <i class="fi fi-rs-star"></i>
                            <i class="fi fi-rs-star"></i>
                            <i class="fi fi-rs-star"></i>
                        </div>

                        <form action="" class="form grid">
                            <textarea name="" class="form__input textarea" placeholder="Write Comment"></textarea>

                            <div class="form__group grid">
                                <input type="text" name="" placeholder="Name" class="form__input">

                                <input type="email" name="" placeholder="Email" class="form__input">
                            </div>

                            <div class="form__btn">
                                <button class="btn">Submit Review</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!--=============== PRODUCTS ===============-->
        <section class="products container section--lg">
            <h3 class="section__title"><span>Related</span> Products</h3>

            <div class="products__container grid">

                <div class="product__item">
                    <div class="product__banner">
                        <a href="details.html" class="product__images">
                            <img src="./assets/img/product-3-1.jpg" alt="" class="product__img default">

                            <img src="./assets/img/product-3-2.jpg" alt="" class="product__img hover">
                        </a>

                        <div class="product__actions">
                            <a href="#" class="action__btn" aria-label="Quick View">
                                <i class="fi fi-rs-eye"></i>
                            </a>

                            <a href="#" class="action__btn" aria-label="Add To Wishlist">
                                <i class="fi fi-rs-heart"></i>
                            </a>

                            <a href="#" class="action__btn" aria-label="Compare">
                                <i class="fi fi-rs-shuffle"></i>
                            </a>
                        </div>

                        <div class="product__badge light-orange">Hot</div>
                    </div>
                    <div class="product__content">
                        <span class="product__category">Clothing</span>
                        <a href="details.html">
                            <h3 class="product__title">Colorful Pattern Shirts</h3>
                        </a>
                        <div class="product__rating">
                            <i class="fi fi-rs-star"></i>
                            <i class="fi fi-rs-star"></i>
                            <i class="fi fi-rs-star"></i>
                            <i class="fi fi-rs-star"></i>
                            <i class="fi fi-rs-star"></i>
                        </div>
                        <div class="product__price flex">
                            <span class="new__price">$238.85</span>
                            <span class="old__price">$250.8</span>
                        </div>

                        <a href="#" class="action__btn cart__btn" aria-label="Add To Cart">
                            <i class="fi fi-rs-shopping-bag-add"></i>
                        </a>
                    </div>
                </div>

                <div class="product__item">
                    <div class="product__banner">
                        <a href="details.html" class="product__images">
                            <img src="./assets/img/product-4-1.jpg" alt="" class="product__img default">

                            <img src="./assets/img/product-4-2.jpg" alt="" class="product__img hover">
                        </a>

                        <div class="product__actions">
                            <a href="#" class="action__btn" aria-label="Quick View">
                                <i class="fi fi-rs-eye"></i>
                            </a>

                            <a href="#" class="action__btn" aria-label="Add To Wishlist">
                                <i class="fi fi-rs-heart"></i>
                            </a>

                            <a href="#" class="action__btn" aria-label="Compare">
                                <i class="fi fi-rs-shuffle"></i>
                            </a>
                        </div>

                        <div class="product__badge light-blue">Hot</div>
                    </div>
                    <div class="product__content">
                        <span class="product__category">Clothing</span>
                        <a href="details.html">
                            <h3 class="product__title">Colorful Pattern Shirts</h3>
                        </a>
                        <div class="product__rating">
                            <i class="fi fi-rs-star"></i>
                            <i class="fi fi-rs-star"></i>
                            <i class="fi fi-rs-star"></i>
                            <i class="fi fi-rs-star"></i>
                            <i class="fi fi-rs-star"></i>
                        </div>
                        <div class="product__price flex">
                            <span class="new__price">$238.85</span>
                            <span class="old__price">$250.8</span>
                        </div>

                        <a href="#" class="action__btn cart__btn" aria-label="Add To Cart">
                            <i class="fi fi-rs-shopping-bag-add"></i>
                        </a>
                    </div>
                </div>

                <div class="product__item">
                    <div class="product__banner">
                        <a href="details.html" class="product__images">
                            <img src="./assets/img/product-5-1.jpg" alt="" class="product__img default">

                            <img src="./assets/img/product-5-2.jpg" alt="" class="product__img hover">
                        </a>

                        <div class="product__actions">
                            <a href="#" class="action__btn" aria-label="Quick View">
                                <i class="fi fi-rs-eye"></i>
                            </a>

                            <a href="#" class="action__btn" aria-label="Add To Wishlist">
                                <i class="fi fi-rs-heart"></i>
                            </a>

                            <a href="#" class="action__btn" aria-label="Compare">
                                <i class="fi fi-rs-shuffle"></i>
                            </a>
                        </div>

                        <div class="product__badge light-pink">-30%</div>
                    </div>
                    <div class="product__content">
                        <span class="product__category">Clothing</span>
                        <a href="details.html">
                            <h3 class="product__title">Colorful Pattern Shirts</h3>
                        </a>
                        <div class="product__rating">
                            <i class="fi fi-rs-star"></i>
                            <i class="fi fi-rs-star"></i>
                            <i class="fi fi-rs-star"></i>
                            <i class="fi fi-rs-star"></i>
                            <i class="fi fi-rs-star"></i>
                        </div>
                        <div class="product__price flex">
                            <span class="new__price">$238.85</span>
                            <span class="old__price">$250.8</span>
                        </div>

                        <a href="#" class="action__btn cart__btn" aria-label="Add To Cart">
                            <i class="fi fi-rs-shopping-bag-add"></i>
                        </a>
                    </div>
                </div>

                <div class="product__item">
                    <div class="product__banner">
                        <a href="details.html" class="product__images">
                            <img src="./assets/img/product-6-1.jpg" alt="" class="product__img default">

                            <img src="./assets/img/product-6-2.jpg" alt="" class="product__img hover">
                        </a>

                        <div class="product__actions">
                            <a href="#" class="action__btn" aria-label="Quick View">
                                <i class="fi fi-rs-eye"></i>
                            </a>

                            <a href="#" class="action__btn" aria-label="Add To Wishlist">
                                <i class="fi fi-rs-heart"></i>
                            </a>

                            <a href="#" class="action__btn" aria-label="Compare">
                                <i class="fi fi-rs-shuffle"></i>
                            </a>
                        </div>

                        <div class="product__badge light-green">-22%</div>
                    </div>
                    <div class="product__content">
                        <span class="product__category">Clothing</span>
                        <a href="details.html">
                            <h3 class="product__title">Colorful Pattern Shirts</h3>
                        </a>
                        <div class="product__rating">
                            <i class="fi fi-rs-star"></i>
                            <i class="fi fi-rs-star"></i>
                            <i class="fi fi-rs-star"></i>
                            <i class="fi fi-rs-star"></i>
                            <i class="fi fi-rs-star"></i>
                        </div>
                        <div class="product__price flex">
                            <span class="new__price">$238.85</span>
                            <span class="old__price">$250.8</span>
                        </div>

                        <a href="#" class="action__btn cart__btn" aria-label="Add To Cart">
                            <i class="fi fi-rs-shopping-bag-add"></i>
                        </a>
                    </div>
                </div>

            </div>
        </section>

<?php
    include "./inc/footer.php";
?>