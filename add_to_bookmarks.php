<?php

require_once("connect.php");

// 1. Получение book_id и user_id из запроса
$bookId = isset($_POST['bookId']) ? $_POST['bookId'] : null;
$userId = isset($_POST['userId']) ? $_POST['userId'] : null;

// 2. Валидация данных
if (empty($bookId) || empty($userId)) {
    $response = array('success' => false, 'error' => 'Не указаны ID книги или пользователя');
    echo json_encode($response);
    exit;
}

$connect->query("INSERT INTO `bookmarks`(`id_book`, `id_user`) VALUES ('$bookId','$userId')");

// 4. Отправка ответа
echo json_encode($response);
$connect->close();
?>