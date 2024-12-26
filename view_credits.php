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

// Підключення до бази даних
$servername = "localhost";
$username = "root";  // зміни на правильний логін
$password = "";      // зміни на правильний пароль
$dbname = "bank1";    // назва твоєї бази даних

$conn = new mysqli($servername, $username, $password, $dbname);

// Перевірка з'єднання
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Отримуємо кредити користувача з бази даних, включаючи ім'я менеджера через JOIN
$sql = "SELECT credit.sum, credit.stavka, credit.status, manager.name AS manager_name
        FROM credit
        JOIN manager ON credit.manager_id = manager.id
        WHERE credit.client_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user['id']);
$stmt->execute();
$result = $stmt->get_result();

$credits = [];
while ($row = $result->fetch_assoc()) {
    $credits[] = $row;
}
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Перегляд кредитів</title>
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
        .container {
            width: 80%;
            margin: 40px auto;
            padding: 20px;
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            flex: 1;
            text-align: center;
        }

        h1 {
            color: #333;
            text-align: center;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        .credit-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .credit-table th, .credit-table td {
            padding: 12px;
            text-align: center;
            border: 1px solid #ddd;
        }

        .credit-table th {
            background-color: #28a745;
            color: white;
        }

        .credit-table tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .credit-table tr:hover {
            background-color: #f1f1f1;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
            text-align: center;
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
    </style>
</head>
<body>

    <div class="header">
    <div class="bank-name">
            <img src="images/logo.png" alt="ScamBank Logo" class="logo">
    </div>
    </div>

    <div class="container">
        <h1>Перегляд кредитів</h1>

        <h2>Ваші кредити:</h2>

        <?php if (count($credits) > 0): ?>
            <table class="credit-table">
                <tr>
                    <th>Сума</th>
                    <th>Ставка</th>
                    <th>Статус</th>
                    <th>Менеджер</th>
                </tr>
                <?php foreach ($credits as $credit): ?>
                    <tr>
                        <td><?php echo $credit['sum']; ?> грн</td>
                        <td><?php echo $credit['stavka']; ?>%</td>
                        <td><?php echo $credit['status']; ?></td>
                        <td><?php echo $credit['manager_name']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </table>
        <?php else: ?>
            <p>У вас немає активних кредитів.</p>
        <?php endif; ?>

        <a href="profile.php" class="btn">Назад до профілю</a>
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
