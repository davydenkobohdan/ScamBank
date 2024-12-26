<?php
// Стартуємо сесію
session_start();

// Перевірка, чи є повідомлення про успішне видалення
$delete_success = isset($_SESSION['delete_success']) ? $_SESSION['delete_success'] : false;

// Видаляємо повідомлення після його відображення
if ($delete_success) {
    unset($_SESSION['delete_success']);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ScamBank</title>
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
            position: absolute;
            top: 48%;
            left: 50%;
            transform: translate(-50%, -50%);
            padding: 20px;
            max-width: 400px;
            background-color: rgba(255, 255, 255, 0.9);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            text-align: center;
        }
        h1 {
            margin-bottom: 20px;
        }
        p {
            font-size: 16px;
            margin-bottom: 20px;
        }
        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            background-color: #4CAF50;
            text-decoration: none;
            border-radius: 5px;
            margin: 10px 5px;
            transition: background-color 0.3s;
        }
        .btn:hover {
            background-color: #388E3C;
        }
        .error-message {
        position: absolute;
        top: calc(50% - 235px); /* Відступаємо від центру вгору */
        left: 50%;
        transform: translate(-50%, 0);
        background-color: #f44336;
        color: white;
        padding: 15px;
        border-radius: 10px;
        text-align: center;
        max-width: 400px;
        font-size: 16px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
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
    </style>
</head>
<body>
    <div class="header">
        <div class="bank-name">
            <img src="images/logo.png" alt="ScamBank Logo" class="logo">
        </div>
        <div class="nav-buttons">
            <a href="#">MasterScam Advanced</a>
            <a href="terms.php">Умови користування</a>
            <a href="tarifs.php">Наші тарифи</a>
            <a href="about.php">Про нас</a>
        </div>
    </div>

    <!-- Вивід сповіщення -->
    <?php if ($delete_success): ?>
        <div class="error-message" id="errorMessage">
            <?php echo htmlspecialchars($delete_success); ?>
        </div>
    <?php endif; ?>

    <div class="container">
        <h1>Ласкаво просимо до ScamBank</h1>
        <?php if (isset($_SESSION['user'])): ?>
            <p>Вітаємо, <strong><?php echo htmlspecialchars($_SESSION['user']['name']); ?></strong>!</p>
            <a href="profile.php" class="btn">Перейти до профілю</a>
        <?php else: ?>
            <p>Станьте частиною нашого банку вже сьогодні!</p>
            <a href="login.php" class="btn">Увійти</a>
            <a href="register.php" class="btn">Реєстрація</a>
        <?php endif; ?>
    </div>

    <footer>
        <p>ScamBank © 2024</p>
        <p style="font-size: 14px; margin: 5px 0;">
            Телефон: <strong>+380 44 123 45 67</strong> | 
            Email: <strong><a href="mailto:info@scambank.com" style="color: #BBDEFB;">info@scambank.com</a></strong> | 
            Адреса: <strong>вул. Банкова, 1, Київ</strong>
        </p>
    </footer>

    <script>
        <?php if ($delete_success): ?>
            setTimeout(function() {
                const errorMessage = document.getElementById('errorMessage');
                if (errorMessage) {
                    errorMessage.style.display = 'none';
                }
            }, 5000);
        <?php endif; ?>
    </script>
</body>
</html>
