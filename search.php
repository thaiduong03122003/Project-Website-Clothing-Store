<?php
    include "./inc/header.php";
    include "./inc/navigationbar.php";

?>
<?php
	if(isset($_GET['name']) && $_GET['name']!=NULL){
        $name = $_GET['name'];
    }
    else {
        echo "<script>
                alert('Lỗi!')
                window.location='index.php'
            </script>";
    }
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
                <li>
                    <span class="breadcrumb__link">Tìm kiếm: <?=$name?></span>
                </li>
            </ul>
        </section>

        <!--=============== PRODUCTS ===============-->
        <section class="products section--lg container">
            <?php
                include_once './classes/cls_product.php';
                $pd = new product();
                $sumpd = mysqli_num_rows($pd->show_products_by_name($name));
            ?>
            <p class="total__products">Chúng tôi tìm thấy <span><?=$sumpd?></span> sản phẩm dựa trên từ khóa tìm kiếm của bạn!</p>

            <div class="products__container grid">

                <?php
                    include_once './helpers/format.php';
                    include_once './classes/cls_product_size.php';

                    $fm = new Format();
                    $ps = new productsize();

                    $pdlist = $pd->show_products_by_name($name); // 1 là Featured
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
    include "./inc/footer.php";

?>
