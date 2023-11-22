<?php
    include_once "./adminHeader.php";
    include "./sidebar.php";
    // include "./config/dbconnect.php";

?>

    <div id="main-content" class="container allContent-section py-4">
        
        
    </div>

    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" ></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"></script>

    <!-- ====== Alert Dialog ======= -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.10.0/dist/sweetalert2.all.min.js"></script>
    <!-- ====== Drivejs: Focus on Volume icon ======= -->       
    <script src="https://cdn.jsdelivr.net/npm/driver.js@1.0.1/dist/driver.js.iife.js"></script>   
    
    <script type="text/javascript" src="./assets/js/ajaxWork.js"></script>    
    <script type="text/javascript" src="./assets/js/script.js"></script>

    <script>
        //Khi reload, trang web sẽ chạy section viewDashboard.php đầu tiên
        goToSection('viewDashboard.php');
    </script>

    <script>
        const driver = window.driver.js.driver;

        const driverObj = driver({
            stagePadding: 4,
        });

        driverObj.highlight({
            element: "#highlight-me",
            popover: {
                side: "bottom",
                title: "Chào mừng <?=Session::get('adminName')?> đến với bảng quản trị",
                description: "Trong lúc làm việc, hãy bật chút nhạc để giảm căng thẳng nhé!"
            }
        });
    </script>

</body>
 
</html>