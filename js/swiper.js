
   
        // const swiper = new Swiper('.swiper-container', {
        //     loop: true,
        //     navigation: {
        //         nextEl: '.swiper-button-next',
        //         prevEl: '.swiper-button-prev',
        //     },
        // });

        // function changeImage(index) {
        //     swiper.slideTo(index);
        // }

        // function addToCart() {
        //     const product = {
        //         name: "Nike Mercurial Superfly",
        //         price: 250,
        //         image: "boots1.jpg",
        //         size: document.getElementById('size').value,
        //         quantity: 1
        //     };

        //     const cart = JSON.parse(localStorage.getItem('cart')) || [];
        //     const existingProduct = cart.find(item => item.name === product.name && item.size === product.size);
        //     if (existingProduct) {
        //         existingProduct.quantity += 1;
        //     } else {
        //         cart.push(product);
        //     }

        //     localStorage.setItem('cart', JSON.stringify(cart));
        //     const addToCartButton = document.querySelector('.buy-now');
        //     addToCartButton.classList.add('added');
        //     setTimeout(() => addToCartButton.classList.remove('added'), 500);
        //     updateCartCount();
        //     alert("Product added to cart!");
        // }

        // function updateCartCount() {
        //     const cart = JSON.parse(localStorage.getItem('cart')) || [];
        //     const cartCount = document.getElementById('cartCount');
        //     const totalItems = cart.reduce((sum, item) => sum + item.quantity, 0);
        //     cartCount.textContent = totalItems > 0 ? `(${totalItems})` : '';
        // }

        // document.addEventListener('DOMContentLoaded', updateCartCount);
 