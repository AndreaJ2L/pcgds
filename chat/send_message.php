<?php
// Відображення помилок
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$db = new SQLite3('chat.db');

// Створення таблиці, якщо вона ще не існує
if (!$db->exec("CREATE TABLE IF NOT EXISTS messages (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    username TEXT NOT NULL,
    message TEXT NOT NULL,
    timestamp DATETIME DEFAULT CURRENT_TIMESTAMP
)")) {
    die(json_encode(["status" => "error", "message" => "Помилка створення таблиці: " . $db->lastErrorMsg()]));
}

if (isset($_POST['username']) && isset($_POST['message'])) {
    $username = htmlspecialchars($_POST['username']);
    $message = htmlspecialchars($_POST['message']);

    // Підготовка SQL запиту
    $stmt = $db->prepare("INSERT INTO messages (username, message) VALUES (?, ?)");
    if ($stmt === false) {
        echo json_encode(["status" => "error", "message" => "Помилка підготовки запиту: " . $db->lastErrorMsg()]);
        exit;
    } else {
        $stmt->bindValue(1, $username, SQLITE3_TEXT);
        $stmt->bindValue(2, $message, SQLITE3_TEXT);

        $result = $stmt->execute();
        if ($result === false) {
            echo json_encode(["status" => "error", "message" => "Помилка виконання запиту: " . $db->lastErrorMsg()]);
        } else {
            echo json_encode(["status" => "success", "message" => "Повідомлення успішно додане!"]);
        }
    }
} else {
    echo json_encode(["status" => "error", "message" => "Дані не передані."]);
}
?>
