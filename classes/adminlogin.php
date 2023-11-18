<?php
    $filepath = realpath(dirname(__FILE__));
    include_once ($filepath.'/../lib/database.php');
    include_once ($filepath.'/../helpers/format.php');
    include ($filepath.'/../lib/session.php');
    Session::checkLogin();
?>

<?php
    class adminlogin 
    {
        private $db;
        private $fm;

        public function __construct()
        {
            $this->db = new Database();
            $this->fm = new Format();
        }
        public function login_admin($adminUser, $adminPass) {
            $adminUser = $this->fm->validation($adminUser);
            $adminPass = $this->fm->validation($adminPass);

            $adminUser = mysqli_real_escape_string($this->db->link, $adminUser);
            $adminPass = mysqli_real_escape_string($this->db->link, $adminPass);

            if(empty($adminUser) || empty($adminPass)) {
                $alert = "Không được để trống Username hoặc Password!";
                return $alert;
            } else {
                $query = "SELECT * FROM tbl_admin WHERE adUsername = '$adminUser' AND adPassword = '$adminPass' LIMIT 1";
                $result = $this->db->select($query);

                if($result != false) {
                    $value = $result->fetch_assoc();
                    Session::set('adminlogin', true);
                    Session::set('adminId', $value['adId']);
                    Session::set('adminUser', $value['adUserName']);
                    Session::set('adminSex', $value['adSex']);
                    Session::set('adminRole', $value['adRole']);
                    $fullname = $value['adFirstname'].' '.$value['adLastname'];
                    Session::set('adminName', $fullname);
                    header('Location:index.php');
                } else {
                    $alert = "Tên người dùng hoặc mật khẩu không đúng";
                    return $alert;
                }
            }
        }        
    
        
    }
    
    
?>