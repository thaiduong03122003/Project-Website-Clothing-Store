<?php
    include_once "../../../lib/database.php";
    $db = new Database();
    
    if(isset($_POST['record']))
    {
        $name = $_POST['record'];
        
        $check_brandname = "SELECT * FROM tbl_brand WHERE brandName = '$name' LIMIT 1";
        $result_check = $db->select($check_brandname);
        if ($result_check) {
            echo 'unsuccessful';
        } else {

            $query = "INSERT INTO tbl_brand(brandName) VALUES ('$name')";
            $result_insert = $db->insert($query);
        
            if(!$result_insert) {
                echo 'unsuccessful';
            } else {
                echo $name;
            }
        }
    }     
?>