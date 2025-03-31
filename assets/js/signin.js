document.getElementById('signinForm').addEventListener('submit', function (event) {
    event.preventDefault(); 

    
    const formData = new FormData(this);

    
    const xhr = new XMLHttpRequest();
    
   
    const submitButton = this.querySelector('button[type="submit"]');
    const errorContainer = document.getElementById('error-container') || document.createElement('div');
    
    
    submitButton.disabled = true;
    errorContainer.style.color = 'blue';
    errorContainer.textContent = 'Идет авторизация...';

    
    xhr.open('POST', 'signin.php', true);

    
    xhr.onload = function() {
        
        submitButton.disabled = false;

        // Проверяем статус ответа
        if (xhr.status === 200) {
            try {
                const response = JSON.parse(xhr.responseText);
                
                if (response.status === 'success') {
                    errorContainer.textContent = '';
                    
                    
                    window.location.href = response.redirect;
                } else {
                    errorContainer.style.color = 'red';
                    errorContainer.textContent = response.message || 'Неизвестная ошибка';
                }
            } catch (e) {
                errorContainer.style.color = 'red';
                errorContainer.textContent = 'Ошибка обработки ответа';
            }
        } else {
            errorContainer.style.color = 'red';
            errorContainer.textContent = 'Ошибка сервера: ' + xhr.status;
        }
    };

    xhr.onerror = function() {
        submitButton.disabled = false;
        errorContainer.style.color = 'red';
        errorContainer.textContent = 'Ошибка подключения';
    };

    xhr.send(formData);
});