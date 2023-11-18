<div class="container_right_side">
  <h2>All Staff/Admins</h2>
  <table class="table ">
    <thead>
      <tr>
        <th title="Serial number" class="text-center">S.N.</th>
        <th title="Tên đăng nhập" class="text-center">Username</th>
        <th title="Tên" class="text-center">Fisrt Name</th>
        <th title="Họ" class="text-center">Last Name</th>
        <th title="Giới tính" class="text-center">Sex</th>
        <th class="text-center">Email</th>
        <th title="SĐT liên hệ" class="text-center">Phone</th>
        <th title="Chức vụ" class="text-center">Role</th>
        <th class="text-center" colspan="2">Action</th>

      </tr>
    </thead>
    <?php
      include '../../classes/cls_staff.php';

      $staff = new staff();

      $stafflist = $staff->show_staff();
      if($stafflist) {
        $count = 0;
        while ($result_staff_list = $stafflist->fetch_assoc()) {
            $count++; 
    ?>
    <tr>
      <td><?=$count?></td>
      <td><?=$result_staff_list['adUsername']?></td>
      <td><?=$result_staff_list['adFirstname']?></td>
      <td><?=$result_staff_list['adLastname']?></td>
      <td><?=$result_staff_list['adSex']?></td>
      <td><?=$result_staff_list['adEmail']?></td>
      <td><?=$result_staff_list['adPhone']?></td>
      

      <?php 
        if ($result_staff_list['adRole'] == '0') {
          echo '<td>Admin</td>';
        } else {
          echo '<td>Staff</td>';
        }
      ?>

      <td><button class="btn btn-primary" style="height:40px" onclick="variationEditForm('<?=$result_staff_list['adId']?>')">Edit</button></td>
      <td><button class="btn btn-danger" style="height:40px" onclick="staffDelete('<?=$result_staff_list['adId']?>','<?=$result_staff_list['adFirstname']?>', '<?=$result_staff_list['adLastname']?>')">Delete</button></td>
    </tr>
    <?php
        }
    }
    ?>
  </table>

  <button type="button" class="btn btn-secondary btn_add_right_side" style="height:40px" data-toggle="modal" data-target="#myModal">
    Add Staff/Admin
  </button>

  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">New User</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form  enctype='multipart/form-data'  method="POST">
            <div class="form-group">
              <label for="username">Username:</label>
              <input type="text" class="form-control" id="ad_username" required>
            </div>

            <div class="form-group">
              <label for="lname">Password:</label>
              <input type="text" class="form-control" id="ad_password" required>
            </div>

            <div class="form-group">
              <label for="fname">First Name:</label>
              <input type="text" class="form-control" id="ad_FN">
            </div>

            <div class="form-group">
              <label for="lname">Last Name:</label>
              <input type="text" class="form-control" id="ad_LN">
            </div>

            <div class="form-group">
              <label for="lname">Sex:</label>
              <div class="row ml-5">
                <div class="col-auto">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input form-check-lg" type="radio" name="sex" value="Male" checked>
                        <label class="form-check-label" for="male">Male</label>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input form-check-lg" type="radio" name="sex" value="Female">
                        <label class="form-check-label" for="female">Female</label>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input form-check-lg" type="radio" name="sex" value="Other">
                        <label class="form-check-label" for="other">Other</label>
                    </div>
                </div>
              </div>
            </div>

            <div class="form-group">
              <label for="lname">Email:</label>
              <input type="text" class="form-control" id="ad_email">
            </div>

            <div class="form-group">
              <label for="lname">Phone:</label>
              <input type="text" class="form-control" id="ad_phone">
            </div>

            <div class="form-group">
              <label for="lname">Role:</label>

              <div class="row ml-5">
                <div class="col-auto">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input form-check-lg" type="radio" name="role" value="Staff" checked>
                        <label class="form-check-label" for="female">Staff</label>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input form-check-lg" type="radio" name="role" value="Admin">
                        <label class="form-check-label" for="male">Admin</label>
                    </div>
                </div>
              </div>
            </div>

            <div class="form-group">
              <button type="button" onclick="addStaff(event)" class="btn btn-secondary" id="upload" style="height:40px">Save</button>
            </div>
          </form>

        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal" style="height:40px">Close</button>
        </div>
      </div>
      
    </div>
  </div>
</div>