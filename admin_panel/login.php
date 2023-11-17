<?php
	include '../classes/adminlogin.php';

?>
<?php 
	$class = new adminlogin();
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		$adminUser = $_POST['adminUser'];
		$adminPass = md5($_POST['adminPass']);

		$login_check = $class->login_admin($adminUser, $adminPass);
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Admin Panel</title>
  <link rel="stylesheet" href="./assets/css/style_login.css">
  <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.0.0/uicons-regular-rounded/css/uicons-regular-rounded.css'></head>
<body>
  <div class="wrapper">
    <form action="login.php" method="post">
      <h1>Đăng nhập hệ thống</h1>
      <div class="notice">
        <?php
			if(isset($login_check)) {
				echo $login_check;
			}
		?>
      </div>
      <div class="input-box">
        <input type="text" placeholder="Tên đăng nhập" name="adminUser">
        <i class="fi fi-rr-circle-user"></i>
      </div>
      <div class="input-box">
        <input type="password" placeholder="Mật khẩu" id="password" name="adminPass">
        <i class="fi fi-rr-lock"></i>
        <i class="fi fi-rr-eye-crossed passIcon" id="eyeIcon"></i>
      </div>
      <div class="">
        <input type="submit" class="btn" value="Đăng nhập">
      </div>
    </form>
  </div>

  <script src="./assets/js/script.js"></script>
</body>
</html>