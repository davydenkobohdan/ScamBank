<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Наші Тарифи | ScamBank</title>
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
        .container {
            margin: 25px auto;
            padding: 20px;
            max-width: 1090px;
            background-color: rgba(255, 255, 255, 0.9);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            text-align: center;
            display: flex;
            justify-content: space-between;
            gap: 20px;
            flex-wrap: wrap; /* Забезпечує коректне розташування на малих екранах */
        }
        h1 {
            margin-bottom: 20px;
            width: 100%;
            text-align: center;
        }
        .tariff-card {
            background-color: #e1f5e1;
            padding: 20px;
            margin-bottom: 10px;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            flex-basis: 30%; /* Кожен тариф займає 30% ширини контейнера */
            text-align: center;
            box-sizing: border-box;
        }
        .tariff-card h2 {
            color: #388E3C;
        }
        .tariff-card p {
            font-size: 16px;
            color: #555;
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
            text-align: center;
        }
        .back-button:hover {
            background-color: #388E3C;
        }
        footer {
            margin-top: auto;
            padding: 10px 20px;
            background-color: #2E7D32;
            color: white;
            text-align: center;
            font-size: 14px;
            line-height: 1;
        }
        footer a {
            color: #BBDEFB;
            text-decoration: none;
        }
        footer a:hover {
            text-decoration: underline;
        }
        p {
            font-size: 16px;
            margin-bottom: 20px;
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
        <h1>Наші Тарифи</h1>
        <div class="tariff-card">
            <h2>MasterScam+</h2>
            <p>Ось він, наш золотий стандарт! Плата за доступ до найкращих фінансових маніпуляцій: ми забираємо лише <strong>10%</strong> ваших коштів. Чому? Бо ми віддаємо ще більше – надійність, стабільність і трохи гумору в кожній операції. Ідеально підходить для тих, хто хоче, щоб його гроші працювали ще менше, але в найкращих умовах.</p>
        </div>

        <div class="tariff-card">
            <h2>SuperScam</h2>
            <p>Якщо вам мало і ви хочете більше, ми тут, щоб задовольнити ваші амбіції. Обирайте SuperScam, і ми заберемо лише <strong>20%</strong> ваших коштів. Зате що ви отримаєте: максимальний комфорт, мінімум втручання, і найкращий досвід в індустрії. Це все для тих, хто не боїться йти на великі ставки.</p>
        </div>

        <div class="tariff-card">
            <h2>BasicScam</h2>
            <p>Для тих, хто лише починає свій шлях у світі фінансових маніпуляцій. Не переживайте, ми заберемо лише <strong>30%</strong> ваших коштів, і ви вже зможете відчути себе частиною великої афери. Ідеальний тариф для тих, хто хоче більше дізнатися, але без зайвого ризику. Ідеальний старт для вашої кар'єри у світі ScamBank.</p>
        </div>

        <!-- Кнопка повернення на головну -->
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
