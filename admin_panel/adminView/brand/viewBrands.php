<div class="container_right_side">
  <h3>Brands List</h3>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">S.N.</th>
        <th class="text-center">Brand Name</th>
        <th class="text-center" colspan="2">Action</th>
      </tr>
    </thead>
    <?php
      include '../../../classes/cls_brand.php';

      $brand = new brand();

      $brlist = $brand->show_brand();
      if($brlist) {
        $countbr = 0;
        while ($result_br_list = $brlist->fetch_assoc()) {
            $countbr++; 
    ?>
    
    <tr>
      <td><?=$countbr?></td>
      <td><?=$result_br_list['brandName']?></td>
      <td><button class="btn btn-primary" style="height:40px" onclick="brandEditForm('<?=$result_br_list['brandId']?>')">Edit</button></td>
      <td><button class="btn btn-danger" style="height:40px" onclick="brandDelete('<?=$result_br_list['brandId']?>','<?=$result_br_list['brandName']?>')">Delete</button></td>
      </tr>

      <?php
        }
      }
    ?>
  </table>

  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-secondary btn_add_right_side" style="height:40px" data-toggle="modal" data-target="#myModal">
    Add Brand
  </button>

  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">New Brand</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form  enctype='multipart/form-data'  method="POST">
            <div class="form-group">
              <label for="username">Brand Name:</label>
              <input type="text" class="form-control" id="br_name" required>
            </div>

            <div class="form-group">
              <button type="button" onclick="addBrand(event)" class="btn btn-secondary" id="upload" style="height:40px">Save</button>
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
   