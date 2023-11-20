<div class="container_right_side">
  <h3>Categories List</h3>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">S.N.</th>
        <th class="text-center">Image</th>
        <th class="text-center">Category Name</th>
        <th class="text-center" colspan="2">Action</th>
      </tr>
    </thead>
    <?php
      include '../../classes/cls_category.php';

      $cat = new category();

      $catlist = $cat->show_categories();
      if($catlist) {
        $countcat = 0;
        while ($result_cat_list = $catlist->fetch_assoc()) {
            $countcat++; 
    ?>
    
    <tr>
      <td><?=$countcat?></td>
      <td><img src='./uploads/<?=$result_cat_list["catImg"]?>' height='100px'></td>
      <td><?=$result_cat_list['catName']?></td>
      <td><button class="btn btn-primary" style="height:40px" onclick="categoryEditForm('<?=$result_cat_list['catId']?>')">Edit</button></td>
      <td><button class="btn btn-danger" style="height:40px" onclick="categoryDelete('<?=$result_cat_list['catId']?>','<?=$result_cat_list['catName']?>')">Delete</button></td>
      </tr>

      <?php
        }
      }
    ?>
  </table>

  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-secondary btn_add_right_side" style="height:40px" data-toggle="modal" data-target="#myModal">
    Add Category
  </button>

  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">New Category</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form  enctype='multipart/form-data'  method="POST">
            <div class="form-group">
              <label for="catname">Category Name:</label>
              <input type="text" class="form-control" id="catname">
            </div>

            <div class="form-group">
                <label for="file">Choose Image:</label>
                <input type="file" class="form-control-file" id="file">
            </div>

            <div class="form-group">
              <button type="button" onclick="addCategory(event)" class="btn btn-secondary" id="upload" style="height:40px">Save</button>
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
   