<?php
    include_once "../../../lib/database.php";
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

        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date("Y-m-d H:i:s");
        
        $check_username = "SELECT * FROM tbl_admin WHERE adUsername = '$username' AND adId != '$id' LIMIT 1";
        $result_check = $db->select($check_username);
        if ($result_check) {
            echo 'unsuccessful';
            exit;
        } else {

            if (!empty($_POST['password'])) {
                $password = md5($_POST['password']);

                $query = "UPDATE tbl_admin SET 
                    adUsername = '$username', 
                    adPassword = '$password', 
                    adFirstname = '$firstname',  
                    adLastname = '$lastname',
                    adSex = '$sex', 
                    adEmail = '$email', 
                    adPhone = '$phone', 
                    dateCreate = '$date',
                    adRole = '$role'
                    WHERE adId = '$id'";

            } else {
                $query = "UPDATE tbl_admin SET 
                    adUsername = '$username', 
                    adFirstname = '$firstname',  
                    adLastname = '$lastname',  
                    adSex = '$sex', 
                    adEmail = '$email', 
                    adPhone = '$phone', 
                    dateCreate = '$date',
                    adRole = '$role'
                    WHERE adId = '$id'";
            }
            
            $result_update = $db->update($query);
        
            if(!$result_update) {
                echo 'unsuccessful';
            } else {
                echo $username;
            }
        }
     
    }
?>