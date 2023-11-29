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
                      LEFT JOIN tbl_category ct ON pd.catId = ct.catId 
                      LEFT JOIN tbl_brand br ON pd.brandId = br.brandId 
                      ORDER BY pd.pdId DESC";
            $result = $this->db->select($query);
            return $result;
        }

        public function show_products_8() {
            $query = "SELECT pd.*, ct.catName, br.brandName FROM tbl_product pd 
                      LEFT JOIN tbl_category ct ON pd.catId = ct.catId 
                      LEFT JOIN tbl_brand br ON pd.brandId = br.brandId
                      ORDER BY pd.pdId DESC LIMIT 8";
            $result = $this->db->select($query);
            return $result;
        }

        public function show_products_8_by_type($type) {
            $query = "SELECT pd.*, ct.catName, br.brandName FROM tbl_product pd 
                      LEFT JOIN tbl_category ct ON pd.catId = ct.catId 
                      LEFT JOIN tbl_brand br ON pd.brandId = br.brandId
                      WHERE pd.pdStatus = '$type'
                      ORDER BY pd.pdId DESC LIMIT 8";
            $result = $this->db->select($query);
            return $result;
        }

        public function show_products_16() {
            $query = "SELECT pd.*, ct.catName, br.brandName FROM tbl_product pd 
                      LEFT JOIN tbl_category ct ON pd.catId = ct.catId 
                      LEFT JOIN tbl_brand br ON pd.brandId = br.brandId
                      ORDER BY pd.pdId DESC LIMIT 16";
            $result = $this->db->select($query);
            return $result;
        }

        public function show_products_by_name($pdname) {
            $query = "SELECT pd.*, ct.catName, br.brandName FROM tbl_product pd 
                      LEFT JOIN tbl_category ct ON pd.catId = ct.catId 
                      LEFT JOIN tbl_brand br ON pd.brandId = br.brandId
                      WHERE LOWER(pd.pdName) LIKE '%$pdname%' 
                      OR LOWER(ct.catName) LIKE '%$pdname%' 
                      OR LOWER(br.brandName) LIKE '%$pdname%'
                      ORDER BY pd.pdId DESC";
            $result = $this->db->select($query);
            return $result;
        }

        public function show_products_by_catid($catid) {
            $query = "SELECT pd.*, ct.catName, br.brandName FROM tbl_product pd 
                      LEFT JOIN tbl_category ct ON pd.catId = ct.catId 
                      LEFT JOIN tbl_brand br ON pd.brandId = br.brandId
                      WHERE pd.catId = '$catid'
                      ORDER BY pd.pdId DESC LIMIT 4";
            $result = $this->db->select($query);
            return $result;
        }

        public function show_product_by_id($id) {
            $query = "SELECT pd.*, ct.catName, br.brandName FROM tbl_product pd 
                      LEFT JOIN tbl_category ct ON pd.catId = ct.catId 
                      LEFT JOIN tbl_brand br ON pd.brandId = br.brandId
                      WHERE pdId = '$id'";
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