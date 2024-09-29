<?php
// Підключення до бази даних
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

// SQL-запит для вибірки даних
$sql = "SELECT id, email, password FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<h2>Користувачі</h2>";
    echo "<table border='1'><tr><th>ID</th><th>Email</th><th>Пароль (Захешований)</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["email"]. "</td><td>" . $row["password"]. "</td></tr>";
    }
    echo "</table>";
} else {
    echo "Немає збережених даних.";
}

// Закриття підключення
$conn->close();
?>
