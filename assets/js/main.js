/*=============== NÚT TRỞ VỀ ĐẦU TRANG ===============*/
window.addEventListener('scroll', () => {
    let returnTop = document.getElementById('returnTop');
    if (window.scrollY > 200) {
        returnTop.style.display = 'flex';
    } else {
        returnTop.style.display = 'none';
    }
});

document.getElementById('returnTop').addEventListener('click', () => {
    window.scrollTo({ top: 0, behavior: 'smooth' });
});


/*=============== HIỆN MENU KHI RESPONSIVE ===============*/
const navMenu = document.getElementById('nav-menu'),
    navOverlay = document.getElementById('nav-overlay'),
    navToggle = document.getElementById('nav-toggle'),
    navClose = document.getElementById('nav-close');

/*===== Hiện Menu =====*/
if (navToggle) {
    navToggle.addEventListener('click', () => {
        navMenu.classList.add('show-menu');
        navOverlay.classList.add('show-overlay');
    })
}
/*===== Ẩn menu =====*/
if (navClose) {
    navClose.addEventListener('click', () => {
        navMenu.classList.remove('show-menu');
        navOverlay.classList.remove('show-overlay');
    })
}

/*=============== HIỆN THANH GIỎ HÀNG ===============*/
const cartIcon = document.querySelector('#add-cart-icon'),
    cart = document.querySelector('.cart__menu'),
    cartClose = document.querySelector('#cart__close-btn');

/*===== Mở thanh giỏ hàng =====*/
if (cartIcon == null) {
    console.log('Object no found!');
} else {
    cartIcon.onclick = () => {
        cart.classList.add('active');
    };

    /*===== Đóng thanh giỏ hàng =====*/
    cartClose.onclick = () => {
        cart.classList.remove('active');
    };
};



/*=============== TƯƠNG TÁC VỚI GIỎ HÀNG ===============*/

/*===== Kiển tra giỏ hàng trong Local Storage =====*/
var getCart = JSON.parse(localStorage.getItem("cart"));
if (getCart != null) {
    var cartItemsArr = getCart;
} else {
    var cartItemsArr = [];
}

if (document.readyState == 'loading') {
    document.addEventListener('DOMContentLoaded', ready);
} else {
    ready();
}

function ready() {
    /*===== Xóa sp khỏi giỏ =====*/
    var removeCartButton = document.getElementsByClassName('cart__remove');
    for (let i = 0; i < removeCartButton.length; i++) {
        let button = removeCartButton[i];
        button.addEventListener('click', removeCartItem);
    }

    /*===== Thay đổi số lượng sp =====*/
    let quantityInputs = document.getElementsByClassName('cart__product-quantity');
    for (let i = 0; i < quantityInputs.length; i++) {
        let input = quantityInputs[i];
        input.addEventListener('change', quantityChanged);
    }

    /*===== Thêm sp vào giỏ =====*/
    let addCart = document.getElementsByClassName('add-cart');
    for (let i = 0; i < addCart.length; i++) {
        let button = addCart[i];
        button.addEventListener('click', function(i) {
            return function() {
                addCartClicked(i);
            }
        }(i));
    }
}


/*===== Hàm xóa sp khỏi giỏ hàng =====*/
function removeCartItem(event) {
    let buttonClicked = event.target;
    let cartsideSection = buttonClicked.closest('.cart__box');

    if (cartsideSection) {
        let psidElement = cartsideSection.querySelector('.cart__productsize-id');

        if (psidElement) {
            let psid = psidElement.innerText;

            /*===== Xóa sp khỏi Local Storage =====*/
            var getCart = JSON.parse(localStorage.getItem("cart"));
            if (getCart != null) {
                var updatedCart = getCart.filter(item => item.id !== psid);
                localStorage.setItem("cart", JSON.stringify(updatedCart));
            }

            /*===== Xóa sp khỏi giỏ =====*/
            cartsideSection.remove();

            updateTotal();
        }
    }
}


/*===== Hàm thay đổi số lượng sp trong giỏ hàng =====*/
function quantityChanged(event) {
    let input = event.target;
    let quantity = parseInt(input.value);

    if (!isNaN(quantity) && input) {
        if (quantity === 0) {
            removeCartItem(event);
            updateTotal();
            return;
        }

        /*===== Lấy ra thông tin sản phẩm từ giỏ =====*/
        let cartItemBox = input.closest('.cart__box');
        let psidElement = cartItemBox.querySelector('.cart__productsize-id');

        let psid = psidElement.innerText;

        /*===== Tìm và cập nhật lại vào Local Storage =====*/
        let cart = JSON.parse(localStorage.getItem("cart"));
        if (cart) {
            let updatedCart = cart.map(item => {
                if (item.id === psid) {
                    item.quantity = quantity.toString();
                }
                return item;
            });
            localStorage.setItem("cart", JSON.stringify(updatedCart));
        }

        updateTotal();
    }
}


/*===== Hàm thêm sp vào giỏ hàng =====*/
function addCartClicked(i) {
    let button = event.target;
    let shopProducts = button.closest('.product__item');
    let title = shopProducts.querySelector('.product__title').innerText;
    let price = shopProducts.querySelector('.new__price').innerText;
    let productImg = shopProducts.querySelector('.product__img.default').src;

    // Câu lệnh vẫn chưa được tối ưu vì đang phải chọn tất cả các nút 'add to cart' có trong trang 
    let shopProducts2 = button.closest('.main');
    let productSId = shopProducts2.querySelectorAll('.product_size_id');
    let pdSId = productSId[i].innerText;
    let productSName = shopProducts2.querySelectorAll('.add-cart');
    let pdSName = productSName[i].innerText;
    let productSQuantity = shopProducts2.querySelectorAll('.product_size_quantity');
    let pdSQuantity = productSQuantity[i].innerText;
    addProductToCart(pdSId, title, price, productImg, pdSName, pdSQuantity);
    updateTotal();
}


/*===== Lấy thông tin sp và hiển thị trong giỏ hàng =====*/
function addProductToCart(psid, title, price, image, pdsname, quantity) {
    let cartShopBox = document.createElement('div');
    cartShopBox.classList.add('cart__box');

    let cartItems = document.getElementsByClassName('cart__content-menu')[0];
    let cartItemsSId = cartItems.querySelectorAll('.cart__productsize-id');

    if (cartItemsSId.length === 0) {
        toast('Thêm sản phẩm: ' + title + ' thành công!', 'success', '2000');
    } else {
        for (let i = 0; i < cartItemsSId.length; i++) {
            if (cartItemsSId[i].innerText == psid) {
                alert('Bạn đã thêm sản phẩm này vào giỏ hàng rồi');
                return false;
            }
        }
        toast('Thêm sản phẩm: ' + title + ' thành công!', 'success', '2000');
    }

    let cartBoxContent = `
                        <span class="cartside-section" style="display:contents">
                            <img src="${image}" alt="" class="cart__box-img">
                            <div class="detail__box">
                                <div class="cart__productsize-id">${psid}</div>
                                <div class="cart__product-title">${title}</div>
                                <div>Size: <span class="cart__productsize-title">${pdsname}</span></div>
                                <div class="cart__product-price">${price}</div>
                                <input type="number" name="" class="cart__product-quantity" max="${quantity}" min="0" value="1">
                            </div>
                            <i class="fi fi-rs-trash table__trash cart__remove"></i>
                        </span>`;

    cartShopBox.innerHTML = cartBoxContent;
    cartItems.append(cartShopBox);
    cartShopBox.getElementsByClassName('cart__remove')[0].addEventListener('click', removeCartItem);
    cartShopBox.getElementsByClassName('cart__product-quantity')[0].addEventListener('change', quantityChanged);

    var quantitySelected = cartShopBox.querySelector(".cart__product-quantity").value;

    /*===== Lưu giỏ hàng vào Local Storage =====*/
    var itemInCart = {
        "id": psid,
        "title": title,
        "size": pdsname,
        "price": price,
        "quantity": quantitySelected,
        "maxquantity": quantity,
        "image": image
    }

    cartItemsArr.push(itemInCart);

    localStorage.setItem("cart", JSON.stringify(cartItemsArr));

    /*===== Đếm và hiển thị số lượng sản phẩm đang có trong giỏ từ Local Storage =====*/
    var getCart = JSON.parse(localStorage.getItem("cart"));
    if (getCart != null) {
        document.getElementById("count-cart").innerHTML = getCart.length;
    }

}


/*===== Hàm cập nhật tổng giá tiền =====*/
function updateTotal() {
    let cartContent = document.getElementsByClassName('cart__content-menu')[0];
    let cartBoxes = cartContent.getElementsByClassName('cart__box');
    let total = 0;

    for (let i = 0; i < cartBoxes.length; i++) {
        let cartBox = cartBoxes[i];
        let priceElement = cartBox.getElementsByClassName('cart__product-price')[0];
        let quantityElement = cartBox.getElementsByClassName('cart__product-quantity')[0];

        if (priceElement && quantityElement) {

            let price = changeToNumber(priceElement.innerText)
            let quantity = parseInt(quantityElement.value);

            /*===== Nếu số lượng là 0 thì sẽ xóa sp đó khỏi giỏ =====*/
            if (quantity === 0) {
                cartBox.remove();
            } else {
                total += (price * quantity);
            }
        }
    }

    /*===== Cập nhật tổng giá tiền =====*/
    let formattedNumber = changeToPrice(total);
    let totalPriceElement = document.getElementsByClassName('cart__total-price')[0];

    if (total === 0) {
        totalPriceElement.innerText = '0 VNĐ';
    } else {
        totalPriceElement.innerText = formattedNumber + ' VNĐ';
    }
}


/*===== Hàm tải lại giỏ hàng mỗi khi load trang =====*/
function loadCart() {
    var getCart = JSON.parse(localStorage.getItem("cart"));

    if (getCart != null) {
        document.getElementById("count-cart").innerHTML = getCart.length;

        /*===== Hiển thị sp trong giỏ =====*/
        displayCartItems(getCart);
    }
}


/*===== Hàm hiển thị sản phẩm có trong giỏ =====*/
function displayCartItems(cartItems) {
    let cartContent = document.getElementsByClassName('cart__content-menu')[0];

    cartItems.forEach(function(item) {
        let cartShopBox = document.createElement('div');
        cartShopBox.classList.add('cart__box');

        let cartBoxContent = `
            <img src="${item.image}" alt="" class="cart__box-img">
            <div class="detail__box">
                <div class="cart__productsize-id">${item.id}</div>
                <div class="cart__product-title">${item.title}</div>
                <div>Size: <span class="cart__productsize-title">${item.size}</span></div>
                <div class="cart__product-price">${item.price}</div>
                <input type="number" name="" id="" class="cart__product-quantity" max="${item.maxquantity}" value="${item.quantity}">
            </div>
            <i class="fi fi-rs-trash table__trash cart__remove"></i>`;

        cartShopBox.innerHTML = cartBoxContent;
        cartContent.appendChild(cartShopBox);

        cartShopBox.getElementsByClassName('cart__remove')[0].addEventListener('click', removeCartItem);
        cartShopBox.getElementsByClassName('cart__product-quantity')[0].addEventListener('change', quantityChanged);
    });

    /*===== Cập nhật tổng giá tiền =====*/
    updateTotal();
}


/*===== Hàm hiển thị sản phẩm có trong giỏ lên trang cart.php =====*/
function showCartInfo() {
    var cart = JSON.parse(localStorage.getItem("cart"));
    if (cart != null) {
        var showItem = "";

        /*===== Tổng giá tiền của các sp =====*/
        var subtotal = 0;

        for (let i = 0; i < cart.length; i++) {
            let price = changeToNumber(cart[i]["price"]);
            var pdtotal = parseInt(price * cart[i]["quantity"]);
            subtotal += pdtotal;
            let formattedTotal = changeToPrice(pdtotal);
            showItem += `
                <tr>
                    <td><img src="` + cart[i]["image"] + `" class="table__img" alt=""></td>

                    <td>
                        <h3 class="table__title">
                            ` + cart[i]["title"] + `
                        </h3>
                        <p class="table__description">Size: ` + cart[i]["size"] + `</p>
                    </td>

                    <td>
                        <span class="table__price">` + cart[i]["price"] + `</span>
                    </td>

                    <td><input type="number" max="` + cart[i]["maxquantity"] + `" value="` + cart[i]["quantity"] + `" class="quantity"></td>

                    <td><span class="table__subtotal">` + formattedTotal + ` VNĐ</span></td>

                    <td><i class="fi fi-rs-trash table__trash"></i></td>

                </tr>`;
        }
        document.getElementById("cart__info").innerHTML = showItem;

        var formattedSubtotal = changeToPrice(subtotal);

        document.getElementById("cart-subtotal").innerText = formattedSubtotal + ' VNĐ';
        document.getElementById("cart-total").innerText = formattedSubtotal + ' VNĐ';
    }
}


/*===== Cập nhật giỏ hàng khi thay đổi số lượng sp trong trang cart.php =====*/
function updateCart() {
    var cart = JSON.parse(localStorage.getItem("cart"));

    if (cart != null) {
        var quantityInputs = document.getElementsByClassName('quantity');

        for (let i = 0; i < quantityInputs.length; i++) {
            let input = quantityInputs[i];
            let newQuantity = parseInt(input.value);
            let maxQuantity = cart[i].maxquantity;

            /*===== Nếu người dùng nhập quá số lượng sp hiện có =====*/
            if (newQuantity > maxQuantity) {
                alert('Xin lỗi, chúng tôi chỉ còn ' + maxQuantity + ' sản phẩm.');
                return;
            }

            /*===== Cập nhật lại số lượng sp =====*/
            cart[i].quantity = newQuantity;
        }

        /*===== Cập nhật lại số lượng sp vào Local Storage =====*/
        localStorage.setItem("cart", JSON.stringify(cart));

        /*===== Reload lại trang =====*/
        location.reload();
    }
}


/*===== Hàm xử lý khi người dùng sử dụng mã giảm giá =====*/
function applyCoupon(event) {
    event.preventDefault();

    /*===== Sử dụng jQuery, dùng phương thức Ajax để kiểm tra mã giảm giá trong database =====*/
    var couponCode = $('#coupon-code').val();
    if (couponCode == '') {
        toast('Bạn hãy nhập Mã giảm giá trước đã!', 'error');
    } else {
        $.ajax({
            url: "./cus_controller/checkCouponController.php",
            method: "post",
            data: { record: couponCode },
            success: function(data) {
                if (data.trim() != 'unsuccessful') {
                    toast('Dùng mã giảm giá thành công!');

                    /*===== Cập nhật lại tổng giá tiền sau khi dùng mã giảm giá =====*/
                    let discount = parseInt(data);
                    let newPrice = document.getElementById("cart-subtotal");
                    let cartTotalValue = newPrice.textContent.trim();
                    let total = changeToNumber(cartTotalValue);
                    let discountTotal = (total * discount / 100);
                    let newTotal = (total - discountTotal);

                    /*===== Hiển thị số tiền được giảm =====*/
                    var formattedDTotal = changeToPrice(discountTotal);
                    document.getElementById("cart-discount").innerText = ' - ' + formattedDTotal + ' VNĐ';

                    /*===== Hiển thị tổng giá tiền sau khi giảm =====*/
                    var formattedNTotal = changeToPrice(newTotal);
                    document.getElementById("cart-total").innerText = formattedNTotal + ' VNĐ';
                } else {
                    toast('Mã giảm giá không tồn tại!', 'error');
                }
            }
        });
    }
}


/*===== Hàm lưu tổng giá tiền vào Local Storage và chuyển đến trang thanh toán =====*/
function goToCheckOut() {
    let oldTotalE = document.getElementById("cart-subtotal").textContent;
    let newTotalE = document.getElementById("cart-total").textContent;

    if (oldTotalE == '0 VNĐ') {
        if (confirm('Bạn chưa có sản phẩm nào trong giỏ hàng, hãy mua sản phẩm trước nhé!')) {
            window.location.href = 'shop.php';
        } else {
            return;
        }
    } else {

        /*===== Chuyển thành mảng chuỗi và lưu vào Local Storage =====*/
        let totalArr = [String(oldTotalE), String(newTotalE)];
        localStorage.setItem("total", JSON.stringify(totalArr));

        window.location.href = 'checkout.php';
    }

}


/*===== Hàm tải thông tin lên trang checkout.php =====*/
function showCheckOutInfo() {
    var cartInfo = JSON.parse(localStorage.getItem("cart"));
    var totalInfo = JSON.parse(localStorage.getItem("total"));
    if (cartInfo != null) {
        var showItems = "";

        for (let i = 0; i < cartInfo.length; i++) {
            let price = changeToNumber(cartInfo[i]["price"]);
            var pdtotal = parseInt(price * cartInfo[i]["quantity"]);
            let formattedTotal = changeToPrice(pdtotal);

            /*===== Hiển thị sản phẩm và giá của sp =====*/
            showItems += `
                <tr>
                    <div class="product_size_id">` + cartInfo[i]["id"] + `</div>
                    <td><img src="` + cartInfo[i]["image"] + `" alt="" class="order__img"></td>

                    <td>
                        <h3 class="table__title">` + cartInfo[i]["title"] + `</h3>
                        <p class="table__quantity">x ` + cartInfo[i]["quantity"] + `</p>
                    </td>

                    <td>
                        <span class="table__price">` + formattedTotal + ` VNĐ</span>
                    </td>
                </tr>`;
        }

        /*===== Hiển thị tổng giá tiền =====*/
        var showTotalCO = `
                <tr>
                    <td><span class="order__subtitle">Giá</span></td>
                    <td colspan="2"><span class="table__price">` + totalInfo[0] + `</span></td>
                </tr>

                <tr>
                    <td><span class="order__subtitle">Phí giao hàng</span></td>
                    <td colspan="2"><span class="table__price">Miễn phí</span></td>
                </tr>

                <tr>
                    <td><span class="order__subtitle">Tổng giá</span></td>
                    <td colspan="2"><span id="sumTotal" class="order__grand-total">` + totalInfo[1] + `</span></td>
                </tr>`;

        document.getElementById("product-info").innerHTML = showItems;
        document.getElementById("total-info").innerHTML = showTotalCO;
    }


}


/*===== Hàm kiểm tra và đưa đơn hàng vào database (cái thứ lên ý tưởng đau đầu nhất) =====*/

function confirmCheckOut(id) {
    if (id == 0) {

        var lastname = $("#or-lastname").val();
        var firstname = $("#or-firstname").val();
        var sub_address = $("#sub-address").val();
        var total = $("#sumTotal").text();
        if (!total) {
            alert("Bạn hãy mua hàng rồi mới được thanh toán!");
            return false;
        }

        var province = $("#province option:selected").text();
        var district = $("#district option:selected").text();
        var ward = $("#ward option:selected").text();

        var phone = $("#or-phone").val();
        var email = $("#or-email").val();
        var payment = $("input[name='payment']:checked").val();

        if (lastname == '' ||
            firstname == '' ||
            address == '' ||
            province == 'Chọn Thành phố / Tỉnh' ||
            district == 'Chọn Quận / Huyện' ||
            ward == 'Chọn Phường / Xã') {
            toast('Vui lòng nhập đầy đủ các thông tin!', 'error');

        } else if (!validateEmail(email)) {
            toast('Vui lòng nhập đúng định dạng của email', 'error');

        } else {

            var address = sub_address + ', ' + ward.trim() + ', ' + district.trim() + ', ' + province.trim();

            var fd = new FormData();
            fd.append('firstname', firstname);
            fd.append('lastname', lastname);
            fd.append('address', address);
            fd.append('total', total);
            fd.append('email', email);
            fd.append('phone', phone);
            fd.append('payment', payment);

            $.ajax({
                url: './cus_controller/addOrder.php',
                method: 'post',
                data: fd,
                processData: false,
                contentType: false,
                success: function(data) {
                    if (data.trim() == 'duplicateEmail') {
                        toast('Email này đã được đăng ký, bạn vui lòng đăng nhập hoặc sử dụng Email khác để đặt hàng.', 'error', '8000');

                    } else if (data.trim() == 'unsuccessful') {
                        toast('Đặt hàng thất bại, lỗi hệ thống!', 'error', '4000');

                    } else {
                        data = parseInt(data);
                        insertPdToODetails(data, function() {
                            localStorage.clear();
                            window.location.href = '/thankyou.php?success=true';
                        });
                    }
                }
            });

        }

    } else {
        var address_ship = $("#cus_address_ship").val();
        var phone_ship = $("#cus_phone_ship").val();
        var order_total = $("#sumTotal").text();
        var payment_method = $("input[name='payment']:checked").val();

        if (!order_total) {
            alert('Bạn hãy mua hàng rồi mới thanh toán nha!');
            return false;

        } else if (address_ship == '' || phone_ship == '') {
            toast('Vui lòng nhập đầy đủ các thông tin giao hàng!', 'error');

        } else {
            var fd = new FormData();
            fd.append('address_ship', address_ship);
            fd.append('phone_ship', phone_ship);
            fd.append('order_total', order_total);
            fd.append('payment_method', payment_method);
            fd.append('id', id);

            $.ajax({
                url: './cus_controller/addAccOrder.php',
                method: 'post',
                data: fd,
                processData: false,
                contentType: false,
                success: function(data) {
                    if (data.trim() == 'unsuccessful') {
                        toast('Đặt hàng thất bại, lỗi hệ thống!', 'error', '4000');

                    } else {
                        data = parseInt(data);
                        insertPdToODetails(data, function() {
                            localStorage.clear();
                            window.location.href = '/thankyou.php?success=true';
                        });
                    }
                }
            });

        }
    }
}


// Lấy orderId để thêm từng sản phẩm đặt vào order details
function insertPdToODetails(id, callback, index = 0) {
    var get_cart = JSON.parse(localStorage.getItem("cart"));

    if (index < get_cart.length) {
        let psId = get_cart[index]["id"];
        let quantity = get_cart[index]["quantity"];
        let price = get_cart[index]["price"];

        let fm_price = changeToNumber(price);
        let fmquantity = parseInt(quantity);
        let total_price = changeToPrice(fm_price * fmquantity) + ' VNĐ';

        var fd = new FormData();
        fd.append('psId', psId);
        fd.append('quantity', quantity);
        fd.append('total_price', total_price);
        fd.append('id', id);

        $.ajax({
            url: './cus_controller/addOrderDetails.php',
            method: 'post',
            data: fd,
            processData: false,
            contentType: false,
            success: function(data) {

                insertPdToODetails(id, callback, index + 1);
            }
        });
    } else {
        // Đã duyệt qua tất cả các phần tử trong giỏ hàng
        callback();
    }
}



/*=============== TƯƠNG TÁC VỚI CHI TIẾT SẢN PHẨM ===============*/

/*===== Xem ảnh mô tả sản phẩm =====*/
function imgGallery() {
    const mainImg = document.querySelector('.details__img'),
        smallImg = document.querySelectorAll('.details__small-img');

    smallImg.forEach((img) => {
        img.addEventListener('click', function() {
            mainImg.src = this.src;
        })
    })
}

imgGallery();


/*===== Chọn size sản phẩm =====*/
function changeSize(element) {
    var allSizes = document.querySelectorAll('.size__link');

    allSizes.forEach(function(size) {
        size.classList.remove('size-active');
    });

    element.classList.add('size-active');
}


function addPdtoCart(title, price) {

    if ($(".size__link").hasClass("size-active")) {
        var psId = $(".size__link.size-active").val();
        var size = $(".size__link.size-active").text();
        var pdImg = $("#pd-img").attr('src');
        var quantityElement = $(".size__link.size-active").siblings('.product_size_quantity');
        var quantity = quantityElement.text().trim();

        addProductToCart(psId, title, price, pdImg, size, quantity);
        updateTotal();
    } else {
        alert("Vui lòng chọn size trước khi thêm vào giỏ hàng.");
    }
}



/*=============== TÌM KIẾM SẢN PHẨM ===============*/
function searchItem() {
    var search = $("#search-input").val();
    window.location.href = '/search.php?name=' + search;
}



/*=============== SỬ DỤNG SWIPER CHO DANH MỤC SẢN PHẨM ===============*/
var swiperCategories = new Swiper(".categories__container", {
    spaceBetween: 24,
    loop: true,

    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },

    breakpoints: {
        640: {
            slidesPerView: 2,
            spaceBetween: 20,
        },
        768: {
            slidesPerView: 3,
            spaceBetween: 24,
        },
        1024: {
            slidesPerView: 6,
            spaceBetween: 24,
        },
    },
});



/*=============== SỬ DỤNG SWIPER CHO SẢN PHẨM ===============*/
var swiperProduct = new Swiper(".new__container", {
    spaceBetween: 24,
    loop: true,

    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },

    breakpoints: {
        640: {
            slidesPerView: 2,
            spaceBetween: 20,
        },
        768: {
            slidesPerView: 4,
            spaceBetween: 24,
        },
        1024: {
            slidesPerView: 4,
            spaceBetween: 24,
        },
    },
});



/*=============== CHUYỂN ĐỔI QUA LẠI TAB SẢN PHẨM ===============*/
const tabs = document.querySelectorAll('[data-target]'),
    tabContent = document.querySelectorAll('[content]');
tabs.forEach((tab) => {
    tab.addEventListener('click', () => {
        const target = document.querySelector(tab.dataset.target);
        tabContent.forEach((tabContent) => {
            tabContent.classList.remove('active-tab');
        });

        target.classList.add('active-tab');

        tabs.forEach((tab) => {
            tab.classList.remove('active-tab');
        });

        tab.classList.add('active-tab');
    });

});



/*=============== BIỂU THỨC CHÍNH QUY ===============*/

/*===== Hàm kiểm tra Email =====*/
function validateEmail(id) {
    let emailInput = document.getElementById(id);
    let emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (emailPattern.test(emailInput.value)) {

    } else {
        alert("Vui lòng nhập đúng định dạng Email!");
        emailInput.value = "";
    }
}



/*=============== SWEET ALERT 2 ===============*/

/*===== Hàm hiển thị hộp thại thông báo =====*/
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

/*===== Hàm hiển thị thông báo góc trên bên phải =====*/
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


/*=============== ĐỊNH DẠNG ===============*/


/*===== Hàm định dạng số sang kiểu có dấu chấm ngăn cách (tiền) =====*/
function changeToPrice(num) {
    let formattedNumber = num.toLocaleString('vi-VN');
    return formattedNumber;
}


/*===== Hàm định dạng đơn vị tiền sang kiểu số =====*/
function changeToNumber(price) {
    let numberString = price.replace(/[,. VNĐ]/g, '');
    let number = parseInt(numberString);
    return number;
}