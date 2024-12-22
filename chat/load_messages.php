<?php
// Відображення помилок
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

$result = $db->query("SELECT * FROM messages ORDER BY timestamp DESC");

while ($row = $result->fetchArray(SQLITE3_ASSOC)) {
    echo "<p><strong>" . htmlspecialchars($row['username']) . ":</strong> " . htmlspecialchars($row['message']) . " <em>[" . $row['timestamp'] . "]</em></p>";
}
?>
