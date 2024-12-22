<?php
// Файл для зберігання користувачів
$usersFile = 'users.txt';

// Перемінна для збереження повідомлення
$message = '';
$loggedIn = false;

// Реєстрація користувача
if (isset($_POST['register'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm_password'];

    // Перевірка наявності користувача
    if (file_exists($usersFile) && strpos(file_get_contents($usersFile), $username) !== false) {
        $message = "Користувач з таким логіном вже існує.";
    } elseif ($password !== $confirmPassword) {
        $message = "Паролі не збігаються.";
    } else {
        // Додавання нового користувача
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT); // Хешування пароля
        file_put_contents($usersFile, "$username:$hashedPassword:$email\n", FILE_APPEND);
        $message = "Реєстрація успішна!";
    }
}

// Вхід користувача
if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $loggedIn = false;

    // Перевірка облікових даних
    if (file_exists($usersFile)) {
        $users = file($usersFile, FILE_IGNORE_NEW_LINES);
        foreach ($users as $user) {
            list($fileUser, $filePass, $fileEmail) = explode(':', $user);
            if ($fileUser === $username && password_verify($password, $filePass)) {
                $loggedIn = true;
                break;
            }
        }
    }

    if ($loggedIn) {
        $message = $username;
    } else {
        $message = "Неправильний логін або пароль.";
    }
}

// Повернення до основної сторінки з повідомленням
header("Location: index.php?message=" . urlencode($message));
exit();
?>
