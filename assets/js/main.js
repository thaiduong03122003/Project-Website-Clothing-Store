/*=============== SHOW MENU ===============*/
const navMenu = document.getElementById('nav-menu'),
    navOverlay = document.getElementById('nav-overlay'),
    navToggle = document.getElementById('nav-toggle'),
    navClose = document.getElementById('nav-close');
/*===== Menu Show =====*/
/* Validate if constant exists */
if (navToggle) {
    navToggle.addEventListener('click', () => {
        navMenu.classList.add('show-menu');
        navOverlay.classList.add('show-overlay');
    })
}
/*===== Hide Show =====*/
/* Validate if constant exists */
if (navClose) {
    navClose.addEventListener('click', () => {
        navMenu.classList.remove('show-menu');
        navOverlay.classList.remove('show-overlay');
    })
}

/*=============== SHOW CART MENU ===============*/
const cartIcon = document.querySelector('#add-cart-icon'),
    cart = document.querySelector('.cart__menu'),
    cartClose = document.querySelector('#cart__close-btn');

if (cartIcon == null) {
    console.log('Object no found!');
} else {
    cartIcon.onclick = () => {
        cart.classList.add('active');
    };

    cartClose.onclick = () => {
        cart.classList.remove('active');
    };
};
/*=============== CART WORKING ===============*/
if (document.readyState == 'loading') {
    document.addEventListener('DOMContentLoaded', ready);
} else {
    ready();
}

function ready() {
    //Remove Items From Cart
    var removeCartButton = document.getElementsByClassName('cart__remove');
    for (let i = 0; i < removeCartButton.length; i++) {
        let button = removeCartButton[i];
        button.addEventListener('click', removeCartItem);
    }

    //Quantity Changes
    let quantityInputs = document.getElementsByClassName('cart__product-quantity');
    for (let i = 0; i < quantityInputs.length; i++) {
        let input = quantityInputs[i];
        input.addEventListener('change', quantityChanged);
    }

    //Add To Cart
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


//Function Remove Items From Cart
function removeCartItem(event) {
    let buttonClicked = event.target;
    buttonClicked.parentElement.remove();
    updateTotal();
}
//Function Quantity Changes
function quantityChanged(event) {
    let input = event.target;
    if (isNaN(input.value) || input.value <= 0) {
        input.value = 0;
    }
    updateTotal();
}

//Funtion Add To Cart
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
                            <img src="${image}" alt="" class="cart__box-img">
                            <div class="detail__box">
                                <div class="cart__productsize-id">${psid}</div>
                                <div class="cart__product-title">${title}</div>
                                <div>Size: <span class="cart__productsize-title">${pdsname}</span></div>
                                <div class="cart__product-price">${price}</div>
                                <input type="number" name="" id="" class="cart__product-quantity" max="${quantity}" value="1">
                            </div>
                            <i class="fi fi-rs-trash table__trash cart__remove"></i>`;

    cartShopBox.innerHTML = cartBoxContent;
    cartItems.append(cartShopBox);
    cartShopBox.getElementsByClassName('cart__remove')[0].addEventListener('click', removeCartItem);
    cartShopBox.getElementsByClassName('cart__product-quantity')[0].addEventListener('change', quantityChanged);
}


//Funtion Update Total
function updateTotal() {
    let cartContent = document.getElementsByClassName('cart__content-menu')[0];
    let cartBoxes = cartContent.getElementsByClassName('cart__box');
    let total = 0;

    for (let i = 0; i < cartBoxes.length; i++) {
        let cartBox = cartBoxes[i];
        let priceElement = cartBox.getElementsByClassName('cart__product-price')[0];
        let quantityElement = cartBox.getElementsByClassName('cart__product-quantity')[0];
        let price = parseInt(priceElement.innerText.replace("VNĐ", ""));
        let quantity = parseInt(quantityElement.value);

        // Kiểm tra nếu số lượng là 0 thì xóa sản phẩm khỏi giỏ hàng
        if (quantity === 0) {
            cartBox.remove();
        } else {
            total += (price * quantity);
        }
    }

    // Cập nhật tổng tiền
    let formattedNumber = total.toLocaleString('vi-VN', { minimumFractionDigits: 0 });
    if (formattedNumber != 0)
        document.getElementsByClassName('cart__total-price')[0].innerText = formattedNumber + '.000 VNĐ';
    else
        document.getElementsByClassName('cart__total-price')[0].innerText = '0 VNĐ';

}

/*=============== IMAGE GALLERY ===============*/
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

/*=============== SWIPER CATEGORIES ===============*/
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

/*=============== SWIPER PRODUCTS ===============*/
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

/*=============== PRODUCTS TABS ===============*/
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


// AJAX

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