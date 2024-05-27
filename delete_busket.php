<?php
require_once('connect.php');
if (isset($_GET['id_book']) && isset($_GET['id_user'])) {
  $id_book = $_GET['id_book'];
  $id_user = $_GET['id_user'];
  // SQL-запрос для удаления записи
  $sql = "DELETE FROM basket WHERE id_book = ? AND id_user = ?";
  $stmt = $connect->prepare($sql);
  $result = $stmt->execute([$id_book, $id_user]);

  // Возвращаем JSON-ответ
  echo json_encode([
    'success' => $result,
  ]);
}else{
    echo'нету данных';
}
?>