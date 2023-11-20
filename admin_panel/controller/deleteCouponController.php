<?php
    include_once "../../classes/cls_coupon.php";
    $cp = new coupon();
    
    if(isset($_POST['record'])) {
        $id=$_POST['record'];
        $delcp = $cp->del_coupon($id);

        if($delcp){
            echo"Coupon Deleted";
        } else {
            echo"Not able to delete";
        }
    } else {
        echo "<script>alert('Không thể nhận dữ liệu!')</script>";
    }  
?>