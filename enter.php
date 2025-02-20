<?php
// Настройки подключения к базе данных
$servername = "projectformjs";
$db_username = "root";
$db_password = "";
$db_name = "bulka"; // Замените на имя вашей базы данных

// Подключаемся к базе данных
$conn = new mysqli($servername, $db_username, $db_password, $db_name);

// Проверяем подключение
if ($conn->connect_error) {
    die("Ошибка подключения: " . $conn->connect_error);
}

// Получаем данные из формы
$username = $_POST['username'];
$password = $_POST['password'];

// Подготавливаем SQL-запрос для проверки пользователя
$sql_check = "SELECT * FROM users WHERE name = ?";
$stmt_check = $conn->prepare($sql_check);
$stmt_check->bind_param("s", $username);
$stmt_check->execute();
$result = $stmt_check->get_result();

// Проверяем, найден ли пользователь
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
    
    // Проверяем пароль
    if ($password == $user['password']) {
        // Пароль правильный — пользователь авторизован
        echo "Добро пожаловать, " . $user['username'] . "!";
        // Здесь можно установить сессию для авторизованного пользователя
        #session_start();
        #$_SESSION['username'] = $user['username'];
        // Перенаправляем на защищенную страницу
        #header("Location: dashboard.php");
        #exit();
    } else {
        // Неверный пароль
        echo "Неправильный пароль. Попробуйте снова.";
    }
} else {
    // Пользователь с таким именем не найден
    echo "Пользователь не найден.";
}

// Закрываем подключение
$stmt_check->close();
$conn->close();
?>
