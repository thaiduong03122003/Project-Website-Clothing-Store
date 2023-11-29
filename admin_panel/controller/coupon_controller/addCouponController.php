<?php
    include_once "../../../lib/database.php";
    $db = new Database();
    
    if(isset($_POST['exdate']))
    {
        $cpcode = $_POST['cpcode'];
        $cpdesc = $_POST['cpdesc'];
        $discount = $_POST['discount'];
        $exdate = $_POST['exdate'];

        $date = date('Y/m/d', strtotime($exdate));
        
        $check_code = "SELECT * FROM tbl_coupon WHERE couponCode = '$cpcode' LIMIT 1";
        $result_check = $db->select($check_code);
        if ($result_check) {
            echo 'unsuccessful';
        } else {

            $query = "INSERT INTO tbl_coupon(couponCode, couponDesc, couponDiscount, couponDate) 
                      VALUES ('$cpcode', '$cpdesc', '$discount', '$date')";
            $result_insert = $db->insert($query);
        
            if(!$result_insert) {
                echo 'unsuccessful';
            } else {
                echo $cpcode;
            }
        }
    }
?>