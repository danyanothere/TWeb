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
    <title>Nike Mercurial Superfly - Joga Bonito</title>
    <link rel="icon" type="image/x-icon" href="brazil-flag.png">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pixelify+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/product3.css">
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
</head>
<body>
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
                <li id="cartLink"><a href="cart.php">Cart <span id="cartCount"></span></a></li>
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
    <main class="product-page">
        <div class="product-gallery">
            <div class="swiper-container">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <img src="product/boots3.jpg" alt="Nike Mercurial ">
                    </div>
                    <div class="swiper-slide">
                        <img src="product/mercurial.jpg" alt="Nike Mercurial ">
                    </div>
                    <div class="swiper-slide">
                        <img src="product/mercurial1.jpg" alt="Nike Mercurial">
                    </div>
                    <div class="swiper-slide">
                        <img src="product/mercurial2.jpg" alt="Nike Mercurial ">
                    </div>
                    <div class="swiper-slide">
                        <img src="product/mercurial3.jpg" alt="Nike Mercurial">
                    </div>
                </div>
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
            <div class="thumbnails">
                <img src="product/mercurial.jpg" alt="Nike Zoom Mercurial Vapor 15 Elite" onclick="changeImage(0)">
                <img src="product/mercurial1.jpg" alt="Nike Zoom Mercurial Vapor 15 Elite" onclick="changeImage(1)">
                <img src="product/mercurial2.jpg" alt="Nike Zoom Mercurial Vapor 15 Elite" onclick="changeImage(2)">
                <img src="product/mercurial3.jpg" alt="Nike Zoom Mercurial Vapor 15 Elite" onclick="changeImage(3)">
            </div>
        </div>
        <div class="product-info">
            <h1 class="product-title">Nike Zoom Mercurial Vapor 15 Elite</h1>
            <p class="product-description">
                Легендарные бутсы для скорости и контроля. Идеальный выбор для профессионалов и любителей.
            </p>
            <div class="product-price">$400</div>
            <div class="size-selector">
                <label for="size">Size:</label>
                <select id="size">
                    <option value="37">37</option>
                    <option value="38">38</option>
                    <option value="39">39</option>
                    <option value="40">40</option>
                    <option value="41">41</option>
                    <option value="42">42</option>
                    <option value="43">43</option>
                    <option value="44">44</option>
                    <option value="45">45</option>
                </select>
            </div>
            <button class="buy-now" onclick="addToCart()">Add to Cart</button>
        </div>
    </main>
    <footer>
        <p>© 2025 Joga Bonito. Все права защищены.</p>
        <ul class="social-links">
            <li><a href="https://www.instagram.com/danyanothere/"><img src="product/inst.png" alt="Instagram" class="social-icon"></a></li>
            <li><a href="https://t.me/+N-S_qU256lAwMzYy"><img src="product/telegram.png" alt="Twitter" class="social-icon"></a></li>
            <li><a href="https://x.com/Cristiano?ref_src=twsrc%5Egoogle%7Ctwcamp%5Eserp%7Ctwgr%5Eauthor"><img src="product/twitter.png" alt="Telegram" class="social-icon"></a></li>
        </ul>
    </footer>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="assets/js/model3.js"></script>

</body>
</html>

