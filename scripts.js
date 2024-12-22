document.addEventListener('DOMContentLoaded', function () {
    const menuBtn = document.getElementById('menuBtn');
    const popupMenu = document.getElementById('popupMenu');
    const closeMenu = document.getElementById('closeMenu');

    const registerBtn = document.getElementById('registerBtn');
    const loginBtn = document.getElementById('loginBtn');
    const registerModal = document.getElementById('registerModal');
    const closeRegisterModal = document.getElementById('closeRegisterModal');

    // Відкрити модальне вікно входу
    loginBtn.onclick = function() {
        loginModal.style.display = 'block';
    }
    
    // Закрити модальне вікно входу
    closeLoginModal.onclick = function() {
        loginModal.style.display = 'none';
    }

    // Відкрити/закрити меню
    menuBtn.onclick = function() {
        popupMenu.style.display = 'block';
    }
    closeMenu.onclick = function() {
        popupMenu.style.display = 'none';
    }

    // Відкрити модальне вікно реєстрації
    registerBtn.onclick = function() {
        registerModal.style.display = 'block';
    }

    // Закрити модальне вікно реєстрації
    closeRegisterModal.onclick = function() {
        registerModal.style.display = 'none';
    }

    // Закрити модальне вікно при кліку поза ним
    window.onclick = function(event) {
        if (event.target == registerModal) {
            registerModal.style.display = 'none';
        }
    }

    // Генерація пароля
    const generatePasswordBtn = document.getElementById('generatePasswordBtn');
    generatePasswordBtn.onclick = function() {
        const passwordField = document.getElementById('regPassword');
        const confirmPasswordField = document.getElementById('regConfirmPassword');
        const generatedPassword = Math.random().toString(36).slice(-8); 
        passwordField.value = generatedPassword;
        confirmPasswordField.value = generatedPassword;
    }

    // Перемикання видимості пароля
    const togglePassword = document.getElementById('togglePassword');
    const toggleConfirmPassword = document.getElementById('toggleConfirmPassword');

    togglePassword.onclick = function() {
        const passwordField = document.getElementById('regPassword');
        if (passwordField.type === 'password') {
            passwordField.type = 'text'; // Показати пароль
            togglePassword.textContent = 'hide'; // Змінюємо іконку
        } else {
            passwordField.type = 'password'; // Приховати пароль
            togglePassword.textContent = 'show';
        }
    }

    toggleConfirmPassword.onclick = function() {
        const confirmPasswordField = document.getElementById('regConfirmPassword');
        if (confirmPasswordField.type === 'password') {
            confirmPasswordField.type = 'text'; // Показати пароль
            toggleConfirmPassword.textContent = 'hide'; // Змінюємо іконку
        } else {
            confirmPasswordField.type = 'password'; // Приховати пароль
            toggleConfirmPassword.textContent = 'show';
        }
    }// Код для відкриття та закриття модальних вікон
document.getElementById("registerBtn").onclick = function() {
    document.getElementById("registerModal").style.display = "block";
};

document.getElementById("loginBtn").onclick = function() {
    document.getElementById("loginModal").style.display = "block";
};

document.getElementById("closeRegisterModal").onclick = function() {
    document.getElementById("registerModal").style.display = "none";
};

document.getElementById("closeLoginModal").onclick = function() {
    document.getElementById("loginModal").style.display = "none";
};

// Закриття модальних вікон при натисканні поза ними
window.onclick = function(event) {
    if (event.target === document.getElementById("registerModal")) {
        document.getElementById("registerModal").style.display = "none";
    }
    if (event.target === document.getElementById("loginModal")) {
        document.getElementById("loginModal").style.display = "none";
    }

};
});
