<?php
require "database.php";
header("access-control-allow-origin: *");

if (isset($_POST['owner_id']) && isset($_POST['name']) &&
    isset($_POST['address']) &&
    isset($_POST['phone']) &&
    isset($_POST['email']) &&
    isset($_POST['registration_number']) &&
    isset($_POST['identification_number']) &&
    isset($_POST['registration_reason_code']) &&
    isset($_POST['OKPO']) &&
    isset($_POST['OKVED']) &&
    isset($_POST['BIC']) &&
    isset($_POST['payment_account']) &&
    isset($_POST['correspondent_account'])) {
    $owner_id = prepareData($_POST['owner_id']);
    $name = prepareData($_POST['name']);
    $address = prepareData($_POST['address']);
    $phone = prepareData($_POST['phone']);
    $email = prepareData($_POST['email']);
    $site = prepareData($_POST['site']);
    $registration_number = prepareData($_POST['registration_number']);
    $identification_number = prepareData($_POST['identification_number']);
    $registration_reason_code = prepareData($_POST['registration_reason_code']);
    $OKPO = prepareData($_POST['OKPO']);
    $OKVED = prepareData($_POST['OKVED']);
    $BIC = prepareData($_POST['BIC']);
    $payment_account = prepareData($_POST['payment_account']);
    $correspondent_account = prepareData($_POST['correspondent_account']);
    $info = prepareData($_POST['info']);

    $sql = "INSERT INTO `company` (`owner_id`, `name`, `address`, `phone`, `email`, `site`, `registration_number`, `identification_number`,
        `registration_reason_code`, `OKPO`, `OKVED`, `BIC`, `payment_account`, `correspondent_account`, `info`) 
        VALUES ('$owner_id', '$name', '$address', '$phone', '$email', '$site', '$registration_number', '$identification_number',
        '$registration_reason_code', '$OKPO', '$OKVED', '$BIC', '$payment_account', '$correspondent_account', '$info')";

    $result = mysqli_query($connection, $sql);

    if ($result) {
        echo "Success";
    } else {
        echo "Error";
    }
}

?>