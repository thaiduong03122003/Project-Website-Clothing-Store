<?php
    include_once "../../../classes/cls_staff.php";
    $st = new staff();
    
    if(isset($_POST['record'])) {
        $id=$_POST['record'];
        $delstaff = $st->del_staff($id);

        if($delstaff){
            echo"Size Deleted";
        } else {
            echo"Not able to delete";
        }
    } else {
        echo "<script>alert('Không thể nhận dữ liệu!')</script>";
    }  
?>