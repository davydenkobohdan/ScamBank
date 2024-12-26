<?php
// Стартуємо сесію
session_start();

// Перевірка, чи є користувач в сесії
if (!isset($_SESSION['user'])) {
    header("Location: login.php");
    exit();
}

// Підключення до бази даних
$connection = mysqli_connect('localhost', 'root', '', 'bank1');

// Перевірка підключення
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Отримуємо список менеджерів
$query = "SELECT id, name FROM manager"; // Замінили 'managers' на 'manager' (відповідно до твоєї БД)
$result = mysqli_query($connection, $query);

$managers = [];
while ($row = mysqli_fetch_assoc($result)) {
    $managers[] = $row;
}

// Обробка форми після її відправки
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sum = $_POST['sum'];
    $stavka = $_POST['stavka'];
    $manager_id = $_POST['manager_id']; // ID менеджера, що вибраний користувачем
    $client_id = $_SESSION['user']['id']; // ID клієнта з сесії

    // Додаємо кредит до бази даних
    $query = "INSERT INTO credit (sum, stavka, status, client_id, manager_id) 
              VALUES ('$sum', '$stavka', 'Відкритий', '$client_id', '$manager_id')";
    
    if (mysqli_query($connection, $query)) {
        // Створюємо сесію для повідомлення
        $_SESSION['credit_success'] = true; 
        // Перенаправляємо користувача в профіль
        header("Location: profile.php");
        exit();
    } else {
        echo "Помилка при оформленні кредиту: " . mysqli_error($connection);
    }

    mysqli_close($connection);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Оформлення кредиту</title>
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
            margin: 60px auto;
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

        form {
            display: flex;
            flex-direction: column;
            gap: 8px; /* Зменшений відступ між полями */
        }

        input[type="number"], select, input[type="submit"] {
            padding: 7px 11px; /* Зменшене поле для введення */
            font-size: 14px; /* Зменшений розмір шрифта */
            border: 1px solid #ccc;
            border-radius: 5px;
            width: 100%;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
            border: none;
        }

        input[type="submit"]:hover {
            background-color: #388E3C;
        }

        .btn {
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            display: inline-block;
            margin: 10px 0;
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
        <h1>Оформлення кредиту</h1>
        <form method="POST" action="">
            <label for="sum">Сума кредиту:</label>
            <input type="number" name="sum" id="sum" required>
            <label for="stavka">Ставка:</label>
            <input type="number" name="stavka" id="stavka" required>
            <label for="manager_id">Менеджер:</label>
            <select name="manager_id" id="manager_id" required>
                <?php
                // Виводимо список менеджерів
                foreach ($managers as $manager) {
                    echo "<option value='" . $manager['id'] . "'>" . $manager['name'] . "</option>";
                }
                ?>
            </select>
            <input type="submit" value="Оформити кредит" class="btn">
        </form>
        <br>
        <a href="profile.php" class="btn">Повернутися до профілю</a>
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
