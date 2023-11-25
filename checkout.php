<?php
    include "./inc/header.php";
    include "./inc/navigationbar.php";
?>

<?php
        include_once './classes/cls_select_province.php';
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
                <li><a href="shop.php" class="breadcrumb__link">Sản phẩm</a></li>
                <li>
                    <span class="breadcrumb__link">></span>
                </li>
                <li><a href="cart.php" class="breadcrumb__link">Giỏ hàng</a></li>
                <li>
                    <span class="breadcrumb__link">></span>
                </li>
                <li>
                    <span class="breadcrumb__link">Thanh toán</span>
                </li>
            </ul>
        </section>

        <!--=============== THANH TOÁN ===============-->
        <section class="checkout section--lg">
            <div class="checkout__container container grid">

            <?php
                $cusid = 0;
            ?>
            <!--================= CÓ TÀI KHOẢN ====================-->

            <?php
                $login_check = Session::get('customer_login');
                if($login_check) {

                    include_once './classes/cls_customer.php';

                    $cusid = Session::get("customer_id");
                        $cus = new customer();
                        $cuslist = $cus->show_customer_by_id($cusid);
                        if($cuslist) {
                            $result_cus_list = $cuslist->fetch_assoc();
                            $address = $result_cus_list['cusAddress'];
            ?>

                <div class="checkout__group">
                    <h3 class="section__title">Thông tin giao hàng</h3>

                    <form action="" class="form grid">
                        <input type="text" disabled value="<?=$result_cus_list['cusLastname'];?>" class="form__input">

                        <input type="text" disabled value="<?=$result_cus_list['cusFirstname'];?>" class="form__input">

                        <input id="cus_address_ship" type="text" value="<?=$result_cus_list['cusAddress'];?>" class="form__input">

                        <input id="cus_phone_ship" type="text" value="<?=$result_cus_list['cusPhone'];?>" class="form__input">

                        <h3 class="checkout__title">Ghi chú</h3>

                        <textarea name="" placeholder="Ghi chú cho đơn hàng" id="" cols="30" rows="10" class="form__input textarea"></textarea>
                    </form>
                </div>

            <?php
                        }
                    } else {
            ?>

            <!--================= KHÔNG CÓ TÀI KHOẢN ====================-->
                <div class="checkout__group">
                    <h3 class="section__title">Thông tin giao hàng</h3>

                    <form action="" class="form grid">
                        <input id="or-lastname" type="text" placeholder="Họ" class="form__input">

                        <input id="or-firstname" type="text" placeholder="Tên" class="form__input">

                        <input id="sub-address" type="text" placeholder="Địa chỉ (Số nhà, Đường...)" class="form__input">
                        
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

                        <input id="or-phone" type="text" placeholder="Số điện thoại" class="form__input">

                        <input id="or-email" type="email" placeholder="Email" class="form__input">

                        <h3 class="checkout__title">Ghi chú</h3>

                        <textarea name="" placeholder="Ghi chú cho đơn hàng" id="" cols="30" rows="10" class="form__input textarea"></textarea>
                    </form>
                </div>

            <?php
                }
            ?>

                <dix class="checkout__group">
                    <h3 class="section__title">Thông tin đơn hàng</h3>

                    <table class="order__table">
                        <tr>
                            <th colspan="2">Sản phẩm</th>
                            <th>Tổng giá</th>
                        </tr>

                        <tbody id="product-info">

                        </tbody>

                        <tbody id="total-info">

                        </tbody>

                    </table>
                    <div class="payment__methods">
                        <h3 class="checkout__title payment__title">Phương thức thanh toán</h3>

                        <div class="payment__option flex">
                            <input type="radio" id="direct" value="Direct" name="payment" checked class="payment__input">
                            <label for="direct" class="payment__label">Thanh toán khi nhận hàng</label>
                        </div>

                        <div class="payment__option flex">
                            <input type="radio" id="bank" value="Bank" name="payment" class="payment__input">
                            <label for="bank" class="payment__label">Chuyển khoản</label>
                        </div>

                        <div class="payment__option flex">
                            <input type="radio" id="paypal" value="MoMo" name="payment" class="payment__input">
                            <label for="paypal" class="payment__label">MoMo</label>
                        </div>
                    </div>

                    <input type="button" onclick="confirmCheckOut(<?=$cusid?>)" value="Đặt hàng" class="btn btn--md">
                </div>
            </div>
        </section>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                showCheckOutInfo();
            });
        </script>

<?php
    include "./inc/footer.php";
?>