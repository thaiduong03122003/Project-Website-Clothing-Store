<div class="container_right_side">
  <h3>Products List</h3>
  <table class="table ">
    <thead>
      <tr>
        <th class="text-center">S.N.</th>
        <th class="text-center">Product Image</th>
        <th class="text-center">Product Name</th>
        <th class="text-center">Product Description</th>
        <th class="text-center">Category</th>
        <th class="text-center">Brand</th>
        <th class="text-center">Price</th>
        <th class="text-center" colspan="2">Action</th>
      </tr>
    </thead>
    <?php
      include_once '../../classes/cls_product.php';
      include_once '../../helpers/format.php';

      $pd = new product();
      $fm = new Format();

      $pdlist = $pd->show_products();
      if($pdlist) {
        $countpd = 0;
        while ($result_pd_list = $pdlist->fetch_assoc()) {
            $countpd++; 
    ?>
    
    <tr>
      <td><?=$countpd?></td>
      <td><img src='./uploads/<?=$result_pd_list["pdImg"]?>' height='100px'></td>
      <td><?=$result_pd_list['pdName']?></td>
      <td title="<?=$result_pd_list['pdDesc']?>"><?=$fm->textShorten($result_pd_list['pdDesc'], 50);?></td>
      <td><?=$result_pd_list['catName']?></td>
      <td><?=$result_pd_list['brandName']?></td>
      <td><?=$result_pd_list['pdPrice']?></td>
      <td><button class="btn btn-primary" style="height:40px" onclick="productEditForm('<?=$result_pd_list['pdId']?>')">Edit</button></td>
      <td><button class="btn btn-danger" style="height:40px" onclick="productDelete('<?=$result_pd_list['pdId']?>','<?=$result_pd_list['pdName']?>')">Delete</button></td>
      </tr>
    <?php
        }
      }
    ?>
  </table>

  <!-- Trigger the modal with a button -->
  <button type="button" class="btn btn-secondary btn_add_right_side" style="height:40px" onclick="productAddForm()">
    Add Product
  </button>

</div>