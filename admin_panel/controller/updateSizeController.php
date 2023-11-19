<?php
    include_once "../../lib/database.php";
    $db = new Database();

    if(isset($_POST['sizename']))
    {
        $id = $_POST['record'];
        $sizename = $_POST['sizename'];

        $check_sizename = "SELECT * FROM tbl_size WHERE sizeName = '$sizename' AND sizeId != '$id' LIMIT 1";
        $result_check = $db->select($check_sizename);
        if ($result_check) {
            echo 'unsuccessful';
        } else {

            $query = "UPDATE tbl_size SET 
                sizeName = '$sizename'
                WHERE sizeId = '$id'";
            $result_update = $db->update($query);
        
            if(!$result_update) {
                echo 'unsuccessful';
            } else {
                echo $sizename;
            }
        }
     
    }
?>
