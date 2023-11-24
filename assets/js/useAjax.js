function selectDistrict() {
    var id = $("#province").val()
    $.ajax({
        url: "./cus_controller/showDistrictController.php",
        method: "post",
        data: { record: id },
        success: function(data) {
            $("#district").html(data);
        }
    });
}

function selectWard() {
    var did = $("#district").val()
    $.ajax({
        url: "./cus_controller/showWardController.php",
        method: "post",
        data: { record: did },
        success: function(data) {
            $("#ward").html(data);
        }
    });
}

// Đăng kí / đăng nhập
function registerCheck() {
    let lastname = $("#re-lastname").val();
    let firstname = $("#re-firstname").val();
    let email = $("#re-email").val();
    let phone = $("#re-phone").val();
    let password = $("#re-password").val();
    let repassword = $("#re-repassword").val();
    let checkBox = document.getElementById("confirm-term");

    if (!checkBox.checked) {
        alert('Bạn vui lòng đồng ý với các điều khoản của chúng tôi trước khi đăng ký!');
    } else if (lastname == '' || firstname == '' || email == '' || phone == '' || password == '' || repassword == '') {
        alert('Không được bỏ trống!');
    } else if (!validateEmail(email)) {
        alert('Vui lòng nhập đúng định dạng Email!');
    } else if (!validatePassword(password)) {
        alert('Vui lòng nhập đúng định dạng mật khẩu (độ dài 8-16 ký tự, ký tự đầu viết hoa và có ít nhất 1 ký tự đặc biệt)!');
    } else if (password != repassword) {
        alert('Xác nhận mật khẩu không đúng!');
    } else {
        var fd = new FormData();
        fd.append('firstname', firstname);
        fd.append('lastname', lastname);
        fd.append('email', email);
        fd.append('phone', phone);
        fd.append('password', password);

        $.ajax({
            url: './cus_controller/addAccCustomer.php',
            method: 'post',
            data: fd,
            processData: false,
            contentType: false,
            success: function(data) {
                if (data.trim() == 'duplicateEmail'.trim()) {
                    toast('Email này đã tồn tại!', 'error', '3000');

                } else if (data.trim() == 'successful'.trim()) {
                    toast('Đăng ký tài khoản thành công!', 'success', '3000');
                    $('form').trigger('reset');
                } else {
                    toast('Đăng ký tài khoản thất bại!', 'error', '3000');
                }
            }
        });
    }

}

function loginCheck() {
    let loemail = $("#lo-email").val();
    let lopassword = $("#lo-password").val();

    if (loemail == '' || lopassword == '') {
        alert('Vui lòng nhập đầy đủ trước khi đăng nhập!');
    } else if (!validateEmail(loemail)) {
        alert('Vui lòng nhập đúng định dạng Email!');
    } else if (!validatePassword(lopassword)) {
        alert('Vui lòng nhập đúng định dạng mật khẩu (độ dài 8-16 ký tự, ký tự đầu viết hoa và có ít nhất 1 ký tự đặc biệt)!');
    } else {

        $.ajax({
            url: './cus_controller/logAccCustomer.php',
            method: 'post',
            data: { email: loemail, pass: lopassword },
            success: function(data) {
                console.log(data);
                if (data.trim() == 'successful'.trim()) {
                    window.location.href = '/index.php';
                } else {
                    toast('Đăng nhập thất bại!', 'error', '3000');
                }
            }
        });
    }

}


// Đăng xuất
function logOut() {
    var logoutBtn = document.getElementById('customer-logout');
    if (logoutBtn) {
        Swal.fire(confirmObj('Xác nhận', 'Bạn có chắc chắn muốn đăng xuất', 'warning', 'Đồng ý', 'Hủy')).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: './cus_controller/destroySession.php',
                    method: 'post',
                    data: { destroy: true },
                    success: function(data) {
                        console.log(data);
                        window.location.href = '/index.php';
                    }
                });
            }
        });
    }
}


// Update Profile 
function updateProfile(id) {

    var firstname = $('#cus-firstname').val();
    var lastname = $('#cus-lastname').val();
    var phone = $('#cus-phone').val();
    var email = $('#cus-email').val();

    if (firstname == '' || lastname == '' || phone == '' || email == '') {
        toast('Bạn phải nhập đầy đủ các trường!', 'error');
        return false;

    } else if (!validateEmail(email)) {
        toast('Vui lòng nhập đúng định dạng email!', 'error');

    } else {
        var fd = new FormData();

        fd.append('id', id);
        fd.append('firstname', firstname);
        fd.append('lastname', lastname);
        fd.append('phone', phone);
        fd.append('email', email);

        $.ajax({
            url: "./cus_controller/updateProfile.php",
            method: "post",
            data: fd,
            processData: false,
            contentType: false,
            success: function(data) {
                if (data.trim() == 'successful') {
                    toast('Cập nhật tài khoản thành công!');

                } else {
                    toast('Email đã tồn tại!', 'error');
                }
            }
        });
    }
}

// Update address
function updateAddress(id) {

    var edit_address = $('#edit-address').val();
    var ward = $('#ward option:selected').text();
    var district = $('#district option:selected').text();
    var province = $('#province option:selected').text();

    if (ward == "Chọn Phường / Xã" || !district == "Chọn Quận / Huyện" || !province == "Chọn Thành phố / Tỉnh" || edit_address == '') {
        toast('Không được bỏ trống các trường yêu cầu!', 'error', '3500');

    } else {
        var cus_address = edit_address.trim() + ', ' + ward.trim() + ', ' + district.trim() + ', ' + province.trim();

        $.ajax({
            url: "./cus_controller/updateAddress.php",
            method: "post",
            data: { address: cus_address, id: id },
            success: function(data) {
                if (data.trim() != 'unsuccessful') {
                    toast('Cập nhật địa chỉ giao hàng thành công!', 'success', '3500');
                    $("#show-address").val(data);
                } else {
                    toast('Lỗi rùi!', 'error');
                }
            }
        });
    }
}

function updatePassword(id) {

    var crpass = $('#crpass').val();
    var newpass = $('#newpass').val();
    var confirmpass = $('#confirmpass').val();

    if (crpass == '') {
        alert("Nếu bạn không nhớ mật khẩu hiện tại của mình, hãy liên hệ với nhân viên tư vấn của chúng tôi để cấp lại mật khẩu. SĐT: 0929 015 374");

    } else if (newpass == '' || confirmpass == '') {
        toast('Không được bỏ trống các trường yêu cầu!', 'error', '3500');

    } else if (!validatePassword(newpass)) {
        toast('Độ dài mật khẩu phải từ 8-16 ký tự, ký tự đầu viết hoa và có ít nhất một ký tự đặc biệt!', 'error', '8000')

    } else if (newpass != confirmpass) {
        toast('Xác nhận mật khẩu mới không đúng!', 'error')

    } else {

        $.ajax({
            url: "./cus_controller/updatePassword.php",
            method: "post",
            data: { crpass: crpass, newpass: newpass, id: id },
            success: function(data) {
                if (data.trim() == 'unsuccessful') {
                    toast('Mật khẩu không chính xác!', 'error');

                } else if (data.trim() == 'successful') {
                    toast('Đổi mật khẩu thành công!');
                } else {
                    alert(data);
                }
            }
        });
    }
}

// Hộp thông báo xác nhận
function confirmObj(title, text, icon, confirmText, cancelText) {
    return {
        title: title,
        text: text,
        icon: icon,
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: confirmText,
        cancelButtonText: cancelText
    };
}

//Hiển thị thông báo bên góc trên phải
function showToast(type, message) {
    toastMixin.fire({
        icon: type,
        title: ' ' + message
    });
}

function toast(message, icon = 'success', timer = '2500', position = 'top-end') {

    const Toast = Swal.mixin({
        toast: true,
        position: position,
        showConfirmButton: false,
        timer: timer,
        timerProgressBar: true,
    })

    Toast.fire({
        icon: icon,
        title: message
    });
}

// Validate

function validateEmail(email) {
    // Regex pattern để kiểm tra định dạng email
    let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    return emailPattern.test(email);
}

function validatePassword(password) {

    //Kiểm tra định đang mật khẩu (độ dài 8-16 kí tự, ký tự đầu viết hoa, có ít nhất 1 ký tự đặc biệt)
    let passwordPattern = /^(?=.*[A-Z])(?=.*[!@#$%^&*()_+])[A-Za-z\d!@#$%^&*()_+]{8,16}$/;

    if (passwordPattern.test(password)) {
        return true;
    } else {
        return false;
    }
}