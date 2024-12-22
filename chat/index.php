<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SQLite Web Chat</title>
    <link rel="stylesheet" href="style.css"> <!-- Підключення CSS-файлу -->
</head>
<body>

<div id="chat"></div>

<form id="chat-form">
    <input type="text" id="username" placeholder="Ваше ім'я" required><br><br>
    <input type="text" id="message-box" placeholder="Ваше повідомлення" required>
    <button type="submit">Відправити</button>
</form>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Функція для завантаження повідомлень через AJAX
    function loadMessages() {
        $.ajax({
            url: "load_messages.php",
            method: "GET",
            success: function(data) {
                $('#chat').html(data);
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log("Помилка завантаження: " + textStatus + ", " + errorThrown);
            }
        });
    }

    // Відправка повідомлення через AJAX
    $('#chat-form').on('submit', function(event) {
        event.preventDefault();
        const username = $('#username').val();
        const message = $('#message-box').val();

        $.ajax({
            url: "send_message.php",
            method: "POST",
            data: { username: username, message: message },
            success: function(response) {
                console.log("Відповідь від сервера: ", response);
                $('#message-box').val('');  // Очищення поля
                loadMessages();  // Оновлення чату
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log("Помилка AJAX: " + textStatus + ", " + errorThrown);
            }
        });
    });

    // Оновлення повідомлень кожні 2 секунди
    setInterval(loadMessages, 2000);

    // Початкове завантаження повідомлень
    loadMessages();
</script>

</body>
</html>
