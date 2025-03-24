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
    <link rel="icon" type="image/x-icon" href="product/brazil-flag.png">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pixelify+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/cart.css">
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
                        <a href="sign-in.html">Sign In</a>
                    <?php endif; ?>
                </li>
            </ul>
        </nav>
    </header>

    <main class="cart-main">
        <h1 class="cart-title">Your Cart</h1>
        <p class="cart-subtitle">Here are the items you've added to your cart.</p>

        
        <div class="cart-items" id="cartItems">
          
        </div>

        
        <div class="cart-total">
            <span class="cart-total-label">Total:</span>
            <span class="cart-total-price" id="cartTotal">$0</span>
        </div>

        
        <div class="cart-actions">
            <button class="cart-action-button" onclick="clearCart()">Clear Cart</button>
            <button class="cart-action-button" onclick="checkout()">Checkout</button>
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
   
    <script src="assets/js/cart.js"></script>
</body>
</html>