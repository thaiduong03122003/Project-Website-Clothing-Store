<?php
    include_once "../../lib/database.php";
    $db = new Database();

    if(isset($_POST['id']))
    {
        $id = $_POST['id'];
        $username = $_POST['username'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $sex = $_POST['sex'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $role = $_POST['role'];

        $check_username = "SELECT * FROM tbl_admin WHERE adUsername = '$username' AND adId != '$id' LIMIT 1";
        $result_check = $db->select($check_username);
        if ($result_check) {
            echo 'unsuccessful';
        } else {

            $query = "UPDATE tbl_admin SET 
                adUsername = '$username', 
                adFirstname = '$firstname',  
                adLastname = '$lastname',  
                adSex = '$sex', 
                adEmail = '$email', 
                adPhone = '$phone', 
                adRole = '$role'
                WHERE adId = '$id'";
            $result_update = $db->update($query);
        
            if(!$result_update) {
                echo 'unsuccessful';
            } else {
                echo $username;
            }
        }
     
    }
?>