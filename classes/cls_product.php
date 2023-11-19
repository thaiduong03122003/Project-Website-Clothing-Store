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

        public function show_products() {
            $query = "SELECT pd.*, ct.catName, br.brandName FROM tbl_product pd 
                      INNER JOIN tbl_category ct ON pd.catId = ct.catId 
                      INNER JOIN tbl_brand br ON pd.brandId = br.brandId 
                      ORDER BY pd.pdId DESC";
            $result = $this->db->select($query);
            return $result;
        }

        public function show_product_by_id ($id) {
            $query ="SELECT * FROM tbl_product WHERE pdId = '$id'";
            $result = $this->db->select($query);
            return $result;
        }

        public function del_product($id) {
            $query = "DELETE FROM tbl_product WHERE pdId = '$id'";
            $result = $this->db->delete($query);
            if($result) {
                    return true;
            } else {
                    return false;
            }
        }
       
        
    }
?>