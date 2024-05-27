<?php
require_once("connect.php");

$existing_numbers = array();

$query = $connect->query('SELECT `number` FROM `users`');
if ($query) {
    while ($row = $query->fetch_array()) {
        $existing_numbers[] = $row['number'];
    }
}

if(isset($_POST['number'])) {
    $number = $_POST['number'];

    if( in_array($number, $existing_numbers)) {
        echo 'not_unique';
    } 
    else if(in_array($number, $existing_numbers) || $number == '' ){
        echo 'not_mail';
    }
    else {
        echo 'unique';
    }
}