<?php
include_once "../../lib/database.php";
$db = new Database();

if (isset($_POST['upload'])) {
    $pdid = $_POST['pdid'];
    $pdname = $_POST['pdname'];
    $pdprice = $_POST['pdprice'];
    $pddesc = $_POST['pddesc'];
    $category = $_POST['category'];
    $brand = $_POST['brand'];
    
    $check_pdname = "SELECT * FROM tbl_product WHERE pdName = '$pdname' AND catId = '$category' AND brandId = '$brand' AND pdId != '$pdid' LIMIT 1";
     $result_check = $db->select($check_pdname);
    if ($result_check) {
        echo 'unsuccessful';
        exit;

    } else {
        if (!empty($_FILES['file']['name'])) {
            
            $permited = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $_FILES['file']['name'];
            $file_size = $_FILES['file']['size'];
            $file_temp = $_FILES['file']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
            $uploaded_image = "../uploads/" . $unique_image;

            if ($file_size > 2097152) {
                echo 'bigsize';
                exit;
            } elseif (in_array($file_ext, $permited) === false) {
                echo 'notsuitable';
                exit;
            }

            move_uploaded_file($file_temp, $uploaded_image);
            $query = "UPDATE tbl_product SET 
                        pdName = '$pdname',
                        pdprice = '$pdprice',
                        pdDesc = '$pddesc',
                        catId = '$category',
                        brandId = '$brand',
                        pdImg = '$unique_image'
                        WHERE pdId = '$pdid'";

        } else {
            $query = "UPDATE tbl_product SET 
                        pdName = '$pdname',
                        pdprice = '$pdprice',
                        pdDesc = '$pddesc',
                        catId = '$category',
                        brandId = '$brand'
                        WHERE pdId = '$pdid'";
        }

        $result = $db->update($query);
        
        if (!$result) {
            echo 'unsuccessful';
        } else {
            echo $pdname;
        }
    }
}
?>
