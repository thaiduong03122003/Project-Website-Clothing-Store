<div class="container p-5">

<h4>Edit Staff/Admin</h4>

<?php
    include_once "../../classes/cls_staff.php";

    $staff = new staff();

	$id_staff = $_POST['record'];

	$get_staff_id = $staff->show_staff_by_id($id_staff);
    if ($get_staff_id) {
        while ($result_get_staff = $get_staff_id->fetch_assoc()) {

?>

<form id="update-Items" enctype='multipart/form-data'>

    <div class="form-group">
      <input type="text" class="form-control" id="id" value="<?=$result_get_staff['adId']?>" hidden>
    </div>

    <div class="form-group">
        <label for="username">Username:</label>
        <input type="text" class="form-control" id="username" value="<?=$result_get_staff['adUsername']?>"  required>
    </div>

    <div class="form-group">
        <label for="firstname">First Name:</label>
        <input type="text" class="form-control" id="firstname" value="<?=$result_get_staff['adFirstname']?>">
    </div>

    <div class="form-group">
        <label for="lastname">Last Name:</label>
        <input type="text" class="form-control" id="lastname" value="<?=$result_get_staff['adLastname']?>">
    </div>

    <div class="form-group">
        <label for="lname">Sex:</label>
        <div class="row ml-5">
            <div class="col-auto">
                <div class="form-check form-check-inline">
                    <input class="form-check-input form-check-lg" type="radio" name="sex" value="Male" <?php if($result_get_staff['adSex'] == 'Male') echo 'checked'?>>
                    <label class="form-check-label" for="male">Male</label>
                </div>
            </div>
            <div class="col-auto">
                <div class="form-check form-check-inline">
                    <input class="form-check-input form-check-lg" type="radio" name="sex" value="Female" <?php if($result_get_staff['adSex'] == 'Female') echo 'checked'?>>
                    <label class="form-check-label" for="female">Female</label>
                </div>
            </div>
            <div class="col-auto">
                <div class="form-check form-check-inline">
                    <input class="form-check-input form-check-lg" type="radio" name="sex" value="Other" <?php if($result_get_staff['adSex'] == 'Other') echo 'checked'?>>
                    <label class="form-check-label" for="other">Other</label>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <label for="email">Email:</label>
        <input type="text" class="form-control" id="email" value="<?=$result_get_staff['adEmail']?>">
    </div>

    <div class="form-group">
        <label for="phone">Phone:</label>
        <input type="text" class="form-control" id="phone" value="<?=$result_get_staff['adPhone']?>">
    </div>

    <div class="form-group">
        <label for="lname">Role:</label>

        <div class="row ml-5">
            <div class="col-auto">
                <div class="form-check form-check-inline">
                    <input class="form-check-input form-check-lg" type="radio" name="role" value="1" <?php if($result_get_staff['adRole'] == '1') echo 'checked'?>>
                    <label class="form-check-label" for="female">Staff</label>
                </div>
            </div>
            <div class="col-auto">
                <div class="form-check form-check-inline">
                    <input class="form-check-input form-check-lg" type="radio" name="role" value="0" <?php if($result_get_staff['adRole'] == '0') echo 'checked'?>>
                    <label class="form-check-label" for="male">Admin</label>
                </div>
            </div>
        </div>
    </div>
    <div class="form-group">
      <button type="button" onclick="return updateStaff(event)"  style="height:40px" class="btn btn-primary">Update</button>
    </div>

<?php
		}
	}
?>

  </form>

  
</div>