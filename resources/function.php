<?php

function set_message( $message ) {
    if(!empty( $message )){
        $_SESSION['message']=$message;
    }
    else{
        $message ='';
    }
}

function display_message( ) {
    if  (isset($_SESSION['message'])) {
        echo''.$_SESSION['message'].'';
        unset($_SESSION['message']);
    }
}

function redirect($location){
    header("location: $location");
}

function query($sql){
    global $conection;


    return mysqli_query($conection,$sql);
}

function confirm($result){
    global $conection;
    if(!$result){
        die("Query failed". mysqli_error($conection));
    }
}

function escape_string($string){
    global $conection;
    return mysqli_real_escape_string($conection,$string);
}
function fetch_array($result){
    return mysqli_fetch_array($result);
}


//get products
function get_products() {
    $query = query("SELECT * FROM products");
    confirm($query);
 
    while($row = fetch_array($query)) {
        $product_name = $row['product_title']; 
        $product_price = $row['product_price'];
        $product_img = $row['product_img'];
 
        // Load icons separately to avoid HEREDOC issues
        ob_start();
        include(TEMPLATE_FRONT . DS . "icons.php");
        $icons = ob_get_clean();
 
        $product = <<<DELIMETER
         <div class="item-container" >
             <img src="{$product_img}" alt="{$product_name}" onclick="window.location.href='item-view.php?id={$row['product_id']}'" '" >
             <!-- Icons -->
             {$icons}
             <p class="item-name" onclick="window.location.href='item-view.php?id={$row['product_id']}'" '" >{$product_name}</p>
             <p class="item-rating"></p>
             <p class="item-price">&#36 {$product_price}</p>
             <button onclick="window.location.href='cart.php?add={$row['product_id']}'" '" style="padding: 8px 20px; color: white;border-radius:5px; background-color: #e74c3c; border: none;cursor:pointer; " class="buy">Add to cart<button>
         </div>
     DELIMETER;
 
        echo $product;
    }
 }
 function get_category (){
    $query = query("SELECT * FROM categories");
    confirm($query);
    while($row = fetch_array($query)){
        $category_links = <<<DELIMETER
        <span onclick="window.location.href='category.php?id={$row['cat_id']}'" '" class='active'>{$row['cat_title']}</span>
        DELIMETER;

        echo $category_links;
    }
 }
 
 function get_slider_products($limit = 4) {
    $query = query("SELECT * FROM products ORDER BY RAND() LIMIT {$limit}");
    confirm($query);

    $slider_products = [];

    while ($row = fetch_array($query)) {
        $slider_products[] = [
            'img' => $row['product_img'],
            'name' => $row['product_title'],
            'id' => $row['product_id']
        ];
    }

    return $slider_products;
}



 function get_products_in_cate_page() {
    $query = query("SELECT * FROM products WHERE category_id = ". escape_string($_GET['id'])."");
    confirm($query);
 
    while($row = fetch_array($query)) {
        $product_name = $row['product_title']; 
        $product_price = $row['product_price'];
        $product_img = $row['product_img'];
 
        // Load icons separately to avoid HEREDOC issues
        ob_start();
        include(TEMPLATE_FRONT . DS . "icons.php");
        $icons = ob_get_clean();
 
        $product = <<<DELIMETER
         <div class="item-container" >
             <img src="{$product_img}" alt="{$product_name}" onclick="window.location.href='item-view.php?id={$row['product_id']}'" '" >
             <!-- Icons -->
             {$icons}
             <p class="item-name" onclick="window.location.href='item-view.php?id={$row['product_id']}'" '" >{$product_name}</p>
             <p class="item-rating"></p>
             <p class="item-price">&#36 {$product_price}</p>
             <button onclick="window.location.href='cart.php?add={$row['product_id']}'" '" style="padding: 8px 20px; color: white;border-radius:5px; background-color: #e74c3c; border: none;cursor:pointer; " class="buy">Buy now<button>
         </div>
     DELIMETER;
 
        echo $product;
    }
 }



 function get_products_in_shop_page() {
    $query = query("SELECT * FROM products" );
    confirm($query);
 
    while($row = fetch_array($query)) {
        $product_name = $row['product_title']; 
        $product_price = $row['product_price'];
        $product_img = $row['product_img'];
 
        // Load icons separately to avoid HEREDOC issues
        ob_start();
        include(TEMPLATE_FRONT . DS . "icons.php");
        $icons = ob_get_clean();
 
        $product = <<<DELIMETER
         <div class="item-container" >
             <img src="{$product_img}" alt="{$product_name}" onclick="window.location.href='item-view.php?id={$row['product_id']}'" '" >
             <!-- Icons -->
             {$icons}
             <p class="item-name" onclick="window.location.href='item-view.php?id={$row['product_id']}'" '" >{$product_name}</p>
             <p class="item-rating"></p>
             <p class="item-price">&#36 {$product_price}</p>
             <button onclick="window.location.href='cart.php?add={$row['product_id']}'" '" style="padding: 8px 20px; color: white;border-radius:5px; background-color: #e74c3c; border: none;cursor:pointer; " class="buy">Buy now<button>
         </div>
     DELIMETER;
 
        echo $product;
    }
 }

function login_user(){
    if(isset( $_POST['submit'] )){
        $username = escape_string($_POST['username']);
        $password = escape_string($_POST['password']);
        $query = query("SELECT * FROM users WHERE username ='{$username}' AND password ='{$password}' ");
        confirm($query);

        if(mysqli_num_rows($query) == 0){
            set_message("Your password or username are wrong"); 
            redirect("sign-up.php");
        }else{
            redirect("index.php");
        }
    }
}



?>