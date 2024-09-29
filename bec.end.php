<?php
// Підключення до бази даних MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "users_db";

// Створення підключення
$conn = new mysqli($servername, $username, $password, $dbname);

// Перевірка підключення
if ($conn->connect_error) {
    die("Підключення не вдалося: " . $conn->connect_error);
}

// Отримання даних з форми
$email = $_POST['email'];
$password = $_POST['password'];

// Захист від SQL-ін'єкцій
$email = $conn->real_escape_string($email);
$password = $conn->real_escape_string($password);

// Шифрування пароля
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// SQL-запит для вставки даних у таблицю
$sql = "INSERT INTO users (email, password) VALUES ('$email', '$hashed_password')";

if ($conn->query($sql) === TRUE) {
    echo "Дані збережено успішно! <br><a href='view_users.php'>Переглянути користувачів</a>";
} else {
    echo "Помилка: " . $sql . "<br>" . $conn->error;
}

// Закриття підключення
$conn->close();
?>
