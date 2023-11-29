<?php
    include_once "../../../lib/database.php";
    $db = new Database();
    
    if(isset($_POST['record'])) {
        $id=$_POST['record'];

        $show_ct = "SELECT * FROM tbl_customer WHERE cusId = '$id'";
        $get_ct = $db->select($show_ct);
        if($get_ct) {
            $result_show = $get_ct->fetch_assoc();

            if($result_show['accStatus'] == '0') {
                $update = "UPDATE tbl_customer SET accStatus = '1' WHERE cusId = '$id'";
            } else {
                $update = "UPDATE tbl_customer SET accStatus = '0' WHERE cusId = '$id'";
            }
        }
        $update_status = $db->update($update);
        if($update){
            echo 'Success';
        } else {
            echo"Not Success";
        }
    } else {
        echo "<script>alert('Không thể nhận dữ liệu!')</script>";
    }  
?>