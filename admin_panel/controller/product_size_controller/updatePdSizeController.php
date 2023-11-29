<?php
    include_once "../../../lib/database.php";
    $db = new Database();

    if(isset($_POST['record']))
    {
        $id = $_POST['record'];
        $pdname = $_POST['pdname'];
        $sizename = $_POST['sizename'];
        $quantity = $_POST['quantity'];

        $check_pdname = "SELECT * FROM tbl_product_size WHERE pdId = '$pdname' AND sizeId = '$sizename' AND psId != '$id' LIMIT 1";
        $result_check = $db->select($check_pdname);
        if ($result_check) {
            echo 'unsuccessful';
        } else {

            $query = "UPDATE tbl_product_size SET 
                pdId = '$pdname',
                sizeId = '$sizename',
                quantityInStock = '$quantity'
                WHERE psId = '$id'";
            $result_update = $db->update($query);
        
            if(!$result_update) {
                echo 'unsuccessful';
            } else {
                echo $pdname;
            }
        }
     
    }
?>
