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

      </tr>
    </thead>
    <?php
      include '../../classes/cls_customer.php';

      $cs = new customer();

      $cuslist = $cs->show_customer();
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
      <td><?=$result_cus_list['cusAddress']?></td>
    </tr>

    <?php
        }
      }
    ?>

  </table>
  
</div>