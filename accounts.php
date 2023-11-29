<?php
    include "./inc/header.php";
    include "./inc/navigationbar.php";
?>

<?php
        include_once './classes/cls_select_province.php';
?>

<?php
	$login_check = Session::get('customer_login');
	if(!$login_check) {
        echo'<div style="text-align: center;">Không có gì trong này đâu :)</div>';
        exit();
	}
?>

    <!--=============== MAIN ===============-->
    <main class="main">
        <!--=============== BREADCRUMB ===============-->
        <section class="breadcrumb">
            <ul class="breadcrumb__list flex container">
                <li><a href="index.php" class="breadcrumb__link">Trang chủ</a></li>
                <li>
                    <span class="breadcrumb__link">></span>
                </li>
                <li>
                    <span class="breadcrumb__link">Tài khoản của tôi</span>
                </li>
            </ul>
        </section>

        <!--=============== ACCOUNTS ===============-->
        <section class="accounts section--lg">
            <div class="accounts__container container grid">
                <div class="account__tabs">
                    <p class="account__tab active-tab" data-target="#dashboard">
                        <i class="fi fi-rs-home"></i> Tổng quan
                    </p>

                    <p class="account__tab" data-target="#orders">
                        <i class="fi fi-rs-shopping-bag"></i> Đơn hàng
                    </p>

                    <p class="account__tab" data-target="#update-profile">
                        <i class="fi fi-rs-user"></i> Cập nhật thông tin của bạn
                    </p>

                    <p class="account__tab" data-target="#address">
                        <i class="fi fi-rs-marker"></i> Địa chỉ giao hàng
                    </p>

                    <p class="account__tab" data-target="#change-password">
                        <i class="fi fi-rs-key"></i> Đổi mật khẩu
                    </p>

                    <p onclick="logOut()" class="account__tab account__logout">
                        <i class="fi fi-rs-exit"></i> Đăng xuất
                    </p>
                </div>

                <div class="tabs__content">
                    <div class="tab__content active-tab" content id="dashboard">
                        <h3 class="tab__header">Xin chào <?=Session::get("customer_name")?>!</h3>

                        <div class="tab__body">
                            <p class="tab__description">Từ bảng điều khiển tài khoản của bạn, bạn có thể dễ dàng kiểm tra và xem các đơn hàng gần đây của mình.</p>
                        </div>
                    </div>

                    <div class="tab__content" content id="orders">
                        <h3 class="tab__header">Đơn hàng của bạn</h3>

                        <div class="tab__body">
                            <table class="placed__order-table">
                                <tr>
                                    <th>Mã đơn hàng</th>
                                    <th>Thời gian</th>
                                    <th>Trạng thái</th>
                                    <th>Tổng giá</th>
                                    <th>Hành động</th>
                                </tr>

                            <?php
                                $cusid = Session::get("customer_id");

                                include_once './classes/cls_order.php';

                                $or = new order();

                                $orlist = $or->show_orders_by_cusId($cusid);
                                if($orlist) {
                                    while ($result_or_list = $orlist->fetch_assoc()) {
                            ?>

                                <tr>
                                    <td>#<?=$result_or_list['orderId']?></td>
                                    <td><?=$result_or_list['orderDate']?></td>
                                    <td>
                                        <?php
                                            if ($result_or_list['orderStatus'] == '0') {
                                                echo 'Đang xử lý';
                                            } else {
                                                echo 'Đã hoàn tất';
                                            }
                                        ?>
                                        
                                    </td>
                                    <td><?=$result_or_list['orderTotalPrice']?></td>
                                    <td><a target="_blank" href="./invoice.php?orderId=<?=$result_or_list['orderId']?>" class="view__order">Xem hóa đơn</a></td>
                                </tr>

                            <?php
                                    }
                                }
                            ?>
                            </table>
                        </div>
                    </div>

                    <div class="tab__content" content id="update-profile">
                        <h3 class="tab__header">Cập nhật thông tin cá nhân</h3>

                        <div class="tab__body">
                            <form action="" class="form grid">

                                <?php
                                    include_once './classes/cls_customer.php';

                                    $cus = new customer();
                                    $cuslist = $cus->show_customer_by_id($cusid);
                                    if($cuslist) {
                                        $result_cus_list = $cuslist->fetch_assoc();
                                        $address = $result_cus_list['cusAddress'];
                                ?>

                                <div class="grid__2-cols">
                                    <input id="cus-lastname" type="text" placeholder="Họ" value="<?=$result_cus_list['cusLastname']?>" class="form__input">
                                    <input id="cus-firstname" type="text" placeholder="Tên" value="<?=$result_cus_list['cusFirstname']?>" class="form__input">
                                </div>
                                
                                <input id="cus-phone" type="text" placeholder="Số điện thoại liên hệ" value="<?=$result_cus_list['cusPhone']?>" class="form__input">
                                <input id="cus-email" type="email" placeholder="Email" value="<?=$result_cus_list['cusEmail']?>" class="form__input">

                                <?php
                                    }
                                ?>

                                <div class="form__btn">
                                    <input onclick="updateProfile(<?=$cusid?>)" type="button" value="Cập nhật" class="btn btn--md">
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="tab__content" content id="address">
                        <h3 class="tab__header">Cập nhật địa chỉ giao hàng</h3>
                        <div class="tab__body">
                            <form class="form grid">
                                <input id="show-address" disabled type="text" placeholder="Email" value="<?=$address?>" class="form__input show__address">
                                <div>
                                    <select id="province" class="form__input" onchange="selectDistrict()">
                                        <option disabled selected>Chọn Thành phố / Tỉnh</option>

                                        <?php
                                            $province = new province();
                                            $prvlist = $province->show_province();
                                            if ($prvlist) {
                                                while($resultprv = $prvlist->fetch_assoc()) {
                                        ?>

                                        <option value="<?=$resultprv['provinceId']?>"><?=$resultprv['provinceName']?></option>

                                        <?php
                                                }
                                            }
                                        ?>

                                    </select>

                                    <select id="district" class="form__input" onclick="selectWard()">
                                        <option disabled selected>Chọn Quận / Huyện</option>

                                    </select>

                                    <select id="ward" class="form__input">
                                        <option disabled selected>Chọn Phường / Xã</option>

                                    </select>
                                </div>

                                <input id="edit-address" type="text" placeholder="Nhập số nhà, đường,..." class="form__input show__address">

                                <div class="form__btn">
                                    <input onclick="updateAddress(<?=$cusid?>)" type="button" value="Cập nhật" class="btn btn--md">
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="tab__content" content id="change-password">
                        <h3 class="tab__header">Đổi mật khẩu</h3>

                        <div class="tab__body">
                            <form action="" class="form grid">
                                <input id="crpass" type="password" placeholder="Mật khẩu hiện tại" class="form__input">
                                <input id="newpass" type="text" placeholder="Mật khẩu mới" class="form__input">
                                <input id="confirmpass" type="text" placeholder="Xác nhận mật khẩu mới" class="form__input">

                                <div class="form__btn">
                                    <input onclick="updatePassword(<?=$cusid?>)" type="button" value="Cập nhật" class="btn btn--md">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

<?php
    include "./inc/footer.php";
?>