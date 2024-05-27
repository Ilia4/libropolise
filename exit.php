<?php 
require_once('connect.php');
session_start(); // Запускаем сессию, если она еще не запущена
session_destroy(); // Уничтожаем сессию
header("Location:index.php");
