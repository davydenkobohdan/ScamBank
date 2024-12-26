<?php
// Стартуємо сесію
session_start();

// Перевірка, чи є користувач в сесії
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

// Отримуємо дані користувача з сесії
$user = $_SESSION['user'];

// Перевірка на наявність повідомлення про успішне оформлення кредиту
$credit_success = isset($_SESSION['credit_success']) ? $_SESSION['credit_success'] : false;

// Після відображення повідомлення, видаляємо його
if ($credit_success) {
    unset($_SESSION['credit_success']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Профіль користувача</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            margin: 0;
            font-family: 'Arial', sans-serif;
            background-color: rgba(76, 175, 80, 0.4);
            background-image: 
                radial-gradient(circle, rgba(255, 255, 255, 0.2) 1%, transparent 20%),
                radial-gradient(circle, rgba(255, 255, 255, 0.2) 1%, transparent 20%);
            background-size: 40px 40px; /* Розмір хвиль */
            background-position: 0 0, 20px 20px; /* Зміщення для створення хвиль */
            color: #333;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .header {
            background-color: #4CAF50;
            color: white;
            padding: 5px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .bank-name {
            font-size: 24px;
            font-weight: bold;
            display: flex;
            align-items: center;
        }
        .logo {
            height: 55px;
            vertical-align: middle;
        }
        .nav-buttons {
            display: flex;
            gap: 10px;
        }
        .nav-buttons a {
            color: white;
            text-decoration: none;
            padding: 8px 12px;
            background-color: #388E3C;
            border-radius: 5px;
            font-size: 14px;
        }
        .nav-buttons a:hover {
            background-color: #2E7D32;
        }
        .container {
            margin: 35px auto;
            padding: 20px;
            max-width: 350px; /* Зменшена ширина контейнера */
            background-color: rgba(255, 255, 255, 0.9);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            text-align: center;
        }
        h1 {
            margin-bottom: 20px;
        }
        .success-message {
            background-color: #28a745;
            color: white;
            padding: 15px;
            border-radius: 10px;
            margin-bottom: 20px;
            text-align: center;
            font-size: 18px;
            display: none;
        }

        .btn {
            display: block;  /* Змінено на block для відображення кожної кнопки на новому рядку */
            width: 250px;    /* Встановлюємо фіксовану ширину */
            margin: 10px auto; /* Центруємо кнопки */
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            text-align: center;
            font-size: 16px;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #218838;
        }

        footer {
            margin-top: auto;
            padding: 10px 20px;
            background-color: #2E7D32; /* Трохи темніше для контрасту */
            color: white;
            text-align: center;
            font-size: 14px; /* Менший розмір тексту */
            line-height: 1; /* Покращення читабельності */
        }
        footer a {
            color: #BBDEFB; /* Відповідний відтінок для посилань */
            text-decoration: none;
        }
        footer a:hover {
            text-decoration: underline;
        }
        p {
            font-size: 16px;
            margin-bottom: 20px;
        }
        .delete-form {
        text-align: center; /* Вирівнювання по центру */
    }

    .delete-btn {
        background-color: #dc3545; /* Червоний колір кнопки */
    }

    .delete-btn:hover {
        background-color: #c82333; /* Темніший червоний при наведенні */
    }
    </style>
</head>
<body>
    <div class="header">
    <div class="bank-name">
            <img src="images/logo.png" alt="ScamBank Logo" class="logo">
    </div>
    </div>

    <div class="container">
        <!-- Якщо є повідомлення про успішне оформлення кредиту -->
        <?php if ($credit_success): ?>
            <div class="success-message" id="successMessage">Кредит успішно оформлено!</div>
        <?php endif; ?>

        <h2>Інформація про вас</h2>
        <p>Ім'я: <?php echo htmlspecialchars($user['name']); ?></p>
        <p>Номер телефону: <?php echo htmlspecialchars($user['phone']); ?></p>
        <p>Місце проживання: <?php echo htmlspecialchars($user['adress']); ?></p>

        <!-- Кнопки для профілю -->
        <a href="index.php" class="btn">Повернутися на головну</a>
        <a href="apply_credit.php" class="btn">Оформити кредит</a>
        <a href="view_credits.php" class="btn">Переглянути кредити</a>
        <a href="logout.php" class="btn">Вийти</a>

    </div>
<!-- Кнопка для видалення користувача -->
<form method="POST" action="delete_account.php" onsubmit="return confirm('Ви впевнені, що хочете видалити свій обліковий запис цього чудово банку?');" class="delete-form">
    <button type="submit" class="btn delete-btn">Видалити обліковий запис</button>
</form>

    <footer>
        <p>ScamBank © 2024</p>
        <p style="font-size: 14px; margin: 5px 0;">
            Телефон: <strong>+380 44 123 45 67</strong> | 
            Email: <strong><a href="mailto:info@scambank.com" style="color: #BBDEFB;">info@scambank.com</a></strong> | 
            Адреса: <strong>вул. Банкова, 1, Київ</strong>
        </p>
    </footer>

    <script>
        // Якщо є повідомлення про успішне оформлення кредиту
        <?php if ($credit_success): ?>
            // Показуємо повідомлення
            document.getElementById('successMessage').style.display = 'block';

            // Через 5 секунд ховаємо повідомлення
            setTimeout(function() {
                document.getElementById('successMessage').style.display = 'none';
            }, 5000);
        <?php endif; ?>
    </script>
</body>
</html>
