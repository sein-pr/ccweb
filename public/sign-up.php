<?php
    require_once("../resources/config.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crafted Culture| Sign in</title>
    <link rel="icon" href="img/logo-short.png" type="icon">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
    <link rel="stylesheet" href="css/authenticate.css">
</head>
<body>
    <main>
        <div class="form-container">
            <h2><?php display_message() ?></h2>
            <h1>Sign in</h1>
            <p>Join us in telling the stories of Africa</p>
            
            <div class="help-sign-up">
                <button><i class="uil uil-google"></i>Sign up with Google</button>
                <button><i class="uil uil-apple"></i>Sign up with Apple</button>
            </div>
           
            <fieldset><legend>OR</legend></fieldset>
            <form action="" method="POST">
                <?php
                    login_user();
                ?>
                <label for="First name">username</label><br>
                <input type="text" name="username" placeholder="craftedculture"><br>
                
                <label for="password">Enter password</label><br>
                <input type="password"name="password" placeholder="At least 8 characters"><br>
                
                <input type="submit" name="submit" value="Sign in">
            </form>
        </div>
        <img src="img/carfted-about.png" alt="">
    </main>
</body>
</html>