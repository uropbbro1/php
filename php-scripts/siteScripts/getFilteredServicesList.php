<?php
require "database.php";
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');

$_POST = json_decode(file_get_contents("php://input"), true);

$company_id = prepareData($_POST['company_id']);

$check = "SELECT * FROM (SELECT * FROM `services` WHERE company_id = '$company_id')";
$result = mysqli_query($connection, $check);
$result = $result->fetch_all();

echo '[';
for ($i = 0; $i < count($result); $i++) {
    $id = $result[$i][0];
    $name = $result[$i][1];
    $company_id = $result[$i][2];
    $image = $result[$i][3];
    $description = $result[$i][4];
    $service_code = $result[$i][5];
    $price = $result[$i][6];

    echo '{';
    echo "\"id\": \"$id\", ";
    echo "\"name\": \"$name\", ";
    echo "\"company_id\": \"$company_id\", ";
    echo "\"image\": \"$image\", ";
    echo "\"description\": \"$description\", ";
    echo "\"service_code\": \"$service_code\", ";
    echo "\"price\": \"$price\"";
    echo '}';
    if (($i + 1) != count($result)) {
        echo ', ';
    }
}
echo ']';

?>