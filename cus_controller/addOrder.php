<?php
    include_once "../lib/database.php";
    $db = new Database();
    
    if(isset($_POST['firstname']))
    {

        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $address= $_POST['address'];
        $payment= $_POST['payment'];
        $total= $_POST['total'];

        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date("Y/m/d");
        
        $check_email = "SELECT * FROM tbl_customer WHERE cusEmail = '$email' LIMIT 1";
        $result_check = $db->select($check_email);
        if ($result_check) {
            echo 'duplicateEmail';
            exit;
        } else {

            //Tạo tài khoản cho người dùng mới
            $query = "INSERT INTO tbl_customer(cusFirstname, cusLastname, cusEmail, cusPhone)
                    VALUES ('$firstname', '$lastname', '$email', '$phone')";
            $result_insert = $db->insert($query);
        
            if(!$result_insert) {
                echo 'unsuccessful';
                exit;
            } else {

                //Lấy id của khách hàng mới để đặt hàng
                $result_check = $db->select($check_email);
                if ($result_check) {
                    $cus =  $result_check->fetch_assoc();
                    $cusId = $cus["cusId"]; 
                    
                    $query = "INSERT INTO tbl_order(cusId, cus_Phone, cus_Address, orderTotalPrice, payMethod, orderDate)
                            VALUES ('$cusId', '$phone', '$address', '$total', '$payment', '$date')";
                    $result_insert = $db->insert($query);

                    if($result_insert) {

                        $query = "SELECT * FROM tbl_order WHERE cusId = '$cusId' ORDER BY orderId DESC LIMIT 1";
                        $result_insert = $db->insert($query);
                        $result_order = $result_insert->fetch_assoc();
                        echo $result_order['orderId'];
                    }
                }
                
            }
        }
    }
         
?>