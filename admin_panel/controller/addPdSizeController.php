<?php
    include_once "../../lib/database.php";
    $db = new Database();
    
    if(isset($_POST['record']))
    {
        $pdname = $_POST['record'];
        $sizename = $_POST['sizename'];
        $quantity = $_POST['quantity'];
        
        $check_pdname = "SELECT * FROM tbl_product_size WHERE pdId = '$pdname' AND sizeId = '$sizename' LIMIT 1";
        $result_check = $db->select($check_pdname);
        if ($result_check) {
            echo 'unsuccessful';
        } else {

            $query = "INSERT INTO tbl_product_size(pdId, sizeId, quantityInStock) VALUES ('$pdname', '$sizename', '$quantity')";
            $result_insert = $db->insert($query);
        
            if(!$result_insert) {
                echo 'unsuccessful';
            } else {
                echo $pdname;
            }
        }
    }
?>