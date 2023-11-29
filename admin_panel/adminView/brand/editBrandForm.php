<div class="container p-5">

<h4>Edit Brand Name</h4>

<?php
    include_once "../../../classes/cls_brand.php";

    $brand = new brand();

	$id_brand = $_POST['record'];

	$get_brand_id = $brand->show_brand_by_id($id_brand);
    if ($get_brand_id) {
        while ($result_get_brand = $get_brand_id->fetch_assoc()) {

?>

<form id="update-Items" enctype='multipart/form-data'>

    <div class="form-group">
      <input type="text" class="form-control" id="id" value="<?=$result_get_brand['brandId']?>" hidden>
    </div>

    <div class="form-group">
        <label for="brandname">Brand Name:</label>
        <input type="text" class="form-control" id="brandname" value="<?=$result_get_brand['brandName']?>">
    </div>

    <div class="form-group">
      <button type="button" onclick="return updateBrand(event)"  style="height:40px" class="btn btn-primary">Update</button>
    </div>

<?php
		}
	}
?>

  </form>

  
</div>