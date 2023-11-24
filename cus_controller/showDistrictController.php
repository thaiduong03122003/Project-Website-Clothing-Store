<?php
    include_once "../lib/database.php";
    $db = new Database();
    
    if(isset($_POST['record']))
    {
        $id = $_POST['record'];
        
        $query = "SELECT * FROM tbl_district WHERE provinceId = '$id'";
        $result = $db->select($query);
        if ($result) {
            while($result_district = $result->fetch_assoc()) {

?>

                <option value="<?=$result_district['districtId']?>">
                    <?=$result_district['districtName']?>
                </option>

<?php
            }
        }
    }
?>