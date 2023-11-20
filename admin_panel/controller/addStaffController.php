<?php
    include_once "../../lib/database.php";
    $db = new Database();
    
    if(isset($_POST['ad_role']))
    {

        $username = $_POST['ad_username'];
        $password= md5($_POST['ad_password']);
        $firstname = $_POST['ad_FN'];
        $lastname = $_POST['ad_LN'];
        $sex = $_POST['ad_sex'];
        $email = $_POST['ad_email'];
        $phone = $_POST['ad_phone'];
        $role = $_POST['ad_role'];

        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date("Y-m-d H:i:s");

        $check_username = "SELECT * FROM tbl_admin WHERE adUsername = '$username' LIMIT 1";
        $result_check = $db->select($check_username);
        if ($result_check) {
            echo 'unsuccessful';
        } else {

            $query = "INSERT INTO tbl_admin(adUsername, adPassword, adFirstname, adLastname, adSex, adEmail, adPhone, dateCreate, adRole)
                    VALUES ('$username', '$password', '$firstname', '$lastname', '$sex', '$email', '$phone', '$date', '$role')";
            $result_insert = $db->insert($query);
        
            if(!$result_insert) {
                echo 'unsuccessful';
            } else {
                echo $username;
            }
        }
     
    }
        
?>