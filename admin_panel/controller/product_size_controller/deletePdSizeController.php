<?php
    include_once "../../../classes/cls_product_size.php";
    $ps = new productsize();
    
    if(isset($_POST['record'])) {
        $id=$_POST['record'];
        $delps = $ps->del_product_size($id);

        if($delps){
            echo"Product Size Deleted";
        } else {
            echo"Not able to delete";
        }
    } else {
        echo "<script>alert('Không thể nhận dữ liệu!')</script>";
    }  
?>