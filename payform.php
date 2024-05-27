<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/payform.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
</head>
<body>
    <?php require_once("connect.php") ?>
    <?php require_once("header.php") ?>
    <?php session_start() ?>
    <?php 
    $id_user = $_SESSION['user']['id'];
    $sql = "SELECT * FROM `basket` WHERE id_user = $id_user";
    if($result = $connect -> query($sql)){
        if($row = $result -> fetch_array()){
            $id_book = $row['id_book'];
            $quantity = $row['quantity'];         
        }
    }

?>
<div class="contain">
    <div class="card-contain">
        <div class="tittle-page">
            <h2>Страница оплаты</h2>
        </div>
            <section class="add-card page">
        <form class="form" action="add_to_orders.php" method="POST">
            <label for="name" class="label">
            <span class="title">Имя владельца карты</span>
            <input
                class="input-field"
                type="text"
                name="input-name"
                title="Input title"
                placeholder="Введите полное имя"
                required
                id="cardholder"
            />
            <input type="hidden" name="iduser" value="<?php print($id_user) ?>">
            <input type="hidden" name="idbook" value="<?php print($id_book) ?>">
            <input type="hidden" name="quantity" value="<?php print($quantity) ?>">
            </label>
            <label for="serialCardNumber" class="label">
            <span class="title">Номер карты</span>
            <input
                id="cardNumber"
                class="input-field"
                type="number"
                name="input-name"
                title="Input title"
                placeholder="0000 0000 0000 0000"
                required
                id="cardNumber"
            />
            </label>
            <div class="split">
            <label for="ExDate" class="label">
                <span class="title">Срок действия</span>
                <input
                id="cardExpiry"
                class="input-field"
                type="text"
                name="input-name"
                title="Expiry Date"
                placeholder="01/23"
                required
                
                />
            </label>
            <label for="cvv" class="label">
                <span class="title"> CVV</span>
                <input
                id="cardCvv"
                class="input-field"
                type="number"
                name="cvv"
                title="CVV"
                placeholder="CVV"
                required

                />
            </label>
            </div>
            <input class="checkout-btn" type="submit" value="Оплатить" />
        </form>
    </div>
</div>

</section>




</body>
<script>
 $('#cardholder').mask('ZZZZZZZZZZZZZZZZZZZZZZ'); // Только буквы
$('#cardNumber').mask('0000 0000 0000 0000'); // Цифры с пробелами
$('#cardExpiry').mask('00/00'); // MM/YY
$('#cardCvv').mask('000'); // 3 цифры
</script>
</html>
