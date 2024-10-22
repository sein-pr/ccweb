
<?php
    require_once("../resources/config.php");
?>
<?php include(TEMPLATE_FRONT .DS. "header.php")?>
    <main>
        <div class="featured">
            <div class="featured-images">
              <img src="/assets/data/green-adventure_2048x2048.jpg" alt="">
              <img src="/assets/data/a-callout_2048x2048.jpg" alt="">
              <img src="/assets/data/riverfow_2048x2048.jpg" alt="">
              <img src="/assets/data/wildbeast-migration_035acb6d-6b35-4ecc-9f76-81b0d2323773_2048x2048.jpg" alt="">
            </div>
          
            <!-- Indicators -->
            <div class="carousel-indicators">
              <span class="active" data-slide="0"></span>
              <span data-slide="1"></span>
              <span data-slide="2"></span>
              <span data-slide="3"></span>
            </div>
        </div>

        <div class="featured-text">
            <h3>Grab up to 50% off</h3>
            <button><i class="uil uil-shopping-bag"></i>Buy Now</button>
        </div>

        <section class="shop-section">
            <div class="shop-filters">
                <div class="filters">
                    <select name="type" id="">
                        <option value="all">All</option>
                        <option value="paintings">Paintings</option>
                        <option value="sculptures">Sculptures</option>
                        <option value="textiles">Textiles</option>
                        <option value="jewelry">Jewelry</option>
                    </select>
                    <select name="price" id="">
                        <option value="price">Price</option>
                        <option value="less50">Below $50</option>
                        <option value="50-100">$50 - $100</option>
                        <option value="more100">Above $100</option>
                    </select>
                    <select name="review" id="">
                        <option value="review">Review</option>
                        <option value="3star">Below 3 stars</option>
                        <option value="4star">4 stars</option>
                        <option value="5stars">5 stars</option>
                    </select>
                    <select name="material" id="">
                        <option value="material">Material</option>
                        <option value="wood">Wood</option>
                        <option value="metal">Metal</option>
                        <option value="cloth">Cloth</option>
                        <option value="beads">Beads</option>
                    </select>
                    <select name="all-filters" id="">
                        <option value="all-filters">All Filters</option>
                        <option value="type">Type</option>
                        <option value="price">Price</option>
                        <option value="review">Review</option>
                        <option value="material">Material</option>
                    </select>
                </div>
                <select name="sort" id="">
                    <option value="sort">Sort by</option>
                    <option value="type">Type</option>
                    <option value="price">Price</option>
                    <option value="review">Review</option>
                    <option value="material">Material</option>
                </select>            
            </div>

            
            <div class="shop-content">
                <h2 class="choosen-filter">All</h2>
        <section class="trending">
            <div class="btn-section" style="margin:1.1rem; display: grid; grid-template-columns: 1fr 1fr 1fr;">
                <?php
                get_products_in_shop_page();
                ?>
            </div>
        </section>
               
            </div>
        </section>
        <section class="similar">
            <h2>Similar Items you might like</h2>
            <div class="slider-container">
                <div class="similar-content">
                    <div class="similar-item">
                        <img src="/assets/data/young-miles-davis_2048x2048.jpg" alt="">
                        <div class="item-cons">
                            <ul>
                                <li><i class="uil uil-shopping-bag"></i></li>
                                <li><i class="uil uil-heart"></i></li>
                                <li><i class="uil uil-eye" onclick="window.location.href='item-view.html'"></i></li>
                            </ul>
                        </div>
                        <p class="item-name">NMAFA</p>
                        <p class="item-rating"></p>
                        <p class="item-price">5.99</p>
                    </div>
                    <div class="similar-item">
                        <img src="/assets/data/young-miles-davis_2048x2048.jpg" alt="">
                        <div class="item-cons">
                            <ul>
                                <li><i class="uil uil-shopping-bag"></i></li>
                                <li><i class="uil uil-heart"></i></li>
                                <li><i class="uil uil-eye" onclick="window.location.href='item-view.html'"></i></li>
                            </ul>
                        </div>
                        <p class="item-name">NMAFA</p>
                        <p class="item-rating"></p>
                        <p class="item-price">5.99</p>
                    </div>
                    <div class="similar-item">
                        <img src="/assets/data/young-miles-davis_2048x2048.jpg" alt="">
                        <div class="item-cons">
                            <ul>
                                <li><i class="uil uil-shopping-bag" ></i></li>
                                <li><i class="uil uil-heart"></i></li>
                                <li><i class="uil uil-eye" onclick="window.location.href='item-view.html'"></i></li>
                            </ul>
                        </div>
                        <p class="item-name">NMAFA</p>
                        <p class="item-rating"></p>
                        <p class="item-price">5.99</p>
                    </div>
                    <div class="similar-item">
                        <img src="/assets/data/young-miles-davis_2048x2048.jpg" alt="">
                        <div class="item-cons">
                            <ul>
                                <li><i class="uil uil-shopping-bag" ></i></li>
                                <li><i class="uil uil-heart"></i></li>
                                <li><i class="uil uil-eye" onclick="window.location.href='item-view.html'"></i></li>
                            </ul>
                        </div>
                        <p class="item-name">NMAFA</p>
                        <p class="item-rating"></p>
                        <p class="item-price">5.99</p>
                    </div>
                </div>
            </div>
        </section>
        


    </main>

    <!-- Floating Cart Icon and Modal -->
    <div class="floating-cart" onclick="toggleCartModal()">
        <i class="uil uil-shopping-bag"></i>
        <span class="cart-count">0</span>
    </div>

    <div class="cart-modal" id="cartModal">
        <div class="modal-content">
            <h2>Your Cart</h2>
            <p>No items in cart.</p>
            <button onclick="closeCartModal()">Continue shopping</button>
            <button onclick="window.location.href='./cart.html';">Go to cart</button>
        </div>
    </div>
    

   <!-- cart modal here -->
   <?php include(TEMPLATE_FRONT .DS. "floating_cart.php")?>

    
<?php include(TEMPLATE_FRONT .DS. "footer.php")?>
 