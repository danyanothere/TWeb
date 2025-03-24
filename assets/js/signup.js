let id = '';
let isPhoneAvailable = true; // Флаг для проверки доступности телефона

document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("emailForm");
    const countrySelect = document.getElementById("country");
    const citySelect = document.getElementById("city");
    const emailInput = document.getElementById("email");
    const phoneInput = document.getElementById("phone");

    // Проверка email
    if (emailInput) {
        emailInput.addEventListener("blur", function () {
            const email = emailInput.value.trim();
            if (email) {
                checkEmailAvailability(email);
            }
        });
    }

    // Проверка телефона
    if (phoneInput) {
        phoneInput.addEventListener("blur", function () {
            const phone = phoneInput.value.trim();
            if (phone) {
                checkPhoneAvailability(phone);
            }
        });
    }

    // Обработчик изменения страны
    if (countrySelect && citySelect) {
        countrySelect.addEventListener("change", function () {
            if (countrySelect.value) {
                citySelect.disabled = false; // Активируем выбор города
                loadCities(countrySelect.value); // Загружаем города для выбранной страны
            } else {
                citySelect.disabled = true; // Деактивируем, если страна не выбрана
            }
        });
    }

    // Функция для загрузки городов
    function loadCities(country) {
        fetch(`getCities.php?country=${country}`)
            .then(response => response.json())
            .then(data => {
                citySelect.innerHTML = '<option value="" disabled selected>Select your city</option>';
                data.forEach(city => {
                    const option = document.createElement("option");
                    option.value = city;
                    option.textContent = city;
                    citySelect.appendChild(option);
                });
            })
            .catch(error => {
                console.error("Ошибка при загрузке городов: ", error);
            });
    }

    // Функция для проверки email
    function checkEmailAvailability(email) {
        fetch(`checkEmail.php?email=${email}`)
            .then(response => response.json())
            .then(data => {
                if (data.available) {
                } else {
                    alert("Email уже занят!");
                }
            })
            .catch(error => {
                console.error("Ошибка при проверке email: ", error);
            });
    }

    // Функция для проверки телефона
    function checkPhoneAvailability(phone) {
        
        phone = phone.replace(/[\s\-()]/g, '');

        fetch(`checkPhone.php?phone=${encodeURIComponent(phone)}`)
            .then(response => response.json())
            .then(data => {
                if (data.available) {
                    alert("Телефон доступен!");
                    isPhoneAvailable = true; 
                } else {
                    alert("Телефон уже занят! Используйте другой номер.");
                    isPhoneAvailable = false; 
                }
            })
            .catch(error => {
                console.error("Ошибка при проверке телефона: ", error);
            });
    }

    // Обработчик первой формы (email и пароль)
    form.addEventListener("submit", function (event) {
        event.preventDefault();
        const formData = new FormData(form);

        fetch("signup.php", {
            method: "POST",
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert("1 шаг регистрации успешен!");
                
                // Показываем вторую форму
                setTimeout(() => {
                    const step2 = document.getElementById("step2");
                    if (step2) {
                        step2.style.display = "block";
                        step1.style.display = "none";
                        id = data.id;
                        handleStep2Form(id);
                    }
                }, 100);
            } else {
                alert("Ошибка: " + data.message);
            }
        })
        .catch(error => {
            console.error("Ошибка запроса: ", error);
            alert("Произошла ошибка при отправке данных.");
        });
    });

   
    function handleStep2Form(id) {
        const step2Form = document.getElementById("signupForm");
        if (!step2Form) return;
        
        step2Form.addEventListener("submit", function (event) {
            event.preventDefault();

            // Проверяем, доступен ли телефон
            if (!isPhoneAvailable) {
                alert("Телефон уже занят! Используйте другой номер.");
                return; 
            }

            const formData = new FormData(step2Form);
            formData.append("id", id);
            fetch("signup.php", {
                method: "POST",
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert(data.message);
                    window.location.href = "main.php";
                } else {
                    alert("Ошибка: " + data.message);
                }
            })
            .catch(error => {
                console.error("Ошибка запроса: ", error);
                alert("Произошла ошибка при отправке данных.");
            });
        });
    }
});