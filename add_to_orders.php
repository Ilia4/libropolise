<?php
require_once("connect.php");
$conn = $connect; // Предполагается, что connect.php возвращает объект mysqli

$userid = $_POST['iduser'];
// ID авторизованного пользователя
$user_id = $userid; 

// Получение текущего времени
$current_time = date('Y-m-d H:i:s');

// 1. Отключение автоматического подтверждения транзакций
mysqli_autocommit($conn, false);

try {
    // 2. Получение данных из корзины
    $result = mysqli_query($conn, "SELECT id_book, quantity FROM basket WHERE id_user = '$user_id'");

    if (!$result) {
        throw new Exception("Ошибка при выборке данных из корзины: " . mysqli_error($conn));
    }

    $basket_items = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // 3. Вставка данных в таблицу orders
    foreach ($basket_items as $item) {
        $sql = "INSERT INTO orders (id_book, id_user, quantity, time) VALUES ('{$item['id_book']}', '$user_id', '{$item['quantity']}', '$current_time')";

        if (!mysqli_query($conn, $sql)) {
            throw new Exception("Ошибка при вставке данных в orders: " . mysqli_error($conn));
        }
    }

    // 4. Очистка корзины
    $sql = "DELETE FROM basket WHERE id_user = '$user_id'";
    if (!mysqli_query($conn, $sql)) {
        throw new Exception("Ошибка при очистке корзины: " . mysqli_error($conn));
    }

    // 5. Подтверждение транзакции
    mysqli_commit($conn);

    echo "Данные успешно перенесены!";
    header("Location:profilepage.php");
} catch (Exception $e) {
    // Откат транзакции в случае ошибки
    mysqli_rollback($conn);
    echo "Ошибка при переносе данных: " . $e->getMessage();
}

// Включение автоматического подтверждения транзакций (опционально)
mysqli_autocommit($conn, true);