<?php
session_start();
$isLoggedIn = isset($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Футбольный стиль Joga Bonito. Купите бутсы и экипировку для игры красиво!">
    <title>Joga Bonito</title>
    <link rel="icon" type="image/x-icon" href="../product/brazil-flag.png">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pixelify+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css">
</head>
<body style="background-image: url('product/photo-1431324155629-1a6deb1dec8d.jpg'); background-size: cover; background-attachment: fixed; background-position: center;">
    <header>
        <a href="main.php" class="logo">Joga Bonito</a>
        <nav>
            <ul class="nav-center">
                <li><a href="#">New</a></li>
                <li><a href="#">Men</a></li>
                <li><a href="#">Kids</a></li>
                <li><a href="#">Sale</a></li>
            </ul>

            <ul class="nav-right">
                <li><a href="about-us.php">About us</a></li>
                <li><a href="find-store.php">Find a store</a></li> 
                <li id="cartLink"><a href="cart.php">Cart</a></li>
                <li id="authLink">
    <?php if ($isLoggedIn): ?>
        <a href="logout.php">Logout</a>
    <?php else: ?>
        <a href="sign-in.php">Sign In</a>
    <?php endif; ?>
</li>
            </ul>
        </nav>
    </header>

    <main>
    <h1 class="text-typing">Joga Bonito</h1>
    <p class="subtitle">«Я играл красиво: паненка, рабона»</p>
   
    
    <div class="products-container">
        <div class="product">
            <a href="model1.php">
                <img src="product/boots1.jpg" alt="Boots 1" class="visible">
            </a>
        </div>
        <div class="product">
            <a href="model2.php">
                <img src="product/boots2.jpg" alt="Boots 2" class="visible">
            </a>
        </div>
        <div class="product">
            <a href="model3.php">
                <img src="product/boots3.jpg" alt="Boots 3" class="visible">
            </a>
        </div>
    </div>
    </main>

<div class="button-wrapper">
    <div class="button-container">
        <a href="shop.html">
            <button class="shop-now">Shop Now</button>
        </a>
    </div>
</div>

    
    <footer>
        <p>© 2025 Joga Bonito. Все права защищены.</p>
        <ul class="social-links">
            <li><a href="https://www.instagram.com/danyanothere/"><img src="product/inst.png" alt="Instagram" class="social-icon"></a></li>
            <li><a href="https://t.me/+N-S_qU256lAwMzYy"><img src="product/telegram.png" alt="Telegram" class="social-icon"></a></li>
            <li><a href="https://x.com/Cristiano?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor"><img src="product/twitter.png" alt="Twitter" class="social-icon"></a></li>
        </ul>
    </footer>


</body>
</html>