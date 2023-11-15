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

cartIcon.onclick = () => {
    cart.classList.add('active');
};

cartClose.onclick = () => {
    cart.classList.remove('active');
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
        button.addEventListener('click', addCartClicked);
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
function addCartClicked(event) {
    let button = event.target;
    let shopProducts = button.closest('.product__item');
    let title = shopProducts.querySelector('.product__title').innerText;
    let price = shopProducts.querySelector('.new__price').innerText;
    let productImg = shopProducts.querySelector('.product__img.default').src;

    addProductToCart(title, price, productImg);
    updateTotal();
}

function addProductToCart(title, price, image) {
    let cartShopBox = document.createElement('div');
    cartShopBox.classList.add('cart__box');

    let cartItems = document.getElementsByClassName('cart__content-menu')[0];
    let cartItemsNames = cartItems.getElementsByClassName('cart__product-title');

    for (let i = 0; i < cartItemsNames.length; i++) {
        if (cartItemsNames[i].innerText == title) {
            alert('Bạn đã thêm sản phẩm này trong giỏ hàng rồi!');
            return;
        }
    }
    let cartBoxContent = `
                            <img src="${image}" alt="" class="cart__box-img">
                            <div class="detail__box">
                                <div class="cart__product-title">${title}</div>
                                <div class="cart__product-price">${price}</div>
                                <input type="number" name="" id="" class="cart__product-quantity" value="1">
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
        let price = parseFloat(priceElement.innerText.replace("$", ""));
        let quantity = parseInt(quantityElement.value);

        // Kiểm tra nếu số lượng là 0 thì xóa sản phẩm khỏi giỏ hàng
        if (quantity === 0) {
            cartBox.remove();
        } else {
            total += (price * quantity);
        }
    }

    // Cập nhật tổng tiền
    document.getElementsByClassName('cart__total-price')[0].innerText = '$' + total;
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
            slidesPerView: 6,
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