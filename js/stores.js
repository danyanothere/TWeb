// Функция для отображения всех магазинов
function displayStores(storesToDisplay) {
    const storeList = document.getElementById('stores');
    storeList.innerHTML = ''; // Очищаем список

    // Сортируем магазины по имени
    storesToDisplay.sort((a, b) => a.name.localeCompare(b.name));

    if (storesToDisplay.length === 0) {
        storeList.innerHTML = '<li>Магазины не найдены</li>';
        return;
    }

    storesToDisplay.forEach(store => {
        const li = document.createElement('li');
        li.innerHTML = `
            <strong>${store.name}</strong>
            <div>Адрес: ${store.address}</div>
            <div>Телефон: ${store.phone}</div>
        `;
        storeList.appendChild(li);
    });
}

// Функция для фильтрации магазинов по городу
function filterStores() {
    const location = document.getElementById('locationInput').value.toLowerCase();
    const filteredStores = stores.filter(store => store.city.toLowerCase().includes(location));
    displayStores(filteredStores);
}

// Функция для сброса поиска
function resetSearch() {
    document.getElementById('locationInput').value = ''; // Очищаем поле ввода
    displayStores(stores); // Показываем все магазины
}

// Обработчик события для нажатия Enter
document.getElementById('locationInput').addEventListener('keypress', function (e) {
    if (e.key === 'Enter') { // Если нажата клавиша Enter
        filterStores(); // Вызываем функцию поиска
    }
});

// Обработчик события для очистки поля ввода
document.getElementById('locationInput').addEventListener('input', function () {
    if (this.value === '') { // Если поле ввода пустое
        displayStores(stores); // Показываем все магазины
    }
});

// Показываем все магазины при загрузке страницы
displayStores(stores);