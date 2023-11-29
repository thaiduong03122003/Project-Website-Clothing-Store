<div class="container p-5">

<h4>Edit Category Name</h4>

<?php
    include_once "../../../classes/cls_size.php";

    $size = new size();

	$id_size = $_POST['record'];

	$get_size_id = $size->show_size_by_id($id_size);
    if ($get_size_id) {
        while ($result_get_size = $get_size_id->fetch_assoc()) {

?>

<form id="update-Items" enctype='multipart/form-data'>

    <div class="form-group">
      <input type="text" class="form-control" id="id" value="<?=$result_get_size['sizeId']?>" hidden>
    </div>

    <div class="form-group">
        <label for="sizename">Size Name:</label>
        <input type="text" class="form-control" id="sizename" value="<?=$result_get_size['sizeName']?>">
    </div>

    <div class="form-group">
      <button type="button" onclick="return updateSize(event)"  style="height:40px" class="btn btn-primary">Update</button>
    </div>

<?php
		}
	}
?>

  </form>

  
</div>