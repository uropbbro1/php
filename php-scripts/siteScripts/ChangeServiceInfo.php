<?php
require "database.php";
header("access-control-allow-origin: *");

$_POST = json_decode(file_get_contents("php://input"), true);

if (isset($_POST['company_id']) && isset($_POST['name']) &&
    isset($_POST['type']) &&
    isset($_POST['description']) &&
    isset($_POST['service_code']) &&
    isset($_POST['country']) &&
    isset($_POST['price'])) {
    $company_id = prepareData($_POST['company_id']);
    $name = prepareData($_POST['name']);
    $type = prepareData($_POST['type']);
    $description = prepareData($_POST['description']);
    $service_code = prepareData($_POST['service_code']);
    $country = prepareData($_POST['country']);
    $price = prepareData($_POST['price']);
    $sql = "UPDATE `users` SET `name`='$name' `type`='$type' `description`='$description' `service_code`='$service_code' `country`='$country' `price`='$price'
    WHERE `company_id`=$company_id";
    $result = mysqli_query($connection, $sql);
    if ($result) {
        echo "Success";
    } else {
        echo "Error";
    }
} else echo "Error";

?>