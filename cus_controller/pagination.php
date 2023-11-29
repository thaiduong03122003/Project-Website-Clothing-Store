<?php
    include_once "../lib/database.php";
    include_once '../helpers/format.php';
    include_once '../classes/cls_product_size.php';
    $db = new Database();
    $fm = new Format();
    $ps = new productsize();
    $limit = 12;
    $page = 0;
    $output = '';
    if(isset($_POST["page"])) {
        $page = $_POST["page"];

    } else {
        $page = 1;
    }

    $start_from = ($page - 1)*$limit;

    $sortOp = $_POST["sort"];
    if ($sortOp == 'asc') {
        $query = "SELECT pd.*, ct.catName FROM tbl_product pd 
                LEFT JOIN tbl_category ct ON pd.catId = ct.catId 
                ORDER BY pd.pdPrice ASC LIMIT $start_from, $limit";

    } else if ($sortOp == 'desc') {
        $query = "SELECT pd.*, ct.catName FROM tbl_product pd 
                LEFT JOIN tbl_category ct ON pd.catId = ct.catId 
                ORDER BY pd.pdPrice DESC LIMIT $start_from, $limit";

    } else {
        $query = "SELECT pd.*, ct.catName FROM tbl_product pd 
                    LEFT JOIN tbl_category ct ON pd.catId = ct.catId 
                    ORDER BY pd.pdId DESC LIMIT $start_from, $limit";
    }

    $result = $db->select($query);
       
    if ($result) {
        $output .= '<div class="products__container grid">';
        while ($row = $result->fetch_assoc()) {
            $imgArray = explode(',', $row['pdDescImg']);
            $firstImage = $imgArray[0];

            $newPriceFm = $fm->formatPrice($row['pdPrice']);
            
            $oldPrice = $row['pdPrice'] + ($row['pdPrice'] * 10 / 100 -1);
            $oldPriceFm = $fm->formatPrice($oldPrice);

            $output .= '
                <div class="product__item">
                    <span class="product_id">' . $row['pdId'] . '</span>
                    <div class="product__banner">
                        <a href="./details.php?proid=' . $row['pdId'] . '" class="product__images">
                            <img src="./admin_panel/uploads/' . $row['pdImg'] . '" alt="" class="product__img default">
                            <img src="./admin_panel/uploads/' . $firstImage . '" alt="" class="product__img hover">
                        </a>
                        <div class="product__actions">';
                $pslist = $ps->show_ps_by_pdid($row['pdId']);
                if ($pslist) {
                    while ($result_ps_list = $pslist->fetch_assoc()) {
                        $output .= '
                            <a class="action__btn add-cart" aria-label="Size ' . $result_ps_list['sizeName'] . '">
                                <span class="product_size_id">' . $result_ps_list['psId'] . '</span>
                                <span class="product_size_quantity">' . $result_ps_list['quantityInStock'] . '</span>
                                ' . $result_ps_list['sizeName'] . '
                            </a>
                        ';
                    }
                } else {
                    $output .= '<span class="alertOutStock">Sản phẩm tạm hết hàng!</span>';
                }
            $output .= '
                        </div>
                        <div class="product__badge light-pink">Hot</div>
                    </div>
                    <div class="product__content">
                        <span class="product__category">' . $row['catName'] . '</span>
                        <a href="details.html">
                            <h3 class="product__title">' . $row['pdName'] . '</h3>
                        </a>
                        <div class="product__rating">
                            <i class="fi fi-rs-star"></i>
                            <i class="fi fi-rs-star"></i>
                            <i class="fi fi-rs-star"></i>
                            <i class="fi fi-rs-star"></i>
                            <i class="fi fi-rs-star"></i>
                        </div>
                        <div class="product__price flex">
                            <span class="new__price">' . $newPriceFm . '</span>
                            <span class="old__price">' . $oldPriceFm . '</span>
                        </div>
                        <p class="action__btn cart__btn" aria-label="Add To Wishlist">
                            <i class="fi fi-rs-heart"></i>
                        </p>
                    </div>
                </div>';

        }
    }
    // Phân trang
    $query2 = "SELECT pd.*, ct.catName FROM tbl_product pd 
              LEFT JOIN tbl_category ct ON pd.catId = ct.catId";
    $result2 = $db->select($query2);
    $total_records = mysqli_num_rows($result2);
    $total_pages = ceil($total_records/$limit);
    $output .= '</div>';
    $output .= '<ul class="pagination">';

    if ($page > 1) {
        $previous = $page - 1;
        $output .= '<li class = "page-item pagi-top" id = "1"><button class="pagination__link">Trang đầu</button></li>';
        $output .= '<li class = "page-item" id = "'.$previous.'"><button class="pagination__link icon-left"><i class="fi-rs-angle-double-small-left"></i></button></li>';
    }    

    for ($i = 1; $i <= $total_pages; $i++) {
        $active_class = "";
        if ($i == $page) {
            $active_class = "active";
        }

        $output .= '<li class = "page-item" id = "'.$i.'"><button class="pagination__link '.$active_class.'">'.$i.'</button></li>';
    }

    if ($page < $total_pages) {
        $page++;
        $output .= '<li class = "page-item" id = "'.$page.'"><button class="pagination__link icon-right"><i class="fi-rs-angle-double-small-right"></i></button></li>';
        $output .= '<li class = "page-item pagi-bot" id = "'.$total_pages.'"><button class="pagination__link">Trang cuối</button></li>';
    }
    $output .= '</ul>';
    echo $output;
?>
