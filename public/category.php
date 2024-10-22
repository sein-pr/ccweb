<?php
require_once "../resources/config.php";
?>
<?php include TEMPLATE_FRONT . DS . "header.php"?>
    <main>
        <section class="hero">
            <!-- carousel here -->
            <?php include TEMPLATE_FRONT . DS . "slider.php"?>
  


<?php

if (isset($_GET['id'])) {
    $category_id = $_GET['id'];

    // Fetch product information from the database based on the product ID
    $query = query("SELECT * FROM categories WHERE cat_id = " . escape_string($category_id));
    confirm($query);

    $row = fetch_array($query);
    $category_name = $row['cat_title'];

}
?>

<div class="category_here">
    <h1><?php echo $category_name; ?></h1>
</div>


        </section>

        <section class="trending">
        <div class="btn-section" style="margin:1.1rem; display: grid; grid-template-columns: 1fr 1fr 1fr;">
                <?php
                get_products_in_cate_page();
                ?>
            </div>
        </section>
        

        <!-- cart modal here -->
    <?php include TEMPLATE_FRONT . DS . "floating_cart.php"?>


<?php include TEMPLATE_FRONT . DS . "footer.php"?>

