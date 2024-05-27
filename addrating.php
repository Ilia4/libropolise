<?php 
require_once("connect.php");
    $rating = (int) $_POST['rating'];
    $reviewText = $_POST['review'];
    $bookId = $_POST['id']; 
    $userId = $_POST['userId'];
  
    $connect -> query("INSERT INTO `rating`(`id_book`, `id_user`, `reviews`, `rating`) VALUES ('$bookId','$userId','$reviewText','$rating')");
 



?>




