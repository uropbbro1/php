<?php
require "database.php";
header('Access-Control-Allow-Origin: *');
header('Content-type: application/json');

$_POST = json_decode(file_get_contents("php://input"),true);

if ($_POST["username"] != "" && $_POST["email"] != "" && $_POST["password"] != "") {
    $username = prepareData($_POST['username']);
    $email = prepareData($_POST['email']);
    $password = prepareData($_POST['password']);
    $password = password_hash($password, PASSWORD_DEFAULT);

    $check = "SELECT * FROM `users` WHERE username='$username'";
    $res = mysqli_query($connection, $check);
    if($res){
        $sql ="INSERT INTO `users` (`username`, `email`, `password`) VALUES ('$username', '$email', '$password')";
        $result = mysqli_query($connection, $sql);
    
        if ($result) {
            echo '{';
            echo "\"result\": \"Success\"";
            echo '}';
        } else {
            echo '{';
            echo "\"result\": \"Database Error\"";
            echo '}';
        }
    }else{
        echo '{';
        echo "\"result\": \"Username is already used\"";
        echo '}';
    }
} else {
    echo '{';
    echo "\"result\": \"All fields required!\"";
    echo '}';
}

?>