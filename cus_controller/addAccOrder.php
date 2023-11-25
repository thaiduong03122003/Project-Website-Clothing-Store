<?php
    include_once "../lib/database.php";
    $db = new Database();
    
    if(isset($_POST['address_ship']))
    {

        $address_ship = $_POST['address_ship'];
        $phone_ship = $_POST['phone_ship'];
        $order_total = $_POST['order_total'];
        $payment_method = $_POST['payment_method'];
        $id = $_POST['id'];

        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date("Y/m/d");
        
        $query = "INSERT INTO tbl_order(cusId, cus_Phone, cus_Address, orderTotalPrice, payMethod, orderDate)
                VALUES ('$id', '$phone_ship', '$address_ship', '$order_total', '$payment_method', '$date')";
        $result_insert = $db->insert($query);

        if($result_insert) {

            $query = "SELECT * FROM tbl_order WHERE cusId = '$id' ORDER BY orderId DESC LIMIT 1";
            $result_insert = $db->insert($query);
            $result_order = $result_insert->fetch_assoc();
            echo $result_order['orderId'];
        } else {
            echo 'unsuccessful';
        }
        
    }
         
?>