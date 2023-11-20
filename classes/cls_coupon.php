<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
?>

<?php
    class coupon 
    {
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function show_coupons() {
            $query ="SELECT * FROM tbl_coupon ORDER BY couponId DESC";
            $result = $this->db->select($query);
            return $result;
        }

        public function del_coupon($id) {
            $query = "DELETE FROM tbl_coupon WHERE couponId = '$id'";
            $result = $this->db->delete($query);
            if($result) {
                    return true;
            } else {
                    return false;
            }
        }
       
        
    }
?>