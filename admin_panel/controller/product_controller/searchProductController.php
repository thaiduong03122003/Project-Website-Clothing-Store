<?php
    include_once "../../../classes/cls_product.php";
    include_once "../../../helpers/format.php";
    $pd = new product();
    $fm = new Format;

    if (isset($_POST['productName'])) {
        $productName = $_POST['productName'];

        $showpd = $pd->show_products_by_name($productName);
        if($showpd) {
            $countpd = 0;
            while ($resultshow = $showpd->fetch_assoc()) {
                $countpd++; 
                echo "<tr>
                    <td>{$countpd}</td>
                    <td><img src='./uploads/{$resultshow['pdImg']}' height='100px'></td>
                    <td>{$resultshow['pdName']}</td>
                    <td title='{$resultshow['pdDesc']}'>{$fm->textShorten($resultshow['pdDesc'], 50)}</td>
                    <td>{$resultshow['catName']}</td>
                    <td>{$resultshow['brandName']}</td>
                    <td>{$resultshow['pdPrice']}</td>
                    <td>{$resultshow['pdDate']}</td>
                    <td><button class='btn btn-primary' style='height:40px' onclick='productEditForm({$resultshow['pdId']})'>Edit</button></td>
                    <td><button class='btn btn-danger' style='height:40px' onclick='productDelete(\"{$resultshow['pdId']}\",\"{$resultshow['pdName']}\")'>Delete</button></td>
                </tr>";
            }
        } else {
            // Hiển thị thông báo không tìm thấy sản phẩm
            echo '<tr><td colspan="9">Không tìm thấy sản phẩm.</td></tr>';
        }
    }
?>
