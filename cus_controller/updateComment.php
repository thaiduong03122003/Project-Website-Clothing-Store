<?php
    include_once "../lib/database.php";
    $db = new Database();

    if(isset($_POST['comment']))
    {
        $cusId = $_POST['cusId'];
        $pdId = $_POST['pdId'];
        $comment = $_POST['comment'];
        $dateSend = date('Y/m/d');

        $query = "INSERT INTO tbl_rate(cusId, pdId, rate, comment, date)
                    VALUES ('$cusId', '$pdId', 5, '$comment', '$dateSend')";
            $result_insert = $db->insert($query);
        
            if(!$result_insert) {
                echo $result_insert;
            } else {
                echo 'successful';
            }
        
    }
?>
