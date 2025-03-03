let currentImageIndex = 0;

// Функция для смены изображения
function changeImage(img) {
    const mainImage = document.getElementById('main-image');
    mainImage.src = img.src;
    currentImageIndex = images.indexOf(img.src); // Обновляем текущий индекс
}

// Функция для перехода к предыдущему изображению
function prevImage() {
    currentImageIndex = (currentImageIndex - 1 + images.length) % images.length;
    document.getElementById('main-image').src = images[currentImageIndex];
}

// Функция для перехода к следующему изображению
function nextImage() {
    currentImageIndex = (currentImageIndex + 1) % images.length;
    document.getElementById('main-image').src = images[currentImageIndex];
}