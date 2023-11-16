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
       
        public function insert_customer($data) {
            $name = mysqli_real_escape_string($this->db->link, $data['name']);
            $city = mysqli_real_escape_string($this->db->link, $data['city']);
            $zipcode = mysqli_real_escape_string($this->db->link, $data['zipcode']);
            $email = mysqli_real_escape_string($this->db->link, $data['email']);
            $address = mysqli_real_escape_string($this->db->link, $data['address']);
            $country = mysqli_real_escape_string($this->db->link, $data['country']);
            $phone = mysqli_real_escape_string($this->db->link, $data['phone']);
            $password = mysqli_real_escape_string($this->db->link, md5($data['password']));
            
            if($name=="" || $city== "" || $zipcode== "" || $email== "" || $address== "" || $country== "" || $phone== "" || $password== "") {
                $alert = "<span class='error'>Bạn phải nhập đầy đủ các mục thông tin đăng kí!</span>";
                return $alert;
            } else {
                $check_email = "SELECT * FROM tbl_customer WHERE email = '$email' LIMIT 1";
                $result_check = $this->db->select($check_email);
                if ($result_check) {
                    $msg = "<span class='error'>Email này đã tồn tại!</span>";
                } else {
                    $query = "INSERT INTO tbl_customer(name, city, zipcode, email, address, country, phone, password) VALUES('$name', '$city', '$zipcode', '$email', '$address', '$country', '$phone', '$password')";
                    $result_insert = $this->db->insert($query);
                    if($result_insert) {
                        $alert = "<span class='success'>Tạo tài khoản thành công!</span>";
                        return $alert;
                    } else {
                        $alert = "<span class='error'>Tạo tài khoản thất bại!</span>";
                        return $alert;
                }
                }
            }
        }

        public function login_customer($data) {
            $email = mysqli_real_escape_string($this->db->link, $data['email']);
            $password = mysqli_real_escape_string($this->db->link, md5($data['password']));

            if($email== "" && $password== "") {
                $alert = "<span class='error'>Bạn phải nhập đầy đủ các mục thông tin đăng nhập!</span>";
                return $alert;
            } else {
                $check_email = "SELECT * FROM tbl_customer WHERE email = '$email' && password = '$password'";
                $result_check = $this->db->select($check_email);
                if ($result_check) {
                    $value = $result_check->fetch_assoc();
                    Session::set('customer_login', true);
                    Session::set('customer_id', $value['id']);
                    Session::set('customer_name', $value['name']);
                    header('Location:order.php');
                } else {
                    $alert = "<span class='error'>Tài khoản hoặc mật khẩu không chính xác!</span>";
                    return $alert;
                }
            }
        }

        public function show_customers($id) {
            $query = "SELECT * FROM tbl_customer WHERE id = '$id'";
            $result = $this->db->select($query);
            return $result;
        }

        public function update_customers($data, $id) {
            $name = mysqli_real_escape_string($this->db->link, $data['name']);
            $zipcode = mysqli_real_escape_string($this->db->link, $data['zipcode']);
            $email = mysqli_real_escape_string($this->db->link, $data['email']);
            $address = mysqli_real_escape_string($this->db->link, $data['address']);
            $phone = mysqli_real_escape_string($this->db->link, $data['phone']);
            
            if($name=="" || $zipcode== "" || $email== "" || $address== "" || $phone== "") {
                $alert = "<span class='error'>Bạn phải nhập đầy đủ các mục thông tin đăng kí!</span>";
                return $alert;
            } else {
                $query = "UPDATE tbl_customer SET name='$name', zipcode='$zipcode', email='$email', address='$address', phone='$phone' WHERE id = '$id'";
                $result_insert = $this->db->insert($query);
                if($result_insert) {
                    $alert = "<span class='success'>Cập nhật thành công!</span>";
                    return $alert;
                } else {
                    $alert = "<span class='error'>Cập nhật thất bại!</span>";
                    return $alert;
                }
                
            }
        }
    }
?>