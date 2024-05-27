<?php 
require_once('connect.php');
session_start();
 $number = $_POST['number'];
 $password= $_POST['password'];




 $result = mysqli_query($connect, "SELECT * FROM `users` WHERE `number` = '$number' AND `password`='$password'");
 if(mysqli_num_rows($result) > 0){
    $user = mysqli_fetch_assoc($result);
    
    $_SESSION['user'] = 
    ["id" => $user['id_user'],
     "name" => $user['name'],
     "surname" => $user['surname'],
     "number" => $user['number'],
     "email" => $user['email'],
     "password" => $user['password'], 
     "admin" => $user['admin'],  
 ];
 if($_SESSION['user']['admin'] == '0'){
    header("Location:index.php");
 }else{
    header("Location:admin.php");
 }
 
}

   { 
    echo 'Неверный логин или пароль';

}

?>