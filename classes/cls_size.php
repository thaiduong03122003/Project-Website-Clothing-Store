<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
?>

<?php
    class size 
    {
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function show_sizes() {
            $query ="SELECT * FROM tbl_size ORDER BY sizeId";
            $result = $this->db->select($query);
            return $result;
        }

        public function show_size_by_id ($id) {
            $query ="SELECT * FROM tbl_size WHERE sizeId = '$id'";
            $result = $this->db->select($query);
            return $result;
        }

        public function del_size($id) {
            $query = "DELETE FROM tbl_size WHERE sizeId = '$id'";
            $result = $this->db->delete($query);
            if($result) {
                    return true;
            } else {
                    return false;
            }
        }
       
        
    }
?>