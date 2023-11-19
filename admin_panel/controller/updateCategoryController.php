<?php
    include_once "../../lib/database.php";
    $db = new Database();

    if(isset($_POST['catname']))
    {
        $id = $_POST['record'];
        $catname = $_POST['catname'];

        $check_catname = "SELECT * FROM tbl_category WHERE catName = '$catname' AND catId != '$id' LIMIT 1";
        $result_check = $db->select($check_catname);
        if ($result_check) {
            echo 'unsuccessful';
        } else {

            $query = "UPDATE tbl_category SET 
                catName = '$catname'
                WHERE catId = '$id'";
            $result_update = $db->update($query);
        
            if(!$result_update) {
                echo 'unsuccessful';
            } else {
                echo $catname;
            }
        }
     
    }
?>
