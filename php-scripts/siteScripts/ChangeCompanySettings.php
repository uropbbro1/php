<?php
require "database.php";
header("access-control-allow-origin: *");
$_POST = json_decode(file_get_contents("php://input"), true);

if (isset($_POST['user_id']) && isset($_POST['name']) && isset($_POST['address']) && isset($_POST['phone'])
isset($_POST['email']) && isset($_POST['site']) && isset($_POST['payment_account']) && isset($_POST['correspondent_account'])
&& isset($_POST['info'])) {
    $user_id = $_POST['user_id'];
    $name = $_POST['name'];
    $address = $_POST['address'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $site = $_POST['site'];
    $payment_account = $_POST['payment_account'];
    $correspondent_account = $_POST['correspondent_account'];
    $info = $_POST['info'];
    $sql ="UPDATE `company` SET `name`='$name' `address`='$address' `phone`='$phone' `email`='$email' `site`='$site' `payment_account`='$payment_account'
    `correspondent_account`='$correspondent_account' `info`='$info'  WHERE `id`=$user_id";
    $result = mysqli_query($connection, $sql);
    if ($result) {
        echo "Success";
    } else {
        echo "Error";
    }
} else echo "Error";
?>