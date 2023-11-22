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
                    <span class="breadcrumb__link">Wishlist</span>
                </li>
            </ul>
        </section>

        <!--=============== WISHLIST ===============-->
        <section class="wishlist section--lg container">
            <div class="table__container">
                <table class="table">
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Stock Status</th>
                        <th>Action</th>
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

                        <td><span class="table__stock">In Stock</span></td>

                        <td><a href="" class="btn btn btn--sm">Add to Cart</a></td>

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

                        <td><span class="table__stock">In Stock</span></td>

                        <td><a href="" class="btn btn btn--sm">Add to Cart</a></td>

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

                        <td><span class="table__stock">In Stock</span></td>

                        <td><a href="" class="btn btn btn--sm">Add to Cart</a></td>

                        <td><i class="fi fi-rs-trash table__trash"></i></td>

                    </tr>
                </table>
            </div>
        </section>

<?php
    include "./inc/footer.php";
?>