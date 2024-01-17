<?php
    include "./inc/header.php";
    include "./inc/navigationbar.php";
?>
<?php
	if(isset($_GET['proid']) && $_GET['proid']!=NULL){
        $id = $_GET['proid'];
    }
    else {
        echo "<script>
                alert('Lỗi!')
                window.location='login.php'
            </script>";
    }
?>
    <!--=============== MAIN ===============-->
    <main class="main">
        <?php
            include_once './helpers/format.php';
            include_once './classes/cls_product.php';
            include_once './classes/cls_category.php';
            include_once './classes/cls_product_size.php';

            $fm = new Format();
            $pd = new product();
            $cat = new category();
            $ps = new productsize();

            $get_product_detail = $pd->show_product_by_id($id);
            if ($get_product_detail) {
                $result_detail = $get_product_detail->fetch_assoc();
                $catId = $result_detail['catId'];
            
        ?>
        <!--=============== BREADCRUMB ===============-->
        <section class="breadcrumb">
            <ul class="breadcrumb__list flex container">
                <li><a href="index.php" class="breadcrumb__link">Trang chủ</a></li>
                <li>
                    <span class="breadcrumb__link">></span>
                </li>
                <li>
                    <span class="breadcrumb__link">Thời trang</span>
                </li>
                <li>
                    <span class="breadcrumb__link">></span>
                </li>
                <li>
                    <span class="breadcrumb__link"><?=$result_detail['pdName']?></span>
                </li>
            </ul>
        </section>

        <!--=============== DETAILS ===============-->
        <section class="details section--lg">
            <div class="details__container container grid">
                <div class="details__group">
                    <img id="pd-img" src="./admin_panel/uploads/<?=$result_detail['pdImg']?>" alt="" class="details__img">

                    <div class="details__small-images grid">
                        <img src="./admin_panel/uploads/<?=$result_detail['pdImg']?>" alt="" class="details__small-img">

                        <?php
                            $desc_images = explode(',', $result_detail['pdDescImg']);
                            foreach ($desc_images as $desc_image) {
                                if (!empty($desc_image)) {
                                    echo '<img src="./admin_panel/uploads/'.$desc_image.'" alt="" class="details__small-img">';
                                }
                            }

                            $newPriceFm = $fm->formatPrice($result_detail['pdPrice']);
                                
                            $oldPrice = $result_detail['pdPrice'] + ($result_detail['pdPrice'] * 10 / 100 -1);
                            $oldPriceFm = $fm->formatPrice($oldPrice);
                        ?>

                    </div>
                </div>

                <div class="details__group">
                    <h3 class="details__title"><?=$result_detail['pdName']?></h3>
                    <p class="details__brand">Brand: <span><?=$result_detail['brandName']?></span></p>

                    <div class="details__price flex">
                        <span class="new__price"><?=$newPriceFm?></span>
                        <span class="old__price"><?=$oldPriceFm?></span>
                        <span class="save__price">Giảm 10%</span>
                    </div>
                            
                    <p class="short__description">Mô tả sản phẩm: 
                        <?=$result_detail['pdDesc']?>
                    </p>

                    <ul class="product__list">
                        <li class="list__item flex">
                            <i class="fi-rs-crown"></i> Bảo hành trong 7 ngày nếu có bất kỳ lỗi nào do nhà sản xuất.
                        </li>

                        <li class="list__item flex">
                            <i class="fi-rs-refresh"></i> Được hoàn trả sản phẩm trong 3 ngày.
                        </li>

                        <li class="list__item flex">
                            <i class="fi-rs-credit-card"></i> Dễ dàng thanh toán qua thẻ tín dụng / thẻ ngân hàng.
                        </li>
                    </ul>

                    <div class="details__color flex">
                        <span class="details__color-title">Màu</span>

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

                            <?php
                                $pslist = $ps->show_ps_by_pdid($result_detail['pdId']);
                                if($pslist) {
                                    while ($result_ps_list = $pslist->fetch_assoc()) {
                            ?>
                            
                                <li>
                                <button value="<?=$result_ps_list['psId']?>" onclick="changeSize(this)" class="size__link"><?=$result_ps_list['sizeName']?></button>
                                <div class="product_size_quantity"><?=$result_ps_list['quantityInStock']?></div>
                                </li>
                            
                            <?php
                                    }
                            ?>
                        
                        </ul>
                    </div>

                    <div class="details__action">
                        <input type="number" name="" disabled class="quantity" value="1" />

                        <p onclick="addPdtoCart('<?=$result_detail['pdName']?>', '<?=$newPriceFm?>', this)" class="btn btn--sm">Thêm vào giỏ hàng</p>

                        <a href="" class="details__action-btn">
                            <i class="fi fi-rs-heart"></i>
                        </a>
                    </div>

                    <ul class="details__meta">
                        <li class="meta__list flex"><span>SKU:</span> FWM15VKT</li>

                        <li class="meta__list flex"><span>Tags:</span> <?=$result_detail['catName']?> </li>

                        <li class="meta__list flex"><span>Số lượng có sẵn:</span>  (bao gồm tất cả các kích cỡ)</li>

                    </ul>

                            <?php
                                }
                            ?>
                </div>
            </div>
        </section>

        <!--=============== DETAILS TAB ===============-->
        <section class="details__tab container">
            <div class="detail__tabs">
                <span class="detail__tab active-tab" data-target="#info">
                    Thông tin chi tiết
                </span>
                <span class="detail__tab" data-target="#reviews">Đánh giá(3)</span>
            </div>

            <div class="details__tabs-content">
                <div class="details__tab-content active-tab" content id="info">
                    <table class="info__table">đa
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
                        <?php
                            include_once "./classes/cls_comment.php";
                            $cm = new comment;
                            $cmlist = $cm->show_comemnt($id);
                            if ($cmlist) {
                                while ($result_cm = $cmlist->fetch_assoc()) {
                                    $cusFullname = $result_cm['cusFirstname'].' '.$result_cm['cusLastname'];
                        ?>
                        <div class="review__single">
                            <div>
                                <img src="./assets/img/avatar-1.jpg" alt="" class="review__img">
                                <h4 class="review__title"><?=$cusFullname?></h4>
                            </div>

                            <div class="review__data">
                                <div class="review__rating">
                                    <?php
                                        for ($i = 1; $i <= $result_cm['rate']; $i++) {
                                    ?>
                                    <i class="fi fi-rs-star"></i>
                                    <?php
                                        }
                                    ?>
                                </div>

                                <p class="review__description">
                                    <?=$result_cm['comment']?>
                                </p>

                                <span class="review__date"><?=$result_cm['date']?></span>
                            </div>
                        </div>

                        <?php
                                }
                            }
                        ?>
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
                        <h4 class="review__form-title">Viết đánh giá</h4>

                        <div class="rate__product">
                            <i class="fi fi-rs-star"></i>
                            <i class="fi fi-rs-star"></i>
                            <i class="fi fi-rs-star"></i>
                            <i class="fi fi-rs-star"></i>
                            <i class="fi fi-rs-star"></i>
                        </div>

                        <form action="" class="form grid">
                            <textarea name="" class="form__input textarea" placeholder="Viết đánh giá của bạn"></textarea>

                            <div class="form__group grid">
                                <input type="text" name="" placeholder="Tên" class="form__input">

                                <input type="email" name="" placeholder="Email" class="form__input">
                            </div>

                            <div class="form__btn">
                                <button class="btn">Gửi</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>

        <!--=============== PRODUCTS ===============-->
        <section class="products container section--lg">
            <h3 class="section__title"><span>Sản phẩm</span> cùng danh mục</h3>

            <div class="products__container grid">

                <?php
                    $pdlist = $pd->show_products_by_catid($catId);
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
                        <a href="./details.php?proid=<?=$result_pd_list['pdId']?>" class="product__images">
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
        </section>
        <?php
            }
        ?>

<?php
    include "./inc/footer.php";
?>