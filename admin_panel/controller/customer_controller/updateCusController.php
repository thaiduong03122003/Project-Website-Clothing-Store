<?php
    include_once "../../../lib/database.php";
    $db = new Database();

    if(isset($_POST['id']))
    {
        $id = $_POST['id'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $sex = $_POST['sex'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        

        if (!empty($_POST['password'])) {
            $password = md5($_POST['password']);

            $query = "UPDATE tbl_customer SET 
                cusFirstname = '$firstname',  
                cusLastname = '$lastname',
                cusSex = '$sex', 
                cusEmail = '$email', 
                cusPhone = '$phone', 
                cusPassword = '$password'
                WHERE cusId = '$id'";

        } else {
            $query = "UPDATE tbl_customer SET 
                cusFirstname = '$firstname',  
                cusLastname = '$lastname',
                cusSex = '$sex', 
                cusEmail = '$email', 
                cusPhone = '$phone'
                WHERE cusId = '$id'";
        }
        
        $result_update = $db->update($query);
    
        if(!$result_update) {
            echo 'unsuccessful';
        } else {
            echo 'successful';
        }
    }
?>