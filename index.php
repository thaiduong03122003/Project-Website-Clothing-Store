<?php
    include "./inc/header.php";
    include "./inc/navigationbar.php";
?>

    <!--=============== MAIN ===============-->
    <main class="main">
        <!--=============== HOME ===============-->
        <section class="home section--lg">
            <div class="home__container container grid">
                <div class="home__content">
                    <span class="home__subtitle">Hot promotions</span>
                    <h1 class="home__title">
                        Fashion Treding <br> <span>Great Collection</span>
                    </h1>
                    <p class="home__description">
                        Save more with coupons & up to 20% off
                    </p>
                    <a href="shop.html" class="btn">Shop Now</a>
                </div>

                <img src="./assets/img/home-img.png" alt="" class="" home__img>
            </div>
        </section>

        <!--=============== CATEGORIES ===============-->
        <section class="categories container section">
            <h3 class="section__title"><span>Danh mục</span> San phẩm</h3>

            <div class="categories__container swiper">
                <div class="swiper-wrapper">
                    <?php
                        include_once './classes/cls_category.php';

                        $cat = new category();

                        $catlist = $cat->show_categories();
                        if($catlist) {
                            while ($result_cat_list = $catlist->fetch_assoc()) {
                    ?>

                    <a href="shop.html" class="category__item swiper-slide">
                        <img src="./admin_panel/uploads/<?=$result_cat_list['catImg']?>" alt="" height="250px" class="category__img">

                        <h3 class="category__title"><?=$result_cat_list['catName']?></h3>
                    </a>

                    <?php
                            }
                        }
                    ?>

                    

                </div>

                <div class="swiper-button-next">
                    <i class="fi fi-rs-angle-right"></i>
                </div>
                <div class="swiper-button-prev">
                    <i class="fi fi-rs-angle-left"></i>
                </div>
            </div>
        </section>

        <!--=============== PRODUCTS ===============-->
        <section class="products section container">
            <div class="tab__btns">
                <span class="tab__btn active-tab" data-target="#featured">Featured</span>
                <span class="tab__btn" data-target="#new-added">New added</span>
            </div>

            <div class="tab__items">
                <div class="tab__item active-tab" content id="featured">
                    <div class="products__container grid">

                        <?php
                            include_once './helpers/format.php';
                            include_once './classes/cls_product.php';
                            include_once './classes/cls_product_size.php';

                            $fm = new Format();
                            $pd = new product();
                            $ps = new productsize();

                            $pdlist = $pd->show_products_8_by_type('1'); // 1 là Featured
                            if($pdlist) {
                                while ($result_pd_list = $pdlist->fetch_assoc()) {

                                    $imgArray = explode(',', $result_pd_list['pdDescImg']);
                                    $firstImage = $imgArray[0];

                                    $newPriceFm = $fm->formatPrice($result_pd_list['pdPrice']);
                                    
                                    $oldPrice = $result_pd_list['pdPrice'] + ($result_pd_list['pdPrice'] * 10 / 100 -1);
                                    $oldPriceFm = $fm->formatPrice($oldPrice);
                        ?>

                        <div class="product__item">
                            <span class="product_id"><?=$result_pd_list['pdId']?></span>
                            <div class="product__banner">
                                <a href="./details.php" class="product__images">
                                    <img src="./admin_panel/uploads/<?=$result_pd_list['pdImg']?>" alt="" class="product__img default">

                                    <img src="./admin_panel/uploads/<?=$firstImage?>" alt="" class="product__img hover">
                                </a>

                                <div class="product__actions">
                                    
                                    <?php
                                        $pslist = $ps->show_ps_by_pdid($result_pd_list['pdId']);
                                        if($pslist) {
                                            while ($result_ps_list = $pslist->fetch_assoc()) {
                                    ?>
    
                                    <a class="action__btn add-cart" aria-label="Size <?=$result_ps_list['sizeName']?>">
                                        <span class="product_size_id"><?=$result_ps_list['psId']?></span>
                                        <span class="product_size_quantity"><?=$result_ps_list['quantityInStock']?></span>
                                        <?=$result_ps_list['sizeName']?>
                                    </a>

                                    <?php
                                            }
                                        } else {
                                            echo '<span class="alertOutStock">Sản phẩm tạm hết hàng!</span>';
                                        }
                                    ?>

                                </div>

                                <div class="product__badge light-pink">Hot</div>
                            </div>
                            <div class="product__content">
                                <span class="product__category"><?=$result_pd_list['catName']?></span>
                                <a href="details.html">
                                    <h3 class="product__title"><?=$result_pd_list['pdName']?></h3>
                                </a>
                                <div class="product__rating">
                                    <i class="fi fi-rs-star"></i>
                                    <i class="fi fi-rs-star"></i>
                                    <i class="fi fi-rs-star"></i>
                                    <i class="fi fi-rs-star"></i>
                                    <i class="fi fi-rs-star"></i>
                                </div>
                                <div class="product__price flex">
                                    <span class="new__price"><?=$newPriceFm?></span>
                                    <span class="old__price"><?=$oldPriceFm?></span>
                                </div>

                                <p class="action__btn cart__btn" aria-label="Add To Wishlist">
                                    <i class="fi fi-rs-heart"></i>
                                </p>
                            </div>
                        </div>

                        <?php
                                }
                            }
                        ?>
                    </div>
                </div>

                <div class="tab__item" content id="new-added">
                    <div class="products__container grid">
                        <div class="product__item">
                            <div class="product__banner">
                                <a href="details.html" class="product__images">
                                    <img src="./assets/img/product-1-1.jpg" alt="" class="product__img default">

                                    <img src="./assets/img/product-1-2.jpg" alt="" class="product__img hover">
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

                                <div class="product__badge light-pink">Hot</div>
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
                                    <img src="./assets/img/product-2-1.jpg" alt="" class="product__img default">

                                    <img src="./assets/img/product-2-2.jpg" alt="" class="product__img hover">
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

                                <div class="product__badge light-green">Hot</div>
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

                        <div class="product__item">
                            <div class="product__banner">
                                <a href="details.html" class="product__images">
                                    <img src="./assets/img/product-7-1.jpg" alt="" class="product__img default">

                                    <img src="./assets/img/product-7-2.jpg" alt="" class="product__img hover">
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
                                    <img src="./assets/img/product-8-1.jpg" alt="" class="product__img default">

                                    <img src="./assets/img/product-8-2.jpg" alt="" class="product__img hover">
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
                    </div>
                </div>
            </div>
        </section>

        <!--=============== DEALS ===============-->
        <section class="deals">
            <div class="deals__container container grid">
                <div class="deals__item">
                    <div class="deals__group">
                        <h3 class="deals__brand">Deal of the day</h3>
                        <span class="deals__category">Limited quantities.</span>
                    </div>

                    <h4 class="deals__title">Summer Collection New Morden Design</h4>

                    <div class="deals__price flex">
                        <span class="new__price">$139.00</span>
                        <span class="old__price">$165.99</span>
                    </div>

                    <div class="deals__group">
                        <p class="deals__countdown-text">Hurry Up! offer End In:</p>

                        <div class="countdown">
                            <div class="countdown_amount">
                                <p class="countdown__period">02</p>
                                <span class="unit">Days</span>
                            </div>

                            <div class="countdown_amount">
                                <p class="countdown__period">14</p>
                                <span class="unit">Hours</span>
                            </div>

                            <div class="countdown_amount">
                                <p class="countdown__period">57</p>
                                <span class="unit">Mins</span>
                            </div>

                            <div class="countdown_amount">
                                <p class="countdown__period">31</p>
                                <span class="unit">Sec</span>
                            </div>
                        </div>
                    </div>

                    <div class="deals__btn">
                        <a href="details.html" class="btn btn--md">Shop Now</a>
                    </div>
                </div>

                <div class="deals__item">
                    <div class="deals__group">
                        <h3 class="deals__brand">Women Clothing</h3>
                        <span class="deals__category">Shirt & Bag</span>
                    </div>

                    <h4 class="deals__title">Try something new on vacation</h4>

                    <div class="deals__price flex">
                        <span class="new__price">$79.00</span>
                        <span class="old__price">$135.89</span>
                    </div>

                    <div class="deals__group">
                        <p class="deals__countdown-text">Hurry Up! offer End In:</p>

                        <div class="countdown">
                            <div class="countdown_amount">
                                <p class="countdown__period">02</p>
                                <span class="unit">Days</span>
                            </div>

                            <div class="countdown_amount">
                                <p class="countdown__period">14</p>
                                <span class="unit">Hours</span>
                            </div>

                            <div class="countdown_amount">
                                <p class="countdown__period">57</p>
                                <span class="unit">Mins</span>
                            </div>

                            <div class="countdown_amount">
                                <p class="countdown__period">31</p>
                                <span class="unit">Sec</span>
                            </div>
                        </div>
                    </div>

                    <div class="deals__btn">
                        <a href="details.html" class="btn btn--md">Shop Now</a>
                    </div>
                </div>
            </div>

        </section>

        <!--=============== NEW ARRIVALS ===============-->
        <section class="new__arrivals container section">
            <h3 class="section__title"><span>New</span> Arrivals</h3>

            <div class="new__container swiper">
                <div class="swiper-wrapper">
                    <div class="product__item swiper-slide">
                        <div class="product__banner">
                            <a href="details.html" class="product__images">
                                <img src="./assets/img/product-1-1.jpg" alt="" class="product__img default">

                                <img src="./assets/img/product-1-2.jpg" alt="" class="product__img hover">
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

                            <div class="product__badge light-pink">Hot</div>
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

                    <div class="product__item swiper-slide">
                        <div class="product__banner">
                            <a href="details.html" class="product__images">
                                <img src="./assets/img/product-2-1.jpg" alt="" class="product__img default">

                                <img src="./assets/img/product-2-2.jpg" alt="" class="product__img hover">
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

                            <div class="product__badge light-green">Hot</div>
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

                    <div class="product__item swiper-slide">
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

                    <div class="product__item swiper-slide">
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

                    <div class="product__item swiper-slide">
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

                    <div class="product__item swiper-slide">
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

                    <div class="product__item swiper-slide">
                        <div class="product__banner">
                            <a href="details.html" class="product__images">
                                <img src="./assets/img/product-7-1.jpg" alt="" class="product__img default">

                                <img src="./assets/img/product-7-2.jpg" alt="" class="product__img hover">
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

                    <div class="product__item swiper-slide">
                        <div class="product__banner">
                            <a href="details.html" class="product__images">
                                <img src="./assets/img/product-8-1.jpg" alt="" class="product__img default">

                                <img src="./assets/img/product-8-2.jpg" alt="" class="product__img hover">
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
                </div>

                <div class="swiper-button-next">
                    <i class="fi fi-rs-angle-right"></i>
                </div>
                <div class="swiper-button-prev">
                    <i class="fi fi-rs-angle-left"></i>
                </div>
            </div>

        </section>

<?php
    include "./inc/footer.php";
?>