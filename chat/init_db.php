<?php
$db = new SQLite3('chat.db');

// Створення таблиці, якщо вона ще не існує
$db->exec("CREATE TABLE IF NOT EXISTS messages (
    id INTEGER PRIMARY KEY AUTOINCREMENT,
    username TEXT NOT NULL,
    message TEXT NOT NULL,
    timestamp DATETIME DEFAULT CURRENT_TIMESTAMP
)");

echo "Таблиця створена успішно!";
?>
