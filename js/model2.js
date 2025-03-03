
        const swiper = new Swiper('.swiper-container', {
            loop: true, 
            navigation: {
                nextEl: '.swiper-button-next', 
                prevEl: '.swiper-button-prev', 
            },
        });

        
        function changeImage(index) {
            swiper.slideTo(index); // Переключаем слайдер на выбранное изображение
        }

        // Функция для добавления товара в корзину
        function addToCart() {
            const product = {
                name: "Nike Vapor Edge Pro 2",
                price: 300,
                image: "product/boots2.jpg",
                size: document.getElementById('size').value,
                quantity: 1
            };

            // Получаем текущую корзину из localStorage
            const cart = JSON.parse(localStorage.getItem('cart')) || [];

            // Проверяем, есть ли уже такой товар в корзине
            const existingProduct = cart.find(item => item.name === product.name && item.size === product.size);
            if (existingProduct) {
                existingProduct.quantity += 1; // Увеличиваем количество
            } else {
                cart.push(product); // Добавляем новый товар
            }

            // Сохраняем корзину в localStorage
            localStorage.setItem('cart', JSON.stringify(cart));

            // Анимация кнопки
            const addToCartButton = document.querySelector('.buy-now');
            addToCartButton.classList.add('added');
            setTimeout(() => addToCartButton.classList.remove('added'), 500);

            // Обновляем счётчик корзины
            updateCartCount();

            alert("Product added to cart!");
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

        // Обновляем счётчик при загрузке страницы
        document.addEventListener('DOMContentLoaded', updateCartCount);