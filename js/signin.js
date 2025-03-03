// Обработка формы входа
document.getElementById('signinForm').addEventListener('submit', function (e) {
    e.preventDefault();

    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;

    // Получаем данные пользователя из localStorage
    const userData = JSON.parse(localStorage.getItem('userData'));

    // Проверяем, совпадают ли email и пароль с сохранёнными
    if (userData && email === userData.email && password === userData.password) {
        alert("Welcome back!");

        // Сохраняем информацию о том, что пользователь авторизован
        localStorage.setItem('isLoggedIn', 'true');

        // Перенаправляем на главную страницу
        window.location.href = "main.html";
    } else {
        alert("Account not found. Please sign up.");
    }
});