<?php
// Підключення до бази даних
$connection = mysqli_connect('localhost', 'root', '', 'bank1');

// Перевірка підключення
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = mysqli_real_escape_string($connection, $_POST['name']);
    $phone = mysqli_real_escape_string($connection, $_POST['phone']);
    $address = mysqli_real_escape_string($connection, $_POST['address']);

    // Перевірка наявності користувача
    $query = "SELECT * FROM client WHERE phone = '$phone'";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) > 0) {
        $error = "Цей номер телефону вже зареєстрований.";
    } else {
        $insert_query = "INSERT INTO client (name, phone, adress) VALUES ('$name', '$phone', '$address')";
        if (mysqli_query($connection, $insert_query)) {
            header("Location: login.php");
            exit();
        } else {
            $error = "Помилка при реєстрації: " . mysqli_error($connection);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Реєстрація в ScamBank</title>
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
        .header {
            background-color: #4CAF50;
            color: white;
            padding: 5px 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .container {
            margin: 55px auto;
            padding: 15px;
            max-width: 350px;
            background-color: rgba(255, 255, 255, 0.9);
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            text-align: center;
        }
        h1 {
            margin-bottom: 15px;
            font-size: 22px;
        }
        form {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }
        input[type="text"], input[type="submit"] {
            padding: 8px;
            font-size: 14px;
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
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #388E3C;
        }
        .btn {
            padding: 8px 15px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 14px;
            display: inline-block;
            margin: 5px 0;
            transition: background-color 0.3s;
        }
        .btn:hover {
            background-color: #218838;
        }
        .error {
            color: red;
            margin-bottom: 10px;
            font-size: 14px;
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
        <h1>Зареєструйтесь у ScamBank</h1>
        <?php if (!empty($error)): ?>
            <p class="error"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>
        <form method="POST" action="">
            <label for="name">Ім'я:</label>
            <input type="text" name="name" id="name" required>
            <label for="phone">Номер телефону:</label>
            <input type="text" name="phone" id="phone" required>
            <label for="address">Місце проживання:</label>
            <input type="text" name="address" id="address" required>
            <input type="submit" value="Зареєструватися">
        </form>
        <p>Вже маєте акаунт? <a href="login.php" class="btn">Увійти</a></p>
        <a href="index.php" class="btn">Повернутися на головну</a>
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
