<?php
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');
require "database.php";

$_POST = json_decode(file_get_contents("php://input"), true);

$user_id = prepareData($_POST['user_id']);

$check = "SELECT * FROM `cart` WHERE user_id = '$user_id'";
$result = mysqli_query($connection, $check);
$result = $result->fetch_all();
echo '[';
for ($i = 0; $i < count($result); $i++)
{
    $id = $result[$i][0];
    $user_id = $result[$i][1];
    $company_id = $result[$i][2];
    $service_id = $result[$i][3];

    echo '{';
    echo "\"id\": \"$id\", ";
    echo "\"user_id\": \"$user_id\", ";
    echo "\"company_id\": \"$company_id\", ";
    echo "\"service_id\": \"$service_id\"";
    echo '}';
    if (($i+1) != count($result)) {
        echo ', ';
    }
}
echo ']';
?>