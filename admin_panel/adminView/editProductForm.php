<div class="container p-5">
    <?php
        include_once '../../helpers/format.php';
        include_once '../../classes/cls_category.php';
        include_once '../../classes/cls_brand.php';
        include_once '../../classes/cls_product.php';

        $pd = new product();
    ?>
    <h4>Edit Product</h4>

    <form  enctype='multipart/form-data'  method="POST">
        <?php
            $id_pd = $_POST['record'];

            $get_product_id = $pd->show_product_by_id($id_pd);
            if ($get_product_id) {
                while ($result_get_product = $get_product_id->fetch_assoc()) {
        
        ?>
            <div class="form-group">
                <input type="text" class="form-control" id="id" value="<?=$result_get_product['pdId']?>" hidden>
            </div>

            <div class="form-group">
                <label for="pdname">Product Name:</label>
                <input type="text" class="form-control" id="pdname" value="<?=$result_get_product['pdName']?>">
            </div>

            <div class="form-group">
                <label for="pdprice">Price:</label>
                <input type="text" class="form-control" id="pdprice" value="<?=$result_get_product['pdPrice']?>">
            </div>

            <div class="form-group">
                <label for="pddesc">Description:</label>
                <textarea id="pddesc" class="form-control"><?=$result_get_product['pdDesc']?></textarea>
            </div>

            <div class="form-group">
                <label>Category:</label>
                <select id="category" >
                <option disabled selected>Select category</option>

                <?php
                    $cat = new category();
                    $catlist = $cat->show_categories();
                    if ($catlist) {
                        while($result = $catlist->fetch_assoc()) {
                ?>

                <option

                    <?php if($result_get_product['catId'] == $result['catId']) echo 'selected'?>

                value="<?=$result['catId']?>"><?=$result['catName']?></option>

                <?php
                        }
                    }
                ?>

                </select>
            </div>

            <div class="form-group">
              <label>Brand:</label>
              <select id="brand" >
                <option disabled selected>Select brand</option>

                <?php
                    $brand = new brand();
                    $brandlist = $brand->show_brand();
                    if ($brandlist) {
                        while($resultbr = $brandlist->fetch_assoc()) {
                ?>

                <option

                    <?php if($result_get_product['brandId'] == $resultbr['brandId']) echo 'selected'?>

                value="<?=$resultbr['brandId']?>"><?=$resultbr['brandName']?></option>

                <?php
                        }
                    }
                ?>

              </select>
            </div>
            
            <div class="form-group">
                <label for="file">Choose Image:</label>
                <img class="form-group" src="./uploads/<?php echo $result_get_product['pdImg'] ?>" width=140px > <br>
                <input type="file" class="form-control-file" id="file">
            </div>

            <div class="form-group">
                <button type="button" onclick="updateProduct(event)" class="btn btn-secondary" id="upload" style="height:40px">Update</button>
            </div>
        
        <?php
		        }
	        }
        ?>
    </form>

</div>