<?php
    include_once "../../../lib/database.php";
    $db = new Database();

    if(isset($_POST['brandname']))
    {
        $id = $_POST['record'];
        $brandname = $_POST['brandname'];

        $check_brandname = "SELECT * FROM tbl_brand WHERE brandName = '$brandname' AND brandId != '$id' LIMIT 1";
        $result_check = $db->select($check_brandname);
        if ($result_check) {
            echo 'unsuccessful';
        } else {

            $query = "UPDATE tbl_brand SET 
                brandName = '$brandname'
                WHERE brandId = '$id'";
            $result_update = $db->update($query);
        
            if(!$result_update) {
                echo 'unsuccessful';
            } else {
                echo $brandname;
            }
        }
     
    }
?>
