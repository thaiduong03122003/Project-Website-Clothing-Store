<div class="row">
<?php 
    include_once "../../lib/database.php";

    $db = new Database();
?>
            <div class="col-sm-3">
                <div class="card dashboard_content">
                    <img src="./assets/images/moderator.png" class="dashboard_img" alt="">
                    <h4 style="color:white;">Total Admins/Staff</h4>
                    <h5>

                    <?php
                        $sql="SELECT * from tbl_admin";
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
                <div class="card dashboard_content">
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
                <div class="card dashboard_content">
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
                <div class="card dashboard_content">
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
                <div class="card dashboard_content">
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