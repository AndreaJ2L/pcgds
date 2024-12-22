<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$db = new SQLite3('chat.db');

// Створення таблиці, якщо вона ще не існує
$db->exec("CREATE TABLE IF NOT EXISTS messages (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    username TEXT NOT NULL,
    message TEXT NOT NULL,
    timestamp DATETIME DEFAULT CURRENT_TIMESTAMP
)");

$username = 'TestUser';
$message = 'TestMessage';

$stmt = $db->prepare("INSERT INTO messages (username, message) VALUES (?, ?)");
$stmt->bindValue(1, $username, SQLITE3_TEXT);
$stmt->bindValue(2, $message, SQLITE3_TEXT);
$result = $stmt->execute();

if ($result === false) {
    echo "Помилка: " . $db->lastErrorMsg();
} else {
    echo "Повідомлення успішно додане!";
}
?>
