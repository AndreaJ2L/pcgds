$('#chat-form').on('submit', function(event) {
    event.preventDefault();
    const username = $('#username').val();
    const message = $('#message-box').val();

    // Логування даних перед відправкою
    console.log("Відправка повідомлення: ", { username: username, message: message });

    $.ajax({
        url: "send_message.php",
        method: "POST",
        data: { username: username, message: message },
        success: function(response) {
            console.log("Відповідь від сервера: ", response);  // Відображаємо відповідь
            $('#message-box').val('');  // Очищення поля після відправки
            loadMessages();  // Оновлення чату
        },
        error: function(jqXHR, textStatus, errorThrown) {
            console.log("Помилка AJAX: " + textStatus + ", " + errorThrown);
        }
    });
});
