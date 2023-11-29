<?php
include_once '../../../lib/database.php';
$db = new Database();

if(isset($_POST['upload'])) {
    $pdid = $_POST['pdid'];
    $pdname = $_POST['pdname'];
    $pdprice = $_POST['pdprice'];
    $pddesc = $_POST['pddesc'];
    $category = $_POST['category'];
    $brand = $_POST['brand'];
    $status = $_POST['status'];
    $date = $_POST['date'];

    $date = date('Y/m/d', strtotime($date));

    // Xử lý ảnh chính
    if (!empty($_FILES['file']['name'])) {
        $file_name = $_FILES['file']['name'];
        $file_size = $_FILES['file']['size'];
        $file_temp = $_FILES['file']['tmp_name'];

        $div = explode('.', $file_name);
        $file_ext = strtolower(end($div));
        $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
        $uploaded_image = "../../uploads/".$unique_image;

        if ($file_size > 2097152 || !in_array($file_ext, array('jpg', 'jpeg', 'png', 'gif'))) {
            echo 'notsuitable';
            exit;
        }

        move_uploaded_file($file_temp, $uploaded_image);

        $query = "UPDATE tbl_product SET 
                    pdName = '$pdname',
                    pdPrice = '$pdprice',
                    pdDesc = '$pddesc',
                    pdImg = '$unique_image',
                    pdDate = '$date',
                    pdStatus = '$status',
                    catId = '$category',
                    brandId = '$brand'
                    WHERE pdId = '$pdid'";

        $result = $db->update($query);

        if (!$result) {
            echo 'unsuccessful';
            exit;
        }
    }

    // Xử lý ảnh mô tả
    if (!empty($_FILES['files']['name'][0])) {
        $uploaded_images = array();

        foreach($_FILES['files']['name'] as $key => $image) {
            $file_name = $_FILES['files']['name'][$key];
            $file_size = $_FILES['files']['size'][$key];
            $file_temp = $_FILES['files']['tmp_name'][$key];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time() . $key), 0, 10).'.'.$file_ext;
            $uploaded_image = "../../uploads/".$unique_image;

            if ($file_size > 2097152 || !in_array($file_ext, array('jpg', 'jpeg', 'png', 'gif'))) {
                echo 'notsuitable';
                exit;
            }

            move_uploaded_file($file_temp, $uploaded_image);
            $uploaded_images[] = $unique_image;
        }

        $desc_images = implode(',', $uploaded_images);

        $query = "UPDATE tbl_product SET 
                    pdDescImg = '$desc_images'
                    WHERE pdId = '$pdid'";

        $result = $db->update($query);

        if (!$result) {
            echo 'unsuccessful';
            exit;
        }
    }

    // Nếu không cập nhật ảnh
    if (empty($_FILES['files']['name'][0])) {
        $query = "UPDATE tbl_product SET 
                    pdName = '$pdname',
                    pdPrice = '$pdprice',
                    pdDesc = '$pddesc',
                    pdDate = '$date',
                    pdStatus = '$status',
                    catId = '$category',
                    brandId = '$brand'
                    WHERE pdId = '$pdid'";

        $result = $db->update($query);

        if (!$result) {
            echo 'unsuccessful';
            exit;
        }
    }

    echo $pdname;
}
?>
