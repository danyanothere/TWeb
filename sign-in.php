<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In - Joga Bonito</title>
    <link rel="icon" type="image/x-icon" href="product/brazil-flag.png">
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Pixelify+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/signin.css">
    
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
                <li><a href="signin.php">Sign in</a></li>
            </ul>
        </nav>
    </header>

    
    <div class="signin-container">
        <h2>Sign In</h2>
        <div id="error-container" style="color: red; margin-bottom: 15px;"></div>
        <form id="signinForm" action="signin.php" method="POST">
        <form id="signinForm" action="signin.php" method="POST">
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required placeholder="Enter your email">
    
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required placeholder="Enter your password">
    
            <button type="submit">Sign In</button>
        </form>
        <p>Don't have an account? <a href="sign-up.php">Sign Up</a></p> 
    </div>

    
    <footer class="rounded-footer">
        <p>© 2025 Joga Bonito. Все права защищены.</p>
        <ul class="social-links">
            <li><a href="#"><img src="product/inst.png" alt="Instagram" class="social-icon"></a></li>
            <li><a href="#"><img src="product/twitter.png" alt="Twitter" class="social-icon"></a></li>
            <li><a href="#"><img src="product/telegram.png" alt="Telegram" class="social-icon"></a></li>
        </ul>
    </footer>
    <script src="assets/js/signin.js"></script>
</body>
</html>