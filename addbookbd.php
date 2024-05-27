<?php 
require_once("connect.php");
$uploaddir = 'uploads/';
$uploadfile = $uploaddir . $_FILES['photo']['name'];
$title = $_POST['title'];
$publishing = $_POST['publishing'];
$series = $_POST['series'];
$genre = $_POST['genre'];
$number_of_pages = $_POST['number_of_pages'];
$circulation = $_POST['circulation'];
$autor = $_POST['autor'];
$price= $_POST['price'];
$age_limit = $_POST['age_limit'];


$connect -> query("INSERT INTO `colection`(`title`, `publishing`, `series`, `genre`, `number_of_pages`, `circulation`, `age_limit`, `autor`,`price` ,  `photo`) 
VALUES ('$title','$publishing','$series','$genre','$number_of_pages','$circulation','$age_limit', '$autor', '$price' ,'$uploadfile')");
if(move_uploaded_file($_FILES['photo']['tmp_name'], $uploadfile)){
    echo "Фaйл загружен успешно";
} else {
    echo "error";
}
header("Location:addbook.php");
?>
