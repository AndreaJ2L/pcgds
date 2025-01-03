<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Комп’ютери</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="logo">Computers</div>
        <div class="login">
        <button id="secretButton" class="hidden">Секретна кнопка</button>
        <button class="btn" id="registerBtn">Реєстрація</button>
        <button class="btn" id="loginBtn">Вхід</button>
        </div>
        <button id="menuBtn" class="btn">Меню</button>
    </header>

    <div id="popupMenu" class="popup-menu">
        <span class="close" id="closeMenu">&times;</span>
        <ul>
            <li><a href="#">Головна</a></li>
            <li><a href="#">Продукти</a></li>
            <li><a href="#">Послуги</a></li>
            <li><a href="#">Про нас</a></li>
            <li><a href="#">Контакти</a></li>
            <li><a href="test.php">Перейти до тесту</a></li>
            <li><a href="chat\index.php">Веб-чат</a></li>
        </ul>
    </div>

<!-- Модальне вікно реєстрації -->
<div id="registerModal" class="modal">
    <div class="modal-content">
        <span class="close" id="closeRegisterModal">&times;</span>
        <h2>Реєстрація</h2>
        <form id="registerForm" method="post" action="register_login.php">
            <input type="text" name="username" id="regUsername" placeholder="Логін" required>
            <input type="email" name="email" id="regEmail" placeholder="Електронна пошта" required>
            <div style="position: relative;">
                <input type="password" name="password" id="regPassword" placeholder="Пароль" required>
                <button type="button" id="togglePassword">show</button> <!-- Кнопка для перегляду пароля -->
            </div>
            <div style="position: relative;">
                <input type="password" name="confirm_password" id="regConfirmPassword" placeholder="Повторіть пароль" required>
                <button type="button" id="toggleConfirmPassword">show</button> <!-- Кнопка для перегляду пароля -->
            </div>
            <button type="submit" name="register" class="btn">Зареєструватися</button>
            <button type="button" id="generatePasswordBtn" class="btn">Сгенерувати пароль</button>
        </form>
    </div>
</div>

<!-- Модальне вікно для входу -->
<div id="loginModal" class="modal">
    <div class="modal-content">
        <span class="close" id="closeLoginModal">&times;</span>
        <h2>Вхід</h2>
        <form method="post" action="register_login.php">
            <input type="text" name="username" placeholder="Логін" required>
            <input type="password" name="password" placeholder="Пароль" required>
		<a href="#" id="forgot">Забули пароль?</a>
            <button type="submit" name="login" class="btn">Увійти</button>
        </form>
    </div>
</div>
    <section class="hero">
        <div class="hero-text">
            <h1>Новітні комп’ютери для всіх потреб</h1>
            <p>Ознайомтеся з нашими найкращими продуктами!</p>
            <a href="save_products.php" class="btn">Дізнатися більше</a>
        </div>
    </section>
    
    <section class="categories">
        <h2>Категорії продуктів</h2>
        <div class="category-grid">
            <div class="category-item">
                <img src="images/laptop.jpg" alt="Ноутбуки">
                <h3>Комп’ютери та ноутбуки</h3>
            </div>
            <div class="category-item">
                <img src="images/components.jpg" alt="Комплектуючі">
                <h3>Комплектуючі</h3>
            </div>
            <div class="category-item">
                <img src="images/accessories.jpg" alt="Аксесуари">
                <h3>Аксесуари</h3>
            </div>
            <div class="category-item">
                <img src="images/software.jpg" alt="Програмне забезпечення">
                <h3>Програмне забезпечення</h3>
            </div>
        </div>
    </section>

    <section class="popular-products">
        <h2>Популярні товари</h2>
        <div class="product-grid">
            <div class="product-item">
                <img src="images/product1.jpg" alt="Продукт 1">
                <h3>GIGABYTE-RTX-4090</h3>
                <p>$1000</p>
                <button class="btn">Додати в кошик</button>
            </div>
            <div class="product-item">
                <img src="images/product2.jpg" alt="Продукт 2">
                <h3>Apple 27" iMac Desktop10</h3>
                <p>$800</p>
                <button class="btn">Додати в кошик</button>
            </div>
            <div class="product-item">
                <img src="images/product3.jpg" alt="Продукт 3">
                <h3>DELL VOSTRO 13300</h3>
                <p>$1200</p>
                <button class="btn">Додати в кошик</button>
            </div>
        </div>
    </section>

    <footer>
        <div class="footer-content">
            <p>&copy; 2024 Computers. Всі права захищені.</p>
            <div class="socials">
                <a href="#">Facebook</a>
                <a href="#">Instagram</a>
                <a href="#">Twitter</a>
            </div>
        </div>
    </footer>

    <script src="scripts.js"></script>
</body>
</html>
