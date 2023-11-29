<?php
    include_once "../../../classes/cls_customer.php";
    $cs = new customer();
    
    if(isset($_POST['record'])) {
        $id=$_POST['record'];
        $delcs = $cs->del_customer($id);

        if($delcs){
            echo"Customer Account Deleted";
        } else {
            echo"Not able to delete";
        }
    } else {
        echo "<script>alert('Không thể nhận dữ liệu!')</script>";
    }  
?>