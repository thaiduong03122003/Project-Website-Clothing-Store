<div class="container_right_side">
  <h3>Coupons List</h3>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">S.N.</th>
        <th class="text-center">Coupon Code</th>
        <th class="text-center">Description</th>
        <th class="text-center">Discount (%)</th>
        <th class="text-center">Expi Date</th>
        <th class="text-center">Status</th>
        <th class="text-center">Action</th>
      </tr>
    </thead>
    <?php
      include '../../classes/cls_coupon.php';

      $cp = new coupon();

      $cplist = $cp->show_coupons();
      if($cplist) {
        $countcp = 0;
        $yesterday = date('Y-m-d', strtotime('-1 day'));

        while ($result_cp_list = $cplist->fetch_assoc()) {
            $countcp++;

            $couponDate = DateTime::createFromFormat('Y/m/d', $result_cp_list['couponDate']);
            $couponDateFormatted = $couponDate->format('Y-m-d');

            if (strtotime($couponDateFormatted) < strtotime($yesterday)) {
                $status = 0;
            } else {
              $status = 1;
            }
    ?>
    
    <tr>
      <td><?=$countcp?></td>
      <td><?=$result_cp_list['couponCode']?></td>
      <td><?=$result_cp_list['couponDesc']?></td>
      <td><?=$result_cp_list['couponDiscount']?></td>
      <td><?=$result_cp_list['couponDate']?></td>

      <td>
        <?= $status == 0 ? 'Expired' : 'Active' ?>
      </td>

      <td><button class="btn btn-danger" style="height:40px" onclick="couponDelete('<?=$result_cp_list['couponId']?>', '<?=$result_cp_list['couponCode']?>')">Delete</button></td>
      </tr>

      <?php
        }
      }
    ?>
  </table>

  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-secondary btn_add_right_side" style="height:40px" data-toggle="modal" data-target="#myModal">
    Add Coupon
  </button>

  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">New Coupon</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form  enctype='multipart/form-data'  method="POST">
            <div class="form-group">
              <label for="cpcode">Coupon Code:</label>
              <input type="text" class="form-control" id="cpcode">
            </div>

            <div class="form-group">
              <label for="cpdesc">Description:</label>
              <textarea id="cpdesc" class="form-control"></textarea>
            </div>

            <div class="form-group">
              <label for="discount">Discount Value (%):</label>
              <input type="number" min="1" class="form-control" id="discount">
            </div>

            <div class="form-group">
              <label for="exdate">Expiration Date:</label>
              <input type="date" class="form-control" id="exdate">
            </div>

            <div class="form-group">
              <button type="button" onclick="addCoupon(event)" class="btn btn-secondary" id="upload" style="height:40px">Save</button>
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
   