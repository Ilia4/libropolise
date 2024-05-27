<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet"href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</head>
<body>
    <?php require_once("connect.php")?>
    <?php require_once("header.php") ?>
    <?php session_start() ?>


    <div class="container">
        <div class="main">
 
            <div class="new-book-block">
                <div class="new-book-block-head">
                    <a href="" class="new-book-link">Наши новинки</a>
                    <a href="allbooks.php" class="all-book">Смотреть все</a>
                </div>
                
                <div class="book-contain">  
                    <?php 
                    $sql = "SELECT * FROM `colection` ORDER BY `id_book` desc LIMIT 5";
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

            <div class="new-book-block">
                <div class="new-book-block-head">
                    <a href="" class="new-book-link">Лучшие из лучших</a>
                    <a href="allbooks.php" class="all-book">Смотреть все</a>
                </div>
                
                <div class="book-contain">  
                    <?php

                    $sql = "SELECT * FROM `colection` ORDER BY `id_book` ASC LIMIT 5";
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

            <div class="new-book-block">
                <div class="new-book-block-head">
                    <a href="" class="new-book-link">Эксклюзивно у нас</a>
                    <a href="allbooks.php" class="all-book">Смотреть все</a>
                </div>
                
                <div class="book-contain">  
                    <?php 
                    $sql = "SELECT * FROM `colection` ORDER BY `id_book` desc LIMIT 5";
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
  

   <?php require_once("footer.php") ?>
</body>
</html>
<script src="js/header.js"></script>
<script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
<script>
    const buysButtons = document.querySelectorAll('.buy');

// Добавление обработчика событий для каждой кнопки
buysButtons.forEach(button => {
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
    
    addToBookmarks(bookId, userId); // Вызов функции добавления в корзину
    console.log(bookId);
    console.log(userId);
  });

});
function addToBookmarks(bookId, userId) {
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