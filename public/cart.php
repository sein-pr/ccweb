<?php
    require_once("../resources/config.php");
?>
<?php include(TEMPLATE_FRONT .DS. "header.php")?>

<?php 
 $_SESSION["product_1"] = 1;
?>
    <main>
        <div class="page-hero">
            <h1>My Cart</h1>
            <ul>
                <li><a href="./index.html">Home</a></li>
                <li><a href="#shop">Shop</a></li>
                <li><a href="./cart.html" class="active" onclick="return false;">My Cart</a></li>
            </ul>
        </div>

        <div class="cart">
            <div class="cart-info">
                <h2>My Items</h2>
                <hr>
                <div class="item-container">
                    <div class="cart-item">
                        <img src="/assets/data/adornment_300x300.jpg" alt="cart item">
                        <div class="item-info">
                            <div class="name">
                                <p class="item-name">Adornment</p>
                                <span class="item-total-price">$10.00</span>
                            </div>
                            <div class="price">
                                <p class="actual-price">$10.99</p>
                                <span class="avail">In stock</span>
                            </div>
                            <div class="sizes">
                                <div class="select-container">
                                    <select id="size-select">
                                        <option value="300x300">300x300</option>
                                        <option value="600x600">600x600</option>
                                        <option value="600x900">600x900</option>
                                    </select>
                                </div>
                                <div class="item-quantity">
                                    <button class="quantity-btn" onclick="decrement()">−</button>
                                    <input type="text" id="quantity" value="1" readonly>
                                    <button class="quantity-btn" onclick="increment()">+</button>
                                </div>
                                <div class="other-actions">
                                    <div class="like">
                                        <i class="uil uil-heart"></i>
                                        <span>Save</span>
                                    </div>
                                    <div class="delete">
                                        <i class="uil uil-trash"></i>
                                        <span>Delete</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>

                <div class="item-container">
                    <div class="cart-item">
                        <img src="/assets/data/360_F_571205629_onFrxqE3KmdhZZ3Tm91VdsDj9szAmlWM.jpg" alt="cart item">
                        <div class="item-info">
                            <div class="name">
                                <p class="item-name">Adornment</p>
                                <span class="item-total-price">$10.00</span>
                            </div>
                            <div class="price">
                                <p class="actual-price">$10.00</p>
                                <span class="avail">In stock</span>
                            </div>
                            <div class="sizes">
                                <div class="select-container">
                                    <select id="size-select">
                                        <option value="300x300">300x300</option>
                                        <option value="600x600">600x600</option>
                                        <option value="600x900">600x900</option>
                                    </select>
                                </div>
                                <div class="item-quantity">
                                    <button class="quantity-btn" onclick="decrement()">−</button>
                                    <input type="text" id="quantity" value="1" readonly>
                                    <button class="quantity-btn" onclick="increment()">+</button>
                                </div>
                                <div class="other-actions">
                                    <div class="like">
                                        <i class="uil uil-heart"></i>
                                        <span>Save</span>
                                    </div>
                                    <div class="delete">
                                        <i class="uil uil-trash"></i>
                                        <span>Delete</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
                <div class="item-container">
                    <div class="cart-item">
                        <img src="/assets/data/a-callout_300x300.jpg" alt="cart item">
                        <div class="item-info">
                            <div class="name">
                                <p class="item-name">A Callout</p>
                                <span class="item-total-price">$20.00</span>
                            </div>
                            <div class="price">
                                <p class="actual-price">$20.00</p>
                                <span class="avail">In stock</span>
                            </div>
                            <div class="sizes">
                                <div class="select-container">
                                    <select id="size-select">
                                        <option value="300x300">300x300</option>
                                        <option value="600x600">600x600</option>
                                        <option value="600x900">600x900</option>
                                    </select>
                                </div>
                                <div class="item-quantity">
                                    <button class="quantity-btn" onclick="decrement()">−</button>
                                    <input type="text" id="quantity" value="1" readonly>
                                    <button class="quantity-btn" onclick="increment()">+</button>
                                </div>
                                <div class="other-actions">
                                    <div class="like">
                                        <i class="uil uil-heart"></i>
                                        <span>Save</span>
                                    </div>
                                    <div class="delete">
                                        <i class="uil uil-trash"></i>
                                        <span>Delete</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
            <div class="checkout">
                <h2>Delivery</h2>
                <div class="delivery-info">
                    <form action="#">
                        <input type="button" id="freeButton" value="Free" class="selected">
                        <input type="button" id="fastButton" value="Fast: $9.99">
                    </form>
                    <p class="deliver-time">Delivery date: Sep 24, 2024</p>
                </div>
                <hr>
                <div class="invoice">
                    
                    <form action="#">
                        <input type="text" placeholder="Promocode20">
                        <input type="button" value="Apply">
                    </form>
                    <span class="disc">40% discount</span>
                    <hr>

                    <div class="invoice-item">
                        <span>Subtotal</span>
                        <span>$80.96</span>
                    </div>
                    <div class="invoice-item">
                        <span>Discount </span>
                        <span>(40%)-$16.19</span>
                    </div>
                    <div class="invoice-item">
                        <span>Delivery <i class="uil uil-info-circle" title="Delivery amount depends on the distance"></i></span>
                        <span>$0.00</span>
                    </div>
                    <div class="invoice-item">
                        <span>Tax <i class="uil uil-info-circle" title="Tax depends on the amount of items purchased"></i></span>
                        <span>+$14.00</span>
                    </div>
                    <div class="invoice-item total">
                        <span>Total</span>
                        <span>$78.77</span>
                    </div>
                </div>
                <div class="button">
                    <button class="checkout-btn">Proceed to checkout</button>
                    <button class="shop" onclick="window.location.href='./index.html'">Continue Shopping</button>

                </div>
                
            </div>
        </div>
    </main>

    <script src="js/main.js"></script>
</body>

</html>