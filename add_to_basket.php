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

// 3. Подготовка и выполнение SQL запроса
try {
    $checkSql = "SELECT * FROM basket WHERE id_user = ? AND id_book = ?";
    $checkStmt = $connect->prepare($checkSql);
    $checkStmt->bind_param("ii", $userId, $bookId);
    $checkStmt->execute();
    $checkResult = $checkStmt->get_result();

    if ($checkResult->num_rows > 0) {
        $updateSql = "UPDATE basket SET quantity = quantity + 1 WHERE id_user = ? AND id_book = ?";
        $updateStmt = $connect->prepare($updateSql);
        $updateStmt->bind_param("ii", $userId, $bookId);
        $updateStmt->execute();
    } else {
        $insertSql = "INSERT INTO basket (id_user, id_book, quantity) VALUES (?, ?, 1)";
        $insertStmt = $connect->prepare($insertSql);
        $insertStmt->bind_param("ii", $userId, $bookId);
        $insertStmt->execute();
    }

    $response = array('success' => true);
} catch (Exception $e) {
    $response = array('success' => false, 'error' => 'Ошибка базы данных: ' . $e->getMessage());
}

// 4. Отправка ответа
echo json_encode($response);
$connect->close();
?>