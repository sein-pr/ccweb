<?php
require_once "../resources/config.php";
?>
<?php include TEMPLATE_FRONT . DS . "header.php"?>
    <main>
<?php
// Check if a product ID is passed in the URL
if (isset($_GET['id'])) {
    $product_id = $_GET['id'];

    // Fetch product information from the database based on the product ID
    $query = query("SELECT * FROM products WHERE product_id = " . escape_string($product_id));
    confirm($query);

    $row = fetch_array($query);
    $product_name = $row['product_title'];
    $product_price = $row['product_price'];
    $product_img = $row['product_img'];
    $product_desc = $row['product_desc'];
    $product_rating = $row['product_rating']; // Assuming you have a rating field
    $artist_name = $row['artist_name']; // Assuming artist information is available
    $artist_img = $row['artist_img']; // Artist image

    // Fetch product variations
    $variation_query = query("SELECT * FROM product_variations WHERE product_id = " . escape_string($product_id));
    confirm($variation_query);
}
?>
        <div class="page-hero">
            <h1>Item View</h1>
            <ul>
                <li><a href="./index.html">Home</a></li>
                <li><a href="./shop.html">Shop</a></li>
                <li><a href="#" class="active" onclick="return false;">item view</a></li>
            </ul>
        </div>
        <secttion class="item-view-container">
        <div class="item-view">
    <img id="main-image" src="<?php echo $product_img; ?>" alt="">
    <div class="item-view-info">
        <div class="artist">
            <div class="artist-name-img">
                <img src="<?php echo $artist_img; ?>" alt="">
                <p><?php echo $artist_name; ?></p>
            </div>
            <a href="#" class="artist-portfolio">Portfolio</a>
        </div>
        <p class="item-name"><?php echo $product_name; ?></p>
        <div class="rate">
            <p class="rating"><?php echo $product_rating; ?></p>
            <p class="reviews">12 reviews</p> <!-- Add review logic if needed -->
        </div>
        <p class="item-price">$<?php echo $product_price; ?></p>
        <p class="desc"><?php echo $product_desc; ?></p>

                    <div class="variation">
                        <p>Variation</p>
                        <div class="variation-item">
                        <?php 
                            // Loop through the variations and output each one
                            while ($variation_row = fetch_array($variation_query)) {
                            echo '<img src="'.$variation_row['variation_img'].'" alt="" class="variation-img" onclick="selectImage(this)">';
                            }
                        ?>
                        </div>
                    </div>
                    <div class="size">
                        <p>Sizes in centimeters</p>
                        <div class="size-option">
                            <div class="item"><span>300x400</span></div>
                            <div class="item"><span>400x500</span></div>
                            <div class="item"><span>500x700</span></div>
                            <div class="item"><span>600x800</span></div>
                            <div class="item"><span>700x100</span></div>
                            <div class="item"><span>900x120</span></div>
                        </div>
                    </div>
                    <div class="btn">
                        <button class="add-to-cart"><i class="uil uil-shopping-bag"></i>Add to cart</button>
                        <span><i class="uil uil-heart"></i></span>
                    </div>
                    <p class="delivery"><i class="uil uil-car-sideview"></i> Free delivery on orders over $200.00</p>
                </div>
            </div>
            </section>

            <section class="more">
                <div class="item-btn">
                    <span>Details</span>
                    <span class="active">Reviews</span>
                    <span>Discussion</span>
                </div>
                <div class="item-btn-section">
                    <div class="reviews">
                        <div class="comments">
                            <div class="comment-item">
                                <div class="profile">
                                    <img src="/assets/img/logo-short.png" alt="">
                                    <div class="details">
                                        <div class="name">
                                            <p>Victoria</p>
                                            <span class="date">Yesterday</span>
                                        </div>
                                        <p class="rating">★★★☆☆</p>
                                        <p class="message">Nice painting or something like that</p>
                                        <div class="others">
                                            <span class="reply">Reply</span>
                                            <i class="uil uil-thumbs-up"></i>
                                            <span>450</span>
                                            <i class="uil uil-thumbs-down"></i>
                                            <span>10</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="comment-item">
                                <div class="profile">
                                    <img src="/assets/img/logo-short.png" alt="">
                                    <div class="details">
                                        <div class="name">
                                            <p>Victoria</p>
                                            <span class="date">Yesterday</span>
                                        </div>
                                        <p class="rating">★★★☆☆</p>
                                        <p class="comment">Nice painting or something like that</p>
                                        <div class="others">
                                            <span class="reply">Reply</span>
                                            <i class="uil uil-thumbs-up"></i>
                                            <span>450</span>
                                            <i class="uil uil-thumbs-down"></i>
                                            <span>10</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                            <div class="comment-item">
                                <div class="profile">
                                    <img src="/assets/img/logo-short.png" alt="">
                                    <div class="details">
                                        <div class="name">
                                            <p>Victoria</p>
                                            <span class="date">Yesterday</span>
                                        </div>
                                        <p class="rating">★★★☆☆</p>
                                        <p class="comment">Nice painting or something like that</p>
                                        <div class="others">
                                            <span class="reply">Reply</span>
                                            <i class="uil uil-thumbs-up"></i>
                                            <span>450</span>
                                            <i class="uil uil-thumbs-down"></i>
                                            <span>10</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="rating-side">
                            <div class="rated">
                                <div class="rating-rates">
                                    <p class="rating">★★★☆☆</p>
                                    <span>3.8</span>
                                </div>
                                <ol>
                                    <li>
                                        <progress value="100" max="100"></progress>
                                        <span>10</span>
                                    </li>
                                    <li>
                                        <progress value="80" max="100"></progress>
                                        <span>8</span>
                                    </li>
                                    <li>
                                        <progress value="60" max="100"></progress>
                                        <span>6</span>
                                    </li>
                                    <li>
                                        <progress value="40" max="100"></progress>
                                        <span>3</span>
                                    </li>
                                    <li>
                                        <progress value="20" max="100"></progress>
                                        <span>1</span>
                                    </li>
                                </ol>

                                <div class="carousel">
                                    <div class="carousel-item active">
                                      <div class="featured-image">
                                        <img src="/assets/data/peter-ndirangu-lion-shade_2048x2048.jpg" alt="Lion in the shade">
                                        <div class="content">
                                          <h3>Shop Now and Get Up to 30% Off Your Favorite Products</h3>
                                          <button>Shop</button>
                                        </div>
                                      </div>
                                    </div>

                                    <div class="carousel-item active">
                                        <div class="featured-image">
                                          <img src="/assets/data/peter-ndirangu-long-life_300x300.jpg" alt="long-life">
                                          <div class="content">
                                            <h3>Limited Time Offer: Save Big on Exclusive Items!</h3>
                                            <button>Shop</button>
                                          </div>
                                        </div>
                                    </div>

                                    <div class="carousel-item active">
                                        <div class="featured-image">
                                          <img src="/assets/data/wakaba-respect_2048x2048.jpg" alt="wakaba respect">
                                          <div class="content">
                                            <h3>Top Picks at a Discount: Shop Now and Save More</h3>
                                            <button>Shop</button>
                                          </div>
                                        </div>
                                    </div>

                                    <div class="carousel-item active">
                                        <div class="featured-image">
                                          <img src="/assets/data/riverfow_300x300.jpg" alt="riverfow">
                                          <div class="content">
                                            <h3>Discover New Arrivals with Discounts Over 25% Off</h3>
                                            <button>Shop</button>
                                          </div>
                                        </div>
                                    </div>


                                    <!-- Add more carousel items here if needed -->
                                  </div>

                            </div>
                        </div>
                    </div>
                </div>
            </section>
    </main>

    <footer>
        <div class="newsletter">
            <p>Join our newsletter to <br> keep up to date with latest art!</p>
            <div class="letter-btn">
                <form action="#" class="news-input">
                    <i class="uil uil-user"></i>
                    <input type="email" placeholder="example@gmail.com">
                </form>
                <form action="#" class="sub-btn">
                    <input type="button" value="Subscribe">
                </form>
            </div>
        </div>
        <hr>

        <div class="footer-nav">
            <div class="logo-side">
                <img src="/assets/img/logo-short.png" alt="logo">
                <h3>Crafted Culture</h3>
                <p>Telling African stories with <span class="typing">style and beauty</span> 😊!</p>
                <div class="contacts">
                    <div class="email">
                        <p>Email Address</p>
                        <span>craftedculture@seinindustries.com</span>
                    </div>
                    <div class="phone">
                        <p>Phone Number</p>
                        <span>+264 81 478 1478</span>
                    </div>
                </div>

                <div class="footer-socials">
                    <a href="#linkedin"><i class="uil uil-linkedin-alt"></i></a>
                    <a href="#Instagram"><i class="uil uil-instagram"></i></a>
                    <a href="#x"><i class="uil uil-twitter-alt"></i></a>
                    <a href="#Facebook"><i class="uil uil-facebook-f"></i></a>
                </div>
            </div>

            <div class="footer-links-side">
                <div class="first">
                    <label for="links">Navigation</label>
                    <a href="#Home" class="active">Home</a>
                    <a href="about.html">About</a>
                    <a href="#shop">Shop</a>
                    <a href="#blog">Blog</a>
                    <a href="#contact">Contact</a>
                </div>
                <div class="second">
                    <label for="company">Company</label>
                    <a href="#news">News</a>
                    <a href="#career">Careers</a>
                    <a href="#company" class="company-name"><span>SEIN</span> INDUSTRIES</a>
                </div>
                <div class="last">
                    <label for="resources">Resources</label>
                    <a href="#guides">Guides</a>
                    <a href="#papers">Papers</a>
                    <a href="#press">Press Conferences</a>
                </div>
            </div>


        </div>
        <div class="bottom-footer">
            <p>&copy;2024 Crafted Culture. All rights reserved - SEIN <span>INDUSTRIES</span></p>
            <div class="conditions">
                <a href="#terms">Terms of service</a>
                <a href="#policy">Privacy Policy</a>
                <a href="#cookies">Cookies</a>
            </div>
        </div>
    </footer>

    <script src="js/item-view.js"></script>
</body>

</html>