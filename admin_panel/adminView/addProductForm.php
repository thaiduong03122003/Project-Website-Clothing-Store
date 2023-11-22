<div class="container p-5">
    <?php
        include_once '../../helpers/format.php';
        include_once '../../classes/cls_category.php';
        include_once '../../classes/cls_brand.php';
    ?>
    <h4>New Product</h4>

    <form  enctype='multipart/form-data'  method="POST">

            <div class="form-group">
                <label for="pdname">Product Name:</label>
                <input type="text" class="form-control" id="pdname">
            </div>

            <div class="form-group">
                <label for="pdprice">Price:</label>
                <input type="text" class="form-control" id="pdprice">
            </div>

            <div class="form-group">
                <label for="pddesc">Description:</label>
                <textarea id="pddesc" class="form-control"></textarea>
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

                <option value="<?=$result['catId']?>"><?=$result['catName']?></option>

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

                <option value="<?=$resultbr['brandId']?>"><?=$resultbr['brandName']?></option>

                <?php
                        }
                    }
                ?>

              </select>
            </div>

            <div class="form-group">
                <label for="date">Date Import Product:</label>
                <input type="date" class="form-control" id="date">
            </div>
            
            <div class="form-group">
                <label for="file">Choose Image:</label>
                <input type="file" class="form-control-file" id="file">
            </div>

            <br>
            
            <div class="form-group">
                <label for="files">Choose Description Image (choose at least 1 image file):</label>
                <input type="file" class="form-control-file" id="files" multiple="multiple">
            </div>

            <div class="form-group">
              <label for="pdstatus">Status:</label>
              <div class="row ml-5">
                <div class="col-auto">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input form-check-lg" type="radio" name="status" value="0" checked>
                        <label class="form-check-label" for="male">Not Featured</label>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input form-check-lg" type="radio" name="status" value="1">
                        <label class="form-check-label" for="female">Featured</label>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input form-check-lg" type="radio" name="status" value="2">
                        <label class="form-check-label" for="other">New Added</label>
                    </div>
                </div>
              </div>
            </div>

            <div class="form-group">
                <button type="button" onclick="addProduct(event)" class="btn btn-secondary" id="upload" style="height:40px">Save</button>
            </div>
    </form>

</div>