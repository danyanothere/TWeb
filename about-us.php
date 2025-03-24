<?php
session_start();
$isLoggedIn = isset($_SESSION['user_id']);
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Joga Bonito</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/aboutus.css">
    <link rel="icon" type="image/x-icon" href="product/brazil-flag.png">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pixelify+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
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
                <li id="cartLink" style=""><a href="cart.php">Cart</a></li>
                <li id="authLink">
                    <?php if ($isLoggedIn): ?>
                        <a href="logout.php">Logout</a>
                    <?php else: ?>
                        <a href="sign-in.html">Sign In</a>
                    <?php endif; ?>
                </li>
            </ul>
        </nav>
    </header>
    
    <div class="about-us">
        <h1>About Us</h1>
        <img src="product/info.png" alt="About Us Image"> 
        <p>
            Добро пожаловать в <strong>Joga Bonito</strong> — мир, где футбол становится искусством! 
            Мы вдохновляемся красотой игры и стремимся делиться этой страстью с каждым из вас.
        </p>
        <p>
            Наша миссия — предоставить вам лучшую экипировку и аксессуары, которые помогут вам 
            играть с удовольствием и стилем. Мы верим, что футбол — это не просто спорт, это образ жизни.
        </p>
        <p>
            С 2025 года мы радуем наших клиентов качественными товарами и уникальным сервисом. 
            Присоединяйтесь к нашей команде и играйте красиво!
        </p>
        <a href="main.php" class="back-button">Back to Main</a>
    </div>
    <footer>
        <p>© 2025 Joga Bonito. Все права защищены.</p>
        <ul class="social-links">
            <li><a href="https://www.instagram.com/danyanothere/"><img src="product/inst.png" alt="Instagram" class="social-icon"></a></li>
            <li><a href="https://t.me/+N-S_qU256lAwMzYy"><img src="product/telegram.png" alt="Twitter" class="social-icon"></a></li>
            <li><a href="https://x.com/Cristiano?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor"><img src="product/twitter.png" alt="Telegram" class="social-icon"></a></li>
        </ul>
    </footer>
</body>
</html>