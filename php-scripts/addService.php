<?php
require "database.php";
header("access-control-allow-origin: *");

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

    $sql = "INSERT INTO `services` (`name`, `company_id`, `description`, `service_code`, `price`, `country`, `type`)
        VALUES ('$name', '$company_id', '$description', '$service_code', '$price', '$country', '$type')";
    $result = mysqli_query($connection, $sql);
    if ($result) {
        echo "Success";
    } else {
        echo "Error";
    }
}

?>