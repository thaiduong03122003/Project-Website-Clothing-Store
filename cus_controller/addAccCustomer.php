<?php
    include_once "../lib/database.php";
    $db = new Database();
    
    if(isset($_POST['firstname']))
    {

        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password= md5($_POST['password']);

        $check_email = "SELECT * FROM tbl_customer WHERE cusEmail = '$email' LIMIT 1";
        $result_check = $db->select($check_email);
        if ($result_check) {
            echo 'duplicateEmail';
        } else {

            $query = "INSERT INTO tbl_customer(cusFirstname, cusLastname, cusEmail, cusPhone, cusPassword)
                    VALUES ('$firstname', '$lastname', '$email', '$phone', '$password')";
            $result_insert = $db->insert($query);
        
            if(!$result_insert) {
                echo 'unsuccessful';
            } else {
                echo 'successful';
            }
        }
    }
         
?>