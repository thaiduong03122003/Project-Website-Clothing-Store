<?php
    include_once "../lib/database.php";
    $db = new Database();
    
    if(isset($_POST['record']))
    {
        $id = $_POST['record'];
        
        $query = "SELECT * FROM tbl_ward WHERE districtId = '$id'";
        $result = $db->select($query);
        if ($result) {
            while($result_ward = $result->fetch_assoc()) {

?>

                <option value="<?=$result_ward['wardId']?>">
                    <?=$result_ward['wardName']?>
                </option>

<?php
            }
        }
    }
?>