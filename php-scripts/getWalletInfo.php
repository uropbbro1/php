<?php
require "database.php";
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');

$user_id = $_POST['id'];

$check = "SELECT * FROM `wallet` WHERE user_id='$user_id'";
$result = mysqli_query($connection, $check);
$result = $result->fetch_all();
$id = $result[0][0];
$user_id = $result[0][1];
$money = $result[0][2];
echo `$money`;

?>