<?php

require "database.php";
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');

$user_id = $_POST['id'];

$check = "SELECT * FROM `wallet` WHERE user_id='$user_id'";
$result = mysqli_query($connection, $check);
$result = $result->fetch_all();
$id = $result[$i][0];
$user_id = $result[$i][1];
$money = $result[$i][2];
echo `$money`;

?>