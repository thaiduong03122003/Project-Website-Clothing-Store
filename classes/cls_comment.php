<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
?>

<?php
    class comment 
    {
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function show_comemnt($id) {
            $query ="SELECT r.*, cus.cusFirstname, cus.cusLastname FROM tbl_rate r 
            LEFT JOIN tbl_customer cus ON r.cusId = cus.cusId
            WHERE r.pdId = '$id'
            ORDER BY r.cId DESC";
            $result = $this->db->select($query);
            return $result;
        }

        public function show_all_info_comment() {
          $query ="SELECT r.*, pd.pdImg, pd.pdName, cus.cusFirstname, cus.cusLastname FROM tbl_rate r 
          LEFT JOIN tbl_customer cus ON r.cusId = cus.cusId
          LEFT JOIN tbl_product pd ON r.pdId = pd.pdId
          ORDER BY r.cId DESC";
            $result = $this->db->select($query);
            return $result;
        }

        public function show_info_detail($id) {
          $query ="SELECT r.*, cus.*, pd.* FROM tbl_rate r 
            LEFT JOIN tbl_customer cus ON r.cusId = cus.cusId
            LEFT JOIN tbl_product pd ON r.pdId = pd.pdId
            WHERE r.cId = '$id'";
            $result = $this->db->select($query);
            return $result;
        } 

        public function del_comment($id) {
            $query = "DELETE FROM tbl_rate WHERE cId = '$id'";
            $result = $this->db->delete($query);
            if($result) {
                    return true;
            } else {
                    return false;
            }
        }
       
        
    }
?>