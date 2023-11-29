<?php
    include_once "../../../classes/cls_brand.php";
    $st = new brand();
    
    if(isset($_POST['record'])) {
        $id=$_POST['record'];
        $delbr = $st->del_brand($id);

        if($delbr){
            echo"Brand Deleted";
        } else {
            echo"Not able to delete";
        }
    } else {
        echo "<script>alert('Không thể nhận dữ liệu!')</script>";
    }  
?>