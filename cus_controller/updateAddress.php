<?php
    include_once "../lib/database.php";
    $db = new Database();

    if(isset($_POST['address']))
    {
        $id = $_POST['id'];
        $address = $_POST['address'];

        $query = "UPDATE tbl_customer SET 
            cusAddress = '$address'
            WHERE cusId = '$id'";
        $result_update = $db->update($query);
    
        if(!$result_update) {
            echo 'unsuccessful';
        } else {
            echo $address;
        }
        
    }
?>
