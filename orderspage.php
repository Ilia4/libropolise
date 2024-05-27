<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/orderspage.css">
</head>
<body>
    <?php require_once("connect.php") ?>
    <?php require_once("header.php") ?>
    <?php session_start() ?>
    <div class="container">
        <div class="orders-contain">

        <?php 
        if(isset($_SESSION['user']['id'])){

        
        $iduser = $_SESSION['user']['id'];
   // Подключение к базе данных (замените данными вашей базы)

if (!$connect) {
    die("Ошибка подключения к базе данных: " . mysqli_connect_error());
}

// SQL-запрос (предполагая, что таблица называется "orders")
$sql = "SELECT *
    FROM orders
    WHERE id_user = $iduser
    ORDER BY time ASC"; // Сортировка по времени при получении данных

$result = mysqli_query($connect, $sql);

if (!$result) {
    die("Ошибка при выполнении запроса: " . mysqli_error($connect));
}

$grouped_orders = mysqli_fetch_all($result, MYSQLI_ASSOC);

// Группировка по времени (дата, час, минута, секунда)
$orders_by_datetime = [];
foreach ($grouped_orders as $order) {
  $datetime = $order['time']; 
  if (!isset($orders_by_datetime[$datetime])) {
    $orders_by_datetime[$datetime] = [];
  }
  $orders_by_datetime[$datetime][] = $order;
}
if (empty($orders_by_datetime)) {
    echo "<h2>У вас пока нет заказов.<h2>";
  } else {
// Вывод блоков по времени
foreach ($orders_by_datetime as $datetime => $orders) {
  echo '<h2>Заказ от ' . $datetime . '</h2>';
  echo '<table>';
  echo '<thead><tr><th>ID книги</th><th>Количество</th><th>Время</th></tr></thead>';
  echo '<tbody>';
  foreach ($orders as $order) {
    echo '<tr>';
    echo '<td>' . $order['id_book'] . '</td>';
    echo '<td>' . $order['quantity'] . '</td>';
    echo '<td>' . $order['time'] . '</td>';
    echo '</tr>';
  }
  echo '</tbody>';
  echo '</table>';
}

mysqli_close($connect); // Закрытие соединения с базой данных
  }
}
else{
  echo"<h3 class='non-autoriz-user'>Необходимо авторизоваться</h3>";
}
    ?>
    </div>
    
</div>
</body>
</html>