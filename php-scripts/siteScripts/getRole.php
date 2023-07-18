<?php
require "database.php";
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');

$_POST = json_decode(file_get_contents("php://input"), true);

$user_id = prepareData($_POST['user_id']);

$check = "SELECT `type` FROM `users` WHERE id='$user_id'";
$result = mysqli_query($connection, $check);
$result = $result->fetch_all();
$user_id = $result[0][0];
$type = $result[0][4];

echo '{';
echo "\"user_id\": \"$user_id\", ";
echo "\"type\": \"$type\"";
echo '}';

?>