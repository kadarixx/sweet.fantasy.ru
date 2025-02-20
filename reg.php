<?php
// Подключаемся к базе данных
$servername = "projectformjs"; // Имя сервера
$username = "root"; // Имя пользователя базы данных
$password = ""; // Пароль базы данных
$dbname = "bulka"; // Имя базы данных

// Создаем подключение
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверяем подключение
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

// Получаем данные из формы
$user_name = $_POST['username'];
$user_email = $_POST['email'];
$user_pass = $_POST['password'];



// Создаем SQL-запрос
$sql = "INSERT INTO users (name, email, password) VALUES ('$user_name', '$user_email', '$user_pass')";

// Выполняем SQL-запрос
if ($conn->query($sql) === TRUE) {
    echo "Данные успешно сохранены!";
} else {
    echo "Ошибка: " . $sql . "<br>" . $conn->error;
}

// Закрываем подключение
$conn->close();
?>

