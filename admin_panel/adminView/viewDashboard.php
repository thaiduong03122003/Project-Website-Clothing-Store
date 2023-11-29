<div class="row">
<?php 
    include_once '../../lib/session.php';
    include_once "../../lib/database.php";

    Session::checkSession();
    $db = new Database();
?>

        <?php
            if (Session::get('adminRole') == '0') {
        ?>

            <div class="col-sm-6">
                <div class="card dashboard_content bg-primary bg-gradient">
                    <img src="./assets/images/income.png" class="dashboard_img" alt="">
                    <h4 style="color:white;">Total Income</h4>
                    <h5 class="big_card">

                    <?php
                        $sql="SELECT * from tbl_order";
                        $result= $db->select($sql);

                        $totalPrice=0;

                        if ($result){
                            while ($row = $result->fetch_assoc()) {
                                $price_without_dots = str_replace('.', '', $row['orderTotalPrice']);
                                $price_numeric = preg_replace('/[^0-9]/', '', $price_without_dots);
                                $totalPrice+=$price_numeric;
                            }
                            $totalPrice = number_format($totalPrice, 0, '.', '.');
                            $totalPrice .= ' VNĐ';
                        } else {
                            $totalPrice = '0 VNĐ';
                        }
                        echo $totalPrice;
                    ?>

                    </h5>
                </div>
            </div>

            <div class="col-sm-6">
                <div class="card dashboard_content bg-primary bg-gradient">
                    <img src="./assets/images/sell.png" class="dashboard_img" alt="">
                    <h4 style="color:white;">Total Products Sold</h4>
                    <h5 class="big_card">

                    <?php
                        $sql="SELECT * from tbl_order_details";
                        $result= $db->select($sql);

                        $quantity=0;

                        if ($result){
                            while ($row = $result->fetch_assoc()) {
                                $quantity_integer = (int) $row['pdQuantity'];
                                $quantity+=$quantity_integer;
                            }
                        }
                        echo $quantity;
                    ?>

                    </h5>
                </div>
            </div>

        <?php
        } else {
            echo '';
        }
        ?>

            <div class="col-sm-3">
                <div class="card dashboard_content">
                    <img src="./assets/images/moderator.png" class="dashboard_img" alt="">
                    <h4 style="color:white;">Total Admins</h4>
                    <h5>

                    <?php
                        $sql="SELECT * from tbl_admin WHERE adRole = '0'";
                        $result= $db->select($sql);

                        $count=0;

                        if ($result){
                            while ($row = $result->fetch_assoc()) {
                    
                                $count=$count+1;
                            }
                        }
                        echo $count;
                    ?>

                    </h5>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="card dashboard_content">
                    <img src="./assets/images/employees.png" class="dashboard_img" alt="">
                    <h4 style="color:white;">Total Staff</h4>
                    <h5>

                    <?php
                        $sql="SELECT * from tbl_admin WHERE adRole = '1'";
                        $result= $db->select($sql);

                        $count=0;

                        if ($result){
                            while ($row = $result->fetch_assoc()) {
                    
                                $count=$count+1;
                            }
                        }
                        echo $count;
                    ?>

                    </h5>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="card dashboard_content" onclick="goToSection('customer/viewCustomers.php')">
                    <img src="./assets/images/people.png" class="dashboard_img" alt="">
                    <h4 style="color:white;">Total Customers</h4>
                    <h5>

                    <?php
                        $sql="SELECT * from tbl_customer";
                        $result = $db->select($sql);

                        $count=0;

                        if ($result){
                            while ($row = $result->fetch_assoc()) {
                    
                                $count=$count+1;
                            }
                        }
                        echo $count;
                    ?>

                    </h5>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="card dashboard_content" onclick="goToSection('category/viewCategories.php')">
                    <img src="./assets/images/categories.png" class="dashboard_img" alt="">
                    <h4 style="color:white;">Total Categories</h4>
                    <h5>

                    <?php
                        $sql="SELECT * from tbl_category";
                        $result= $db->select($sql);

                        $count=0;

                        if ($result){
                            while ($row = $result->fetch_assoc()) {
                    
                                $count=$count+1;
                            }
                        }
                        echo $count;
                    ?>

                   </h5>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="card dashboard_content" onclick="goToSection('brand/viewBrands.php')">
                    <img src="./assets/images/brand.png" class="dashboard_img" alt="">
                    <h4 style="color:white;">Total Brands</h4>
                    <h5>

                    <?php
                        $sql="SELECT * from tbl_brand";
                        $result= $db->select($sql);

                        $count=0;

                        if ($result){
                            while ($row = $result->fetch_assoc()) {
                    
                                $count=$count+1;
                            }
                        }
                        echo $count;
                    ?>

                    </h5>
                </div>
            </div>
            
            <div class="col-sm-3">
                <div class="card dashboard_content" onclick="goToSection('product/viewProducts.php')">
                    <img src="./assets/images/fashion.png" class="dashboard_img" alt="">
                    <h4 style="color:white;">Total Products</h4>
                    <h5>
                    
                    <?php
                        $sql="SELECT * from tbl_product";
                        $result= $db->select($sql);

                        $count=0;

                        if ($result){
                            while ($row = $result->fetch_assoc()) {
                    
                                $count=$count+1;
                            }
                        }
                        echo $count;
                    ?>

                   </h5>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="card dashboard_content" onclick="goToSection('product/viewProducts.php')">
                    <img src="./assets/images/in-stock.png" class="dashboard_img" alt="">
                    <h4 style="color:white;">Total In Stock</h4>
                    <h5>
                    
                    <?php
                        $sql="SELECT * from tbl_product_size";
                        $result= $db->select($sql);

                        $in_stock=0;

                        if ($result){
                            while ($row = $result->fetch_assoc()) {
                                $quantity_integer = (int) $row['quantityInStock'];
                                $in_stock+=$quantity_integer;
                            }
                        }
                        echo $in_stock;
                    ?>

                   </h5>
                </div>
            </div>

            <div class="col-sm-3">
                <div class="card dashboard_content" onclick="goToSection('order/viewOrders.php')">
                    <img src="./assets/images/package.png" class="dashboard_img" alt="">
                    <h4 style="color:white;">Total orders</h4>
                    <h5>
                    
                    <?php
                        $sql="SELECT * from tbl_order";
                        $result= $db->select($sql);

                        $count=0;

                        if ($result){
                            while ($row = $result->fetch_assoc()) {
                    
                                $count=$count+1;
                            }
                        }
                        echo $count;
                    ?>

                   </h5>
                </div>
            </div>
        </div>