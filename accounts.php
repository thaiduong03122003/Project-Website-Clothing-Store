<?php
    include "./inc/header.php";
    include "./inc/navigationbar.php";
?>


    <!--=============== MAIN ===============-->
    <main class="main">
        <!--=============== BREADCRUMB ===============-->
        <section class="breadcrumb">
            <ul class="breadcrumb__list flex container">
                <li><a href="index.html" class="breadcrumb__link">Home</a></li>
                <li>
                    <span class="breadcrumb__link">></span>
                </li>
                <li>
                    <span class="breadcrumb__link">Account</span>
                </li>
            </ul>
        </section>

        <!--=============== ACCOUNTS ===============-->
        <section class="accounts section--lg">
            <div class="accounts__container container grid">
                <div class="account__tabs">
                    <p class="account__tab active-tab" data-target="#dashboard">
                        <i class="fi fi-rs-settings-sliders"></i> Dashboard
                    </p>

                    <p class="account__tab" data-target="#orders">
                        <i class="fi fi-rs-shopping-bag"></i> Orders
                    </p>

                    <p class="account__tab" data-target="#update-profile">
                        <i class="fi fi-rs-user"></i> Update Profile
                    </p>

                    <p class="account__tab" data-target="#address">
                        <i class="fi fi-rs-marker"></i> My Address
                    </p>

                    <p class="account__tab" data-target="#change-password">
                        <i class="fi fi-rs-key"></i> Change Password
                    </p>

                    <p class="account__tab account__logout">
                        <i class="fi fi-rs-exit"></i> Logout
                    </p>
                </div>

                <div class="tabs__content">
                    <div class="tab__content active-tab" content id="dashboard">
                        <h3 class="tab__header">Hello Thai!</h3>

                        <div class="tab__body">
                            <p class="tab__description">From your account dashboard, you can easily check & view your recent orders.</p>
                        </div>
                    </div>

                    <div class="tab__content" content id="orders">
                        <h3 class="tab__header">Your Orders</h3>

                        <div class="tab__body">
                            <table class="placed__order-table">
                                <tr>
                                    <th>Orders</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Total</th>
                                    <th>Actions</th>
                                </tr>

                                <tr>
                                    <td>#1357</td>
                                    <td>March 15, 2023 12:40</td>
                                    <td>Processing</td>
                                    <td>$125.00</td>
                                    <td><a href="" class="view__order">View</a></td>
                                </tr>

                                <tr>
                                    <td>#1472</td>
                                    <td>April 15, 2023 21:53</td>
                                    <td>Completed</td>
                                    <td>$200.00</td>
                                    <td><a href="" class="view__order">View</a></td>
                                </tr>
                                <tr>
                                    <td>#1984</td>
                                    <td>August 6, 2023 17:21</td>
                                    <td>Completed</td>
                                    <td>$130.00</td>
                                    <td><a href="" class="view__order">View</a></td>
                                </tr>
                            </table>
                        </div>
                    </div>

                    <div class="tab__content" content id="update-profile">
                        <h3 class="tab__header">Update Profile</h3>

                        <div class="tab__body">
                            <form action="" class="form grid">
                                <input type="text" placeholder="Username" class="form__input">
                                <input type="number" placeholder="Phone" class="form__input">
                                <input type="email" placeholder="Email" class="form__input">

                                <div class="form__btn">
                                    <input type="submit" value="Save" class="btn btn--md">
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="tab__content" content id="address">
                        <h3 class="tab__header">Shipping Addess</h3>

                        <div class="tab__body">
                            <address class="address">
                          123 Pho Co Street, <br>
                          13 Wrad, <br>
                          6 District, 
                        </address>
                            <p class="city">HCM City</p>
                            <a href="" class="edit">Edit</a>
                        </div>
                    </div>

                    <div class="tab__content" content id="change-password">
                        <h3 class="tab__header">Change Password</h3>

                        <div class="tab__body">
                            <form action="" class="form grid">
                                <input type="password" placeholder="Current Password" class="form__input">
                                <input type="password" placeholder="New Password" class="form__input">
                                <input type="password" placeholder="Confirm Password" class="form__input">

                                <div class="form__btn">
                                    <input type="submit" value="Save" class="btn btn--md">
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