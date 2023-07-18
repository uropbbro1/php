<?php
require "database.php";
header("access-control-allow-origin: *");

if (isset($_POST['username']) && isset($_POST['password'])) {
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


    if (password_verify($password, $result[0][3])) {
        echo '[{';
        echo "\"id\"=$user_id, ";
        echo "\"username\"=\"$username\", ";
        echo "\"email\"=\"$email\", ";
        echo "\"region\"=\"$type\", ";
        echo "\"avatar\"=\"$avatar\"";
        echo '}]';
    } else echo 'Wrong Password or Username';
} else echo 'Error';

?>