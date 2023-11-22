function goToSection(filename) {
    $.ajax({
        url: "./adminView/" + filename,
        method: "post",
        data: { record: 1 },
        success: function(data) {
            $('.allContent-section').html(data);
        }
    });
}

function showDashboard() {
    $.ajax({
        url: "./adminView/viewDashboard.php",
        method: "post",
        data: { record: 1 },
        success: function(data) {
            $('.allContent-section').html(data);
        }
    });
}

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

function showCategories() {
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

function showProducts() {
    $.ajax({
        url: "./adminView/viewProducts.php",
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

function showCoupons() {
    $.ajax({
        url: "./adminView/viewCoupons.php",
        method: "post",
        data: { record: 1 },
        success: function(data) {
            $('.allContent-section').html(data);
        }
    });
}

function changeAccStatus(id, firstname, lastname) {
    Swal.fire(confirmObj('Cảnh báo!', 'Bạn có muốn thay đổi trạng thái của tài khoản của ' + firstname + ' ' + lastname + '?', 'error', 'Đồng ý', 'Hủy')).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "./controller/updateAccStatus.php",
                method: "post",
                data: { record: id },
                success: function(data) {
                    toast('Thay đổi trang thái tài khoản của ' + firstname + ' ' + lastname + ' thành công!', 'success', '4000');
                    $('form').trigger('reset');
                    goToSection('viewCustomers.php');
                }
            });
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
                if (data.trim() == 'unsuccessful'.trim()) {
                    toast('Username này đã có người đăng ký!', 'error');
                    $('.modal.fade').removeClass('show');
                    $('.modal.fade').css('display', 'none');
                    $('.modal-backdrop').remove();
                } else {
                    toast('Thêm username: ' + data + ' thành công!');
                    $('form').trigger('reset');
                    $('#myModal').modal('hide');
                    $('#myModal').on('hidden.bs.modal', function() {
                        showStaff();
                    });
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
                    $('#myModal').modal('hide');
                    $('#myModal').on('hidden.bs.modal', function() {
                        showBrands();
                    });
                } else {
                    toast('Thương hiệu đã tồn tại!', 'error');
                }
            }
        });
    }
}

function addCategory(event) {
    event.preventDefault();
    var catname = $('#catname').val().trim();
    var file = $('#file')[0].files[0];
    if (catname == '' || file == undefined) {
        toast('Vui lòng nhập đầy đủ các trường!', 'error');
        return false;
    } else {
        var fd = new FormData();
        fd.append('record', catname);
        fd.append('file', file);
        $.ajax({
            url: "./controller/addCategoryController.php",
            method: "post",
            data: fd,
            contentType: false,
            processData: false,
            success: function(data) {
                if (data.trim() == 'unsuccessful'.trim()) {
                    toast('Danh mục: ' + catname + ' đã có rồi!', 'error');
                } else if (data.trim() == 'notsuitable'.trim()) {
                    toast('Hãy chọn ảnh có kích thước dưới 2MB và chỉ bao gồm các đuôi mở rộng: .jpg / .jpeg / .png / .gif', 'error', '8000');
                } else {
                    toast('Thêm sản phẩm: ' + data + ' thành công!');
                    $('form').trigger('reset');
                    $('#myModal').modal('hide');
                    $('#myModal').on('hidden.bs.modal', function() {
                        showCategories();
                    });
                }
            }
        });
    }
}

function addSize(event) {
    event.preventDefault();
    var sizename = $('#sizename').val().trim();
    if (sizename == '') {
        toast('Bạn phải nhập Kích cỡ quần áo!', 'error');
        return false;
    } else {
        $.ajax({
            url: "./controller/addSizeController.php",
            method: "post",
            data: { record: sizename },
            success: function(data) {
                if (data.trim() != 'unsuccessful'.trim()) {
                    toast('Thêm Size ' + data + ' thành công!');
                    $('form').trigger('reset');
                    $('#myModal').modal('hide');
                    $('#myModal').on('hidden.bs.modal', function() {
                        showSizes();
                    });
                } else {
                    toast('Danh mục đã tồn tại!', 'error');
                }
            }
        });
    }
}

function productAddForm() {
    $.ajax({
        url: "./adminView/addProductForm.php",
        method: "post",
        data: { record: 1 },
        success: function(data) {
            $('.allContent-section').html(data);
        }
    });
}

function addProduct(event) {
    event.preventDefault();
    var pdname = $('#pdname').val().trim();
    var pdprice = $('#pdprice').val().trim();
    var pddesc = $('#pddesc').val();
    var category = $('#category').val();
    var brand = $('#brand').val();
    var date = $('#date').val();
    var file = $('#file')[0].files[0];
    var files = $('#files')[0].files;
    var status = $("input[name='status']:checked").val();
    var upload = $('#upload').val();
    if (pdname == '' || pdprice == '' || category == null || brand == null || file === undefined || files.length === 0) {
        toast('Không được bỏ trống!', 'error');
        return false;
    } else {
        var fd = new FormData();
        fd.append('pdname', pdname);
        fd.append('pdprice', pdprice);
        fd.append('pddesc', pddesc);
        fd.append('category', category);
        fd.append('brand', brand);
        fd.append('date', date);
        fd.append('file', file);

        for (var i = 0; i < files.length; i++) {
            fd.append('files[]', files[i]);
        }

        fd.append('status', status);
        fd.append('upload', upload);

        $.ajax({
            url: "./controller/addProductController.php",
            method: "post",
            data: fd,
            processData: false,
            contentType: false,
            success: function(data) {
                if (data.trim() == 'unsuccessful'.trim()) {
                    toast('Sản phẩn thuộc thương hiệu và danh mục này đã có rồi!', 'error');
                } else if (data.trim() == 'notsuitable'.trim()) {
                    toast('Hãy chọn ảnh có kích thước dưới 2MB và chỉ bao gồm các đuôi mở rộng: .jpg / .jpeg / .png / .gif', 'error', '8000');
                } else {
                    toast('Thêm sản phẩm: ' + data + ' thành công!');
                    $('form').trigger('reset');
                    showProducts();
                }
            }
        });
    }
}

function addProductSize(event) {
    event.preventDefault();
    var pdname = $('#pdname').val();
    var sizename = $('#sizename').val();
    var quantity = $('#quantity').val();
    if (pdname == null || sizename == null || quantity == '') {
        toast('Vui lòng hãy chọn và điền đủ các trường!', 'error');
        return false;
    } else {
        $.ajax({
            url: "./controller/addPdSizeController.php",
            method: "post",
            data: { record: pdname, sizename: sizename, quantity: quantity },
            success: function(data) {
                if (data.trim() != 'unsuccessful'.trim()) {
                    toast('Thêm thông tin cho sản phẩm thành công!');
                    $('form').trigger('reset');
                    $('#myModal').modal('hide');
                    $('#myModal').on('hidden.bs.modal', function() {
                        showProductSizes();
                    });
                } else {
                    toast('Sản phẩm này đã thiết lập thông tin rồi!', 'error');
                }
            }
        });
    }
}

function addCoupon(event) {
    event.preventDefault();
    var cpcode = $('#cpcode').val();
    var cpdesc = $('#cpdesc').val();
    var discount = $('#discount').val();
    var exdate = $('#exdate').val();
    if (cpcode == '' || discount == '' || exdate == '') {
        toast('Vui lòng nhập đầy đủ các trường!', 'error');
        return false;

    } else {
        var selectedDate = new Date(exdate);
        var currentDate = new Date();

        if (selectedDate <= currentDate) {
            toast('Ngày hết hạn phải lớn hơn ngày hiện tại!', 'error');
            return false;

        } else {
            var fd = new FormData();
            fd.append('cpcode', cpcode);
            fd.append('cpdesc', cpdesc);
            fd.append('discount', discount);
            fd.append('exdate', exdate);

            $.ajax({
                url: "./controller/addCouponController.php",
                method: "post",
                data: fd,
                processData: false,
                contentType: false,
                success: function(data) {
                    if (data.trim() != 'unsuccessful'.trim()) {
                        toast('Thêm mã giảm giá thành công!');
                        $('form').trigger('reset');
                        $('#myModal').modal('hide');
                        $('#myModal').on('hidden.bs.modal', function() {
                            showCoupons();
                        });
                    } else {
                        toast('Đã tồn tại mã giảm giá này rồi!', 'error');
                    }
                }
            });
        }
    }
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

function customerDelete(id, firstname, lastname) {
    Swal.fire(confirmObj('Cảnh báo!', 'Bạn muốn xóa tài khoản của ' + firstname + ' ' + lastname + '?', 'error', 'Xóa', 'Hủy')).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "./controller/deleteCustomerController.php",
                method: "post",
                data: { record: id },
                success: function(data) {
                    alert(data);
                    toast('Xóa tài khoản của ' + firstname + ' ' + lastname + ' thành công!');
                    $('form').trigger('reset');
                    goToSection('viewCustomers.php');
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

function categoryDelete(id, name) {
    Swal.fire(confirmObj('Cảnh báo!', 'Khi bạn xóa danh mục ' + name + ', mọi sản phẩm nằm trong danh mục này sẽ mang Mã danh mục là NULL.', 'error', 'Xóa', 'Hủy')).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "./controller/deleteCategoryController.php",
                method: "post",
                data: { record: id },
                success: function(data) {
                    toast('Xóa danh mục ' + name + ' thành công!');
                    $('form').trigger('reset');
                    showCategories();
                }
            });
        }
    });
}

function sizeDelete(id, name) {
    Swal.fire(confirmObj('Cảnh báo!', 'Nếu bạn xóa Size ' + name + ', các sản phẩm có kích cỡ này sẽ có Mã size là NULL.', 'error', 'Xóa', 'Hủy')).then((result) => {
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


function productDelete(id, name) {
    Swal.fire(confirmObj('Cảnh báo!', 'Khi bạn xóa sản phẩm ' + name + ', nếu nó có trong đơn hàng thì sẽ không thể xác định được Mã sản phẩm nữa.', 'error', 'Xóa', 'Hủy')).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "./controller/deleteProductController.php",
                method: "post",
                data: { record: id },
                success: function(data) {
                    toast('Xóa sản phẩm ' + name + ' thành công! Nhớ xóa cả ảnh trong ./uploads/ luôn nhé', 'success', '8000');
                    $('form').trigger('reset');
                    showProducts();
                }
            });
        }
    });
}

function pdSizeDelete(id, name) {
    Swal.fire(confirmObj('Cảnh báo!', 'Nếu bạn xóa thông tin của ' + name + ', nếu nó có trong đơn hàng thì sẽ không thể xác định được thông tin sản phẩm nữa.', 'error', 'Xóa', 'Hủy')).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "./controller/deletePdSizeController.php",
                method: "post",
                data: { record: id },
                success: function(data) {
                    toast('Xóa thông tin của ' + name + ' thành công!');
                    $('form').trigger('reset');
                    showProductSizes();
                }
            });
        }
    });
}

function couponDelete(id, name) {
    Swal.fire(confirmObj('Cảnh báo!', 'Bạn có chắc muốn xóa mã giảm giá: ' + name + '?', 'error', 'Xóa', 'Hủy')).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: "./controller/deleteCouponController.php",
                method: "post",
                data: { record: id },
                success: function(data) {
                    toast('Xóa mã giảm giá: ' + name + ' thành công!');
                    $('form').trigger('reset');
                    showCoupons();
                }
            });
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

function staffEditForm(id) {
    $.ajax({
        url: "./adminView/editStaffForm.php",
        method: "post",
        data: { record: id },
        success: function(data) {
            $('.allContent-section').html(data);
        }
    });
}

function updateStaff(event) {
    event.preventDefault();
    var id = $('#id').val();
    var username = $('#username').val();
    var firstname = $('#firstname').val();
    var lastname = $('#lastname').val();
    var password = $('#password').val();
    var sex = $("input[name='sex']:checked").val();
    var email = $('#email').val();
    var phone = $('#phone').val();
    var role = $("input[name='role']:checked").val();

    var fd = new FormData();
    fd.append('id', id);
    fd.append('username', username);
    fd.append('firstname', firstname);
    fd.append('lastname', lastname);
    fd.append('password', password);
    fd.append('sex', sex);
    fd.append('email', email);
    fd.append('phone', phone);
    fd.append('role', role);

    $.ajax({
        url: './controller/updateStaffController.php',
        method: 'post',
        data: fd,
        processData: false,
        contentType: false,
        success: function(data) {
            if (data.trim() != 'unsuccessful'.trim()) {
                toast('Cập nhật Username: ' + data + ' thành công!');
                $('form').trigger('reset');
                showStaff();
            } else {
                toast('Username đã tồn tại!', 'error');
            }
        }
    });
}

function customerEditForm(id) {
    $.ajax({
        url: "./adminView/editCustomerForm.php",
        method: "post",
        data: { record: id },
        success: function(data) {
            $('.allContent-section').html(data);
        }
    });
}

function updateCustomer(event) {
    event.preventDefault();
    var id = $('#id').val();
    var firstname = $('#firstname').val();
    var lastname = $('#lastname').val();
    var password = $('#password').val();
    var sex = $("input[name='sex']:checked").val();
    var email = $('#email').val();
    var phone = $('#phone').val();

    var fd = new FormData();
    fd.append('id', id);
    fd.append('firstname', firstname);
    fd.append('lastname', lastname);
    fd.append('password', password);
    fd.append('sex', sex);
    fd.append('email', email);
    fd.append('phone', phone);

    $.ajax({
        url: './controller/updateCusController.php',
        method: 'post',
        data: fd,
        processData: false,
        contentType: false,
        success: function(data) {
            if (data.trim() != 'unsuccessful'.trim()) {
                toast('Cập nhật Username: ' + data + ' thành công!');
                $('form').trigger('reset');
                goToSection('viewCustomers.php');
            } else {
                toast('Username đã tồn tại!', 'error');
            }
        }
    });
}

function brandEditForm(id) {
    $.ajax({
        url: "./adminView/editBrandForm.php",
        method: "post",
        data: { record: id },
        success: function(data) {
            $('.allContent-section').html(data);
        }
    });
}

function updateBrand(event) {
    event.preventDefault();
    var id = $('#id').val();
    var brandname = $('#brandname').val().trim();
    if (brandname == '') {
        toast('Bạn phải nhập Tên thương hiệu!', 'error');
        return false;
    } else {
        $.ajax({
            url: "./controller/updateBrandController.php",
            method: "post",
            data: { record: id, brandname: brandname },
            success: function(data) {
                if (data.trim() != 'unsuccessful') {
                    toast('Cập nhật thương hiệu thành ' + data + ' thành công!');
                    $('form').trigger('reset');
                    showBrands();
                } else {
                    toast('Thương hiệu đã tồn tại!', 'error');
                }
            }
        });
    }
}

function categoryEditForm(id) {
    $.ajax({
        url: "./adminView/editCategoryForm.php",
        method: "post",
        data: { record: id },
        success: function(data) {
            $('.allContent-section').html(data);
        }
    });
}

function updateCategory(event) {
    event.preventDefault();
    var id = $('#id').val();
    var catname = $('#catname').val().trim();
    var file = $('#file')[0].files[0];
    if (catname == '') {
        toast('Bạn phải nhập Tên danh mục!', 'error');
        return false;
    } else {

        var fd = new FormData();
        fd.append('id', id);
        fd.append('catname', catname);

        if (!file) {
            fd.append('file', '');

        } else {
            fd.append('file', file);
        }

        $.ajax({
            url: "./controller/updateCategoryController.php",
            method: "post",
            data: fd,
            processData: false,
            contentType: false,
            success: function(data) {
                if (data.trim() != 'unsuccessful') {
                    toast('Cập nhật danh mục thành ' + data + ' thành công!');
                    $('form').trigger('reset');
                    showCategories();
                } else if (data.trim() == 'bigsize') {
                    toast('Kích thước của ảnh không được vượt quá 2MB!', 'error', '6000');
                } else if (data.trim() == 'notsuitable') {
                    toast('Bạn chỉ có thể chọn ảnh có đuôi mở rộng: .jpg / .jpeg / .png / .gif', 'error', '6000');
                } else {
                    toast('Danh mục đã tồn tại!', 'error');
                }
            }
        });
    }
}

function sizeEditForm(id) {
    $.ajax({
        url: "./adminView/editSizeForm.php",
        method: "post",
        data: { record: id },
        success: function(data) {
            $('.allContent-section').html(data);
        }
    });
}

function updateSize(event) {
    event.preventDefault();
    var id = $('#id').val();
    var sizename = $('#sizename').val().trim();
    if (sizename == '') {
        toast('Bạn phải nhập kích cỡ!', 'error');
        return false;
    } else {
        $.ajax({
            url: "./controller/updateSizeController.php",
            method: "post",
            data: { record: id, sizename: sizename },
            success: function(data) {
                if (data.trim() != 'unsuccessful') {
                    toast('Cập nhật kích cỡ thành ' + data + ' thành công!');
                    $('form').trigger('reset');
                    showSizes();
                } else {
                    toast('Kích cỡ đã tồn tại!', 'error');
                }
            }
        });
    }
}

function productEditForm(id) {
    $.ajax({
        url: "./adminView/editProductForm.php",
        method: "post",
        data: { record: id },
        success: function(data) {
            $('.allContent-section').html(data);
        }
    });
}

function updateProduct(event) {
    event.preventDefault();
    var pdid = $('#id').val();
    var pdname = $('#pdname').val().trim();
    var pdprice = $('#pdprice').val().trim();
    var pddesc = $('#pddesc').val();
    var category = $('#category').val();
    var brand = $('#brand').val();
    var date = $('#date').val();
    var file = $('#file')[0].files[0]; // Ảnh chính
    var files = $('#files')[0].files; // Danh sách các ảnh mô tả
    var status = $("input[name='status']:checked").val();
    var upload = $('#upload').val();

    if (pdname == '' || pdprice == '') {
        toast('Không được bỏ trống!', 'error');
        return false;
    }

    var fd = new FormData();
    fd.append('pdid', pdid);
    fd.append('pdname', pdname);
    fd.append('pdprice', pdprice);
    fd.append('pddesc', pddesc);
    fd.append('category', category);
    fd.append('brand', brand);
    fd.append('date', date);

    if (!file) {
        fd.append('file', '');

    } else {
        fd.append('file', file);
    }

    if (files.length === 0) {
        fd.append('files', '');

    } else {
        for (var i = 0; i < files.length; i++) {
            fd.append('files[]', files[i]);
        }
    }

    fd.append('status', status);
    fd.append('upload', upload);

    $.ajax({
        url: "./controller/updateProductController.php",
        method: "post",
        data: fd,
        processData: false,
        contentType: false,
        success: function(data) {
            if (data.trim() == 'unsuccessful') {
                toast('Sản phẩm thuộc thương hiệu và danh mục này đã có rồi!', 'error', '6000');
            } else if (data.trim() == 'bigsize') {
                toast('Kích thước của ảnh không được vượt quá 2MB!', 'error', '6000');
            } else if (data.trim() == 'notsuitable') {
                toast('Bạn chỉ có thể chọn ảnh có đuôi mở rộng: .jpg / .jpeg / .png / .gif', 'error', '6000');
            } else {
                toast('Cập nhật sản phẩm: ' + data + ' thành công!');
                $('form').trigger('reset');
                showProducts();
            }
        }
    });
}

function pdSizeEditForm(id) {
    $.ajax({
        url: "./adminView/editPdSizeForm.php",
        method: "post",
        data: { record: id },
        success: function(data) {
            $('.allContent-section').html(data);
        }
    });
}

function updatePdSize(event) {
    event.preventDefault();
    var id = $('#id').val();
    var pdname = $('#pdname').val();
    var sizename = $('#sizename').val();
    var quantity = $('#quantity').val();

    if (quantity == '') {
        toast('Bạn phải nhập số lượng sản phẩm!', 'error');
        return false;

    } else {
        $.ajax({
            url: "./controller/updatePdSizeController.php",
            method: "post",
            data: { record: id, pdname: pdname, sizename: sizename, quantity: quantity },
            success: function(data) {
                if (data.trim() != 'unsuccessful') {
                    toast('Cập nhật thông tin sản phẩm thành công!');
                    $('form').trigger('reset');
                    showProductSizes();
                } else {
                    toast('Thông tin sản phẩm đã tồn tại!', 'error');
                }
            }
        });
    }
}

// Tìm kiếm sản phẩm
function searchProduct() {
    var productName = $('#s-productName').val();
    if (productName != '') {
        $.ajax({
            url: './controller/searchProductController.php',
            method: 'POST',
            data: { productName: productName },
            success: function(data) {
                $('#bodytable').html(data);
            }
        });
    } else {
        showProducts();
    }
}

// Đăng xuất
let logoutBtn = document.getElementById('admin-logout');
logoutBtn.addEventListener('click', function() {
    Swal.fire(confirmObj('Xác nhận', 'Bạn có chắc chắn muốn đăng xuất', 'warning', 'Đồng ý', 'Hủy')).then((result) => {
        if (result.isConfirmed) {
            let xhr = new XMLHttpRequest();
            xhr.open('GET', 'index.php?action=logout', true);
            xhr.onload = function() {
                if (xhr.status === 200) {
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