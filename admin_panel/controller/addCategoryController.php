<?php
    include_once "../../lib/database.php";
    $db = new Database();
    
    if(isset($_POST['record']))
    {
        $name = $_POST['record'];
        
        $check_catname = "SELECT * FROM tbl_category WHERE catName = '$name' LIMIT 1";
        $result_check = $db->select($check_catname);
        if ($result_check) {
            echo 'unsuccessful';
        } else {

            $query = "INSERT INTO tbl_category(catName) VALUES ('$name')";
            $result_insert = $db->insert($query);
        
            if(!$result_insert) {
                echo 'unsuccessful';
            } else {
                echo $name;
            }
        }
    }
?>