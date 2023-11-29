<?php
    include_once './helpers/format.php';
    include_once './classes/cls_order.php';

    $fm = new Format();
    $od = new order();

?>

<?php
	if(isset($_GET['orderId']) && $_GET['orderId']!=NULL){
        $id = $_GET['orderId'];
    }
    else {
        echo "<script>
                alert('Bạn không thể vào trang này bây giờ!')
                window.location='index.php'
            </script>";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/invoice_style.css">
    <title>Hóa đơn mua hàng</title>
</head>
<body>
    <div class="wrapper">
        <div class="invoice_header">
            <div class="logo">
                Cửa hàng thời trang <span>EVARA</span>
            </div>

            <div class="title">Hóa đơn</div>

            <?php
                $show_order = $od->show_order_with_cus_info($id);
                if($show_order) {
                    $result = $show_order->fetch_assoc();
                    $fullname = $result['cusFirstname'].' '.$result['cusLastname'];
            ?>


            <div class="inv_number">
                <h3>Mã hóa đơn: </h3>
                <h4>#<?=$result['orderId']?></h4>
            </div>

            <div class="inv_date">
                <h3>Thời gian: </h3>
                <h4><?=$result['orderDate']?></h4>
            </div>
        </div>

        <div class="billing_detail">
            <p>Khách hàng: </p>
            <p><?=$fullname?></p>
            <p><span>SĐT: </span><?=$result['cus_Phone']?></p>
            <p><span>Email: </span><?=$result['cusEmail']?></p>
            <p><span>Địa chỉ: </span><?=$result['cus_Address']?></p>
        </div>

        <table>
            <thead>
                <tr>
                    <td>No.</td>
                    <td>Tên sản phẩm</td>
                    <td>S.lg</td>
                    <td>Giá</td>
                </tr>
            </thead>
                
            <tbody>

            <?php
                include_once "./lib/database.php";

                $db = new Database();
                
                $sql = "SELECT * FROM tbl_product_size ps INNER JOIN tbl_order_details d 
                        ON ps.psId = d.psId 
                        WHERE d.orderId = $id";

                $result1=$db->select($sql);

                $count=1;

                if ($result1){
                    while ($row = $result1->fetch_assoc()) {
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
                    
                            $subqry2="SELECT * from tbl_size s 
                                    INNER JOIN tbl_product_size ps
                                    ON s.sizeId = ps.sizeId 
                                    WHERE ps.psId = $ps_id";

                            $res2=$db->select($subqry2);

                            if($row3 = $res2->fetch_assoc()){
                    ?>

                    <td class="l-col"><?=$row2["pdName"]?> (<?=$row3["sizeName"] ?>)</td>
                    <td><?=$row["pdQuantity"]?></td>
                    <td class="r-col"><?=$row["totalPrice"]?></td>

                </tr>

            <?php
                            }
                        }
                        $count++;
                    }
                } else {
                    echo "error";
                }
            ?>

            </tbody>
        </table>

        <div class="total_section">
            <div class="sub">
                <p>Tổng giá: </p>
                <p><?=$result['orderTotalPrice']?></p>
            </div>

            <div class="tax">
                <p>Thuế: </p>
                <p>0%</p>
            </div>
            
            <div class="total">
                <p>Thành tiền: </p>
                <p><?=$result['orderTotalPrice']?></p>
            </div>
        </div>

        <div class="payment_terms">
            <div class="payment_detail">
                <p>Thông tin thanh toán</p>
                <p><span>Tài khoản: </span> #123 456</p>
                <p><span>Tên chủ t.k: </span><?=$fullname?></p>
                <p><span>P.thức thanh toán: </span><?=$result['payMethod'] ?></p>
            </div>

            <?php
                    }
            ?>

            <div class="terms">
                <p>Điều khoản & điều kiện</p>
                <p>Lorem, ipsum dolor sit amet</p>
            </div>

            <div class="message">
                <p>Bạn ơn bạn đã mua hàng!</p>
            </div>
        </div>

        <div class="signature">
            <p>Khách hàng</p>
            <p>(Ký, ghi rõ họ tên)</p>
        </div>
    </div>
</body>
</html>