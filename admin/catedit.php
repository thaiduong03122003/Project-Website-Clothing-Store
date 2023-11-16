<?php include 'inc/header.php';?>
<?php include 'inc/sidebar.php';?>
<?php
    include '../classes/category.php';
 ?>

<?php
    if(isset($_GET['catid']) && $_GET['catid']!=NULL){
        $id = $_GET['catid'];
    }
    else {
        echo "<script>
                alert('Lỗi!')
                window.location='catlist.php'
            </script>";
    }
    $cat = new category();

    if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$catName = $_POST['catName'];

		$updateCat = $cat->update_category($catName,$id);
	}

?>
        <div class="grid_10">
            <div class="box round first grid">
                <h2>Sửa danh mục</h2>

               <div class="block copyblock"> 

               <?php
                    if(isset($updateCat)) {
                        echo $updateCat;
                    }
                ?>

                <?php
                    $get_cate_name = $cat->getcatbyId($id);
                    if($get_cate_name) {
                        while($result = $get_cate_name->fetch_assoc()) {
                        
                ?>

                 <form action="" method="post">
                    <table class="form">					
                        <tr>
                            <td>
                                <input type="text" value="<?php echo $result['catName'] ?>" name="catName" placeholder="Sửa tên danh mục sản phẩm..." class="medium" />
                            </td>
                        </tr>
						<tr> 
                            <td>
                                <input type="submit" name="submit" Value="Edit" />
                            </td>
                        </tr>
                    </table>
                    </form>
                
                <?php
                        }
                    }
                ?>
                </div>
            </div>
        </div>
<?php include 'inc/footer.php';?>