 <!-- Floating Cart Icon and Modal -->
 <div class="floating-cart" onclick="toggleCartModal()">
        <i class="uil uil-shopping-bag"></i>
        <span class="cart-count"><?php
             echo $_SESSION['product_1'];
            ?></span>
    </div>

    <div class="cart-modal" id="cartModal">
        <div class="modal-content">
            <h2>Your Cart</h2>
            <p>No items in cart.</p>
            <button onclick="closeCartModal()">Continue shopping</button>
            <button onclick="window.location.href='./cart.php';">Go to cart</button>
        </div>
    </div>