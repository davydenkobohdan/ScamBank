<?php
// Стартуємо сесію
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Про нас - ScamBank</title>
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
            text-align: center;
        }

        h1 {
            margin-bottom: 20px;
        }

        .team-member {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-bottom: 30px;
        }

        .team-member img {
            border-radius: 50%;
            margin-right: 20px;
            width: 125px;
            height: 125px;
        }

        .team-member div {
            text-align: left;
        }

        .team-member h3 {
            margin: 10px 0;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: white;
            background-color: #4CAF50;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
            transition: background-color 0.3s;
        }

        .btn:hover {
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
        p {
            font-size: 16px;
            margin-bottom: 20px;
        }

        .about-text {
            text-align: left;
            margin-top: 20px;
            line-height: 1.6;
            font-size: 17px;
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
        <h1>Про нас</h1>
        <p>Ми є командою професіоналів, які вирішили створити ScamBank, щоб змінити фінансову галузь на краще. Ось наша команда:</p>

        <div class="team-member">
            <img src="images/bogdan.jpg" alt="Фото Богдана">
            <div>
                <h3>Богдан</h3>
                <p>Засновник та керуючий. Богдан є головною особою у нашому банку, який започаткував цей проєкт із метою створити інноваційний фінансовий продукт для всіх.</p>
            </div>
        </div>

        <div class="team-member">
            <img src="images/kyrylo.jpg" alt="Фото Кирила">
            <div>
                <h3>Кирило</h3>
                <p>Співзасновник та технічний директор. Кирило відповідає за технічну сторону банку, забезпечуючи надійність і безпеку наших систем.</p>
            </div>
        </div>

        <div class="team-member">
            <img src="images/yevhen1.jpg" alt="Фото Євгенія">
            <div>
                <h3>Євгеній</h3>
                <p>Фінансовий директор. Євгеній керує фінансовими питаннями банку, розробляє стратегії для забезпечення стабільного розвитку.</p>
            </div>
        </div>

        <div class="about-text">
            <h2>Наша історія</h2>
            <p>ScamBank був створений трьома друзями, які завжди прагнули змінити підхід до банківських послуг. Наш шлях почався кілька років тому, коли ми, спостерігаючи за традиційними банками, зрозуміли, що є потреба у новому підході до фінансових послуг: безпечному, швидкому та зручному. Ідея створення ScamBank виникла, коли ми вирішили, що можемо забезпечити для наших клієнтів такий рівень сервісу, який перевершить усі очікування.</p>
            
            <p>Ми розпочали з невеликої команди, але з великою амбіцією. Протягом кількох років ми працювали над розробкою технологій, що забезпечують безпеку та ефективність фінансових операцій, а також сприяють розвитку інноваційних фінансових продуктів. Наш банк поєднує найкращі традиції з новітніми технологіями, що робить його ідеальним вибором для кожного, хто шукає фінансові рішення для майбутнього.</p>
            
            <p>Наша мета — забезпечити наших клієнтів не тільки безпекою, але й комфортом у взаємодії з банківськими послугами, та стати надійним партнером для кожної людини, яка хоче отримати найкраще з того, що може запропонувати сучасний фінансовий ринок.</p>
        </div>

        <a href="index.php" class="btn">Назад на головну</a>
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
