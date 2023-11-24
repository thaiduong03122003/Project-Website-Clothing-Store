<?php
    include_once "../lib/database.php";
    $db = new Database();
    
    if(isset($_POST['record']))
    {
        $coupon = $_POST['record'];
        
        $check_coupon = "SELECT * FROM tbl_coupon WHERE couponCode = '$coupon' LIMIT 1";
        $result_check = $db->select($check_coupon);
        if ($result_check) {
            $result_coupon = $result_check->fetch_assoc();
            echo $result_coupon['couponDiscount'];
        } else {

            echo 'unsuccessful';
        }
    }
?>