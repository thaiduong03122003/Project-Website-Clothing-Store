<?php
    include_once "../../classes/cls_product.php";
    $pd = new product();
    
    if(isset($_POST['record'])) {
        $id=$_POST['record'];
        $delpd = $pd->del_product($id);
        
        if($delpd){
            echo"Product Deleted";
        } else {
            echo"Not able to delete";
        }
    } else {
        echo "<script>alert('Không thể nhận dữ liệu!')</script>";
    }  
?>