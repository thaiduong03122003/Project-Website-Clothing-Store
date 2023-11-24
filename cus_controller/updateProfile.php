<?php
    include_once "../lib/database.php";
    $db = new Database();

    if(isset($_POST['firstname']))
    {
        $id = $_POST['id'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];

        $check_email = "SELECT * FROM tbl_customer WHERE cusEmail = '$email' AND cusId != '$id' LIMIT 1";
        $result_check = $db->select($check_email);
        if ($result_check) {
            echo 'unsuccessful';
        } else {

            $query = "UPDATE tbl_customer SET 
                cusFirstname = '$firstname',
                cusLastname = '$lastname',
                cusEmail = '$email',
                cusPhone = '$phone'
                WHERE cusId = '$id'";
            $result_update = $db->update($query);
        
            if(!$result_update) {
                echo 'unsuccessful';
            } else {
                echo 'successful';
            }
        }
     
    }
?>
