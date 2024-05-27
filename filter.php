<?php 
require_once('connect.php'); // Подключение к базе данных

$categories = isset($_POST['categories']) ? $_POST['categories'] : [];
$sort = isset($_POST['sort']) ? $_POST['sort'] : '';
// Формирование SQL-запроса с учетом фильтрации
$sql = "SELECT * FROM colection WHERE 1=1";

if (!empty($categories)) {
  $sql .= " AND genre IN ('" . implode("','", $categories) . "')";
}
if (!empty($sort)) {
  switch ($sort) {
    case 'newest':
      $sql .= " ORDER BY id_book DESC"; // Сортировка по id (предполагая, что id увеличивается с добавлением новых книг)
      break;
    case 'price_asc':
      $sql .= " ORDER BY price ASC";
      break;
    case 'price_desc':
      $sql .= " ORDER BY price DESC";
      break;
  }
}
$result = $connect->query($sql);

$html = '';
if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $html .= '<div class="book">
    <div class="photo-block">
        <img src="'.$row['photo'].'" />
    </div>
    <div class="price-block">
        <h4>'.$row['price'].' ₽</h4>
   </div>
    <div class="title">
        <a href="detailproduct.php?id_book='.$row['id_book'].'" class="tittle-book">'.$row['title'].'</a>
        <h4>'.$row['autor'].'<h4>
   </div>
    <div class="action-buttons-block-book">
        <button class="buy">Купить</button>
        <button class="add-bookmarks">
            <svg data-v-4c03a9b0="" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" alt="Избранное" class="add-bookmarks-icon"><path data-v-4c03a9b0="" clip-rule="evenodd" d="M17 5v14l-5-3.111L7 19V5h10z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
            </button>
   </div>
</div>';
  }
} else {
  $html .= '<p>Товары не найдены</p>';
}

$connect->close();

echo json_encode(['html' => $html]);

?>