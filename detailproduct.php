<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/detailproduct.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</head>
<body> 
    <?
    require_once("header.php");
    require_once("connect.php");
    session_start();
    if(isset($_GET['id_book'])){
            $id = $_GET['id_book'];
            $sql = "SELECT * FROM colection WHERE id_book = '$id'";
            if($result = $connect -> query($sql)){
                if($row = $result -> fetch_array()){
                    $genre = $row['genre'];
                    $title = $row['title'];
                    $autor = $row['autor'];
                    $age = $row['age_limit'];
                    $photo = $row['photo'];
                    $description = $row['description'];
                    $price = $row['price'];
                    $publishing = $row['publishing'];
                    $number_of_pages = $row['number_of_pages'];
                    $procentPrice = ($price / 10) * 1;
                    $oldPrice = $procentPrice + $price;
                    $circulation = $row['circulation'];
                    
                }
            }
    }?>
    <div class="container">
        <div class="way-to-the-book">
            <a href="index.php">Главная</a> > <a href="allbooks.php"><?php print($row['genre']); ?></a> > <a href=""><?php print($title) ?></a>
        </div>

       
            <div class="detail-book-container">
                <div class="header-detail-book">
                    <div class="title-book">
                        <h2><?php echo $title ?></h2>
                        <div class="age-limit">
                            <p><?php echo $age  ?></p>
                        </div>
                    </div>
                    <div class="autor-book">
                        <a href="allbooks.php"><?php echo $autor ?></a>
                    </div>
                </div>

                <div class="grade">
                <?php 

                $sql = "SELECT `id_book`, AVG(`rating`) AS average_rating FROM `rating` WHERE `id_book` = '$id' GROUP BY `id_book`";
                $result = $connect->query($sql);
                echo'<h3>Общая оценка </h3>';
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        $averageRating = $row['average_rating'];
                        $roundedNumber = round($averageRating);
                        for($i = 1; $i <= $roundedNumber; $i++){
                            
                            echo'<svg width="16" height="16" viewBox="0 0 16 16" fill="orange" xmlns="http://www.w3.org/2000/svg" class="rat" id="star1"><path clip-rule="evenodd" d="M8.26 12.534a.5.5 0 00-.52 0L4.65 14.409a.5.5 0 01-.75-.527l.756-3.748a.5.5 0 00-.146-.461L1.782 7.089a.5.5 0 01.289-.86l3.605-.4a.5.5 0 00.405-.302L7.54 2.086a.5.5 0 01.92 0l1.46 3.44a.5.5 0 00.404.303l3.605.4a.5.5 0 01.289.86L11.49 9.673a.5.5 0 00-.146.461l.756 3.748a.5.5 0 01-.75.527L8.26 12.534z"></path></svg>';
                        }
                        
                    }
                } else {
                    echo "<h3>Нету оценок</h3>";
                }
                
                ?>
                </div>
                <div class="brief-info-book">
                    <div class="photo-book">
                        <img src="<?php print($photo) ?>" alt="" srcset="">
                    </div>
                    <div class="description-book">
                        <div class="description">
                            <p>
                                <?php print($description) ?>
                            </p>
                        </div>
                        <div class="active-links">
                            <a href="">Перейти к описанию</a>
                        </div>
                        <div class="info-book">
                            <div class="information-book">
                                <div class="id">
                                    <h3>ID товара:</h3>
                                </div>
                                <div class="id-count">
                                    <h3><?php print($id) ?></h3>
                                </div>
                            </div>
                            <div class="information-book">
                                <div class="publishing">
                                    <h3>Издательство:</h3>
                                </div>
                                <div class="id-count">
                                    <h3><?php print($publishing) ?></h3>
                                </div>
                            </div>
                            <div class="information-book">
                                <div class="number-of-page">
                                    <h3>Количество страниц:</h3>
                                </div>
                                <div class="number-of-page-count">
                                    <h3><?php print($number_of_pages) ?></h3>
                                </div>
                            </div>
                            
                            <div class="active-links">
                            <a href="">Перейти к характеристикам</a>
                        </div>
                            
                        </div>
                        
                    </div>
                    <div class="pay-block">
                        <div class="price-block">
                            <h4><?php print($price) ?> ₽</h4>
                            <h3>Старая цена: <?php print($oldPrice) ?> ₽</h3>
                            <div class="button-buy">
                                <button class="buy">Купить</button>
                                <button class="add-bookmarks">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" alt="Избранное" class="add-bookmarks-icon"><path d="M3 4a2 2 0 012-2h14a2 2 0 012 2v17.5a1 1 0 01-1.508.861L12 17.938l-7.492 4.423A1 1 0 013 21.5V4zm16 0H5v15.748l6.492-3.832a1 1 0 011.016 0L19 19.748V4z"></path></svg>
                                </button>
                            </div>
                            <div class="have">
                                <svg width="20" height="16" viewBox="0 0 16 12" fill="none" xmlns="http://www.w3.org/2000/svg" alt="В наличии" class="offer-availability-status--green offer-availability-status__icon"><path d="M15 1L5.405 11 1 6.408" stroke="#37CEB4" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path></svg>
                                <span class="offer-availability-status--green">В наличии</span>
                            </div>
                            
                        </div>
                    </div>
                </div> 
                <div class="reviews-block">
                    <div class="head-reviews-block">
                        <div class="title">
                            <h2>ОТЗЫВЫ</h2>
                        </div>
                        <div class="buttons">
                            <button class="reviews">Оставить отзыв</button>
                        </div>
                    </div>
                    <div class="write-reviews">
                        <div class="stars-contain">
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" class="rating-edit" id="star1"><path clip-rule="evenodd" d="M8.26 12.534a.5.5 0 00-.52 0L4.65 14.409a.5.5 0 01-.75-.527l.756-3.748a.5.5 0 00-.146-.461L1.782 7.089a.5.5 0 01.289-.86l3.605-.4a.5.5 0 00.405-.302L7.54 2.086a.5.5 0 01.92 0l1.46 3.44a.5.5 0 00.404.303l3.605.4a.5.5 0 01.289.86L11.49 9.673a.5.5 0 00-.146.461l.756 3.748a.5.5 0 01-.75.527L8.26 12.534z"></path></svg>
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" class="rating-edit" id="star2"><path clip-rule="evenodd" d="M8.26 12.534a.5.5 0 00-.52 0L4.65 14.409a.5.5 0 01-.75-.527l.756-3.748a.5.5 0 00-.146-.461L1.782 7.089a.5.5 0 01.289-.86l3.605-.4a.5.5 0 00.405-.302L7.54 2.086a.5.5 0 01.92 0l1.46 3.44a.5.5 0 00.404.303l3.605.4a.5.5 0 01.289.86L11.49 9.673a.5.5 0 00-.146.461l.756 3.748a.5.5 0 01-.75.527L8.26 12.534z"></path></svg>
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" class="rating-edit" id="star3"><path clip-rule="evenodd" d="M8.26 12.534a.5.5 0 00-.52 0L4.65 14.409a.5.5 0 01-.75-.527l.756-3.748a.5.5 0 00-.146-.461L1.782 7.089a.5.5 0 01.289-.86l3.605-.4a.5.5 0 00.405-.302L7.54 2.086a.5.5 0 01.92 0l1.46 3.44a.5.5 0 00.404.303l3.605.4a.5.5 0 01.289.86L11.49 9.673a.5.5 0 00-.146.461l.756 3.748a.5.5 0 01-.75.527L8.26 12.534z"></path></svg>
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" class="rating-edit" id="star4"><path clip-rule="evenodd" d="M8.26 12.534a.5.5 0 00-.52 0L4.65 14.409a.5.5 0 01-.75-.527l.756-3.748a.5.5 0 00-.146-.461L1.782 7.089a.5.5 0 01.289-.86l3.605-.4a.5.5 0 00.405-.302L7.54 2.086a.5.5 0 01.92 0l1.46 3.44a.5.5 0 00.404.303l3.605.4a.5.5 0 01.289.86L11.49 9.673a.5.5 0 00-.146.461l.756 3.748a.5.5 0 01-.75.527L8.26 12.534z"></path></svg>
                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none" xmlns="http://www.w3.org/2000/svg" class="rating-edit" id="star5"><path clip-rule="evenodd" d="M8.26 12.534a.5.5 0 00-.52 0L4.65 14.409a.5.5 0 01-.75-.527l.756-3.748a.5.5 0 00-.146-.461L1.782 7.089a.5.5 0 01.289-.86l3.605-.4a.5.5 0 00.405-.302L7.54 2.086a.5.5 0 01.92 0l1.46 3.44a.5.5 0 00.404.303l3.605.4a.5.5 0 01.289.86L11.49 9.673a.5.5 0 00-.146.461l.756 3.748a.5.5 0 01-.75.527L8.26 12.534z"></path></svg>
                    </div>
                    
                        <div class="input-reviews" >
                            <textarea type="text" id="review" class="review-input-field"></textarea>
                            <input type="hidden" value="<?php print($id) ?>" id="id-Book">
                            <?php if(isset($_SESSION['user']['id'])){
                                    echo'<input type="hidden" id="idUser" value="'.$_SESSION['user']['id'].' ">';
                            }else{

                            }
                            ?>
                            <?php if(isset($_SESSION['user']['id'])){
                                echo'<div class="submit-btn-block">
                                <button id="submit-review" class="submit-review">Отправить отзыв</button> 
                            </div>';
                                }else{
                                    echo'<h3>Необходимо авторизоваться</h3>';
                                }
                                
                                ?>
                            
                           
                        </div>
                    </div>
                    <div class="reviews-container">
                        <?php 
                            $sql = "SELECT * FROM `rating` WHERE `id_book` = '$id'";
                            if($result = $connect -> query($sql)){
                                while($row = $result -> fetch_array()){
                                    $idBook = $row['id_book'];
                                    $reviews = $row['reviews'];
                                    $idUserReview = $row['id_user'];
                                    $sql1 = "SELECT `name`,`surname` FROM `users` WHERE `id_user` = '$idUserReview'";
                                    if($result1 = $connect -> query($sql1)){
                                        if($row1 = $result1 -> fetch_array()){
                                            $name = $row1['name'];
                                            $surname = $row1['surname'];
                                            echo'<div class="review">
                                                    <div class="head-review">
                                                        <h3>'.$row1['name'] .' '. $row1['surname'] .'</h3>
                                                    </div>  
                                                    <div class="rtas">';
                                                        for($i=1; $i <= $row['rating']; $i++){
                                                            echo'<svg width="16" height="16" viewBox="0 0 16 16" fill="orange" xmlns="http://www.w3.org/2000/svg" class="edit" id="star5"><path clip-rule="evenodd" d="M8.26 12.534a.5.5 0 00-.52 0L4.65 14.409a.5.5 0 01-.75-.527l.756-3.748a.5.5 0 00-.146-.461L1.782 7.089a.5.5 0 01.289-.86l3.605-.4a.5.5 0 00.405-.302L7.54 2.086a.5.5 0 01.92 0l1.46 3.44a.5.5 0 00.404.303l3.605.4a.5.5 0 01.289.86L11.49 9.673a.5.5 0 00-.146.461l.756 3.748a.5.5 0 01-.75.527L8.26 12.534z"></path></svg>';
                                                        }
                                                    echo'</div> 
                                                    <div class="review-container">
                                                        <p>'.$reviews.'</p>
                                                    </div>
                                                    
                                                </div>';
                                        }
                                    }

                                }
                            }
                        ?>
                        
                    </div>
                </div>
                <div class="full-description-book">
                    <div class="title-block">
                        <h2>ОПИСАНИЕ И ХАРАКТЕРИСТИКИ</h2>
                    </div>
                    <div class="full-description-block">
                        <p><?php print($description) ?></p>
                    </div>  
                </div>
                <div class="full-characteristics-contain">
                    <div class="full-characteristics">
                            <div class="information-book">
                                <div class="id">
                                    <h3>ID товара:</h3>
                                </div>
                                <div class="id-count">
                                    <h3><?php print($id) ?></h3>
                                </div>
                            </div>
                            <div class="information-book">
                                <div class="publishing">
                                    <h3>Издательство:</h3>
                                </div>
                                <div class="id-count">
                                    <h3><?php print($publishing) ?></h3>
                                </div>
                            </div>
                            <div class="information-book">
                                <div class="number-of-page">
                                    <h3>Количество страниц:</h3>
                                </div>
                                <div class="number-of-page-count">
                                    <h3><?php print($number_of_pages) ?></h3>
                                </div>
                            </div>
                            <div class="information-book">
                                <div class="number-of-page">
                                    <h3>Размер:</h3>
                                </div>
                                <div class="number-of-page-count">
                                    <h3>21.5x14.5x3.9</h3>
                                </div>
                            </div>
                            <div class="information-book">
                                <div class="number-of-page">
                                    <h3>Тираж:</h3>
                                </div>
                                <div class="number-of-page-count">
                                    <h3><?php print($circulation) ?></h3>
                                </div>
                            </div>
                            <div class="information-book">
                                <div class="number-of-page">
                                    <h3>Возрастные ограничения:</h3>
                                </div>
                                <div class="number-of-page-count">
                                    <h3><?php print($age) ?></h3>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
      
    </div>
</body>
<script>
const starsContainer = document.querySelector('.stars-contain');
const stars = document.querySelectorAll('.rating-edit');
const submitButton = document.getElementById('submit-review');

let rating = 0;

// Обработчик клика по звездам (перекрашивание и обновление rating)
starsContainer.addEventListener('click', function(e) {
  const star = e.target.closest('svg');
  if (!star) return;

  const starIndex = Array.from(stars).indexOf(star) + 1;
  highlightStars(starIndex);

  // Обновление rating
  rating = starIndex;
});
submitButton.addEventListener('click', function() {
  const reviewText = document.getElementById('review').value;
  const idBook = document.getElementById('id-Book').value;
  const idUser = document.getElementById('idUser').value;
  

  // Отправка данных на сервер (AJAX запрос)
  $.ajax({
    url: 'addrating.php',
    method: 'POST',
    data: { rating: rating, review:reviewText, id:idBook, userId:idUser },
    success: function(response) {
        location.reload();
    }
  });
});

function highlightStars(starIndex) {
  stars.forEach((star, index) => {
    if (index < starIndex) {
      star.classList.add('active'); // Добавляем класс для активных звезд
    } else {
      star.classList.remove('active');
    }
  });
}

</script>
</html>