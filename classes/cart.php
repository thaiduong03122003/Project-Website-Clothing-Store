<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
?>

<?php
    class cart 
    {
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
       
        public function add_to_cart($quantity, $id) {
            $quantity = $this->fm->validation($quantity);
            $quantity = mysqli_real_escape_string($this->db->link, $quantity);
            $id = mysqli_real_escape_string($this->db->link, $id);
            $sId = session_id();

            $query = "SELECT * FROM tbl_product WHERE productid = '$id'";
            $result_add = $this->db->select($query)->fetch_assoc();
            
            $image = $result_add['image'];
            $price = $result_add['price'];
            $productName = $result_add['productName'];
            $check_cart = "SELECT * FROM tbl_cart WHERE productid = '$id' && sId = '$sId'";
            $result_check = $this->db->select($check_cart);
            if(!empty($result_check)) {
                $msg = 'Sản phẩm đã có trong giỏ hàng!';
                return $msg;
            } else {
                $query_insert = "INSERT INTO tbl_cart(productId, quantity, sId, image, price, productName) VALUES ('$id', '$quantity', '$sId', '$image', '$price', '$productName')";
                $insert_cart = $this->db->insert($query_insert);
                if($insert_cart) {
                    header('Location:cart.php');
                } else {
                    header('Location:404.php');
                }
            }
        }

        public function get_product_cart() {
            $sId = session_id();
            $query = "SELECT * FROM tbl_cart WHERE sId = '$sId'";
            $result_get = $this->db->select($query);
            return $result_get;
        }

        public function update_quantity_cart($cartId, $quantity) {
            $cartId = mysqli_real_escape_string($this->db->link, $cartId);
            $quantity = mysqli_real_escape_string($this->db->link, $quantity);
            $query = "UPDATE tbl_cart SET 
                    quantity = '$quantity'
                    WHERE cartId = '$cartId'";
            $result = $this->db->update($query);
            if($result) {
                $msg = "<span class='success'>Đã cập nhật số lượng sản phẩm!</span>";
                return $msg;
            } else {
                $msg = "<span class='error'>Cập nhật số lượng sản phẩm thất bại!</span>";
                return $msg;
            }
        }

        public function del_product_cart($cartId) {
            $cartId = mysqli_real_escape_string($this->db->link, $cartId);
            $query = "DELETE FROM tbl_cart WHERE cartId = '$cartId'";
            $result_del = $this->db->delete($query);
            if ($result_del) {
                header('Location:cart.php');
            } else {
                $msg = "<script>alert('Xóa đơn hàng thất bại!')</script>";
                return $msg;
            }
        }

        public function check_cart() {
            $sId = session_id();
            $query = "SELECT * FROM tbl_cart WHERE sId = '$sId'";
            $result_check = $this->db->select($query);
            return $result_check;
        }

        public function del_all_data_cart() {
            $sId = session_id();
            $query = "DELETE FROM tbl_cart WHERE sId = '$sId'";
            $result_check = $this->db->select($query);
            return $result_check;
        }
    }
?>