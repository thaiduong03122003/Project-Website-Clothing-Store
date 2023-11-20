<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
?>

<?php
    class customer 
    {
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function show_customers() {
            $query ="SELECT * FROM tbl_customer ORDER BY cusId DESC";
            $result = $this->db->select($query);
            return $result;
        }

        public function show_customer_by_id($id) {
            $query ="SELECT * FROM tbl_customer WHERE cusId = '$id'";
            $result = $this->db->select($query);
            return $result;
        }

        public function del_customer($id) {
            $query = "DELETE FROM tbl_customer WHERE cusId = '$id'";
            $result = $this->db->delete($query);
            if($result) {
                return true;
            } else {
                return false;
            }
        }
       
        
    }
?>