<?php
    include_once "../../lib/database.php";
    $db = new Database();
    
    if(isset($_POST['upload']))
    {

        $pdname = $_POST['pdname'];
        $pdprice= $_POST['pdprice'];
        $pddesc = $_POST['pddesc'];
        $category = $_POST['category'];
        $brand = $_POST['brand'];
        
        $permited = array('jpg', 'jpeg', 'png', 'gif');
        $file_name = $_FILES['file']['name'];
        $file_size = $_FILES['file']['size'];
        $file_temp = $_FILES['file']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "../uploads/".$unique_image;

        $check_pdname = "SELECT * FROM tbl_product WHERE pdName = '$pdname' AND catId = '$category' AND brandId = '$brand' LIMIT 1";
        $result_check = $db->select($check_pdname);
        if ($result_check) {
            echo 'unsuccessful';
        } else {
            move_uploaded_file($file_temp,$uploaded_image);
            $query = "INSERT INTO tbl_product(pdName, pdPrice, pdDesc, catId, brandId, pdImg)
                    VALUES ('$pdname', '$pdprice', '$pddesc', '$category', '$brand', '$unique_image')";
            $result_insert = $db->insert($query);
        
            if(!$result_insert) {
                echo 'unsuccessful';
            } else {
                echo $pdname;
            }
        }
     
    }
        
?>