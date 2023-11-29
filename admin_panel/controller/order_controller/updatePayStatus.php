<?php

     include_once '../../../lib/database.php';
     $db = new Database();

     $order_id = $_POST['record'];

     $sql = "SELECT payStatus FROM tbl_order WHERE orderId = '$order_id'"; 
     $result = $db->select($sql);

     $row = $result->fetch_assoc();
    
     if($row["payStatus"]==0){
          $update = "UPDATE tbl_order SET payStatus = 1 WHERE orderId = '$order_id'";
          $db->update($update);
     }
     else if($row["payStatus"]==1){
          $update = "UPDATE tbl_order SET payStatus = 0 WHERE orderId = '$order_id'";
          $db->update($update);
     }
    
?>