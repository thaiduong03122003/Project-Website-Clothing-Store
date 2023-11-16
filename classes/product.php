<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
?>

<?php
    class product 
    {
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function insert_product($data,$files) {

            $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
            $brand = mysqli_real_escape_string($this->db->link, $data['brand']);
            $category = mysqli_real_escape_string($this->db->link, $data['category']);
            $product_desc = mysqli_real_escape_string($this->db->link, $data['product_desc']);
            $price = mysqli_real_escape_string($this->db->link, $data['price']);
            $type = mysqli_real_escape_string($this->db->link, $data['type']);
            
            $permited = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "uploads/".$unique_image;

            if($productName=="" || $brand== "" || $category== "" || $product_desc== "" || $price== "" || $type== "" || $file_name== "") {
                $alert = "<span class='error'>Bạn phải nhập đầy đủ các mục thông tin của sản phẩm trước khi Save!</span>";
                return $alert;
            } else {
                move_uploaded_file($file_temp, $uploaded_image);
                $query = "INSERT INTO tbl_product(productName, brandId, catId, product_desc, price, type, image) VALUES('$productName', '$brand', '$category', '$product_desc', '$price', '$type', '$unique_image')";
                $result = $this->db->insert($query);
                if($result) {
                    $alert = "<span class='success'>Thêm sản phẩm thành công!</span>";
                    return $alert;
                } else {
                    $alert = "<span class='error'>Thêm sản phẩm thất bại!</span>";
                    return $alert;
                }
            }
        }

        public function show_products() {
            $query = "SELECT pd.*, ct.catName, br.brandName FROM tbl_product pd INNER JOIN tbl_category ct ON pd.catId = ct.catId INNER JOIN tbl_brand br ON pd.brandId = br.brandId ORDER BY pd.productId DESC";
            $result = $this->db->select($query);
            return $result;
        }

        public function getproductbyId($id) {
            $query = "SELECT * FROM tbl_product WHERE productId = '$id'";
            $result = $this->db->select($query);
            return $result;
        }

        public function update_product($data,$files,$id) {
            $productName = mysqli_real_escape_string($this->db->link, $data['productName']);
            $brand = mysqli_real_escape_string($this->db->link, $data['brand']);
            $category = mysqli_real_escape_string($this->db->link, $data['category']);
            $product_desc = mysqli_real_escape_string($this->db->link, $data['product_desc']);
            $price = mysqli_real_escape_string($this->db->link, $data['price']);
            $type = mysqli_real_escape_string($this->db->link, $data['type']);
            
            $permited = array('jpg', 'jpeg', 'png', 'gif');
            $file_name = $_FILES['image']['name'];
            $file_size = $_FILES['image']['size'];
            $file_temp = $_FILES['image']['tmp_name'];

            $div = explode('.', $file_name);
            $file_ext = strtolower(end($div));
            $unique_image = substr(md5(time()), 0, 10).'.'.$file_ext;
            $uploaded_image = "uploads/".$unique_image;

            if($productName=="" || $brand== "" || $category== "" || $product_desc== "" || $price== "" || $type== "" || $file_name== "") {
                $alert = "<span class='error'>Bạn phải nhập đầy đủ các mục thông tin của sản phẩm trước khi Save!</span>";
                return $alert;
            } else {
                //Nếu người dùng cập nhật ảnh
                if(!empty($file_name)) {
                    if ($file_size > 2097152) {
                        echo "<script>
                                alert('Kích thước file ảnh của bạn quá lớn, hãy chọn ảnh có kích thước dưới 2MB!')
                            </script>";
                        return false;
                    }else if (in_array($file_ext, $permited) === false) {
                        echo "<script>
                                alert('Bạn chỉ có thể chọn ảnh có đuôi mở rộng: ".implode(', ', $permited)."')
                            </script>";
                        return false;
                    }
                    move_uploaded_file($file_temp, $uploaded_image);
                    $query = "UPDATE tbl_product SET 
                    productName = '$productName',
                    brandId = '$brand',
                    catId = '$category',
                    type = '$type',
                    price = '$price',
                    image = '$unique_image',
                    product_desc = '$product_desc'
                    WHERE productId = '$id'";

                } else {
                    $query = "UPDATE tbl_product SET 
                    productName = '$productName',
                    brandId = '$brand',
                    catId = '$category',
                    type = '$type',
                    price = '$price',
                    product_desc = '$product_desc'
                    WHERE productId = '$id'";
                }

                $result = $this->db->update($query);
                if($result) {
                    $alert = "<span class='success'>Cập nhật sản phẩm thành công!</span>";
                    return $alert;
                } else {
                    $alert = "<span class='error'>Cập nhật sản phẩm thất bại!</span>";
                    return $alert;
                }
            }
        }

        public function del_product($id) {
            $query = "DELETE FROM tbl_product WHERE productId = '$id'";
            $result = $this->db->delete($query);

            if($result) {
                $alert = "<span class='success'>Xóa sản phẩm thành công!</span>";
                    return $alert;
            } else {
                $alert = "<span class='success'>Xóa sản phẩm thất bạn!</span>";
                    return $alert;
            }
        }
        
        //Using for Frontend
        public function getproduct_featured() {
            $query = "SELECT * FROM tbl_product WHERE type = '1'";
            $result = $this->db->select($query);
            return $result;
        }

        public function getproduct_new() {
            $query = "SELECT * FROM tbl_product ORDER BY productId DESC LIMIT 4";
            $result = $this->db->select($query);
            return $result;
        }

        public function get_details($id) {
            $query = "SELECT pd.*, ct.catName, br.brandName FROM tbl_product pd INNER JOIN tbl_category ct ON pd.catId = ct.catId INNER JOIN tbl_brand br ON pd.brandId = br.brandId WHERE pd.productId = $id";
            $result = $this->db->select($query);
            return $result;
        }

        public function getLastedDell () {
            $query = "SELECT * FROM tbl_product WHERE brandId = '1' ORDER BY productid DESC LIMIT 1";
            $result = $this->db->select($query);
            return $result;
        }

        public function getLastedApple () {
            $query = "SELECT * FROM tbl_product WHERE brandId = '7' ORDER BY productid DESC LIMIT 1";
            $result = $this->db->select($query);
            return $result;
        }

        public function getLastedSamsung () {
            $query = "SELECT * FROM tbl_product WHERE brandId = '5' ORDER BY productid DESC LIMIT 1";
            $result = $this->db->select($query);
            return $result;
        }

        public function getLastedNova () {
            $query = "SELECT * FROM tbl_product WHERE brandId = '4' ORDER BY productid DESC LIMIT 1";
            $result = $this->db->select($query);
            return $result;
        }


        public function get_product_by_cat($id) {
            $query = "SELECT * FROM tbl_product WHERE catId = '$id' ORDER BY productId DESC LIMIT 8";
            $result = $this->db->select($query);
            return $result;
        }

    }
?>