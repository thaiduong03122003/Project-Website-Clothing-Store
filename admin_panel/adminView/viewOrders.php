<div id="ordersBtn" >
  <h2>Order Details</h2>
  <table class="table table-striped">
    <thead>
      <tr>
        <th>O.N.</th>
        <th>Customer</th>
        <th>Phone</th>
        <th>Ship Address</th>
        <th>Total Price</th>
        <th>OrderDate</th>
        <th>Payment Method</th>
        <th>Order Status</th>
        <th>Payment Status</th>
        <th>More Details</th>
     </tr>
    </thead>

     <?php
      include '../../classes/cls_order.php';

      $or = new order();

      $orlist = $or->show_orders_with_name();
      if($orlist) {
        while ($result_or_list = $orlist->fetch_assoc()) {
            $fullname = $result_or_list['cusLastname']. ' '. $result_or_list['cusFirstname'];
    ?>

       <tr>
          <td><?=$result_or_list["orderId"]?></td>
          <td><?=$fullname?></td>
          <td><?=$result_or_list["cus_Phone"]?></td>
          <td><?=$result_or_list["cus_Address"]?></td>
          <td><?=$result_or_list["orderTotalPrice"]?></td>
          <td><?=$result_or_list["orderDate"]?></td>
          <td><?=$result_or_list["payMethod"]?></td>
           <?php 
                if($result_or_list["orderStatus"]==0){
                            
            ?>
                <td><button class="btn btn-danger" onclick="ChangeOrderStatus('<?=$result_or_list['orderId']?>')">Pending </button></td>
            <?php
                        
                }else{
            ?>
                <td><button class="btn btn-success" onclick="ChangeOrderStatus('<?=$result_or_list['orderId']?>')">Delivered</button></td>
        
            <?php
            }
                if($result_or_list["payStatus"]==0){
            ?>
                <td><button class="btn btn-danger"  onclick="ChangePay('<?=$result_or_list['orderId']?>')">Unpaid</button></td>
            <?php
                        
            }else if($result_or_list["payStatus"]==1){
            ?>
                <td><button class="btn btn-success" onclick="ChangePay('<?=$result_or_list['orderId']?>')">Paid </button></td>
            <?php
                }
            ?>
              
        <td><a class="btn btn-primary openPopup" data-href="./adminView/viewOrderDetails.php?orderID=<?=$result_or_list['orderId']?>" href="javascript:void(0);">View</a></td>
        </tr>
    <?php
            
        }
      }
    ?>
     
  </table>
   
</div>
<!-- Modal -->
<div class="modal fade" id="viewModal" role="dialog">
    <div class="modal-dialog modal-lg">
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          
          <h4 class="modal-title">Order Details</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="order-view-modal modal-body">
        
        </div>
      </div><!--/ Modal content-->
    </div><!-- /Modal dialog-->
  </div>
<script>
     //for view order modal  
    $(document).ready(function(){
      $('.openPopup').on('click',function(){
        var dataURL = $(this).attr('data-href');
    
        $('.order-view-modal').load(dataURL,function(){
          $('#viewModal').modal({show:true});
        });
      });
    });
 </script>