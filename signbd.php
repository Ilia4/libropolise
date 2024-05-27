<?php 
require_once("connect.php");

$name = $_POST['name'];
$surname = $_POST['surname'];
$number = $_POST['number'];
$email = $_POST['email'];
$password = $_POST['password'];
$admin = 0;
$connect -> query("INSERT INTO `users`(`name`, `surname`, `email`, `number`, `password`, `admin`) 
VALUES ('$name','$surname','$email','$number','$password', '$admin')");


