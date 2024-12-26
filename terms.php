<?php
// Стартуємо сесію
session_start();

// Назва файлу: terms.php
// Опис: Сторінка "Умови користування" для ScamBank.
// Автори: Богдан, Кирило, Євгеній
// Дата створення: 2024-12-09
?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Умови користування | ScamBank</title>
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
            margin: 40px auto;
            padding: 20px;
            max-width: 800px;
            background-color: rgba(255, 255, 255, 0.9);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        h1 {
            margin-bottom: 20px;
        }
        p {
            font-size: 16px;
            margin-bottom: 20px;
        }
        .back-button {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            background-color: #4CAF50;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }
        .back-button:hover {
            background-color: #388E3C;
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
    </style>
</head>
<body>

    <div class="header">
    <div class="bank-name">
            <img src="images/logo.png" alt="ScamBank Logo" class="logo">
    </div>
    </div>

    <div class="container">
        <h1>Умови користування</h1>
        <p><strong>Ласкаво просимо до ScamBank!</strong> Ми завжди чесні з нашими клієнтами, наскільки це дозволяє наш статус.</p>
        <p>1. Усі кошти, які ви нам передаєте, стають нашими. Це чесно, бо ми так вирішили.</p>
        <p>2. Ми не гарантуємо повернення коштів, але можемо дати обіцянку, яку заберемо назад через 5 хвилин.</p>
        <p>3. Використання наших послуг означає, що ви розумієте: жодної відповідальності ми не несемо, але дякуємо за довіру!</p>
        <p>4. Ми залишаємо за собою право змінювати умови, поки ви читаєте цей текст.</p>
        <p>5. Використовуючи наш банк, ви погоджуєтесь на всі наші умови, навіть якщо їх не читали.</p>
        <p>Для більш детальної інформації пишіть на <a href="mailto:info@scambank.com">info@scambank.com</a>.</p>
        <a href="index.php" class="back-button">Повернутися на головну</a>
    </div>

    <footer>
        <p>ScamBank © 2024</p>
        <p style="font-size: 14px; margin: 5px 0;">
            Телефон: <strong>+380 44 123 45 67</strong> | 
            Email: <strong><a href="mailto:info@scambank.com" style="color: #BBDEFB;">info@scambank.com</a></strong> | 
            Адреса: <strong>вул. Банкова, 1, Київ</strong>
        </p>
    </footer>

</body>
</html>
