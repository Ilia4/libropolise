<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/allbooks.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</head>
<body>
    <?require_once('connect.php');?>
    <?php require_once('header.php')?>
    <div class="container">
        <div class="filter-container">   
            <h3>Сортировать по:</h3>
            <h4>По жанрам:</h4>
            <form id="filter-form" class="filter-form">
                <?php
                    $sql = "SELECT `name_genre` FROM `genre`";
                    if($result = $connect -> query($sql)){
                        while($row = $result -> fetch_array()){   
                                echo'<div class="checkbox-block"> 
                    <label class="cl-checkbox">
                        <input  type="checkbox" name="categories[]" value="'.$row['name_genre'].'">
                        <span></span>
                </label>
                <div class="name-checkbox">
                        <h4>'.$row['name_genre'].'</h4>
                </div>
                </div>';
                        }
                    }
                    
                ?>
                <div>
    <label for="sort">Сортировать по:</label>
    <select id="sort" name="sort">
      <option value="">-- Выберите сортировку --</option>
      <option value="newest">Новизне</option>
      <option value="price_asc">Цене (возрастание)</option>
      <option value="price_desc">Цене (убывание)</option>
    </select>
  </div>
  <button type="submit" class="btn-form-filter">Фильтровать</button>
            </form>
        </div>
        <div class="main">

            <div class="new-book-block">
                <div class="new-book-block-head">
                    <a href="" class="new-book-link">Каталог</a>
                </div>
                
                <div class="book-contain" >  
                    <?php 
                    $sql = "SELECT * FROM `colection`";
                    if($result = $connect -> query($sql)){
                        while($row = $result -> fetch_array()){    
                            $idBook = $row['id_book'];
                            echo'<div class="book">';

                                echo'<div class="photo-block">';
                                    echo'<img src="'.$row['photo'].'" />';
                                echo'</div>';
                                echo'<div class="price-block">';
                                    echo'<h4>'.$row['price'].' ₽</h4>';
                                echo'</div>';
                                echo'<div class="title">';
                                    echo'<a href="detailproduct.php?id_book='.$row['id_book'].'" class="tittle-book">'.$row['title'].'</a>';
                                    echo'<h4>'.$row['autor'].'<h4>';
                                echo'</div>';
                                echo '<div class="action-buttons-block-book">';
                                echo'<input type="hidden" id="idbook" value="'.$idBook.'">';
                                if(isset($_SESSION['user']['id'])){
                                  echo'<input type="hidden" id="iduser" value="'.$_SESSION['user']['id'].'">';
                              }
                              else{
                                  
                              }
                                    echo'<button class="buy">Купить</button>';
                                    echo'<button class="add-bookmarks">
                                        <svg data-v-4c03a9b0="" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg" alt="Избранное" class="add-bookmarks-icon"><path data-v-4c03a9b0="" clip-rule="evenodd" d="M17 5v14l-5-3.111L7 19V5h10z" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                                        </button>';
                                echo'</div>';
                            echo'</div>';
                        }
                    }
                ?>
                </div>
            </div>
        </div>
    </div>
</body>
<script>
   $('#filter-form').on('submit', function(e) {
  e.preventDefault(); 

  // Получаем значения выбранных чекбоксов
  var categories = [];
  $('input[name="categories[]"]:checked').each(function() {
    categories.push($(this).val());
  });
  var sort = $('#sort').val();
  $.ajax({
    url: 'filter.php', // Путь к PHP-файлу
    method: 'POST',
    data: { categories: categories, sort:sort },
    dataType: 'json',
    success: function(response) {
      $('.book-contain').html(response.html); // Обновляем .book-contain
    },
    error: function(xhr, status, error) {
      console.error('Ошибка:', error);
    }
  });
});

const buyButtons = document.querySelectorAll('.buy');

// Добавление обработчика событий для каждой кнопки
buyButtons.forEach(button => {
  button.addEventListener('click', function(event) {
    // Получение ID книги из ближайшего input с id "idbook"
    const bookId = this.parentNode.querySelector('#idbook').value;
    const userId = this.parentNode.querySelector('#iduser').value; 
    
    addToBuy(bookId, userId); // Вызов функции добавления в корзину
    console.log(bookId);
    console.log(userId);
  });

});
function addToBuy(bookId, userId) {
  // Отправка AJAX-запроса
  $.ajax({
    url: 'add_to_basket.php', // URL скрипта на сервере
    method: 'POST',
    data: {
      bookId: bookId,
      userId:userId
    },
    success: function(response) {
      // Обработка успешного ответа
      if (response.success) {
        
        // Обновление количества товаров в корзине и т.д.
      } else {
        
      }
    },
    error: function() {
     
    }
  });
}
const bookmarkButtons = document.querySelectorAll('.add-bookmarks');

// Добавление обработчика событий для каждой кнопки
bookmarkButtons.forEach(button => {
  button.addEventListener('click', function(event) {
    // Получение ID книги из ближайшего input с id "idbook"
    const bookId = this.parentNode.querySelector('#idbook').value;
    const userId = this.parentNode.querySelector('#iduser').value; 
    
    addToBasket(bookId, userId); // Вызов функции добавления в корзину
    console.log(bookId);
    console.log(userId);
  });

});
function addToBasket(bookId, userId) {
  // Отправка AJAX-запроса
  $.ajax({
    url: 'add_to_bookmarks.php', // URL скрипта на сервере
    method: 'POST',
    data: {
      bookId: bookId,
      userId:userId
    },
    success: function(response) {
      // Обработка успешного ответа
      if (response.success) {
        
        // Обновление количества товаров в корзине и т.д.
      } else {
        
      }
    },
    error: function() {
     
    }
  });
}
</script>
</html>