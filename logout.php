<?php
// Стартуємо сесію
session_start();

// Завершуємо сесію
session_unset();
session_destroy();

// Перенаправляємо на головну сторінку або сторінку входу
header("Location: index.php");
exit();
?>
