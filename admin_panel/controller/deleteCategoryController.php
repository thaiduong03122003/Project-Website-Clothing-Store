<?php
    include_once "../../classes/cls_category.php";
    $cat = new category();
    
    if(isset($_POST['record'])) {
        $id=$_POST['record'];
        $delcat = $st->del_category($id);

        if($delcat){
            echo"Category Deleted";
        } else {
            echo"Not able to delete";
        }
    } else {
        echo "<script>alert('Không thể nhận dữ liệu!')</script>";
    }  
?>