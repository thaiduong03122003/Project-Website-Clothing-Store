<?php
    include_once "../lib/database.php";
    include_once '../lib/session.php';
    Session::init();
    $db = new Database();
    
    if(isset($_POST['email']))
    {

        $email = $_POST['email'];
        $password= md5($_POST['pass']);

        $check_email = "SELECT * FROM tbl_customer WHERE cusEmail = '$email' AND cusPassword = '$password' LIMIT 1";
        $result_check = $db->select($check_email);
        if ($result_check) {
            $value = $result_check->fetch_assoc();
            
            if ($value['accStatus'] == '0') {
                echo 'locked';
            } else {
                Session::set('customer_login', true);
                Session::set('customer_id', $value['cusId']);
                $fullname = $value['cusFirstname'].' '.$value['cusLastname'];
                Session::set('customer_name', $fullname);
                echo 'successful';
            }
            
        } else {
            echo 'unsuccessful';
        }
    }
         
?>