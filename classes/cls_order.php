<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
?>

<?php
    class order 
    {
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }

        public function show_orders() {
            $query ="SELECT * FROM tbl_order ORDER BY orderId DESC";
            $result = $this->db->select($query);
            return $result;
        }

        public function show_orders_by_cusId ($id) {
            $query ="SELECT * FROM tbl_order WHERE cusId = '$id'";
            $result = $this->db->select($query);
            return $result;
        }

        public function show_orders_with_name() {
            $query ="SELECT od.*, cus.cusFirstname, cus.cusLastname FROM tbl_order od 
                    INNER JOIN tbl_customer cus ON od.cusId = cus.cusId
                    ORDER BY od.orderId DESC";
            $result = $this->db->select($query);
            return $result;
        }
       
    }
?>