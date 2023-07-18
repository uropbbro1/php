<?php
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');
require "database.php";

$_POST = json_decode(file_get_contents("php://input"), true);

$user_id = prepareData($_POST['user_id']);

$check = "SELECT * FROM `wallet` WHERE user_id = $user_id";
$result = mysqli_query($connection, $check);
$result = $result->fetch_all();
echo '[';
for ($i = 0; $i < count($result); $i++)
{
    $id = $result[$i][0];
    $user_id = $result[$i][1];
    $money = $result[$i][2];

    echo '{';
    echo "\"id\": \"$id\", ";
    echo "\"user_id\": \"$user_id\", ";
    echo "\"money\": \"$money\"";
    echo '}';
    if (($i+1) != count($result)) {
        echo ', ';
    }
}
echo ']';
?>