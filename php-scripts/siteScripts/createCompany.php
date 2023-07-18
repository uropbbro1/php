<?php
require "database.php";
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');

$_POST = json_decode(file_get_contents("php://input"), true);

$owner_id = prepareData($_POST['owner_id']);
$name = prepareData($_POST['name']);
$address = prepareData($_POST['address']);
$phone = prepareData($_POST['phone']);
$email = prepareData($_POST['email']);
$site = prepareData($_POST['site']);
$registration_number = prepareData($_POST['registration_number']);
$identification_number = prepareData($_POST['identification_number']);
$registration_reason_code = prepareData($_POST['registration_reason_code']);
$OKPO = prepareData($_POST['okpo']);
$OKVED = prepareData($_POST['okved']);
$BIC = prepareData($_POST['bic']);
$payment_account = prepareData($_POST['payment_account']);
$correspondent_account = prepareData($_POST['correspondent_account']);
$info = prepareData($_POST['info']);

$sql = "INSERT INTO `company` (`id`, `owner_id`, `name`, `address`, `phone`, `email`, `site`, `registration_number`, `identification_number`,
`registration_reason_code`, `OKPO`, `OKVED`, `BIC`, `payment_account`, `correspondent_account`, `info`) 
VALUES (null, '$owner_id', '$name', '$address', '$phone', '$email', '$site', '$registration_number', '$identification_number',
'$registration_reason_code', '$OKPO', '$OKVED', '$BIC', '$payment_account', '$correspondent_account', '$info')";
$result = mysqli_query($connection, $sql);
if ($result) {
    echo "Success";
    die;
} else {
    echo "Error";
    die;
}

?>