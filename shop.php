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
                <li>
                    <span class="breadcrumb__link">Sản phẩm</span>
                </li>
            </ul>
        </section>

        <!--=============== PRODUCTS ===============-->
        <section class="products section--lg container">
            <?php
                include_once './classes/cls_product.php';
                $pro = new product();
                $sumpd = mysqli_num_rows($pro->show_products());
            ?>
            <p class="total__products">Chúng tôi đang có <span><?=$sumpd?></span> sản phẩm dành cho bạn!</p>

            <div id="get_data"> 
              
                    
            </div>

            
        </section>

    <script>
        function fetch_data(page) {
            $.ajax({
                url: "./cus_controller/pagination.php",
                method: "POST",
                data: {
                    page: page
                },
                success: function(data) {
                    $("#get_data").html(data);
                }
            });
        }
        fetch_data();

        $(document).on("click", ".page-item", function() {
            var page = $(this).attr("id");
            fetch_data(page);
        })

    </script>
<?php
    include "./inc/footer.php";

?>
