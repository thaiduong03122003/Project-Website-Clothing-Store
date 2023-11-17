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
        Welcome 
        <span style="font-size:1.25rem; color: #f5adc4;">
            <?php
                echo Session::get('adminName');
            ?>
        </span>
    </h5>
</div>
    <div class="sidebar_menu">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()"><i class="fa fa-times"></i></a>
        <a href="./index.php" class="menu_btn"><i class="fa fa-bar-chart"></i> Dashboard</a>
        <a href="#customers" onclick="showCustomers()" class="menu_btn"><i class="fa fa-users"></i> Customers</a>
        <a href="#customers" onclick="showCustomers()" class="menu_btn"><i class="fa fa-user-circle-o"></i> Staff</a>
        <a href="#category" onclick="showCategory()" class="menu_btn"><i class="fa fa-th-large"></i> Brands</a>
        <a href="#category" onclick="showCategory()" class="menu_btn"><i class="fa fa-th-large"></i> Categories</a>
        <a href="#sizes" onclick="showSizes()" class="menu_btn"><i class="fa fa-th"></i> Sizes</a>
        <a href="#productsizes" onclick="showProductSizes()" class="menu_btn"><i class="fa fa-th-list"></i> Product Sizes</a>    
        <a href="#products" onclick="showProductItems()" class="menu_btn"><i class="fa fa-th"></i> Products</a>
        <a href="#orders" onclick="showOrders()" class="menu_btn"><i class="fa fa-list"></i> Orders</a>
    </div>
  <!---->
</div>
 
<div id="main">
    <button class="openbtn" onclick="openNav()"><i class="fa fa-bars"></i></button>
</div>


