function showStaff() {
    $.ajax({
        url: "./adminView/viewStaff.php",
        method: "post",
        data: { record: 1 },
        success: function(data) {
            $('.allContent-section').html(data);
        }
    });
}

function showBrands() {
    $.ajax({
        url: "./adminView/viewBrands.php",
        method: "post",
        data: { record: 1 },
        success: function(data) {
            $('.allContent-section').html(data);
        }
    });
}

function showProductItems() {
    $.ajax({
        url: "./adminView/viewAllProducts.php",
        method: "post",
        data: { record: 1 },
        success: function(data) {
            $('.allContent-section').html(data);
        }
    });
}

function showCategory() {
    $.ajax({
        url: "./adminView/viewCategories.php",
        method: "post",
        data: { record: 1 },
        success: function(data) {
            $('.allContent-section').html(data);
        }
    });
}

function showSizes() {
    $.ajax({
        url: "./adminView/viewSizes.php",
        method: "post",
        data: { record: 1 },
        success: function(data) {
            $('.allContent-section').html(data);
        }
    });
}

function showProductSizes() {
    $.ajax({
        url: "./adminView/viewProductSizes.php",
        method: "post",
        data: { record: 1 },
        success: function(data) {
            $('.allContent-section').html(data);
        }
    });
}

function showCustomers() {
    $.ajax({
        url: "./adminView/viewCustomers.php",
        method: "post",
        data: { record: 1 },
        success: function(data) {
            $('.allContent-section').html(data);
        }
    });
}


function showOrders() {
    $.ajax({
        url: "./adminView/viewAllOrders.php",
        method: "post",
        data: { record: 1 },
        success: function(data) {
            $('.allContent-section').html(data);
        }
    });
}

function ChangeOrderStatus(id) {
    $.ajax({
        url: "./controller/updateOrderStatus.php",
        method: "post",
        data: { record: id },
        success: function(data) {
            alert('Order Status updated successfully');
            $('form').trigger('reset');
            showOrders();
        }
    });
}

function ChangePay(id) {
    $.ajax({
        url: "./controller/updatePayStatus.php",
        method: "post",
        data: { record: id },
        success: function(data) {
            alert('Payment Status updated successfully');
            $('form').trigger('reset');
            showOrders();
        }
    });
}

function addStaff(event) {
    event.preventDefault();
    var ad_username = $('#ad_username').val().trim();
    var ad_password = $('#ad_password').val().trim();
    if (ad_username == '' || ad_password == '') {
        toast('Không được bỏ trống username hoặc password!', 'error');
        return false;
    } else {
        var ad_FN = $('#ad_FN').val();
        var ad_LN = $('#ad_LN').val();
        var ad_sex = $("input[name='sex']:checked").val();
        var ad_email = $('#ad_email').val();
        var ad_phone = $('#ad_phone').val();
        var ad_role = $("input[name='role']:checked").val();

        var fd = new FormData();
        fd.append('ad_username', ad_username);
        fd.append('ad_password', ad_password);
        fd.append('ad_FN', ad_FN);
        fd.append('ad_LN', ad_LN);
        fd.append('ad_sex', ad_sex);
        fd.append('ad_email', ad_email);
        fd.append('ad_phone', ad_phone);
        fd.append('ad_role', ad_role);

        $.ajax({
            url: "./controller/addStaffController.php",
            method: "post",
            data: fd,
            processData: false,
            contentType: false,
            success: function(data) {
                if (data.trim() == 'unsuccessful') {
                    toast('Username này đã có người đăng ký!', 'error');
                    $('.modal.fade').removeClass('show');
                    $('.modal.fade').css('display', 'none');
                    $('.modal-backdrop').remove();
                } else {
                    toast('Thêm username: ' + data + ' thành công!');
                    $('form').trigger('reset');
                    showStaff();
                    $('.modal.fade').removeClass('show');
                    $('.modal-backdrop').remove();
                }
            }
        });
    }

}

function addBrand(event) {
    event.preventDefault();
    var br_name = $('#br_name').val().trim();
    if (br_name == '') {
        toast('Bạn phải nhập Tên thương hiệu!', 'error');
        return false;
    } else {
        $.ajax({
            url: "./controller/addBrandController.php",
            method: "post",
            data: { record: br_name },
            success: function(data) {
                if (data.trim() != 'unsuccessful'.trim()) {
                    toast('Thêm thương hiệu ' + data + ' thành công!');
                    $('form').trigger('reset');
                    showBrands();
                    $('.modal.fade').removeClass('show');
                    $('.modal-backdrop').remove();
                } else {
                    toast('Thương hiệu đã tồn tại!', 'error');
                    $('.modal.fade').removeClass('show');
                    $('.modal.fade').css('display', 'none');
                    $('.modal-backdrop').remove();
                }
            }
        });
    }
}


//add product data
function addItems() {
    var p_name = $('#p_name').val();
    var p_desc = $('#p_desc').val();
    var p_price = $('#p_price').val();
    var category = $('#category').val();
    var upload = $('#upload').val();
    var file = $('#file')[0].files[0];

    var fd = new FormData();
    fd.append('p_name', p_name);
    fd.append('p_desc', p_desc);
    fd.append('p_price', p_price);
    fd.append('category', category);
    fd.append('file', file);
    fd.append('upload', upload);
    $.ajax({
        url: "./controller/addItemController.php",
        method: "post",
        data: fd,
        processData: false,
        contentType: false,
        success: function(data) {
            alert('Product Added successfully.');
            $('form').trigger('reset');
            showProductItems();
        }
    });
}

//edit product data
function itemEditForm(id) {
    $.ajax({
        url: "./adminView/editItemForm.php",
        method: "post",
        data: { record: id },
        success: function(data) {
            $('.allContent-section').html(data);
        }
    });
}

//update product after submit
function updateItems() {
    var product_id = $('#product_id').val();
    var p_name = $('#p_name').val();
    var p_desc = $('#p_desc').val();
    var p_price = $('#p_price').val();
    var category = $('#category').val();
    var existingImage = $('#existingImage').val();
    var newImage = $('#newImage')[0].files[0];
    var fd = new FormData();
    fd.append('product_id', product_id);
    fd.append('p_name', p_name);
    fd.append('p_desc', p_desc);
    fd.append('p_price', p_price);
    fd.append('category', category);
    fd.append('existingImage', existingImage);
    fd.append('newImage', newImage);

    $.ajax({
        url: './controller/updateItemController.php',
        method: 'post',
        data: fd,
        processData: false,
        contentType: false,
        success: function(data) {
            alert('Data Update Success.');
            $('form').trigger('reset');
            showProductItems();
        }
    });
}

function staffDelete(id, firstname, lastname) {
    Swal.fire(confirmObj('Cảnh báo!', 'Bạn có muốn xóa: ' + firstname + ' ' + lastname + '?', 'error', 'Xóa', 'Hủy')).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "./controller/deleteStaffController.php",
                method: "post",
                data: { record: id },
                success: function(data) {
                    toast('Xóa ' + firstname + ' ' + lastname + ' thành công!');
                    $('form').trigger('reset');
                    showStaff();
                }
            });
        }
    });
}

function brandDelete(id, name) {
    Swal.fire(confirmObj('Cảnh báo!', 'Khi bạn xóa thương hiệu ' + name + ', mọi sản phẩm mang thương hiệu này sẽ mang Mã thương hiệu là NULL.', 'error', 'Xóa', 'Hủy')).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "./controller/deleteBrandController.php",
                method: "post",
                data: { record: id },
                success: function(data) {
                    toast('Xóa thương hiệu ' + name + ' thành công!');
                    $('form').trigger('reset');
                    showBrands();
                }
            });
        }
    });
}


//delete product data
function itemDelete(id) {
    $.ajax({
        url: "./controller/deleteItemController.php",
        method: "post",
        data: { record: id },
        success: function(data) {
            alert('Items Successfully deleted');
            $('form').trigger('reset');
            showProductItems();
        }
    });
}


//delete cart data
function cartDelete(id) {
    $.ajax({
        url: "./controller/deleteCartController.php",
        method: "post",
        data: { record: id },
        success: function(data) {
            alert('Cart Item Successfully deleted');
            $('form').trigger('reset');
            showMyCart();
        }
    });
}

function eachDetailsForm(id) {
    $.ajax({
        url: "./view/viewEachDetails.php",
        method: "post",
        data: { record: id },
        success: function(data) {
            $('.allContent-section').html(data);
        }
    });
}



//delete category data
function categoryDelete(id) {
    $.ajax({
        url: "./controller/catDeleteController.php",
        method: "post",
        data: { record: id },
        success: function(data) {
            alert('Category Successfully deleted');
            $('form').trigger('reset');
            showCategory();
        }
    });
}

//delete size data
function sizeDelete(id, name) {
    Swal.fire(confirmObj('Cảnh báo!', 'Bạn có muốn xóa Size: ' + name + '?', 'error', 'Xóa', 'Hủy')).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "./controller/deleteSizeController.php",
                method: "post",
                data: { record: id },
                success: function(data) {
                    toast('Xóa Size ' + name + ' thành công!');
                    $('form').trigger('reset');
                    showSizes();
                }
            });
        }
    });
}


//delete variation data
function variationDelete(id) {
    $.ajax({
        url: "./controller/deleteVariationController.php",
        method: "post",
        data: { record: id },
        success: function(data) {
            alert('Successfully deleted');
            $('form').trigger('reset');
            showProductSizes();
        }
    });
}

//edit variation data
function variationEditForm(id) {
    $.ajax({
        url: "./adminView/editVariationForm.php",
        method: "post",
        data: { record: id },
        success: function(data) {
            $('.allContent-section').html(data);
        }
    });
}


//update variation after submit
function updateVariations() {
    var v_id = $('#v_id').val();
    var product = $('#product').val();
    var size = $('#size').val();
    var qty = $('#qty').val();
    var fd = new FormData();
    fd.append('v_id', v_id);
    fd.append('product', product);
    fd.append('size', size);
    fd.append('qty', qty);

    $.ajax({
        url: './controller/updateVariationController.php',
        method: 'post',
        data: fd,
        processData: false,
        contentType: false,
        success: function(data) {
            alert('Update Success.');
            $('form').trigger('reset');
            showProductSizes();
        }
    });
}

function search(id) {
    $.ajax({
        url: "./controller/searchController.php",
        method: "post",
        data: { record: id },
        success: function(data) {
            $('.eachCategoryProducts').html(data);
        }
    });
}


function quantityPlus(id) {
    $.ajax({
        url: "./controller/addQuantityController.php",
        method: "post",
        data: { record: id },
        success: function(data) {
            $('form').trigger('reset');
            showMyCart();
        }
    });
}

function quantityMinus(id) {
    $.ajax({
        url: "./controller/subQuantityController.php",
        method: "post",
        data: { record: id },
        success: function(data) {
            $('form').trigger('reset');
            showMyCart();
        }
    });
}

function checkout() {
    $.ajax({
        url: "./view/viewCheckout.php",
        method: "post",
        data: { record: 1 },
        success: function(data) {
            $('.allContent-section').html(data);
        }
    });
}


function removeFromWish(id) {
    $.ajax({
        url: "./controller/removeFromWishlist.php",
        method: "post",
        data: { record: id },
        success: function(data) {
            alert('Removed from wishlist');
        }
    });
}


function addToWish(id) {
    $.ajax({
        url: "./controller/addToWishlist.php",
        method: "post",
        data: { record: id },
        success: function(data) {
            alert('Added to wishlist');
        }
    });
}

// Logout

let logoutBtn = document.getElementById('admin-logout');
logoutBtn.addEventListener('click', function() {
    Swal.fire(confirmObj('Xác nhận', 'Bạn có chắc chắn muốn đăng xuất', 'warning', 'Đồng ý', 'Hủy')).then((result) => {
        if (result.isConfirmed) {
            let xhr = new XMLHttpRequest();
            xhr.open('GET', 'index.php?action=logout', true);
            xhr.onload = function() {
                if (xhr.status === 200) {
                    console.log('Đã đăng xuất');
                    window.location.href = 'login.php'; // Chuyển hướng đến trang đăng nhập sau khi đăng xuất thành công
                } else {
                    alert('Xử lý yêu cầu thất bại');
                }
            };
            xhr.send();
        }
    });
});

// Hiển thị hộp thoại thông báo
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

function toast(message, icon = 'success', timer = '2000', position = 'top-end') {

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