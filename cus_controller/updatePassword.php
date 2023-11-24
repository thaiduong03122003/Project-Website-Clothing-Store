<?php
    include_once "../lib/database.php";
    $db = new Database();

    if(isset($_POST['crpass']))
    {

        $crpass = md5($_POST['crpass']);
        $newpass = md5($_POST['newpass']);
        $id = $_POST['id'];

        $check_password = "SELECT * FROM tbl_customer WHERE cusId = '$id' AND cusPassword = '$crpass'";
        $result_check = $db->select($check_password);
        if (!$result_check) {
            echo 'unsuccessful';
        } else {
            $query = "UPDATE tbl_customer SET 
                cusPassword = '$newpass'
                WHERE cusId = '$id'";
            $result_update = $db->update($query);
        
            if($result_update) {
                echo 'successful';
            }
        }
    }
?>
