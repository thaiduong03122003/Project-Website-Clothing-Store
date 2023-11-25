<?php

     include_once '../../lib/database.php';
     $db = new Database();

     $order_id = $_POST['record'];

     $sql = "SELECT orderStatus FROM tbl_order WHERE orderId = '$order_id'"; 
     $result = $db->select($sql);

     $row = $result->fetch_assoc();
    
     if($row["orderStatus"] == 0){
          $update = "UPDATE tbl_order SET orderStatus = 1 WHERE orderId = '$order_id'";
          $db->update($update);
     }
     else if($row["orderStatus"] == 1){
          $update = "UPDATE tbl_order SET orderStatus = 0 WHERE orderId = '$order_id'";
          $db->update($update);
     }
    
?>