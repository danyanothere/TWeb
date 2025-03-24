document.getElementById('signinForm').addEventListener('submit', function (event) {
    event.preventDefault(); // Отменяем стандартную отправку формы

    // Собираем данные из формы
    const formData = new FormData(this);

    // Отправляем данные на сервер через Fetch API
    fetch('signin.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        if (data === "Неверный email или пароль.") {
            alert(data); // Показываем сообщение об ошибке
        }
        // Если авторизация успешна, сервер сам перенаправит на main.html
        else {
            document.location.href = "main.php";
        }
    })
    .catch(error => {
        console.error('Ошибка:', error);
        alert("Произошла ошибка при авторизации.");
    });
});