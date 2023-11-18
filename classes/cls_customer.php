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

        public function show_customer() {
            $query ="SELECT * FROM tbl_customer ORDER BY cusId DESC";
            $result = $this->db->select($query);
            return $result;
        }
       
        
    }
?>