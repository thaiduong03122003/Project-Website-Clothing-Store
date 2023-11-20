<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
?>

<?php
    class staff 
    {
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function show_staff() {
            $query ="SELECT * FROM tbl_admin ORDER BY adId";
            $result = $this->db->select($query);
            return $result;
        }

        public function show_staff_by_id ($id) {
            $query ="SELECT * FROM tbl_admin WHERE adId = '$id'";
            $result = $this->db->select($query);
            return $result;
        }
       
        public function del_staff($id) {
            $query = "DELETE FROM tbl_admin WHERE adId = '$id'";
            $result = $this->db->delete($query);
            if($result) {
                    return true;
            } else {
                    return false;
            }
        }
        
    }
?>