<?php 
$connect = new mysqli('localhost', 'root', '', 'bookmagazine');
if(!$connect)
{echo 'нет соединения с базой данных';}
?>