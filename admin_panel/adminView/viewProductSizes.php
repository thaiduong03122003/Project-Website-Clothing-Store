<div class="container_right_side">
  <h3>Product Sizes List</h3>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">S.N.</th>
        <th class="text-center">Image</th>
        <th class="text-center">Product Name</th>
        <th class="text-center">Size</th>
        <th class="text-center">Stock Quantity</th>
        <th class="text-center" colspan="2">Action</th>
      </tr>
    </thead>
    <?php
      include '../../classes/cls_product_size.php';
      include '../../classes/cls_product.php';
      include '../../classes/cls_size.php';
      
      $ps = new productsize();

      $pslist = $ps->show_product_sizes();
      if($pslist) {
        $countps = 0;
        while ($result_ps_list = $pslist->fetch_assoc()) {
            $countps++; 
    ?>
    
    <tr>
      <td><?=$countps?></td>
      <td><img src='./uploads/<?=$result_ps_list["pdImg"]?>' height='100px'></td>
      <td><?=$result_ps_list['pdName']?></td>
      <td><?=$result_ps_list['sizeName']?></td>
      <td><?=$result_ps_list['quantityInStock']?></td>
      <td><button class="btn btn-primary" style="height:40px" onclick="pdSizeEditForm('<?=$result_ps_list['psId']?>')">Edit</button></td>
      <td><button class="btn btn-danger" style="height:40px" onclick="pdSizeDelete('<?=$result_ps_list['psId']?>','<?=$result_ps_list['pdName']?>')">Delete</button></td>
    </tr>

    <?php
        }
      }
    ?>
  </table>

  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-secondary btn_add_right_side" style="height:40px" data-toggle="modal" data-target="#myModal">
    Add Product Size
  </button>

  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">New Product Size</h4>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <form  enctype='multipart/form-data'  method="POST">

            <div class="form-group">
              <label>Product Name:</label>
              <select id="pdname" >
                <option disabled selected>Select product</option>

                <?php
                    $pd = new product();
                    $pdlist = $pd->show_products();
                    if ($pdlist) {
                        while($resultpd = $pdlist->fetch_assoc()) {
                ?>

                <option value="<?=$resultpd['pdId']?>"><?=$resultpd['pdName']?></option>

                <?php
                        }
                    }
                ?>

              </select>
            </div>
            
            <div class="form-group">
              <label>Size:</label>
              <select id="sizename" >
                <option disabled selected>Select size</option>

                <?php
                    $size = new size();
                    $szlist = $size->show_sizes();
                    if ($szlist) {
                        while($resultsz = $szlist->fetch_assoc()) {
                ?>

                <option value="<?=$resultsz['sizeId']?>"><?=$resultsz['sizeName']?></option>

                <?php
                        }
                    }
                ?>

              </select>
            </div>
            
            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="number" class="form-control" id="quantity">
            </div>
            
            <div class="form-group">
              <button type="button" onclick="addProductSize(event)" class="btn btn-secondary" id="upload" style="height:40px">Save</button>
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
   