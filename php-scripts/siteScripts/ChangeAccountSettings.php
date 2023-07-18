<?php
require "database.php";
header("access-control-allow-origin: *");
$_POST = json_decode(file_get_contents("php://input"), true);

if (isset($_POST['user_id']) && isset($_POST['username']) && isset($_POST['email']) && isset($_POST['password'])
isset($_POST['info']) && isset($_POST['avatar'])) {
    $user_id = $_POST['user_id'];
    $name = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $info = $_POST['info'];
    $avatar = $_POST['avatar'];
    $sql ="UPDATE `users` SET `username`='$name' `email`='$email' `password`='$password' `info`='$info' `info`='$info' `avatar`='$avatar'
    WHERE `id`=$user_id";
    $result = mysqli_query($connection, $sql);
    if ($result) {
        echo "Success";
    } else {
        echo "Error";
    }
} else echo "Error";
?>