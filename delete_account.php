<?php
// Стартуємо сесію
session_start();

// Перевірка, чи є користувач в сесії
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

// Підключення до бази даних
$db = new mysqli('localhost', 'root', '', 'bank1');

if ($db->connect_error) {
    die("Помилка підключення до бази даних: " . $db->connect_error);
}

// Отримуємо ID користувача з сесії
$user = $_SESSION['user'];
$user_id = $user['id'];

// Видаляємо користувача
$delete_query = "DELETE FROM `client` WHERE `id` = ?";
$stmt = $db->prepare($delete_query);
$stmt->bind_param("i", $user_id);

if ($stmt->execute()) {
    // Видаляємо сесію користувача після успішного видалення
    session_unset();
    session_destroy();

    // Додаємо повідомлення про успішне видалення
    session_start();
    $_SESSION['delete_success'] = "Ваш обліковий запис успішно видалений.";

    // Повертаємося на головну сторінку
    header("Location: index.php");
    exit();
} else {
    // Помилка видалення
    echo "Помилка при видаленні користувача.";
}

$stmt->close();
$db->close();
?>
