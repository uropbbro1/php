<?php
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');
require "database.php";

$_POST = json_decode(file_get_contents("php://input"), true);

if ($_POST['username'] !== "" && $_POST['password'] !== "") {
    $username = prepareData($_POST['username']);
    $password = prepareData($_POST['password']);

    $sql = "SELECT * FROM `users` WHERE username='$username'";
    $result = mysqli_query($connection, $sql);
    $result = $result->fetch_all();
    $user_id = $result[0];
    $username = $result[1];
    $email = $result[2];
    $type = $resul[4];
    $avatar = $result[5];




    if ($result[0][3] == $password)
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