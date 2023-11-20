<?php
    include_once "../../classes/cls_size.php";
    $size = new size();
    
    if(isset($_POST['record'])) {
        $id=$_POST['record'];
        $delsize = $size->del_size($id);

        if($delsize){
            echo"Size Deleted";
        } else {
            echo"Not able to delete";
        }
    } else {
        echo "<script>alert('Không thể nhận dữ liệu!')</script>";
    }  
?>