<?php
    include_once '../lib/session.php';
    
    if(isset($_POST['destroy']) && $_POST['destroy'] == true)
    {
        Session::init();
        session_destroy();
        echo 'successful';
    }
?>