<div class="container_right_side">
  <h2>All Customers</h2>
  <table class="table ">
    <thead>
      <tr>
        <th title="Serial number" class="text-center">S.N.</th>
        <th title="Tên" class="text-center">Fisrt Name</th>
        <th title="Họ" class="text-center">Last Name</th>
        <th title="Giới tính" class="text-center">Sex</th>
        <th class="text-center">Email</th>
        <th title="SĐT liên hệ" class="text-center">Phone</th>
        <th title="Địa chỉ" class="text-center">Address</th>
        <th title="Trạng thái tài khoản" class="text-center">Status</th>
        <th class="text-center" colspan="2">Action</th>

      </tr>
    </thead>
    <?php
      include '../../../classes/cls_customer.php';
      include_once '../../../helpers/format.php';

      $cs = new customer();
      $fm = new Format();

      $cuslist = $cs->show_customers();
      if($cuslist) {
        $countcus = 0;
        while ($result_cus_list = $cuslist->fetch_assoc()) {
            $countcus++; 
    ?>
    <tr>
        <td><?=$countcus?></td>
        <td><?=$result_cus_list['cusFirstname']?></td>
        <td><?=$result_cus_list['cusLastname']?></td>
        <td><?=$result_cus_list['cusSex']?></td>
        <td><?=$result_cus_list['cusEmail']?></td>
        <td><?=$result_cus_list['cusPhone']?></td>
        <td title="<?=$result_cus_list['cusAddress']?>"><?=$fm->textShorten($result_cus_list['cusAddress'], 20)?></td>
      
      <?php 
          if($result_cus_list["accStatus"]==0){           
      ?>
            <td title="Tài khoản đã bị khóa">
              <img style="cursor: pointer;" src="./assets/images/lock.png" width="24px" onclick="changeAccStatus('<?=$result_cus_list['cusId']?>', '<?=$result_cus_list['cusFirstname']?>', '<?=$result_cus_list['cusLastname']?>')">
            </td>
      <?php
                  
          }else{
      ?>
            <td title="Tài khoản đang được sử dụng">
              <img style="cursor: pointer;" src="./assets/images/unlock.png" width="24px" onclick="changeAccStatus('<?=$result_cus_list['cusId']?>', '<?=$result_cus_list['cusFirstname']?>', '<?=$result_cus_list['cusLastname']?>')">
            </td>
      <?php
          }
      ?>
        <td><button class="btn btn-primary" style="height:40px" onclick="customerEditForm('<?=$result_cus_list['cusId']?>')">Edit</button></td>
        <td><button class="btn btn-danger" style="height:40px" onclick="customerDelete('<?=$result_cus_list['cusId']?>', '<?=$result_cus_list['cusFirstname']?>', '<?=$result_cus_list['cusLastname']?>')">Delete</button></td>
    </tr>

    <?php
        }
      }
    ?>

  </table>
  
</div>