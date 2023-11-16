<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
?>

<?php
    class category 
    {
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function insert_category($catName) {

            $catName = $this->fm->validation($catName);
            $catName = mysqli_real_escape_string($this->db->link, $catName);

            if(empty($catName)) {
                $alert = "<span class='error'>Bạn phải nhập Tên danh mục trước khi Save!</span>";
                return $alert;
            } else {
                $query = "INSERT INTO tbl_category(catName) VALUES('$catName')";
                $result = $this->db->insert($query);
                if($result) {
                    $alert = "<span class='success'>Thêm danh mục thành công!</span>";
                    return $alert;
                } else {
                    $alert = "<span class='error'>Thêm danh mục thất bại!</span>";
                    return $alert;
                }
            }
        }

        public function show_category() {
            $query = "SELECT * FROM tbl_category ORDER BY catId DESC";
            $result = $this->db->select($query);
            return $result;
        }

        public function getcatbyId($id) {
            $query = "SELECT * FROM tbl_category WHERE catId = '$id'";
            $result = $this->db->select($query);
            return $result;
        }

        public function update_category($catName,$id) {
            $catName = $this->fm->validation($catName);
            $catName = mysqli_real_escape_string($this->db->link, $catName);
            $catId = mysqli_real_escape_string($this->db->link, $id);


            if(empty($catName)) {
                $alert = "<span class='error'>Bạn phải nhập Tên danh mục trước khi Cập nhật!</span>";
                return $alert;
            } else {
                $query = "UPDATE tbl_category SET catName = '$catName' WHERE catId = '$catId'";
                $result = $this->db->update($query);
                if($result) {
                    $alert = "<span class='success'>Cập nhật danh mục thành công!</span>";
                    return $alert;
                } else {
                    $alert = "<span class='error'>Cập nhật danh mục thất bại!</span>";
                    return $alert;
                }
            }
        }

        public function del_category($id) {
            $query = "DELETE FROM tbl_category WHERE catId = '$id'";
            $result = $this->db->delete($query);

            if($result) {
                $alert = "<span class='success'>Xóa danh mục thành công!</span>";
                    return $alert;
            } else {
                $alert = "<span class='success'>Xóa danh mục thất bạn!</span>";
                    return $alert;
            }
        }
        
        //Front-end
        public function show_category_frontend() {
            $query = "SELECT * FROM tbl_category ORDER BY catId DESC";
            $result = $this->db->select($query);
            return $result;
        }

        public function get_name_by_cat($id) {
            $query = "SELECT catName FROM tbl_category WHERE catId = '$id' LIMIT 1";
            $result = $this->db->select($query);
            return $result;
        }


    }
?>