<div class="container p-5">
    <?php
        include_once '../../classes/cls_product_size.php';
        include_once '../../classes/cls_product.php';
        include_once '../../classes/cls_size.php';

        $ps = new productsize();
    ?>
    <h4>Edit Product Size</h4>

    <form  enctype='multipart/form-data'  method="POST">
        <?php
            $id_ps = $_POST['record'];

            $get_ps_id = $ps->show_ps_by_id($id_ps);
            if ($get_ps_id) {
                while ($result_get_ps = $get_ps_id->fetch_assoc()) {
        
        ?>
            <div class="form-group">
                <input type="text" class="form-control" id="id" value="<?=$result_get_ps['psId']?>" hidden>
            </div>

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

                <option

                    <?php if($result_get_ps['pdId'] == $resultpd['pdId']) echo 'selected'?>

                value="<?=$resultpd['pdId']?>"><?=$resultpd['pdName']?></option>

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

                <option

                    <?php if($result_get_ps['sizeId'] == $resultsz['sizeId']) echo 'selected'?>

                value="<?=$resultsz['sizeId']?>"><?=$resultsz['sizeName']?></option>

                <?php
                        }
                    }
                ?>

                </select>
            </div>

            <div class="form-group">
                <label for="quantity">Quantity:</label>
                <input type="text" class="form-control" id="quantity" value="<?=$result_get_ps['quantityInStock']?>">
            </div>

            <div class="form-group">
                <button type="button" onclick="updatePdSize(event)" class="btn btn-secondary" id="upload" style="height:40px">Update</button>
            </div>
        
        <?php
		        }
	        }
        ?>
    </form>

</div>