// Функция для загрузки корзины из localStorage
function loadCart() {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    const cartItems = document.getElementById('cartItems');
    const cartTotal = document.getElementById('cartTotal');

    // Очищаем корзину перед загрузкой
    cartItems.innerHTML = '';

    let total = 0;

    // Добавляем товары в корзину
    cart.forEach(item => {
        const cartItem = document.createElement('div');
        cartItem.classList.add('cart-item');
        cartItem.innerHTML = `
            <img src="${item.image}" alt="${item.name}" class="cart-item-image">
            <div class="cart-item-details">
                <h3 class="cart-item-name">${item.name}</h3>
                <p class="cart-item-size">Size: ${item.size}</p>
                <p class="cart-item-price">$${item.price}</p>
            </div>
            <div class="cart-item-controls">
                <button class="cart-item-button" onclick="updateQuantity(this, -1)">-</button>
                <span class="cart-item-quantity">${item.quantity}</span>
                <button class="cart-item-button" onclick="updateQuantity(this, 1)">+</button>
                <button class="cart-item-remove" onclick="removeItem(this)">Remove</button>
            </div>
        `;
        cartItems.appendChild(cartItem);

        // Считаем общую сумму
        total += item.price * item.quantity;
    });

    // Обновляем итоговую сумму
    cartTotal.textContent = `$${total}`;
}

// Функция для обновления количества товара
function updateQuantity(button, change) {
    const quantityElement = button.parentElement.querySelector('.cart-item-quantity');
    let quantity = parseInt(quantityElement.textContent);
    quantity += change;
    if (quantity < 1) quantity = 1;
    quantityElement.textContent = quantity;

    // Обновляем корзину в localStorage
    updateCartInLocalStorage();
    updateTotal();
}

// Функция для удаления товара
function removeItem(button) {
    const item = button.closest('.cart-item');
    item.remove();

    // Обновляем корзину в localStorage
    updateCartInLocalStorage();
    updateTotal();
}

// Функция для очистки корзины
function clearCart() {
    localStorage.removeItem('cart');
    loadCart();
    updateCartCount(); // Обновляем счётчик
}

// Функция для оформления заказа
function checkout() {
    alert("Thank you for your purchase!");
    clearCart();
}

// Функция для обновления корзины в localStorage
function updateCartInLocalStorage() {
    const cartItems = document.querySelectorAll('.cart-item');
    const cart = [];

    cartItems.forEach(item => {
        const name = item.querySelector('.cart-item-name').textContent;
        const price = parseFloat(item.querySelector('.cart-item-price').textContent.replace('$', ''));
        const quantity = parseInt(item.querySelector('.cart-item-quantity').textContent);
        const image = item.querySelector('.cart-item-image').src;
        const size = item.querySelector('.cart-item-size').textContent.replace('Size: ', '');

        cart.push({ name, price, quantity, image, size });
    });

    localStorage.setItem('cart', JSON.stringify(cart));
    updateCartCount(); // Обновляем счётчик
}

// Функция для обновления итоговой суммы
function updateTotal() {
    const cartItems = document.querySelectorAll('.cart-item');
    let total = 0;

    cartItems.forEach(item => {
        const price = parseFloat(item.querySelector('.cart-item-price').textContent.replace('$', ''));
        const quantity = parseInt(item.querySelector('.cart-item-quantity').textContent);
        total += price * quantity;
    });

    document.getElementById('cartTotal').textContent = `$${total}`;
}

// Функция для обновления счётчика корзины
function updateCartCount() {
    const cart = JSON.parse(localStorage.getItem('cart')) || [];
    const cartCount = document.getElementById('cartCount');

    if (cart.length > 0) {
        const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
        cartCount.textContent = `(${totalItems})`;
    } else {
        cartCount.textContent = '';
    }
}

// Загружаем корзину при загрузке страницы
document.addEventListener('DOMContentLoaded', () => {
    loadCart();
    updateCartCount(); // Обновляем счётчик
});