<?php
include_once "../../../lib/database.php";
$db = new Database();

if (isset($_POST['upload'])) {
    $pdname = $_POST['pdname'];
    $pdprice = $_POST['pdprice'];
    $pddesc = $_POST['pddesc'];
    $category = $_POST['category'];
    $brand = $_POST['brand'];
    $status = $_POST['status'];
    $date = $_POST['date'];
    if(empty($date)) {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = date("Y/m/d");
    } else {
        $date = date('Y/m/d', strtotime($date));
    }

    $check_pdname = "SELECT * FROM tbl_product WHERE pdName = '$pdname' AND catId = '$category' AND brandId = '$brand' LIMIT 1";
    $result_check = $db->select($check_pdname);

    if ($result_check) {
        echo 'unsuccessful';
    } else {
        $main_image = '';
        $desc_images = array();

        // Xử lý ảnh chính
        if (!empty($_FILES['file']['name'])) {
            $permited = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $_FILES['file']['name'];
            $file_size = $_FILES['file']['size'];
            $file_temp = $_FILES['file']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10) . '.' . $file_ext;
            $uploaded_image = "../../uploads/" . $unique_image;

            if (in_array($file_ext, $permited) === false || $file_size > 2097152) {
                echo 'notsuitable';
                exit;
            }

            move_uploaded_file($file_temp, $uploaded_image);
            $main_image = $unique_image;
        } else {
            echo 'notupload';
            exit;
        }

        // Xử lý các ảnh mô tả
        if (!empty($_FILES['files']['name'][0])) {
            $file_count = count($_FILES['files']['name']);
            for ($i = 0; $i < $file_count; $i++) {
                $file_name = $_FILES['files']['name'][$i];
                $file_size = $_FILES['files']['size'][$i];
                $file_temp = $_FILES['files']['tmp_name'][$i];
                $div = explode('.', $file_name);
                $file_ext = strtolower(end($div));
                $unique_image = substr(md5(time() . $i), 0, 10) . '.' . $file_ext;
                $uploaded_image = "../../uploads/" . $unique_image;

                if (in_array($file_ext, $permited) === false || $file_size > 2097152) {
                    echo 'notsuitable';
                    exit;
                }

                move_uploaded_file($file_temp, $uploaded_image);
                $desc_images[] = $unique_image;
            }
        } else {
            echo 'notupload';
            exit;
        }

        // Chuyển mảng $desc_images thành chuỗi để lưu vào cột pdDescImg
        $desc_images_str = implode(',', $desc_images);

        $query = "INSERT INTO tbl_product (pdName, pdDesc, pdPrice, pdImg, pdDescImg, pdDate, pdStatus,catId, brandId) 
                  VALUES ('$pdname', '$pddesc', '$pdprice', '$main_image', '$desc_images_str', '$date', $status, '$category', '$brand')";

        $result_insert = $db->insert($query);

        if (!$result_insert) {
            echo 'unsuccessful';
        } else {
            echo $pdname;
        }
    }
}
?>
