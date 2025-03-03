const countriesAndCities = {
    "USA": ["New York", "Los Angeles", "Chicago", "Houston", "Phoenix", "Philadelphia", "San Antonio", "San Diego", "Dallas", "San Jose"],
    "Canada": ["Toronto", "Vancouver", "Montreal", "Calgary", "Ottawa", "Edmonton", "Mississauga", "Winnipeg", "Quebec City", "Hamilton"],
    "Germany": ["Berlin", "Munich", "Hamburg", "Frankfurt", "Cologne", "Stuttgart", "Düsseldorf", "Dortmund", "Essen", "Leipzig"],
    "France": ["Paris", "Marseille", "Lyon", "Toulouse", "Nice", "Nantes", "Strasbourg", "Montpellier", "Bordeaux", "Lille"],
    "Italy": ["Rome", "Milan", "Naples", "Turin", "Palermo", "Genoa", "Bologna", "Florence", "Venice", "Verona"],
    "Spain": ["Madrid", "Barcelona", "Valencia", "Seville", "Zaragoza", "Malaga", "Murcia", "Palma", "Las Palmas", "Bilbao"],
    "UK": ["London", "Birmingham", "Manchester", "Glasgow", "Liverpool", "Bristol", "Sheffield", "Leeds", "Edinburgh", "Leicester"],
    "Russia": ["Moscow", "Saint Petersburg", "Novosibirsk", "Yekaterinburg", "Kazan", "Nizhny Novgorod", "Chelyabinsk", "Samara", "Omsk", "Rostov-on-Don"],
    "China": ["Beijing", "Shanghai", "Guangzhou", "Shenzhen", "Tianjin", "Chongqing", "Hong Kong", "Chengdu", "Nanjing", "Wuhan"],
    "Japan": ["Tokyo", "Yokohama", "Osaka", "Nagoya", "Sapporo", "Fukuoka", "Kobe", "Kyoto", "Kawasaki", "Saitama"],
    "Brazil": ["São Paulo", "Rio de Janeiro", "Brasília", "Salvador", "Fortaleza", "Belo Horizonte", "Manaus", "Curitiba", "Recife", "Porto Alegre"],
    "India": ["Mumbai", "Delhi", "Bangalore", "Hyderabad", "Ahmedabad", "Chennai", "Kolkata", "Surat", "Pune", "Jaipur"],
    "Australia": ["Sydney", "Melbourne", "Brisbane", "Perth", "Adelaide", "Gold Coast", "Canberra", "Newcastle", "Wollongong", "Hobart"],
    "Mexico": ["Mexico City", "Guadalajara", "Monterrey", "Puebla", "Toluca", "Tijuana", "León", "Juárez", "Torreón", "Querétaro"],
    "South Korea": ["Seoul", "Busan", "Incheon", "Daegu", "Daejeon", "Gwangju", "Suwon", "Ulsan", "Changwon", "Seongnam"],
    "Turkey": ["Istanbul", "Ankara", "Izmir", "Bursa", "Adana", "Gaziantep", "Konya", "Antalya", "Diyarbakır", "Mersin"],
    "Argentina": ["Buenos Aires", "Córdoba", "Rosario", "Mendoza", "La Plata", "Tucumán", "Mar del Plata", "Salta", "Santa Fe", "San Juan"],
    "South Africa": ["Cape Town", "Durban", "Johannesburg", "Soweto", "Pretoria", "Port Elizabeth", "Pietermaritzburg", "Benoni", "Tembisa", "East London"],
    "Egypt": ["Cairo", "Alexandria", "Giza", "Shubra El-Kheima", "Port Said", "Suez", "Luxor", "Mansoura", "El-Mahalla El-Kubra", "Tanta"],
    "Nigeria": ["Lagos", "Kano", "Ibadan", "Kaduna", "Port Harcourt", "Benin City", "Maiduguri", "Zaria", "Aba", "Jos"],
    "Ukraine": ["Kiev", "Odessa", "Kharkiv", "Lviv", "Cherson", "Dnipro", "Cernovtsi", "Crivoi Rog", "Vinnitsa", "Cernigov", "Zaporozhie", "Melitopol", "Sevastopol", "Zhytomyr"]
};

// Переменная для хранения email
let userEmail = '';

// Сортируем страны в алфавитном порядке
const sortedCountries = Object.keys(countriesAndCities).sort();

// Добавляем отсортированные страны в выпадающий список
const countrySelect = document.getElementById('country');
sortedCountries.forEach(country => {
    const option = document.createElement('option');
    option.value = country;
    option.textContent = country;
    countrySelect.appendChild(option);
});

// Валидация email
function validateEmail(email) {
    const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/; // Проверяем наличие @ и точки
    const validDomains = ['.com', '.ru', '.md', '.net', '.org']; // Допустимые домены
    if (!emailPattern.test(email)) {
        return false; // Если email не соответствует шаблону
    }
    // Проверяем, что домен email соответствует допустимым
    return validDomains.some(domain => email.endsWith(domain));
}

// Валидация пароля
function validatePassword(password) {
    const minLength = 8;
    const hasUpperCase = /[A-Z]/.test(password); // Проверяем наличие заглавной буквы
    const hasLowerCase = /[a-z]/.test(password); // Проверяем наличие строчной буквы
    const hasDigit = /\d/.test(password); // Проверяем наличие цифры
    const hasSpecialChar = /[!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?]/.test(password); // Проверяем наличие спецсимвола

    return password.length >= minLength && hasUpperCase && hasLowerCase && hasDigit && hasSpecialChar;
}

// Функция для отображения ошибок
function showError(input, message) {
    const errorElement = document.createElement('div');
    errorElement.className = 'error-message';
    errorElement.textContent = message;
    input.parentNode.insertBefore(errorElement, input.nextSibling);
}

// Функция для очистки ошибок
function clearErrors() {
    const errors = document.querySelectorAll('.error-message');
    errors.forEach(error => error.remove());
}

// Обработка первого шага (ввод email и пароля)
document.getElementById('emailForm').addEventListener('submit', function (e) {
    e.preventDefault(); // Отменяем стандартное поведение формы
    clearErrors(); // Очищаем предыдущие ошибки

    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirmPassword').value;

    let isValid = true; // Флаг для проверки валидности данных

    // Проверяем валидность email
    if (!validateEmail(email)) {
        showError(document.getElementById('email'), "Please enter a valid email address (e.g., example@domain.com, example@domain.ru).");
        isValid = false; // Устанавливаем флаг в false, если email невалиден
    }

    // Проверяем валидность пароля
    if (!validatePassword(password)) {
        showError(document.getElementById('password'), "Password must be at least 8 characters long, contain at least one uppercase letter, one lowercase letter, one digit, and one special character.");
        isValid = false; // Устанавливаем флаг в false, если пароль невалиден
    }

    // Проверяем, что пароли совпадают
    if (password !== confirmPassword) {
        showError(document.getElementById('confirmPassword'), "Passwords do not match. Please try again.");
        isValid = false; // Устанавливаем флаг в false, если пароли не совпадают
    }

    // Если данные невалидны, останавливаем выполнение
    if (!isValid) {
        return;
    }

    // Если все проверки пройдены, сохраняем email и переходим ко второму шагу
    userEmail = email;
    document.getElementById('step1').style.display = 'none';
    document.getElementById('step2').style.display = 'block';
});

// Обработка выбора страны
document.getElementById('country').addEventListener('change', function () {
    const country = this.value;
    const citySelect = document.getElementById('city');

    // Очищаем список городов
    citySelect.innerHTML = '<option value="" disabled selected>Select your city</option>';

    if (country && countriesAndCities[country]) {
        // Активируем выбор города
        citySelect.disabled = false;

        // Сортируем города в алфавитном порядке
        const sortedCities = countriesAndCities[country].sort();

        // Добавляем отсортированные города в список
        sortedCities.forEach(city => {
            const option = document.createElement('option');
            option.value = city;
            option.textContent = city;
            citySelect.appendChild(option);
        });
    } else {
        // Если страна не выбрана, деактивируем выбор города
        citySelect.disabled = true;
    }
});

// Обработка второго шага (регистрация)
document.getElementById('signupForm').addEventListener('submit', function (e) {
    e.preventDefault(); // Отменяем стандартное поведение формы

    const firstName = document.getElementById('firstName').value;
    const lastName = document.getElementById('lastName').value;
    const phone = document.getElementById('phone').value;
    const country = document.getElementById('country').value;
    const city = document.getElementById('city').value;
    const address = document.getElementById('address').value;

    // Проверяем, что все поля заполнены
    if (firstName && lastName && phone && country && city && address) {
        // Сохраняем данные пользователя в localStorage
        const userData = {
            email: userEmail, // email сохранили на первом шаге
            password: document.getElementById('password').value, // пароль с первого шага
            firstName,
            lastName,
            phone,
            country,
            city,
            address
        };

        // Сохраняем данные в localStorage
        localStorage.setItem('userData', JSON.stringify(userData));

        // Сообщение об успешной регистрации
        alert(`Registration successful! Welcome to Joga Bonito, ${firstName}.\nEmail: ${userEmail}`);
        window.location.href = "main.html"; // Перенаправляем на главную страницу
    } else {
        alert("Please fill out all fields."); // Сообщение об ошибке
    }
});