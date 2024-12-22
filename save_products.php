<?php
// Підключення до бази даних SQLite
try {
    $db = new PDO('sqlite:products.db');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Створення таблиці, якщо вона ще не існує
    $db->exec("CREATE TABLE IF NOT EXISTS products (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        name TEXT UNIQUE,
        price REAL,
        description TEXT
    )");
    
// Вставка або оновлення товару, якщо форму було відправлено
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    if (!empty($name) && !empty($price) && !empty($description)) {
        if ($id) { // Якщо ID присутній, то оновлюємо
            $stmt = $db->prepare("UPDATE products SET name = :name, price = :price, description = :description WHERE id = :id");
            $stmt->bindParam(':id', $id);
        } else { // Інакше вставляємо новий товар
            $stmt = $db->prepare("INSERT INTO products (name, price, description) VALUES (:name, :price, :description)");
        }
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':price', $price);
        $stmt->bindParam(':description', $description);
        $stmt->execute();
    }
}


    // Отримання всіх товарів з бази даних для відображення на сторінці
    $stmt = $db->query("SELECT * FROM products");
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    echo "Помилка бази даних: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Наші товари</title>
    <link rel="stylesheet" href="styles3.css">
</head>
<body>
    <h1>Новітні комп’ютери для всіх потреб</h1>
    <p>Ознайомтеся з нашими найкращими продуктами!</p>

    <div class="button-container">
        <button id="addProductBtn">Додати товар</button>
    </div>

<!-- Модальне вікно для додавання та редагування товару -->
<div id="addProductModal" class="modal">
    <div class="modal-content">
        <span class="close" id="closeAddProductModal">&times;</span>
        <h2 id="modalTitle">Додати новий товар</h2>
        <form method="POST" action="" id="productForm">
            <input type="hidden" name="id" id="productId">
            <input type="text" name="name" id="name" placeholder="Назва товару" required>
            <input type="number" step="0.01" name="price" id="price" placeholder="Ціна" required>
            <textarea name="description" id="description" placeholder="Опис" required></textarea>
            <button type="submit" id="submitButton">Додати</button>
        </form>
    </div>
</div>


    <div class="product-container">
    <?php if (!empty($products)): ?>
        <?php foreach ($products as $product): ?>
            <div class="product-card">
                <h2><?php echo htmlspecialchars($product['name']); ?></h2>
                <p><?php echo htmlspecialchars($product['description']); ?></p>
                <p>Ціна: <?php echo htmlspecialchars($product['price']); ?> грн</p>
                <button class="editProductBtn" data-id="<?php echo $product['id']; ?>" data-name="<?php echo htmlspecialchars($product['name']); ?>" data-price="<?php echo htmlspecialchars($product['price']); ?>" data-description="<?php echo htmlspecialchars($product['description']); ?>">Редагувати</button>
            </div>
        <?php endforeach; ?>
    <?php else: ?>
        <p>Товари відсутні.</p>
    <?php endif; ?>
</div>


    <script>
// Отримуємо елементи
var modal = document.getElementById("addProductModal");
var btn = document.getElementById("addProductBtn");
var span = document.getElementById("closeAddProductModal");
var productForm = document.getElementById("productForm");
var submitButton = document.getElementById("submitButton");

// Відкрити модальне вікно для додавання нового товару
btn.onclick = function() {
    modal.style.display = "block";
    submitButton.textContent = "Додати"; // Змінюємо текст кнопки на "Додати"
    productForm.reset(); // Скидаємо форму
}

// Закрити модальне вікно при натисканні на хрестик
span.onclick = function() {
    modal.style.display = "none";
}

// Закрити модальне вікно при кліку за його межами
window.onclick = function(event) {
    if (event.target == modal) {
        modal.style.display = "none";
    }
}

// Обробник натискання кнопки редагування
var editButtons = document.querySelectorAll(".editProductBtn");
editButtons.forEach(button => {
    button.onclick = function() {
        var productId = this.getAttribute("data-id");
        var productName = this.getAttribute("data-name");
        var productPrice = this.getAttribute("data-price");
        var productDescription = this.getAttribute("data-description");

        // Заповнюємо модальне вікно даними товару
        document.getElementById("productId").value = productId;
        document.getElementById("name").value = productName;
        document.getElementById("price").value = productPrice;
        document.getElementById("description").value = productDescription;

        modal.style.display = "block"; // Відкриваємо модальне вікно
        submitButton.textContent = "Зберегти"; // Змінюємо текст кнопки на "Зберегти"
    }
});
    </script>
</body>
</html>

