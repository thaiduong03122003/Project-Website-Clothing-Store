<?php
    include_once "../../../lib/database.php";
    $db = new Database();
    
    if(isset($_POST['record']))
    {
        $name = $_POST['record'];
        
        $check_sizename = "SELECT * FROM tbl_size WHERE sizeName = '$name' LIMIT 1";
        $result_check = $db->select($check_sizename);
        if ($result_check) {
            echo 'unsuccessful';
        } else {

            $query = "INSERT INTO tbl_size(sizeName) VALUES ('$name')";
            $result_insert = $db->insert($query);
        
            if(!$result_insert) {
                echo 'unsuccessful';
            } else {
                echo $name;
            }
        }
    }
?>