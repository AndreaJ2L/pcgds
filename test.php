<?php
$answers = [
    'image1' => false,
    'image2' => true,  
    'image3' => false
];

$result = '';
if (isset($_POST['answer'])) {
    $selected_answer = $_POST['answer'];
    if (isset($answers[$selected_answer]) && $answers[$selected_answer] === true) {
        $result = 'Відповідь правильна!';
    } else {
        $result = 'Відповідь неправильна. Спробуйте ще раз.';
    }
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Тест з вибором малюнка</title>
    <link rel="stylesheet" href="styles2.css">
</head>
<body>

<h2>Виберіть малюнок з ноутбуком:</h2>

<form method="post">
    <div class="image-container">
        <label>
            <input type="radio" name="answer" value="image1" required>
            <img src="images/image1.jpg" alt="Малюнок 1">
        </label>
        <label>
            <input type="radio" name="answer" value="image2">
            <img src="images/image2.jpg" alt="Малюнок 2">
        </label>
        <label>
            <input type="radio" name="answer" value="image3">
            <img src="images/image3.jpg" alt="Малюнок 3">
        </label>
    </div>
    <button type="submit">Перевірити відповідь</button>
</form>


<?php if ($result): ?>
    <p><?php echo $result; ?></p>
<?php endif; ?>

<p><a href="index.php">Повернутися на головну сторінку</a></p>

</body>
</html>
