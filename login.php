<?php
// Стартуємо сесію
ob_start();
session_start();
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
            gap: 10px; /* Зменшений відступ між полями */
        }
        input[type="text"], input[type="submit"] {
            padding: 8px 12px; /* Зменшене поле для введення */
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
        .error {
            color: red;
            margin-bottom: 10px;
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
        <h1>Вхід в ScamBank</h1>
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

            $query = "SELECT * FROM client WHERE name = '$name' AND phone = '$phone'";
            $result = mysqli_query($connection, $query);

            if (mysqli_num_rows($result) > 0) {
                session_start();
                $_SESSION['user'] = mysqli_fetch_assoc($result);
                header("Location: profile.php");
                exit();
            } else {
                $error = "Невірне ім'я або номер телефону!";
            }
        }
        ?>

        <?php if (!empty($error)): ?>
            <p class="error"><?php echo htmlspecialchars($error); ?></p>
        <?php endif; ?>

        <form method="POST" action="">
            <label for="name">Ім'я:</label>
            <input type="text" name="name" id="name" required>
            <label for="phone">Номер телефону:</label>
            <input type="text" name="phone" id="phone" required>
            <input type="submit" value="Увійти">
        </form>

        <p>Ще не зареєстровані? <a href="register.php" class="btn">Реєстрація</a></p>
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
