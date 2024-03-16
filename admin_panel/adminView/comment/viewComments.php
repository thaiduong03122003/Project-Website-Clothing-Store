<div class="container_right_side">
  <h3>Comments List</h3>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">S.N.</th>
        <th class="text-center">Image</th>
        <th class="text-center">Product Name</th>
        <th class="text-center">CustomerID</th>
        <th class="text-center" colspan="2">Comment</th>
        <th class="text-center">Action</th>
      </tr>
    </thead>
    <?php
      include_once '../../../helpers/format.php';
      include_once '../../../classes/cls_comment.php';
      $cmt = new comment();
      $fm = new Format();

      $cmtlist = $cmt->show_all_info_comment();
      if($cmtlist) {
        $countps = 0;
        while ($result_cmt_list = $cmtlist->fetch_assoc()) {
            $countps++;
            $fullName = $result_cmt_list['cusFirstname'] . " " . $result_cmt_list['cusLastname'];
    ?>
    
    <tr>
      <td><?=$countps?></td>
      <td><img src='./uploads/<?=$result_cmt_list["pdImg"]?>' height='100px'></td>
      <td title="<?=$result_cmt_list['pdName']?>"><?=$fm->textShorten($result_cmt_list['pdName'], 5)?></td>
      <td title="<?=$fullName?>"><?=$result_cmt_list['cusId']?></td>
      <td colspan="2" title="<?=$result_cmt_list['comment']?>"><?=$fm->textShorten($result_cmt_list['comment'], 50)?></td>
      <td><a class="btn btn-primary openPopup" data-href="./adminView/comment/viewCommentDetails.php?cId=<?=$result_cmt_list['cId']?>" href="javascript:void(0);">View</a></td>
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
          
          <h4 class="modal-title">Comment Details</h4>
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
   