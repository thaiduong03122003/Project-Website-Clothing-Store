<div class="container p-5">

<h4>Edit Customer</h4>

<?php
    include_once "../../../classes/cls_customer.php";

    $cs = new customer();

	$id_cus = $_POST['record'];

	$get_cus_id = $cs->show_customer_by_id($id_cus);
    if ($get_cus_id) {
        while ($result_get_cus = $get_cus_id->fetch_assoc()) {

?>

<form id="update-Items" enctype='multipart/form-data'>

    <div class="form-group">
      <input type="text" class="form-control" id="id" value="<?=$result_get_cus['cusId']?>" hidden>
    </div>

    <div class="form-group">
        <label for="firstname">First Name:</label>
        <input type="text" class="form-control" id="firstname" value="<?=$result_get_cus['cusFirstname']?>"  required>
    </div>

    <div class="form-group">
        <label for="lastname">Last Name:</label>
        <input type="text" class="form-control" id="lastname" value="<?=$result_get_cus['cusLastname']?>">
    </div>

    <div class="form-group">
        <label for="password">Password (if necessary):</label>
        <input type="text" class="form-control" id="password">
    </div>

    <div class="form-group">
        <label for="lname">Sex:</label>
        <div class="row ml-5">
            <div class="col-auto">
                <div class="form-check form-check-inline">
                    <input class="form-check-input form-check-lg" type="radio" name="sex" value="Male" <?php if($result_get_cus['cusSex'] == 'Male') echo 'checked'?>>
                    <label class="form-check-label" for="male">Male</label>
                </div>
            </div>
            <div class="col-auto">
                <div class="form-check form-check-inline">
                    <input class="form-check-input form-check-lg" type="radio" name="sex" value="Female" <?php if($result_get_cus['cusSex'] == 'Female') echo 'checked'?>>
                    <label class="form-check-label" for="female">Female</label>
                </div>
            </div>
            <div class="col-auto">
                <div class="form-check form-check-inline">
                    <input class="form-check-input form-check-lg" type="radio" name="sex" value="Other" <?php if($result_get_cus['cusSex'] == 'Other') echo 'checked'?>>
                    <label class="form-check-label" for="other">Other</label>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="email">Email:</label>
        <input type="text" class="form-control" id="email" value="<?=$result_get_cus['cusEmail']?>">
    </div>

    <div class="form-group">
        <label for="phone">Phone:</label>
        <input type="text" class="form-control" id="phone" value="<?=$result_get_cus['cusPhone']?>">
    </div>

    
    <div class="form-group">
      <button type="button" onclick="return updateCustomer(event)"  style="height:40px" class="btn btn-primary">Update</button>
    </div>

<?php
		}
	}
?>

  </form>

  
</div>