<div class="container_right_side">
  <h3>Sizes List</h3>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">S.N.</th>
        <th class="text-center">Size</th>
        <th class="text-center" colspan="2">Action</th>
      </tr>
    </thead>
    <?php
      include '../../../classes/cls_size.php';

      $size = new size();

      $sizelist = $size->show_sizes();
      if($sizelist) {
        $countsz = 0;
        while ($result_size_list = $sizelist->fetch_assoc()) {
            $countsz++; 
    ?>
    
    <tr>
      <td><?=$countsz?></td>
      <td><?=$result_size_list['sizeName']?></td>
      <td><button class="btn btn-primary" style="height:40px" onclick="sizeEditForm('<?=$result_size_list['sizeId']?>')">Edit</button></td>
      <td><button class="btn btn-danger" style="height:40px" onclick="sizeDelete('<?=$result_size_list['sizeId']?>','<?=$result_size_list['sizeName']?>')">Delete</button></td>
      </tr>

      <?php
        }
      }
    ?>
  </table>

  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-secondary btn_add_right_side" style="height:40px" data-toggle="modal" data-target="#myModal">
    Add Size
  </button>

  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">New Size</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form  enctype='multipart/form-data'  method="POST">
            <div class="form-group">
              <label for="sizename">Size Name:</label>
              <input type="text" class="form-control" id="sizename">
            </div>

            <div class="form-group">
              <button type="button" onclick="addSize(event)" class="btn btn-secondary" id="upload" style="height:40px">Save</button>
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
   