<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/basket.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
</head>
<body>
    <?php 
    require_once("connect.php");
    require_once("header.php");
    session_start();
?>
    <div class="container">
        <div class="basket-container">
            <div class="tittle">
                <h3>Корзина</h3>
            </div>
            <div class="product-container">
                <?php 
                if(isset($_SESSION['user']['id'])){
                    $iduser = $_SESSION['user']['id'];
                    $sql = "SELECT * FROM basket WHERE id_user = $iduser"; 
                        $result = $connect->query($sql); 

                        if ($result->num_rows === 0) { 
                        echo "<h4 class='error'>У вас пустая корзина.</h4>"; 
                        } else { 
                        
                    
                    
                            $sql = "SELECT * FROM `basket` WHERE `id_user` = $iduser";
                            if($result = $connect -> query($sql)){
                                while($row = $result -> fetch_array()){
                                    $idbook = $row['id_book'];
                                    $sql2 = "SELECT * FROM `colection` WHERE `id_book` = $idbook";
                                    if($result2 = $connect -> query($sql2)){
                                        if($row2 = $result2 -> fetch_array()){
                                            echo'<div class="book">';

                                        echo'<div class="photo-block">';
                                            echo'<img src="'.$row2['photo'].'" />';
                                        echo'</div>';
                                        echo'<div class="price-block">';
                                            echo'<h4>'.$row2['price'].' ₽</h4>';
                                        echo'</div>';
                                        echo'<div class="title">';
                                            echo'<a href="detailproduct.php?id_book='.$row2['id_book'].'" class="tittle-book">'.$row2['title'].'</a>';
                                            echo'<h4>'.$row2['autor'].'<h4>';
                                        echo'</div>';
                                        echo '<div class="action-buttons-block-book">';
                                        echo'<input type="hidden" id="idbook" value="'.$idbook.'">';
                                        if(isset($_SESSION['user']['id'])){
                                            echo'<input type="hidden" id="iduser" value="'.$_SESSION['user']['id'].'">';
                                        }
                                        else{
                                            
                                        }
                                            echo'<button class="delete-from-busket">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="25" fill="currentColor" class="delete-from-busket-icon" viewBox="0 0 16 16">
                                            <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                                            <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                                        </svg>
                                                </button>';
                                        echo'</div>';
                                    echo'</div>';
                                        }
                                    }
                                }
                            }
                 
                        }
                }
                else{
                   echo'<h3 class="none-autoriz-user">Необходимо авторизоваться</h3>';
                }
                ?>
            </div>
        </div>
        <?php 
        $sql = "SELECT SUM(quantity) AS total_sum FROM basket";
        $result = $connect->query($sql);
        $row = $result->fetch_assoc();
        $sum = $row['total_sum'];
       
        ?>
        <div class="pay-form-block">
                <div class="pay-form">
                    <div class="title-pay-form">
                        <h3>Оформление заказа</h3>
                    </div>  
                    <div class="head-pay-form">
                        <h4><?php print($sum) ?> товара</h4>
                    </div>
                    <div class="product-list">
                        <?php 
                        if(isset($_SESSION['user']['id'])){
                            $iduser = $_SESSION['user']['id'];
                        }
                        else{
                            $iduser='0';
                        }
                            $sql1 = "SELECT * FROM `basket` WHERE `id_user` = $iduser";
                            if($result1 = $connect -> query($sql1)){
                                while($row1 = $result1 -> fetch_array()){
                                    echo'<div class="list">';
                                    $idbook = $row1['id_book'];
                                    
                                    $sql3 = "SELECT * FROM `colection` WHERE `id_book` = $idbook";
                                    if($result3 = $connect -> query($sql3)){
                                        if($row3 = $result3 -> fetch_array()){
                                            echo'<div class="title-block-width">';
                                            echo'<a href="detailproduct.php?id_book='.$row3['id_book'].'" class="tittle-book">'.$row3['title'].'</a>';
                                            echo'</div>';
                                            echo'<div class="quantity-block">';
                                                echo'<h4>количество: '.$row1['quantity'].' шт.</h4>';
                                                
                                            echo'</div>';
                                            
                                        }
                                    }
                                    
                                    echo'</div>';
                                }
                            }
                            $sql2 = "SELECT SUM(b.price * o.quantity) AS total_price FROM basket o JOIN colection b ON o.id_book = b.id_book WHERE o.id_user = $iduser";
                            if($result2 = $connect -> query($sql2)){
                                if($row2 = $result2 -> fetch_array()){
                                    $totalPrice = $row2['total_price'];          
                                }
                            }
                        ?>
                        <div class="total-price">
                            <h4>На сумму : <?php print($totalPrice) ?> ₽</h4>
                        </div>
                    </div>
                    <?php 
                    if(isset($_SESSION['user']['id'])){
                       echo' <div class="button-next-pay">
                        <button class="btn-style" id="openPayForm">
                            <p>Перейти к оформлению</p>
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-6 w-6"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                                stroke-width="4"
                            >
                                <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M14 5l7 7m0 0l-7 7m7-7H3"
                                ></path>
                            </svg>
                        </button>
                    </div>';
                    }
                    else{

                    }
                    ?>
                    
                </div>
        </div>
    </div>
</body>
<script>
    $(document).ready(function() {
  $(".delete-from-busket").click(function() {
    var idbook = $(this).siblings("#idbook").val();
    var iduser = $(this).siblings("#iduser").val();
    $.ajax({
      url: "delete_busket.php", // URL-адрес PHP скрипта
      method: "GET",
      data: { id_book: idbook, id_user: iduser },
      success: function(response) {
        if (response) {
          // Удаляем элемент из DOM
          location.reload();
        } else {
          alert("Ошибка удаления записи.");
        }
      }.bind(this) // bind(this) для доступа к $(this) внутри success
    });
  });
});
let openPayForm = document.getElementById("openPayForm");

openPayForm.addEventListener("click" , function(){
    window.location.href = "payform.php"
})
</script>
</html>