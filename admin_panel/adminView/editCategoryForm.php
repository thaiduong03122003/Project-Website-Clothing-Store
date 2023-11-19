<div class="container p-5">

<h4>Edit Category Name</h4>

<?php
    include_once "../../classes/cls_category.php";

    $cat = new category();

	$id_cat = $_POST['record'];

	$get_cat_id = $cat->show_cat_by_id($id_cat);
    if ($get_cat_id) {
        while ($result_get_cat = $get_cat_id->fetch_assoc()) {

?>

<form id="update-Items" enctype='multipart/form-data'>

    <div class="form-group">
      <input type="text" class="form-control" id="id" value="<?=$result_get_cat['catId']?>" hidden>
    </div>

    <div class="form-group">
        <label for="catname">Category Name:</label>
        <input type="text" class="form-control" id="catname" value="<?=$result_get_cat['catName']?>">
    </div>

    <div class="form-group">
      <button type="button" onclick="return updateCategory(event)"  style="height:40px" class="btn btn-primary">Update</button>
    </div>

<?php
		}
	}
?>

  </form>

  
</div>