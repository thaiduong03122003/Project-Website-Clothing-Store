<div class="container">
<table class="table table-striped">
    <thead>
        <tr>
            <th>S.N.</th>
            <th>Product Image</th>
            <th>Product Name</th>
            <th>Size</th>
            <th>Quantity</th>
            <th>Total Unit Price</th>
        </tr>
    </thead>

    <?php
        include_once "../../lib/database.php";

        $db = new Database();

        $id= $_GET['orderID'];
        
        $sql = "SELECT * FROM tbl_product_size ps INNER JOIN tbl_order_details d 
            ON ps.psId = d.psId 
            WHERE d.orderId = $id";

        $result=$db->select($sql);

        $count=1;

        if ($result){
            while ($row = $result->fetch_assoc()) {
                $ps_id = $row['psId'];
    ?>

                <tr>
                    <td><?=$count?></td>
                    <?php
                       $subqry = "SELECT * from tbl_product pd 
                                INNER JOIN tbl_product_size ps
                                ON pd.pdId = ps.pdId
                                WHERE ps.psId = $ps_id";

                       $res = $db->select($subqry);

                       if($row2 = $res->fetch_assoc()){
                    ?>

                    <td><img height="100px" src="./uploads/<?=$row2["pdImg"]?>"></td>
                    <td><?=$row2["pdName"] ?></td>

                    <?php
                        }

                        $subqry2="SELECT * from tbl_size s 
                                INNER JOIN tbl_product_size ps
                                ON s.sizeId = ps.sizeId 
                                WHERE ps.psId = $ps_id";

                        $res2=$db->select($subqry2);

                        if($row3 = $res2->fetch_assoc()){
                        ?>

                    <td><?=$row3["sizeName"] ?></td>

                    <?php
                        }
                    ?>

                    <td><?=$row["pdQuantity"]?></td>
                    <td><?=$row["totalPrice"]?></td>
                </tr>
    <?php
                $count=$count+1;
            }
        }else{
            echo "error";
        }
    ?>
</table>
</div>
