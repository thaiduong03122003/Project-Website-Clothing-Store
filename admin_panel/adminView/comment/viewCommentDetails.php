<?php
        include_once "../../../lib/database.php";
        include_once "../../../classes/cls_comment.php";
        $db = new Database();
        $cmt = new comment();
        $id= $_GET['cId'];
        
        $cmtdetail = $cmt->show_info_detail($id);
      if($cmtdetail) {
        
        while ($result_cmt_detail = $cmtdetail->fetch_assoc()) {
          $fullName = $result_cmt_detail['cusFirstname'] . " " . $result_cmt_detail['cusLastname'];
    ?>


<div class="container">
  <div class="productImg" style="text-align: center;">
    <img height="150px" src="./uploads/<?=$result_cmt_detail["pdImg"]?>">
    <h3><?=$result_cmt_detail["pdName"]?></h3>
  </div>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Fullname</th>
            <th>Comment</th>
            <th>Date</th>
        </tr>
    </thead>

                <tr>
                    <td><?=$result_cmt_detail["cId"]?></td>
                    <td><?=$fullName?></td>
                    <td><?=$result_cmt_detail["comment"]?></td>
                    <td><?=$result_cmt_detail["date"]?></td>
      <?php
        }
      }
      ?>
</table>
</div>
