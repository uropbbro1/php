<?php
require "database.php";
header("access-control-allow-origin: *");

if (isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])) {
    $username = prepareData($_POST['username']);
    $email = prepareData($_POST['email']);
    $password = password_hash(prepareData($_POST['password']));

    $sql = "INSERT INTO `users` (`username`, `email`, `password`) VALUES ('$username', '$email', '$password')";
    $result = mysqli_query($connection, $sql);

    if ($result) {
        echo 'Success';
    } else {
        echo 'Error';
    }
} else {
    echo 'All fields required!';
}

?>