<?php
require "database.php";
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');

$_POST = json_decode(file_get_contents("php://input"), true);

if ($_POST['username'] !== "" && $_POST['password'] !== "") {
    $username = prepareData($_POST['username']);
    $password = prepareData($_POST['password']);

    $sql = "SELECT * FROM `users` WHERE username='$username'";
    $result = mysqli_query($connection, $sql);
    $result = $result->fetch_all();
    $user_id = $result[0][0];
    $username = $result[0][1];
    $email = $result[0][2];
    $type = $result[0][4];
    $avatar = $result[0][5];

    if (password_verify($password, $result[0][3]))
    {
        echo '{';
        echo "\"result\": \"Success\", ";
        echo "\"id\": $user_id, ";
        echo "\"username\": \"$username\", ";
        echo "\"type\": \"$type\"";
        echo '}';
    }
    else {
        echo '{';
        echo "\"result\": \"Wrong Password or Username\"";
        echo '}';
    }
} else{
    echo '{';
    echo "\"result\": \"All fields required!\"";
    echo '}';
}

?>