<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
?>

<?php
    class productsize 
    {
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function show_product_sizes() {
            $query = "SELECT ps.*, pd.pdName, pd.pdImg, sz.sizeName FROM tbl_product_size ps 
                      INNER JOIN tbl_product pd ON ps.pdId = pd.pdId 
                      INNER JOIN tbl_size sz ON ps.sizeId = sz.sizeId 
                      ORDER BY ps.psId DESC";
            $result = $this->db->select($query);
            return $result;
        }

        public function show_ps_by_id ($id) {
            $query ="SELECT * FROM tbl_product_size WHERE psId = '$id'";
            $result = $this->db->select($query);
            return $result;
        }

        public function del_product_size($id) {
            $query = "DELETE FROM tbl_product_size WHERE psId = '$id'";
            $result = $this->db->delete($query);
            if($result) {
                    return true;
            } else {
                    return false;
            }
        }
       
        
    }
?>