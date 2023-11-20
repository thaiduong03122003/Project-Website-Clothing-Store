<?php
    include_once "../../lib/database.php";
    $db = new Database();

    if(isset($_POST['catname']))
    {
        $id = $_POST['id'];
        $catname = $_POST['catname'];

        $check_catname = "SELECT * FROM tbl_category WHERE catName = '$catname' AND catId != '$id' LIMIT 1";
        $result_check = $db->select($check_catname);
        if ($result_check) {
            echo 'unsuccessful';
        } else {

            if (!empty($_FILES['file']['name'])) {
                $file_name = $_FILES['file']['name'];
                $file_size = $_FILES['file']['size'];
                $file_temp = $_FILES['file']['tmp_name'];
        
                $div = explode('.', $file_name);
                $file_ext = strtolower(end($div));
                $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
                $uploaded_image = "../uploads/".$unique_image;
        
                if ($file_size > 2097152 || !in_array($file_ext, array('jpg', 'jpeg', 'png', 'gif'))) {
                    echo 'notsuitable';
                    exit;
                }
        
                move_uploaded_file($file_temp, $uploaded_image);
        
                $query = "UPDATE tbl_category SET 
                            catName = '$catname',
                            catImg = '$unique_image'
                            WHERE catId = '$id'";

            } else {
                $query = "UPDATE tbl_category SET 
                    catName = '$catname'
                    WHERE catId = '$id'";
            }
            
            $result = $db->update($query);
                if (!$result) {
                    echo 'unsuccessful';
                    exit;
                } else {
                    echo $catname;
                }
        }
    }
?>
