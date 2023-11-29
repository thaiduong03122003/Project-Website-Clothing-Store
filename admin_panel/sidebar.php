<!-- Sidebar -->
<div class="sidebar" id="mySidebar">
<div class="side-header">

    <!--===== Hiển thị ảnh đại diện theo giới tính =====-->
    <?php
        if (Session::get('adminSex') == "Male") {
            echo '<img src="./assets/images/admin_male.png" width="80" height="80" alt="">';
        } else {
            echo '<img src="./assets/images/admin_female.png" width="80" height="80" alt="">';
        }  
    ?>

    <h5 style="margin-top:10px; margin-bottom: 10px;">
        <span style="font-size: 20px; color: #fff">
            <?php
                if (Session::get('adminRole') == '0') {
                    echo '[Admin]';
                } else {
                    echo '[Staff]';
                }
            ?>
        </span>
        <span style="font-size:1.25rem; color: #7eec1d;">
            <?php
                echo Session::get('adminName');
            ?>
        </span>
    </h5>
</div>
    <div class="sidebar_menu">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i class="fa fa-times"></i></a>
        <a href="#dashboard" onclick="goToSection('viewDashboard.php')" class="menu_btn"><i class="fa fa-bar-chart"></i> Dashboard</a>

        <?php
            if(Session::get('adminRole') == '0') {
                echo '<a href="#staff" onclick="goToSection(\'staff/viewStaff.php\')" class="menu_btn"><i class="fa fa-user-circle-o"></i> Staff</a>';
            } else {
                echo '';
            }
        ?>

        <a href="#customers" onclick="goToSection('customer/viewCustomers.php')" class="menu_btn"><i class="fa fa-users"></i> Customers</a>
        <a href="#brands" onclick="goToSection('brand/viewBrands.php')" class="menu_btn"><i class="fa fa-tags"></i> Brands</a>
        <a href="#category" onclick="goToSection('category/viewCategories.php')" class="menu_btn"><i class="fa fa-th-large"></i> Categories</a>
        <a href="#sizes" onclick="goToSection('size/viewSizes.php')" class="menu_btn"><i class="fa fa-tasks"></i> Sizes</a>  
        <a href="#products" onclick="goToSection('product/viewProducts.php')" class="menu_btn"><i class="fa fa-th"></i> Products</a>
        <a href="#productsizes" onclick="goToSection('product_size/viewProductSizes.php')" class="menu_btn"><i class="fa fa-th-list"></i> Product Sizes</a>  
        <a href="#orders" onclick="goToSection('order/viewOrders.php')" class="menu_btn"><i class="fa fa-shopping-bag"></i> Orders</a>
        <a href="#orders" onclick="goToSection('viewCoupons.php')" class="menu_btn"><i class="fa fa-ticket"></i> Coupons</a>
    </div>
  <!---->
</div>
 
<div id="main">
    <button class="openbtn" onclick="openNav()"><i class="fa fa-bars"></i></button>
</div>


