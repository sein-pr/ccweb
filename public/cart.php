<?php
require_once "../resources/config.php";
?>
<?php include TEMPLATE_FRONT . DS . "header.php"?>

<?php
if (isset($_GET["add"])) {
    // Query the product from the database
    $query = query("SELECT * FROM products WHERE product_id=" . escape_string($_GET['add']) . ' ');
    confirm($query);

    while ($row = fetch_array($query)) {
        $product_key = 'product_' . $_GET['add'];

        // Check if the session for this product is set, if not, initialize it
        if (!isset($_SESSION[$product_key])) {
            $_SESSION[$product_key] = 0;
        }

        // Check if the product quantity allows adding more items to the cart
        if ($row['product_quantity'] > $_SESSION[$product_key]) {
            $_SESSION[$product_key] += 1;
        } else {
            set_message("We only have: " . $row['product_quantity'] . " " . "{$row['product_title']}" . " available");
        }
    }

    // Redirect after adding the item to avoid form resubmission issues
    redirect('cart.php');
}

if (isset($_GET["remove"])) {
    $product_key = 'product_' . $_GET['remove'];

    // Ensure the product exists in the session before decrementing
    if (isset($_SESSION[$product_key]) && $_SESSION[$product_key] > 0) {
        $_SESSION[$product_key]--;
    }

    // If the quantity becomes less than 1, remove it from the session
    if ($_SESSION[$product_key] < 1) {
        unset($_SESSION[$product_key]); // Remove the product from session if quantity is 0 or less
    }

    // Redirect after removing the item
    redirect('cart.php');
}

if (isset($_GET["delete"])) {
    $product_key = 'product_' . $_GET['delete'];

    // Ensure the product exists in the session before deleting
    if (isset($_SESSION[$product_key])) {
        unset($_SESSION[$product_key]); // Remove the product from session
    }

    // Redirect after deleting the item
    redirect('cart.php');
}

function cart()
{
    // Reset item total and quantity to avoid duplication on page reload
    $_SESSION['item_total'] = 0;
    $_SESSION['item_quantity'] = 0;

    $total = 0;
    $item_quantity = 0;

    foreach ($_SESSION as $name => $value) {

        if ($value > 0) {

            if (substr($name, 0, 8) == 'product_') {
                $length = strlen($name) - 8;
                $id = substr($name, 8, $length);

                $query = query("SELECT * FROM products WHERE product_id=" . escape_string($id) . "");
                confirm($query);
                while ($row = fetch_array($query)) {
                    $total_price = $value * $row['product_price'];
                    $item_quantity += $value;
                    $product = <<<DELIMETER
            <div class="cart-item">
                <img src="{$row['product_img']}" alt="cart item">
                <div class="item-info">
                    <div class="name">
                        <p class="item-name">{$row['product_title']}</p>
                        <span class="item-total-price">{$total_price}</span>
                    </div>
                    <div class="price">
                        <p class="actual-price">{$row['product_price']}</p>
                        <span class="avail">In stock:{$row['product_quantity']}</span>
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
                            <button class="quantity-btn" ><a style="text-decoration: none;" href="cart.php?remove={$row['product_id']}">-</a></button>
                            <input type="text" id="quantity" value="{$value}" readonly>
                            <button class="quantity-btn" ><a style="text-decoration: none;"  href="cart.php?add={$row['product_id']}">+</a></button>
                        </div>
                        <div class="other-actions">
                            <div class="like">
                                <i class="uil uil-heart"></i>
                                <span>Save</span>
                            </div>
                            <div class="delete">
                                <i class="uil uil-trash"></i>
                                <span><a style="text-decoration: none;" href="cart.php?delete={$row['product_id']}">Delete</a></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        DELIMETER;

                    echo $product;
                    $total += $total_price; 
                     // Accumulate total price
                }
            }

        }
    }

    $_SESSION['item_total'] +=$total;
    $_SESSION['item_quantity'] +=$item_quantity;

}
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
                    <?php cart()?>
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
                        <span>No.Items</span>
                        <span><?php echo $_SESSION['item_quantity']?></span>
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
                        <span><?php echo $_SESSION['item_total']?></span>
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