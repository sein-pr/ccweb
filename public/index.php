
<?php
    require_once("../resources/config.php");
?>
<?php include(TEMPLATE_FRONT .DS. "header.php")?>
    <main>
        <section class="hero">
            <!-- carousel here -->
            <?php include(TEMPLATE_FRONT .DS. "slider.php")?>

            <div class="hero-text">
                <div class="glitch-wrapper">
                    <div class="glitch" data-glitch="Crafted Culture">Crafted Culture</div>
                 </div>
                <h1>Africa To The World</h1>
                <p>Bringing African Creativity to the World, One Masterpiece at a Time</p>
    
                <div class="hero-btn">
                    <button id="shopNow"><i class="uil uil-shopping-bag"></i>Shop Now</button>
                    <button id="create-account"><i class="uil uil-user-plus"></i>Create Account</button>
                </div>
            </div>
            <div class="socials">
                <a href="#linkedin"><i class="uil uil-linkedin-alt"></i></a>
                <a href="#Instagram"><i class="uil uil-instagram"></i></a>
                <a href="#x"><i class="uil uil-twitter-alt"></i></a>
                <a href="#Facebook"><i class="uil uil-facebook-f"></i></a>
            </div>
        </section>
        <!-- Hero section ends here -->

        <!-- trending section starts here -->
        <section class="trending">
            <!-- category -->
            <?php include(TEMPLATE_FRONT .DS. "home_cate.php")?>

            <div class="btn-section" style="margin:1.1rem; display: grid; grid-template-columns: 1fr 1fr 1fr;">
                <!-- PRODUCTS HERE -->
                <?php
                    get_products();
                ?>
                
            </div>
        </section>
    </main>
   <!-- cart modal here -->
    <?php include(TEMPLATE_FRONT .DS. "floating_cart.php")?>

    
<?php include(TEMPLATE_FRONT .DS. "footer.php")?>
 