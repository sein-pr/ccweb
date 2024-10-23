<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crafted Culture | Home</title>
    <link rel="stylesheet" href="css/main.css">
    <link rel="icon" href="img/logo-short.png" type="icon">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
</head>

<body>
    <header>
        <a href="#logo" class="logo">
            <img src="img/logo.png" alt="logo" class="logo large">
            <img src="img/logo-short.png" alt="logo" class="logo small">
        </a>
        <nav class="navbar">
            <div class="nav-links">
                <a href="index.php" class="active">Home</a>
                <a href="about.html">About</a>
                <a href="shop.php">Shop</a>
                <a href="log.php">Blog</a>
                <a href="contact.php">Contact</a>
            </div>
            <i class="uil uil-search" id="search-icon"></i>
            <i class="uil uil-heart" id="liked"></i>
            <div class="logged-user">
                <span>Hi! <br> <span id="username">Vicky</span></span>
                <img src="img/logo-short.png" alt="logged user" onclick="location.href='sign-up.php'">
            </div>
            <i class="uil uil-list-ui-alt menu-icon" id="menu"></i>
        </nav>
    </header>
    <!-- Modal for Search Form -->
    <div id="search-modal" class="modal">
        <div class="modal-content">
            <span class="close"><i class="uil uil-x"></i></span>
            <form action="">
                <input type="text" placeholder="Search....">
                <input type="button" value="Search">
            </form>
        </div>
    </div>