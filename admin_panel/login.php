
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/style.css">
    <title>Login Admin Panel</title>
</head>

<body>
    <div class="container_log">
        <div class="log_box">
            <form action="login.php" method="post">
                <h1>Đăng nhập hệ thống</h1>

                <div class="log_notice">
                    
			    </div>

                <div class="input_box">
                    <input type="text" placeholder="Tên người dùng" name="adminUser">
                </div>

                <div class="input_box">
                    <input type="password" placeholder="Mật khẩu" name="adminPass">
                </div>

                <input type="submit" class="btn_log" value="Đăng nhập">
            </form>
        </div>
    </div>
</body>

</html>