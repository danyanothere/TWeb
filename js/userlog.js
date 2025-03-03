document.addEventListener("DOMContentLoaded", function () {
    const isLoggedIn = localStorage.getItem('isLoggedIn') === 'true';

    // Элементы навигации
    const authLink = document.getElementById('authLink');

    if (isLoggedIn) {
        // Меняем кнопку "Sign in" на "Logout"
        if (authLink) {
            authLink.innerHTML = '<a href="#" id="logoutButton">Logout</a>';
            authLink.style.display = 'block'; // Показываем кнопку

            // Обработка выхода
            const logoutButton = document.getElementById('logoutButton');
            if (logoutButton) {
                logoutButton.addEventListener('click', function (e) {
                    e.preventDefault();
                    localStorage.removeItem('isLoggedIn'); // Удаляем информацию о входе
                    window.location.href = "sign-in.html"; // Перенаправляем на страницу входа
                });
            }
        }
    } else {
        // Показываем кнопку "Sign in"
        if (authLink) {
            authLink.innerHTML = '<a href="sign-in.html">Sign in</a>';
            authLink.style.display = 'block'; // Показываем кнопку
        }
    }
});