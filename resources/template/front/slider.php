<div class="carousel">
    <div class="carousel-images">
        <?php
        // Get slider products
        $slider_products = get_slider_products(); // Fetches 4 random products
        foreach ($slider_products as $index => $product) {
            echo "<img src='{$product['img']}' alt='{$product['name']}' onclick=\"window.location.href='item-view.php?id={$product['id']}'\">";
        }
        ?>
    </div>

    <div class="carousel-controls">
        <button class="prev" onclick="showPrevImage()">&#10094;</button>
        <button class="next" onclick="showNextImage()">&#10095;</button>
    </div>

    <div class="carousel-indicators">
        <?php
        // Dynamically generate indicators based on the number of images
        foreach ($slider_products as $index => $product) {
            echo "<span class='indicator' onclick='setCurrentImage({$index})'></span>";
        }
        ?>
    </div>
</div>
