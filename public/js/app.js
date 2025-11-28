document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('loginModal');
    const loginButton = document.getElementById('loginButton');
    const closeButton = document.getElementById('closeModal');
    const loginForm = document.getElementById('loginForm');
    const inputLogin = document.getElementById('InputLogin');
    const inputPassword = document.getElementById('InputPassword');
    const rememberCheckbox = document.getElementById('rememberMe');

    // === Автозаполнение из localStorage ===
    const savedLogin = localStorage.getItem('savedLogin');
    const savedPassword = localStorage.getItem('savedPassword');
    if (savedLogin && savedPassword) {
        inputLogin.value = savedLogin;
        inputPassword.value = savedPassword;
        rememberCheckbox.checked = true;
    }

    function showModal() {
        if (modal) {
            modal.style.display = 'flex';
            document.body.style.overflow = 'hidden';
            requestAnimationFrame(() => {
                modal.classList.add('active');
            });
        }
    }

    function hideModal() {
        if (modal) {
            modal.classList.remove('active');
            setTimeout(() => {
                modal.style.display = 'none';
                document.body.style.overflow = '';
                const errorElement = document.getElementById('loginError');
                if (errorElement) errorElement.style.display = 'none';
            }, 300);
        }
    }

    if (loginButton) {
        loginButton.addEventListener('click', function(e) {
            e.preventDefault();
            showModal();
        });
    }

    if (closeButton) {
        closeButton.addEventListener('click', function(e) {
            e.preventDefault();
            hideModal();
        });
    }

    let mouseDownInside = false;

    if (modal) {
        modal.addEventListener('mousedown', function(e) {
            mouseDownInside = e.target !== modal;
        });

        modal.addEventListener('mouseup', function(e) {
            if (!mouseDownInside && e.target === modal) {
                hideModal();
            }
        });
    }

    if (loginForm) {
        loginForm.addEventListener('submit', function(e) {
            e.preventDefault();

            const login = inputLogin.value;
            const password = inputPassword.value;
            const errorElement = document.getElementById('loginError');
            const submitBtn = loginForm.querySelector('button[type="submit"]');

            // Запомнить пользователя
            if (rememberCheckbox.checked) {
                localStorage.setItem('savedLogin', login);
                localStorage.setItem('savedPassword', password);
            } else {
                localStorage.removeItem('savedLogin');
                localStorage.removeItem('savedPassword');
            }

            submitBtn.textContent = 'Вход...';
            submitBtn.disabled = true;

            fetch('/login', {
                method: 'POST',
                headers: { 'Content-Type': 'application/json' },
                body: JSON.stringify({ login, password })
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    hideModal();
                    setTimeout(() => location.reload(), 300);
                } else {
                    errorElement.textContent = data.message || 'Ошибка авторизации';
                    errorElement.style.display = 'block';
                    submitBtn.textContent = 'Войти';
                    submitBtn.disabled = false;
                }
            })
            .catch(error => {
                console.error('Ошибка:', error);
                errorElement.textContent = 'Ошибка соединения';
                errorElement.style.display = 'block';
                submitBtn.textContent = 'Войти';
                submitBtn.disabled = false;
            });
        });
    }
});