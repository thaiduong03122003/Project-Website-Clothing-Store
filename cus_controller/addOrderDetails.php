<?php
    include_once "../lib/database.php";
    $db = new Database();
    
    if(isset($_POST['psId']))
    {

        $psId = $_POST['psId'];
        $quantity = $_POST['quantity'];
        $total_price = $_POST['total_price'];
        $id = $_POST['id'];

        $query = "INSERT INTO tbl_order_details(orderId, pdQuantity, totalPrice, psId)
                VALUES ('$id', '$quantity', '$total_price', '$psId')";
        $result_insert = $db->insert($query);
    
        if(!$result_insert) {
            echo 'unsuccessful';
        } else {
            echo 'successful';
        }
    }
        
?>