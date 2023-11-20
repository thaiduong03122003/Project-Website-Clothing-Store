<?php
    include_once "../../lib/database.php";
    $db = new Database();
    
    if(isset($_POST['record']))
    {
        $name = $_POST['record'];
        
        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['file']['name'];
        $file_size = $_FILES['file']['size'];
        $file_temp = $_FILES['file']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
        $uploaded_image = "../uploads/" . $unique_image;

        if (in_array($file_ext, $permited) === false || $file_size > 2097152) {
            echo 'notsuitable';
            exit;
        }
        
        $check_catname = "SELECT * FROM tbl_category WHERE catName = '$name' LIMIT 1";
        $result_check = $db->select($check_catname);
        if ($result_check) {
            echo 'unsuccessful';
        } else {

            move_uploaded_file($file_temp, $uploaded_image);
            $query = "INSERT INTO tbl_category(catName, catImg) VALUES ('$name', '$unique_image')";
            $result_insert = $db->insert($query);
        
            if(!$result_insert) {
                echo 'unsuccessful';
            } else {
                echo $name;
            }
        }
    }
?>